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

        return $this->db->insert_id();

    }

    public function update ($table = NULL, $data = NULL, $condition = NULL,$get_last_id = NULL) {

        if ($table && is_array($data) && is_array($condition))  {
           

            $this->db->update($table, $data, $condition);
        //  echo  $this->db->last_query(); die();
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



    public function getAllProducts($id_responsible='',$tag1='',$tag2='',$tag3='',$tag4='',$tecnical_responsible='',$status_exe='') {
        $sql = " SELECT p.id, p.name, p.description,p.id_owner,date_format(p.date_delivery, '%d/%m/%Y') as date_delivery,p.phather_actity,u.first_name,p.tag1,p.tag2,p.tag3,p.tag4 
        FROM products p left join users u on u.id = p.id_responsible
        where p.status = 1 and p.id_owner = ".$this->ion_auth->user()->row()->id
        ;
       if ($id_responsible) {
           $sql = $sql . " and p.id_responsible = ".$id_responsible;
        }
        if ($tecnical_responsible) {
            $sql = $sql . " and p.tecnical_responsible = ".$tecnical_responsible;
         }
        if ($tag1) {
            $sql = $sql . " and p.tag1 = '$tag1'";
         }

         if ($tag2) {
            $sql = $sql . " and p.tag2 = '$tag2'";
         }
         if ($tag3) {
            $sql = $sql . " and p.tag3 = '$tag3'";
         }
         if ($tag4) {
            $sql = $sql . " and p.tag4 = '$tag4'";
         }
     //  echo $sql; die();
    $query = $this->db->query ( $sql );	
    //print_r($this->db->last_query()); die();
    return $query->result_array ();


    }


    public function get_last_report($id_activity) {
        $sql = " select  description,date_format(data, '%d/%m/%Y %H:%i') as data  from activity_report where id_activity = ".$id_activity." order by id desc limit 1";
    $query = $this->db->query ( $sql );	
    return $query->row ();
    }

    public function insertProductDefalt($idUser) {
        $sql = "
        insert into product_customer (id_user,id_product,date,price)
select ".$idUser.", id_product, sysdate(),0 from product_customer where id_user = 1;
        ";
        $query = $this->db->query ( $sql );	

    }


    public function getUserTeam() {
        $sql = "    select * from users u inner join user_team ut on ut.id_member = u.id where ut.id_user = ".$this->ion_auth->user()->row()->id;
    $query = $this->db->query ( $sql );	
    return $query->result_array ();
    }

    public function verifyUserTeam($emailVerify) {
        $sql = "select u.id from users u inner join user_team ut on ut.id_member = u.id where
        u.email = '$emailVerify' and ut.id_user = ".$this->ion_auth->user()->row()->id;
    $query = $this->db->query ( $sql );
    return $query->row ()->id;
    }
    public function tag1() {
        $sql = "select distinct(p.tag1) as tag from users u inner join user_team ut on u.id = ut.id_member
        inner join products p on p.id_owner = ut.id_user
        and ut.id_user = ".$this->ion_auth->user()->row()->id;
    $query = $this->db->query ( $sql );
    return $query->result_array();
    }
    public function tag2() {
        $sql = "select distinct(p.tag2) as tag from users u inner join user_team ut on u.id = ut.id_member
        inner join products p on p.id_owner = ut.id_user
        and ut.id_user = ".$this->ion_auth->user()->row()->id;
    $query = $this->db->query ( $sql );
    return $query->result_array();
    }

    public function tag3() {
        $sql = "select distinct(p.tag3) as tag from users u inner join user_team ut on u.id = ut.id_member
        inner join products p on p.id_owner = ut.id_user
        and ut.id_user = ".$this->ion_auth->user()->row()->id;
    $query = $this->db->query ( $sql );
    return $query->result_array();
    }
    public function tag4() {
        $sql = "select distinct(p.tag4) as tag from users u inner join user_team ut on u.id = ut.id_member
        inner join products p on p.id_owner = ut.id_user
        and ut.id_user = ".$this->ion_auth->user()->row()->id;
    $query = $this->db->query ( $sql );
    return $query->result_array();
    }

    public function getStatus() {
        $sql = "select * from parameters where type = 'status'";
    $query = $this->db->query ( $sql );
    return $query->result_array();
    }




}


?>