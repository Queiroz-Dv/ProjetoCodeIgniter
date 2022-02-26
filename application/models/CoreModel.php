<?php

defined('BASEPATH') or exit('Ação não permitida');

class CoreModel extends CI_Model
{

    public function GetAll($tabela = NULL, $condicao = NULL)
    {
        if ($tabela) {
            if (is_array($condicao)) {
                $this->db->where($condicao);
            }
            return $this->db->get($tabela)->result();
        } else {
            return FALSE;
        }
    }

    public function GetById($tabela = NULL, $condicao = NULL)
    {
        if ($tabela && is_array($condicao)) {
            $this->db->where($condicao);
            $this->db->limit(1);
            return $this->db->get($tabela)->row();
        } else {
            return FALSE;
        }
    }

    public function Insert($tabela = NULL, $data = NULL, $get_last_id = NULL)
    {
        if ($tabela && is_array($data)) {
            $this->db->insert($tabela, $data);
            if ($get_last_id) {
                $this->session->set_userdata('last_id', $this->db->insert_id());
            }
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('sucesso', 'Dados salvos com sucesso');
            } else {
                $this->session->set_flashdata('error', 'Error ao salvar dados! ');
            }
        } else {
        }
    }

    public function Update($tabela = NULL, $data = NULL, $condicao = NULL)
    {

        if ($tabela && is_array($data) && is_array($condicao)) {
            if ($this->db->update($tabela, $data, $condicao)) {
                $this->session->set_flashdata('sucesso!', 'Dados salvo com sucesso');
            } else {
                $this->session->set_flashdata('error', 'Erro ao salvar dados');
            }
        } else {
            return FALSE;
        }
    }

    public function Delete($tabela = NULL, $condicao = NULL)
    {
        $this->db->db_debug = FALSE;

        if ($tabela && is_array($condicao)) {
            $this->db->db_debug = FALSE;
            $status = $this->db->delete($tabela, $condicao);
            $error = $this->db->error();

            if (!$status) {
                foreach ($error as $code) {

                    if ($code == 1451) {
                        $this->session->set_flashdata('error', 'Este registro não pode ser excluído, pois está sendo usado em outra tabela. ');
                    }
                }
            } else {
                $this->session->set->flashdata('sucesso!', 'Registro excluído!');
            }
            $this->db->db_debug = TRUE;
        } else {
            return FALSE;
        }
    }
}