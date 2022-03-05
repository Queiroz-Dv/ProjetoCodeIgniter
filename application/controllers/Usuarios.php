<?php

defined('BASEPATH') or exit('Action not allowed');

class Usuarios extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('login');
        }
    }

    //Show all users in a view  table
    public function index()
    {

        $data = array(
            'titulo' => 'Usuários Cadastrados',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js',
            ),
            'usuarios' => $this->ion_auth->users()->result(),
        );
        $this->load->view('layout/header', $data);
        $this->load->view('usuarios/index');
        $this->load->view('layout/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('first_name', '', 'trim|required');
        $this->form_validation->set_rules('last_name', '', 'trim|required');
        $this->form_validation->set_rules('email', '', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('username', '', 'trim|required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[255]');
        $this->form_validation->set_rules('confirm_password', 'Confirme', 'matches[password]');
        if ($this->form_validation->run()) {
            //O xss serve para limpar os campos e
            // tem o objetivo de não salvar nenhum dado malicioso no banco de dados
            $username = $this->security->xss_clean($this->input->post('username'));
            $password = $this->security->xss_clean($this->input->post('password'));
            $email = $this->security->xss_clean($this->input->post('email'));

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'username' => $this->input->post('username'),
                'active' => $this->input->post('active'),
            );
            $group = array($this->input->post('perfil_usuario'));

            $additional_data = $this->security->xss_clean($additional_data);
            $group = $this->security->xss_clean($group);

            if ($this->ion_auth->register($username, $password, $email, $additional_data, $group)) {
                $this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
            } else {
                $this->session->set_flashdata('error', 'Os dados não foram salvos. Tente novamente, por favor.');
            }
            redirect('usuarios');
        } else {
            $data = array(
                'titulo' => "Registrar Usuário",
            );
            $this->load->view('layout/header', $data);
            $this->load->view('usuarios/edit');
            $this->load->view('layout/footer');
        }
    }

    //Editar Usuário
    public function edit($usuario_id = NULL)
    {
        if (!$usuario_id || !$this->ion_auth->user($usuario_id)->row()) {
            $this->session->set_flashdata('error', 'Usuário não encontrado');
            redirect('usuarios');
        } else {
            $this->form_validation->set_rules('first_name', '', 'trim|required');
            $this->form_validation->set_rules('last_name', '', 'trim|required');
            $this->form_validation->set_rules('email', '', 'trim|required|valid_email', 'callback_email_check');
            $this->form_validation->set_rules('username', '', 'trim|required', 'callback_username_check');
            $this->form_validation->set_rules('password', 'Password', 'min_length[5]|max_length[255]');
            $this->form_validation->set_rules('confirm_password', 'Confirme', 'matches[password]');
            if ($this->form_validation->run()) {
                $data = elements(
                    array(
                        'first_name',
                        'last_name',
                        'email',
                        'username',
                        'active',
                        'password'
                    ),
                    $this->input->post()
                );

                $data = $this->security->xss_clean($data);
                $password = $this->input->post('password');

                //Verification to password
                if (!$password) {
                    unset($data['password']);
                }

                if ($this->ion_auth->update($usuario_id, $data)) {
                    $user_profile_db = $this->ion_auth->get_users_groups($usuario_id)->row();
                    $user_profile_post = $this->input->post('user_profile');

                    //If is diff update group
                    if ($user_profile_post != $user_profile_db->id) {
                        $this->ion_auth->remove_from_group($user_profile_db->id, $usuario_id);
                        $this->ion_auth->add_to_group($user_profile_post, $usuario_id);
                    }

                    $this->session->set_flashdata('sucesso', 'Dados salvos com sucesso');
                } else {
                    $this->session->set_flashdata('error', 'Erro ao salvar dados');
                }
                redirect('users');
            } else {
                $data = array(
                    'titulo' => "Editar Usuário",
                    'usuario' => $this->ion_auth->user($usuario_id)->row(),
                    'perfil_usuario' => $this->ion_auth->get_users_groups($usuario_id)->row(),
                );
                $this->load->view('layout/header', $data);
                $this->load->view('usuarios/edit');
                $this->load->view('layout/footer');
            }
        }
    }

    //Deleta Usuário
    public function del($usuario_id = NULL)
    {
        //Se o usuário não existe
        if (!$usuario_id || !$this->ion_auth->user($usuario_id)->row()) {
            $this->session->set_flashdata('error', 'Usuário não existe');
            redirect('usuarios');
        }
        //Se o usuário tenta excluir um administrador
        if ($this->ion_auth->is_admin($usuario_id)) {
            $this->session->set_flashdata('error', "O admin não pode ser removido.");
            redirect('usuarios');
        }
        
        //Permissão de exclusão
        if ($this->ion_auth->delete_user($usuario_id)) {
            $this->session->set_flashdata('sucesso', "Usuário excluído com sucesso");
            redirect('usuarios');
        } else {
            $this->session->set_flashdata('error', "O admin não pode ser removido.");
            redirect('usuarios');
        }
    }

    //Verifica  email
    public function email_check($email)
    {
        //Pega o id do input hidden na view edit
        $usuario_id = $this->input->post('usuario_id');

        //A condição trata o is_unique. 
        //Este if verifica se na tabela usuários existe um email 
        //cujo id seja diferente do que esta sendo tratado no momenmto.
        if ($this->CoreModel->GetById('users', array('email' => $email, 'id !=' => $usuario_id))) {
            $this->form_validation->set_message('email_check', 'Este e-mail já existe!');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    //Verifica o usuário
    public function username_check($username)
    {
        $usuario_id = $this->input->post('usuario_id');

        if ($this->CoreModel->GetById('users', array('username' => $username, 'id !=' => $usuario_id))) {
            $this->form_validation->set_message('username_check', 'Esse usuário já existe');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}