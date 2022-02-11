<?php

defined('BASEPATH') OR exit('Action is not allowed');

class Systems extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            redirect('login');
        }
    }

    public function index() {
        $data = array(
            'title' => 'Edit system informantion',
            'systems' => $this->CoreModel->GetById('systems', array('systems_id' => 1)),
        );
        echo '<pre>';
        print_r($data['systems']);
        exit();
        
        $this->load->view('layout/header', $data);
        $this->load->view('systems/index');
        $this->load->view('layout/footer');
    }

}
