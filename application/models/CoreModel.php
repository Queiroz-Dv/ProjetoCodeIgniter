<?php

defined('BASEPATH') OR exit('Action not allowed');

class CoreModel extends CI_Model {

    public function GetAll($table = NULL, $condition = NULL) {
        if ($table) {
            if (is_array($condition)) {
                $this->db->where($condition);
            }
            return $this->db->get($table)->result();
        } else {
            return FALSE;
        }
    }

    public function GetById($table = NULL, $condition = NULL) {
        if ($table && is_array($condition)) {
            $this->db->where($condition);
            $this->db->limit(1);
            return $this->db->get($table)->row();
        } else {
            return FALSE;
        }
    }

    public function Insert($table = NULL, $data = NULL, $get_last_id = NULL) {
        if ($table && is_array($data)) {
            $this->db->insert($table, $data);
            if ($get_last_id) {
                $this->session->set_userdata('last_id', $this->db->insert_id());
            }
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Success! Data recorded.');
            } else {
                $this->session->set_flashdata('error', 'Error! Data were not recorded in our database');
            }
        } else {
            
        }
    }

    public function Update($table = NULL, $data = NULL, $condition = NULL) {

        if ($table && is_array($data) && is_array($condition)) {
            if ($this->db->update($table, $data, $condition)) {
                $this->session->set_flashdata('Success!', 'Data recorded');
            } else {
                $this->session->set_flashdata('error', 'Data were not recorded in our database');
            }
        } else {
            return FALSE;
        }
    }

    public function Delete($table = NULL, $condition = NULL) {
        $this->db->db_debug = FALSE;

        if ($table && is_array($condition)) {
            $status = $this->db->delete($table, $condition);
            $error = $this->db->error();

            if (!$status) {
                foreach ($error as $code) {

                    if ($code == 1451) {
                        $this->session->set_flashdata('Error', 'This register cannot exclude because it is using for another table. ');
                    }
                }
            } else {
                $this->session->set - flashdata('Success!', 'Register was exclude!');
            }
            $this->db->db_debug = TRUE;
        } else {
            return FALSE;
        }
    }

}
