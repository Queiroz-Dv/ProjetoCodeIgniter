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
}
