<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller  {

    
    public function __construct () {

        parent::__construct();
        $this->load->helper('url');

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão expirou');
            redirect ('login');
        }

    }

    public function index($idProduct=0,$type=1) {
        
        $title = 'Todos os Encartes';
        $userProducts =  $this->core_model->get_all('product_customer', array ('id_user' => $this->ion_auth->user()->row()->id));

      
        $this->session->set_userdata('type_product', 'not_first');

        if (count($userProducts) == 0){
            $titulo = 'Cadastre produtos para criar seu ENCARTE';
            
        } else {
        if ($type == 1) {

            $titulo = "Meus Produtos";

        } else {
            $titulo = "Produtos da Plataforma";
        }
    }

        $data = array (
            'titulo' => $titulo,
            'styles' => array ('vendor/datatables/dataTables.bootstrap4.min.css'),
            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js',
            'vendor/mask/jquery.mask.min.js',
            'vendor/mask/app.js'),    
            'products' => $this->core_model->getAllProducts($idProduct,$type), 

        );

        $publish =  $this->core_model->getById('publish', array ('id_user' => $this->ion_auth->user()->row()->id));
        if (!$publish && $userProducts){
           $this->session->set_flashdata('error', 'Crie seu primeiro encarte!');
         } 

        $this->load->view('layout/header', $data);
        $this->load->view('products/index');
        $this->load->view('layout/footer');

    }



    public function editPrice($product_id = null) {

 
         $idProduct = $this->core_model->getById('products', array('id' => $product_id));
         $idUserProduct = $idProduct->id_owner;
 
         if ($product_id && !$this->core_model->getById('products', array('id' => $product_id))) {
             $this->session->set_flashdata('error', 'Produto não encontrado');
             redirect('product');
 
         }
     
         else {
 
 
 $this->form_validation->set_rules('price','', 'trim|required');
 
 
 if ($this->form_validation->run()) {

 
     $price = elements(
 
         array('price',
     
     ), $this->input->post()
 
 );
 
     $price = html_escape($price);

     $this->core_model->update('product_customer', $price, array('id_product' => $product_id, 'id_user' => $this->ion_auth->user()->row()->id));
 
     redirect ('product');
 
 
 } else {
 
     $data = array (
 
         'titulo' => 'Atualizar Produto',
         'scripts' => array(
             'vendor/mask/jquery.mask.min.js',
             'vendor/mask/app.js',
         ),
         'product' => $this->core_model->getById('products', array('id' => $product_id)),
         'product_price' => $this->core_model->getById('product_customer', array('id_product' => $product_id, 'id_user'  => $this->ion_auth->user()->row()->id))
         
     );
    
     $this->load->view('/layout/header', $data);
     $this->load->view('/products/editPrice');
     $this->load->view('/layout/footer');
 }
         }
     }

    public function edit($product_id = null) {

       /* if ($this->session->userdata('user_id') != $user_id && !$this->ion_auth->is_admin() ) {
            $this->session->set_flashdata('error', 'Usuário não encontrado');
            redirect('home');
        } {*/

        $idProduct = $this->core_model->getById('products', array('id' => $product_id));
        $idUserProduct = $idProduct->id_owner;

        if ($product_id && !$this->core_model->getById('products', array('id' => $product_id))) {
            $this->session->set_flashdata('error', 'Produto não encontrado');
            redirect('product');

        }
       /*  else if ($idUserProduct != $this->ion_auth->user()->row()->id) {
            $this->session->set_flashdata('error', 'Você não pode editar esse produto!');
            redirect('product');
        }*/
        else {
/*
        $data = array (

            'titulo' => 'Editar Usuário',
            'usuario' => $this->ion_auth->user($user_id)->row(),
            'perfil' => $this->ion_auth->get_users_groups($user_id)->row(),
        );*/

$this->form_validation->set_rules('name','', 'trim|required|min_length[16]');
//$this->form_validation->set_rules('id_cathegory','', 'trim|required');
$this->form_validation->set_rules('price','', 'trim|required');

//$this->form_validation->set_rules('image_link','', 'trim|required');

if ($this->form_validation->run()) {

    $data = elements(

            array('name', 'description','id_cathegory','image_link','status', 'shop_type'
        
        ), $this->input->post()

    );

    function floatvalue($val){
        $val = str_replace(",",".",$val);
        $val = preg_replace('/\.(?=.*\.)/', '', $val);
        return floatval($val);
}

    ; 


    $price = array(
 
        'price' => floatvalue($this->input->post("price")),
     
     );

    $data = html_escape($data);
    $price = html_escape($price);

    $this->core_model->update('products', $data, array('id' => $product_id));
    $this->core_model->update('product_customer', $price, array('id_product' => $product_id, 'id_user' => $this->ion_auth->user()->row()->id));

    redirect ('product');


} else {

    $data = array (

        'titulo' => 'Atualizar Produto',
        'scripts' => array(
            'vendor/mask/jquery.mask.min.js',
            'vendor/mask/app.js',
        ),
        'product' => $this->core_model->getById('products', array('id' => $product_id)),
        'product_price' => $this->core_model->getById('product_customer', array('id_product' => $product_id, 'id_user'  => $this->ion_auth->user()->row()->id))
        
    );
   
    $this->load->view('/layout/header', $data);
    $this->load->view('/products/edit');
    $this->load->view('/layout/footer');
}
        }
    }
    
    public function add($type = 0) {
      
        if (strcmp($type, 'first') == 0) {
            $this->core_model->insertLog('product->add', 'System redirect add first product');

            $titulo = 'Cadastre o primero produto e crie seu encarte';
            $this->session->set_userdata('type_product', 'first');
        } else {
            $this->core_model->insertLog('product->add', 'User clicked add product');

            $titulo = 'Cadastrar Produto';
            $this->session->set_userdata('type_product', 'not_first');
        }

        $data = array (
            'titulo' => $titulo,
        );

        $this->form_validation->set_rules('name','', 'trim|required|min_length[5]');
       // $this->form_validation->set_rules('id_cathegory','', 'trim|required');
        $this->form_validation->set_rules('price','', 'trim|required');
        $this->form_validation->set_rules('shop_type','', 'required');

        if ($this->form_validation->run()) {
                 $data = array (
                     'name' => $this->input->post('name'),
                     'description' => $this->input->post('description'),
                     'id_owner' => $this->ion_auth->user()->row()->id,
                     'id_cathegory' => $this->input->post('id_cathegory'),
                     'image_link' => '',
                     'status' => 1,
                     'shop_type' => $this->input->post('shop_type'),       
                 );
               
                 $data = html_escape($data);

                $idProduct = $this->core_model->insert('products', $data);
                 
                $data_product_customer = array('id_user' => $this->ion_auth->user()->row()->id, 
                                                'id_product' => $idProduct,
                                                'price' => $this->input->post('price')); 
                $this->core_model->insert('product_customer', $data_product_customer);
                
                $this->core_model->insertLog('product->add', 'User Save Product');

                redirect ('upload/index/'. $idProduct);
              
        } else {
            $data = array (
                'titulo' => $titulo,
                'scripts' => array(
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js',
                ),
            );

            $this->load->view('layout/header', $data);
            $this->load->view('products/add');
            $this->load->view('layout/footer');
        }
    }

    public function showAllProducts($type=0) {


        $publish = $this->core_model->getById('publish', array('id' => 1));
//            'user_detail' => $this->core_model->getById('user_detail', array('id_user' => $this->ion_auth->user()->row()->id)),


        if ($type == 0)  {
            
        $data = array (
            'titulo' => 'Gerar Encarte',
            'productPublish' => $this->core_model->getAllProductsComplete(0),
            'template' => $this->core_model->getById('template', array('id' => 1)),
            'publish' =>  $publish, 
            'user_detail' => $this->core_model->getById('user_detail', array('id_user' =>  $this->ion_auth->user()->row()->id)),
            'cathegoryes' => $this->core_model->get_all('cathegory'),
            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js',
         'vendor/mask/jquery.mask.min.js',
            'vendor/mask/app.js')
        );
    } else {
        $cathegory = $this->input->post('cathegory');

        $data = array (
            'titulo' => 'Gerar Encarte',
            'productPublish' => $this->core_model->getAllProductsComplete($cathegory),
            'template' => $this->core_model->getById('template', array('id' => 1)),
            'publish' =>  $publish, 
            'user_detail' => $this->core_model->getById('user_detail', array('id_user' =>  $this->ion_auth->user()->row()->id)),
            'cathegoryes' => $this->core_model->get_all('cathegory'),
            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js',
         'vendor/mask/jquery.mask.min.js',
            'vendor/mask/app.js')
        );


    }
      $dataPublish = array ('id_template' => $this->input->post("template"));

      $this->load->view('products/showAllProducts',$data);   
    
    }







}


?>