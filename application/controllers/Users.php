<?php

defined('BASEPATH') OR exit('Action not allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //Define if there is a session
    }

    //Show all users in a view  table
    public function index() {

        $data = array(
            'title' => 'Users Register',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js',
            ),
            'users' => $this->ion_auth->users()->result(),
        );
        //echo '<pre>';
        // print_r($this->input->post());
        //exit();
        $this->load->view('layout/header', $data);
        $this->load->view('users/index');
        $this->load->view('layout/footer');
    }

    public function edit($user_id = NULL) {
        if (!$user_id || !$this->ion_auth->user($user_id)->row()) {
            $this->session->set_flashdata('error', 'User not found');
            redirect('users');
        } else {
            $this->form_validation->set_rules('first_name', '', 'trim|required');
            $this->form_validation->set_rules('last_name', '', 'trim|required');
            $this->form_validation->set_rules('email', '', 'trim|required|valid_email', 'callback_email_check');
            $this->form_validation->set_rules('username', '', 'trim|required', 'callback_username_check');
            $this->form_validation->set_rules('password', 'Password', 'min_length[4]|max_length[255]');
            $this->form_validation->set_rules('confirm_password', 'Confirm', 'matches[password]');
            if ($this->form_validation->run()) {
                $data = elements(
                        array(
                            'first_name',
                            'last_name',
                            'email',
                            'username',
                            'active',
                            'password'
                        ), $this->input->post()
                );

                $data = $this->security->xss_clean($data);
                $password = $this->input->post('password');

                //Verification to password
                if (!$password) {
                    unset($data['password']);
                }

                if ($this->ion_auth->update($user_id, $data)) {
                    $user_profile_db = $this->ion_auth->get_users_groups($user_id)->row();
                    $user_profile_post = $this->input->post('user_profile');

                    //If is diff update group
                    if ($user_profile_post != $user_profile_db->id) {
                        $this->ion_auth->remove_from_group($user_profile_db->id, $user_id);
                        $this->ion_auth->add_to_group($user_profile_post, $user_id);
                    }

                    $this->session->set_flashdata('Ssuccess', 'Data recorded with success');
                } else {
                    $this->session->set_flashdata('error', 'Erro to record the data');
                }
                redirect('users');
            } else {
                $data = array(
                    'title' => "Edit User",
                    'user' => $this->ion_auth->user($user_id)->row(),
                    'user_profile' => $this->ion_auth->get_users_groups($user_id)->row(),
                );
                $this->load->view('layout/header', $data);
                $this->load->view('users/edit');
                $this->load->view('layout/footer');
            }
        }
    }

    public function email_check($email) {
        $user_id = $this->input->post('user_id');

        if ($this->CoreModel->GetById('users', array('email' => $email, 'id !=' => $user_id))) {
            $this->form_validation->set_message('email_check', 'This e-mail is already exists');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function username_check($username) {
        $user_id = $this->input->post('user_id');

        if ($this->CoreModel->GetById('users', array('username' => $username, 'id !=' => $user_id))) {
            $this->form_validation->set_message('username_check', 'This username is already exists.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
