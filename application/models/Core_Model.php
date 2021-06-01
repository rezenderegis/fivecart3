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
        // echo  $this->db->last_query(); die();
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


    public function getProductPublish($idPublish) {
        $sql = "select pc.id,p.description,pc.id_product,prod.name,pp.product_price price,prod.image_link, pp.id_publish, pp.id as id_product_publish,
        p.id_user as id_user_publish, p.header2, prod.image_width, prod.image_height
        from product_publish pp inner join publish p on p.id = pp.id_publish
inner join product_customer pc on pc.id = pp.id_product_customer
inner join products prod on prod.id = pc.id_product
where p.id_user = ".$this->ion_auth->user()->row()->id." and pp.status =  1 and p.id = ".$idPublish; 
    $query = $this->db->query ( $sql );	
    return $query->result_array ();

    }

    public function getUniqueProductPublish($idProduct) {
        $sql = "select pc.id,p.description,pc.id_product,prod.name,pp.product_price price,prod.image_link, pp.id_publish, pp.id as id_product_publish from product_publish pp inner join publish p on p.id = pp.id_publish
inner join product_customer pc on pc.id = pp.id_product_customer
inner join products prod on prod.id = pc.id_product
where pp.status =  1 and pp.id = ".$idProduct; 
    $query = $this->db->query ( $sql );	
    return $query->row ();

    }

    public function getUserProducts($idPublish,$idUser) {
        $sql = "select p.name,pc.id,pc.price  from product_customer pc inner join products p on p.id = pc.id_product
        where pc.id_user = ".$idUser."
        and pc.id not in (select pc.id from product_publish pp inner join publish p on p.id = pp.id_publish
        inner join product_customer pc on pc.id = pp.id_product_customer
        inner join products prod on prod.id = pc.id_product
        where pp.status = 1 and p.id = ".$idPublish.")";
    $query = $this->db->query ( $sql );	
    return $query->result_array ();

    }

    public function getProducts($idUser) {
        $sql = "select p.name,pc.id,pc.price  from product_customer pc inner join products p on p.id = pc.id_product
        where pc.id_user = ".$idUser."
        and pc.id not in (select pc.id from product_publish pp inner join publish p on p.id = pp.id_publish
        inner join product_customer pc on pc.id = pp.id_product_customer
        inner join products prod on prod.id = pc.id_product
        where pp.status = 1)";
    $query = $this->db->query ( $sql );	
    return $query->result_array ();

    }

    public function getAllProducts() {
        $sql = " SELECT p.id, p.name, pc.price as price,p.id_owner,p.bar_code,p.status,p.id_cathegory,p.image_link,p.description FROM product_customer pc inner join products p on pc.id_product = p.id
        and pc.id_user = ".$this->ion_auth->user()->row()->id;
    $query = $this->db->query ( $sql );	
    return $query->result_array ();


    }

    public function getPublishWithTemplate() {
        $sql = " select p.id, t.header_image, t.footer_image, t.complete_image complete_image,p.description description,date_format(p.date, '%d/%m/%Y') dates_creation
        from  publish p inner join template t on p.id_template = t.id where p.status = 1 and p.id_user = ".$this->ion_auth->user()->row()->id." order by p.date desc";
    $query = $this->db->query ( $sql );	
    return $query->result_array ();


    }
   
    public function getTemplates() {
        $sql = " select * from template where status = 1 and (id_user = ".$this->ion_auth->user()->row()->id." or id_user = 1)";
    $query = $this->db->query ( $sql );	
    return $query->result_array ();
    }

    public function insertProductDefalt($idUser) {
        $sql = "
        insert into product_customer (id_user,id_product,date,price)
select ".$idUser.", id_product, sysdate(),0 from product_customer where id_user = 1;
        ";
        $query = $this->db->query ( $sql );	

    }


}


?>