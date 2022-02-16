<?php

defined('BASEPATH') or exit('Action is not allowed');

class Systems extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'title' => 'Edit system informantion',
            'scripts' => array(
                'vendor/mask/jquery.mask.min.js',
                'vendor/mask/app.js',
            ),
            'systems' => $this->CoreModel->GetById('systems', array('systems_id' => 1))
        );
        $this->form_validation->set_rules('systems_company_name', '', 'required|min_length[10]|max_length[145]');
        $this->form_validation->set_rules('systems_trading_name', '', 'required|min_length[10]|max_length[145]');
        $this->form_validation->set_rules('systems_national_in_number', 'NIN', 'required|exact_length[20]');
        $this->form_validation->set_rules('systems_telephone', '', 'required|max_length[25]');
        $this->form_validation->set_rules('systems_mobile_phone', '', 'required|max_length[25]');
        $this->form_validation->set_rules('systems_email', '', 'required|valid_email|max_length[100]');
        $this->form_validation->set_rules('systems_site_url', '', 'required|valid_url|max_length[100]');
        $this->form_validation->set_rules('systems_post_code', '', 'required | max_length[25]');
        $this->form_validation->set_rules('systems_address', '', 'required|max_length[145]');
        $this->form_validation->set_rules('systems_number', '', 'required|max_length[145]');
        $this->form_validation->set_rules('systems_city', '', 'required|max_length[45]');
        $this->form_validation->set_rules('systems_state', '', 'required|max_length[2]');
        $this->form_validation->set_rules('systems_txt_service_order', '', 'required|max_length[500]');
        if ($this->form_validation->run()) {
            $data = elements(
                array(
                    'systems_company_name',
                    'systems_trading_name',
                    'systems_national_in_number',
                    'systems_telephone',
                    'systems_mobile_phone',
                    'systems_email',
                    'systems_site_url',
                    'systems_post_code',
                    'systems_address',
                    'systems_number',
                    'systems_city',
                    'systems_state',
                    'systems_txt_service_order',
                ),
                $this->input->post()
            );
            //<img onmouseover="bigImg(this)" src="smiley.gif" alt="Smiley">
            $data = html_escape($data);
            $this->CoreModel->update(`systems`, $data, array('systems_id' => 1));
            redirect('systems');
        } else {
            $this->load->view('layout/header', $data);
            $this->load->view('systems/index');
            $this->load->view('layout/footer');
        }
    }
}
