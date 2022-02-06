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
            'title'=>'Users Register',
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
//        echo '<pre>';
//        print_r($data['users']);
//        exit();
        $this->load->view('layout/header', $data);
        $this->load->view('users/index');
        $this->load->view('layout/footer');
    }

}
