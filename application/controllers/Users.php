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
//        echo '<pre>';
//        print_r($data['users']);
//        exit();
        $this->load->view('layout/header', $data);
        $this->load->view('users/index');
        $this->load->view('layout/footer');
    }

    public function edit($user_id = NULL) {
        if (!$user_id || !$this->ion_auth->user($user_id)->row()) {
            exit('Iser not found.');
        } else {
            $this->form_validation->set_rules('first_name', '', 'trim|required');
            if ($this->form_validation->run()) {
                exit('Validation');
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

}
