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
      $this->form_validation->set_rules('clients_nin_tin', '', 'trim|required|exact_length[18]');
      $this->form_validation->set_rules('clients_email', '', 'trim|required|valid_email|max_length[20]');
      $this->form_validation->set_rules('clients_telephone', '', 'trim|max_length[14]');
      $this->form_validation->set_rules('clients_phone', '', 'trim|max_length[15]');
      $this->form_validation->set_rules('clients_post_code', '', 'trim|required|exact_length[9]');
      $this->form_validation->set_rules('clients_address', '', 'trim|max_length[155]');
      $this->form_validation->set_rules('clients_number', '', 'trim|required|max_length[20]');
      $this->form_validation->set_rules('clients_district', '', 'trim|required|max_length[45]');
      $this->form_validation->set_rules('clients_complement', '', 'trim|max_length[145]');
      $this->form_validation->set_rules('clients_city', '', 'trim|required|max_length[50]');
      $this->form_validation->set_rules('clients_state', '', 'trim|required|exact_length[2]');
      $this->form_validation->set_rules('clients_obs', '', 'max_length[500]');

      if ($this->form_validation->run()) {
        echo '<pre>';
        print_r($this->input->post());
        exit();
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
}
