<?php
defined('BASEPATH') or exit('Acion not allowed');

class Clients extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
      redirect('login');
    }
    //Define if there is a session

  }

  public function index()
  {
    $data = array(
      'title' => 'Registered Clients',
      'styles' => array(
        'vendor/datatables/dataTables.bootstrap4.min.css',
      ),
      'scripts' => array(
        'vendor/datatables/jquery.dataTables.min.js',
        'vendor/datatables/dataTables.bootstrap4.min.js',
        'vendor/datatables/app.js',
      ),
      'clients' => $this->CoreModel->GetAll('clients'),
    );
    $this->load->view('layout/header', $data);
    $this->load->view('clients/index');
    $this->load->view('layout/footer');
  }

  public function edit($clients_id = null)
  {
    if (!$clients_id || !$this->CoreModel->GetById('clients', array('clients_id' => $clients_id))) {
      $this->session->flashdata('error', 'Client is not found');
      redirect('clients');
    } else {
      $this->form_validation->set_rules('clients_first_name', '', 'trim|required|min_length[4]|max_length[45]');
      $this->form_validation->set_rules('clients_last_name', '', 'trim|required|min_length[4]|max_length[145]');
      $this->form_validation->set_rules('clients_birthday', '', 'required');
      $clients_type = $this->input->post('clients_type');
      // if ($clients_type == 1) {
      //   $this->form_validation->set_rules('clients_nin', '', 'trim|required|exact_length[18]|callback_validate_nin');
      // } else {
      //   $this->form_validation->set_rules('clients_tin', '', 'trim|required|exact_length[18]|callback_validate_tin');
      // }
      $this->form_validation->set_rules('clients_email', '', 'trim|required|valid_email|max_length[20]|callback_check_email');
      if (!empty($this->input->post('clients_telefone'))) {
        $this->form_validation->set_rules('clients_telephone', '', 'trim|max_length[14]|callback_check_telephone');
      }

      if (!empty($this->input->post('clients_phone'))) {
        $this->form_validation->set_rules('clients_phone', '', 'trim|max_length[14]|callback_check_phone');
      }
      $this->form_validation->set_rules('clients_post_code', '', 'trim|required|exact_length[9]');
      $this->form_validation->set_rules('clients_address', '', 'trim|max_length[155]');
      $this->form_validation->set_rules('clients_number', '', 'trim|required|max_length[20]');
      $this->form_validation->set_rules('clients_district', '', 'trim|required|max_length[45]');
      $this->form_validation->set_rules('clients_complement', '', 'trim|max_length[145]');
      $this->form_validation->set_rules('clients_city', '', 'trim|required|max_length[50]');
      $this->form_validation->set_rules('clients_state', '', 'trim|required|exact_length[2]');
      $this->form_validation->set_rules('clients_obs', '', 'max_length[500]');

      if ($this->form_validation->run()) {
        $data = elements(
          array(
            'clients_first_name',
            'clients_last_name',
            'clients_birthday',
            'clients_email',
            'clients_telephone',
            'clients_phone',
            'clients_post_code',
            'clients_address',
            'clients_number',
            'clients_district',
            'clients_city',
            'clients_state',
            'clients_active',
            'clients_obs',
            'clients_type',
          ),
          $this->input->post(),
        );

        /* if ($clients_type == 1) {
        } else {
          # code...
        }*/
      } else {
        $data = array(
          'title' => 'Update Clients',
          'scripts' => array(
            'vendor/mask/jquery.mask.min.js',
            'vendor/mask/app.js',
          ),
          'client' => $this->CoreModel->GetById('clients', array('clients_id' => $clients_id))
        );
        $this->load->view('layout/header', $data);
        $this->load->view('clients/edit');
        $this->load->view('layout/footer');
      }
    }
  }

  public function check_email($client_email)
  {
    $clients_id = $this->input->post('clients_id');
    if ($this->coreModel->GetById('clients', array('check_email' => $client_email, 'client_id!=' => $clients_id))) {
      $this->form_validation->set_message('check_email', 'Your email already exists');
      return FALSE;
    } else {
      return TRUE;
    }
  }

  public function check_telephone($client_telephone)
  {
    $clients_id = $this->input->post('clients_id');
    if ($this->coreModel->GetById('clients', array('check_telephone' => $client_telephone, 'client_id!=' => $clients_id))) {
      $this->form_validation->set_message('check_telephone', 'This telephone already exists');
      return FALSE;
    } else {
      return TRUE;
    }
  }

  public function check_phone($client_phone)
  {
    $clients_id = $this->input->post('clients_id');
    if ($this->coreModel->GetById('clients', array('check_phone' => $client_phone, 'client_id!=' => $clients_id))) {
      $this->form_validation->set_message('check_phone', 'This phone already exists');
      return FALSE;
    } else {
      return TRUE;
    }
  }

}
class TINValid{

}
