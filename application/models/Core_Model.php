<?php 

defined('BASEPATH') OR exit ('Not allowed');

class Core_Model extends CI_Model {

    public function get_all($table = NULL, $condition = NULL) {
        if ($table) {

            if (is_array($condition)) {

                $this->db->where($condition);

            }

            return $this->db->get($table)->result();
        } 
        
       /* else (
            return FALSE;
        )*/

    }


    public function getById($table = NULL, $condition = NULL) {

        if ($table && is_array($condition)) {

            $this->db->where($condition);
            $this->db->limit(1);

             return $this->db->get($table)->row();
           
        } else {
            return FALSE;
        }

    }

    public function insert ($table = NULL, $data = NULL, $get_last_id = NULL) {

        if ($table && is_array($data))  {
            $this->db->insert($table, $data);

            if ($get_last_id){
                $this->session->set_userdata('last_id', $this->db->insert_id());

            }

            if ($this->db->affected_rows() > 0 ) {
                $this->session->set_flashdata('Success', 'Data inserted with success!');
            } else {
                $this->session->set_flashdata('Error', 'Insertion error');
            }

        }

    }

    public function update ($table = NULL, $data = NULL, $condition = NULL,$get_last_id = NULL) {

        if ($table && is_array($data) && is_array($condition))  {
            $this->db->update($table, $data, $condition);
            
            if ($table && is_array($data) && is_array($condition)) {
                $this->session->set_flashdata('Success', 'Data update with success!');
            } else {
                $this->session->set_flashdata('Error', 'Update error');

            }

        } else {
            return FALSE;
        }

    }

    public function delete ($table = NULL, $condition = NLL){


        $this->db->debug = FALSE;

        if ($table && is_array($table)) {

            $status = $this->db->delete($table, $condition);

            $error = $this->db->error();

            if (!$status) {
                foreach($error as $code) {
                    
                    if ($code == 1451) {
                        $this->session->set_flashdata('error', 'Data in use');
                    } 

                }

            } else {
                $this->session->set_flashdata('success', 'Data deleted with sucess');
            }
            $this->db->debug = TRUE;


        } else {
            return FALSE;
        }

    }


}


?>