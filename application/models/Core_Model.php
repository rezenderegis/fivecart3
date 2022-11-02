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
where p.id_user = ".$this->ion_auth->user()->row()->id." and pp.status =  1 and p.id = ".$idPublish. " order by pp.id asc"; 
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
        $sql = "select p.name,pc.id,pc.price,p.image_link  from product_customer pc inner join products p on p.id = pc.id_product
        where pc.id_user = ".$idUser."
        and pc.id not in (select pc.id from product_publish pp inner join publish p on p.id = pp.id_publish
        inner join product_customer pc on pc.id = pp.id_product_customer
        inner join products prod on prod.id = pc.id_product
        where pp.status = 1 and p.id = ".$idPublish.")". "and p.status = 1 order by p.name";
    $query = $this->db->query ( $sql );	
    return $query->result_array ();

    }


    public function getUserProductsByName($idPublish,$idUser,$name) {
      
        $sql = "select p.name,pc.id,pc.price  from product_customer pc inner join products p on p.id = pc.id_product
        where pc.id_user = ".$idUser."
        and pc.id not in (select pc.id from product_publish pp inner join publish p on p.id = pp.id_publish
        inner join product_customer pc on pc.id = pp.id_product_customer
        inner join products prod on prod.id = pc.id_product
        where pp.status = 1 and p.id = ".$idPublish.")". " and p.name like '%".$name."%' order by p.name";
      
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

    public function getAllProducts($idProduct=0,$type=1) {
//echo $type; die();
        if ($idProduct != 0) {
            $sql = " SELECT p.id, p.name, pc.price as price,p.id_owner,p.bar_code,p.status,p.id_cathegory,p.image_link,p.description FROM product_customer pc inner join products p on pc.id_product = p.id
            and pc.id_user = ".$this->ion_auth->user()->row()->id." and p.id = ".$idProduct." and p.status = 1 order by p.id desc";
        } else {
            if ($type == 1) {
               
            $sql = " SELECT p.id, p.name, pc.price as price,p.id_owner,p.bar_code,p.status,p.id_cathegory,p.image_link,p.description 
            FROM product_customer pc inner join products p on pc.id_product = p.id
            where p.id_owner != 1 and pc.id_user = ".$this->ion_auth->user()->row()->id." and p.status = 1  order by p.id desc";
            } else {
               
                $sql = " SELECT p.id, p.name, pc.price as price,p.id_owner,p.bar_code,p.status,p.id_cathegory,p.image_link,p.description 
                FROM product_customer pc inner join products p on pc.id_product = p.id
                where pc.id_user = ".$this->ion_auth->user()->row()->id." and p.status = 1 order by p.id desc";
                        
            }
        }

    $query = $this->db->query ( $sql );	
    return $query->result_array ();


    }

    public function getAllProductsComplete($idcathegory) {
        $sql = " SELECT p.id, p.name, p.id_owner,p.bar_code,p.status,p.id_cathegory,p.image_link,p.description,p.* FROM products p where p.status = 1 and p.id_cathegory = ".$idcathegory;
        //$this->ion_auth->user()->row()->id
    $query = $this->db->query ( $sql );	
    return $query->result_array ();


    }

    public function getPublishWithTemplate() {
        $sql = " select p.id, p.id as id_publish_sh, t.header_image, t.footer_image, t.complete_image complete_image,p.description description,p.description description_publish, date_format(p.date, '%d/%m/%Y') dates_creation,t.*,t.id id_template
        from  publish p inner join template t on p.id_template = t.id where p.status = 1 and p.id_user = ".$this->ion_auth->user()->row()->id." order by p.date desc";
   
        $query = $this->db->query ( $sql );	
    return $query->result_array ();


    }



    public function getPublishWithTemplate1($idUser) {
        $sql = " select p.id, t.header_image, t.footer_image, t.complete_image complete_image,p.description description,date_format(p.date, '%d/%m/%Y') dates_creation
        from  publish p inner join template t on p.id_template = t.id where p.status = 1 and p.id_user = ".$idUser." order by p.date desc";
    $query = $this->db->query ( $sql );	
    return $query->result_array ();


    }
   
    public function getTemplates($type=0) {

        if ($type == 0) {
            $filter = ' and type_template  in (1,2)';
        } elseif ($type == 2){
            $filter = ' and type_template = 2';

        } elseif ($type == 1) {
            $filter = ' and type_template = 1';
        }
        

        $sql = " select * from template where status = 1 and (id_user = ".$this->ion_auth->user()->row()->id." or id_user = 1) ".$filter." order by order_template asc";
   
        $query = $this->db->query ( $sql );	
    return $query->result_array ();
    }

    public function insertProductDefalt($idUser=0, $shop_type=0) {
        /*
        1 Supermercado - OK
        2 Açougue - OK
        3 Verdurão - ok
        4 Cosméticos - OK
        5 Hamburgeria - ok
        6 Restaurante - ok
        7 Distribuidora de Bebidas - OK
        8 Loja de Ferragens - OK
        9 - Papelaria - OK
        10 - Eletrodomésticos - OK
        11 - Panificadora - OK 
        99 Outros                      
        */
        if ($shop_type != 99) {
        if ($shop_type == 1) {
            $idcathegory = '5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,25,26,29,30,31,33,34,35';
        } else if ($shop_type == 2) {
            $idcathegory = '6';
        }else if ($shop_type == 3) {
            $idcathegory = '25';
        }
        else if ($shop_type == 7) {
            $idcathegory = '7';
        }else if ($shop_type == 4) {
            $idcathegory = '20';
        }else if ($shop_type == 8) {
            $idcathegory = '26';
        } else if ($shop_type == 9) {
            $idcathegory = '26';
        }else if ($shop_type == 10) {
            $idcathegory = '31,33,34';
        }else if ($shop_type == 11) {
            $idcathegory = '10';
        }else if ($shop_type == 5) {
            $idcathegory = '7';
        }else if ($shop_type == 6) {
            $idcathegory = '7';
        }

        /**Just product in same shop type of cutomer are inserted. */
        $sql = "insert into product_customer (id_user,id_product,date,price)
        select ".$idUser.", pc.id_product, sysdate(),0 from product_customer pc inner join products p on p.id = pc.id_product 
        where pc.id_user = 1 and p.id_cathegory in (".$idcathegory.");";
      

        $query = $this->db->query ( $sql );	
    }

    }

   
    public function getProductTest($idProduct,$idUser) {
        $sql = "select p.image_link,p.name,pc.price,pc.id_user,p.id,p.image_width,p.image_height from products p inner join product_customer pc on pc.id_product = p.id
        where id_product = ".$idProduct." and pc.id_user = ".$idUser.";"; 
    
        $query = $this->db->query ( $sql );	
    return $query->row ();
    }

   


    public function getUserHistory() {
       
$sql = "

select p.id_user, u.first_name, p.date, ud.company_name comname, pc.id,p.description,user_owner.first_name user_owner_first_name ,pc.id_product,prod.name prodname,pp.product_price price,prod.image_link, pp.id_publish, pp.id as id_product_publish,
        p.id_user as id_user_publish, p.header2, prod.image_width, prod.image_height,pp.status
        from product_publish pp inner join publish p on p.id = pp.id_publish
inner join product_customer pc on pc.id = pp.id_product_customer
inner join products prod on prod.id = pc.id_product
inner join users u on u.id = p.id_user
inner join user_detail ud on p.id_user = ud.id_user
inner join users user_owner on user_owner.id = prod.id_owner
where p.id_user > 32;

";


    $query = $this->db->query ( $sql );	
    return $query->result_array ();


    
    }

    public function getUsers() {
        $sql = "select *,st.description shop_type_description, from_unixtime(created_on  ,'%Y-%m-%d %k:%i') as created_on1,from_unixtime(last_login  ,'%Y-%m-%d') as last_login1 from users u 
        left join user_detail ud on ud.id_user = u.id 
        left join shop_type st on st.id = ud.shop_type order by created_on1 desc";
    $query = $this->db->query ( $sql );	
    return $query->result_array ();

    }

    public function getAllFlyers($has_product=0, $has_logo=0,$has_flyer) {
    
        $filter_has_product = '';
        $filter_has_logo = '';
        $filter_has_flyer = '';

        $filter = '';
        if ($has_product != 0) {
            if ($has_product == 1) {
            $filter_has_product = " and 	(SELECT COUNT(*) FROM product_publish pp2 LEFT JOIN publish p2  on p2.id = pp2.id_publish
            WHERE p2.id_user  = p.id_user having count(*) >1) ";
            }
            if ($has_product == 2) {
                $filter_has_product = " and u2.id not in (SELECT p2.id_user FROM product_publish pp2 LEFT JOIN publish p2  on p2.id = pp2.id_publish
                WHERE p2.id_user  = p.id_user group by p2.id_user having count(*) > 0) ";
                }
        } 

        if ($has_logo != 0) {
            if ($has_logo == 1) {
            $filter_has_logo = " and image_link is not null";
            } else {
                $filter_has_logo = " and image_link is null";

            }
        }
       // $filter_has_flyer = " and p.id is not null";
        if ($has_flyer != 0) {
            if ($has_flyer == 1) {
                $filter_has_flyer = " and p.id is not null";
            } else if ($has_flyer == 2) {
                $filter_has_flyer = " and p.id is null";
            }
        } else {
            $filter_has_flyer = ' ';
        }
        
        $filter .= $filter_has_logo .= $filter_has_flyer .= $filter_has_product;
      
        $sql = "select p.id_user as id_user_post,st.description shop_type_description, ud2.company_name, u2.email ,u2.id as iduserenc, u2.id,from_unixtime(u2.last_login  ,'%Y-%m-%d') as last_login1, 
        from_unixtime(u2.created_on  ,'%Y-%m-%d %k:%i') as created_on1  ,p.date as date_flyer,p.id id_publish, p.id_user id_user,p.description,
        ud2.mobile_number, p.dateUpdate, ud2.image_link ,       (SELECT COUNT(*) FROM product_publish pp2 LEFT JOIN publish p2  on p2.id = pp2.id_publish
       WHERE p2.id_user  = p.id_user) as qtd_product
        from publish p right join users u2 on u2.id = p.id_user 
        inner join user_detail ud2 on  ud2.id_user = u2.id 
        left join shop_type st on st.id = ud2.shop_type 
        where u2.id not in (28,1,26,27,12,13,14,17,16,15,25,30,29,33,18,19,20,22,23,31,36,35,40,44,51,52,53,54,55,57) " .$filter. "
        order by date_flyer desc
        ";
      
    $query = $this->db->query ( $sql );	
    return $query->result_array ();

    }

    public function insertLog($feacture=0, $description=0) {
        $dataLog = array (
            'id_user' => $this->ion_auth->user()->row()->id,
            'feacture' => $feacture,
            'detail' => $description,
        );
      
        return $this->core_model->insert('log', $dataLog);
        
    }


}


?>