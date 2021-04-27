<?php
defined ('BASEPATH') OR exit ('Not allowed!');

class Encarte extends CI_Controller {

    
    public function __construct () {

        parent::__construct();
        $this->load->helper('url');

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão expirou');
            redirect ('login');
        }

    }

    public function index($publish) {

        $data = array (

            'titulo' => 'Gerar Encarte',
            'publishId' => $publish,
            'templates' => $this->core_model->get_all('template', array('id_user' => $this->ion_auth->user()->row()->id)), 

        );
        $this->load->view('layout/header', $data);
        $this->load->view('encarte/encarte');
        $this->load->view('layout/footer');

     

    }

    public function productList() {

        $data = array (
            'titulo' => 'Encartes Cadastrados',
            'styles' => array ('vendor/datatables/dataTables.bootstrap4.min.css'),

            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js'),    
            'publish' => $this->core_model->get_all('publish', array('id_user' => $this->ion_auth->user()->row()->id)), 

        );
        $this->load->view('layout/header', $data);
        $this->load->view('encarte/productList');
        $this->load->view('layout/footer');

    
    }

    public function new($publishId) {

        $data = array (

            'titulo' => 'Gerar Encarte',
            'productPublish' => $this->core_model->getProductPublish($publishId),
            'template' => $this->core_model->getById('template', array('id' => $this->input->post("template"))),
            
        );
      
        $this->load->view('/layout/header', $data);
        $this->load->view('encarte/selectProduct');
        $this->load->view('layout/footer');
    }



    public function productPublish($idProductList = NULL) {
       
        $data = array (
            'titulo' => 'Produtos Cadastrados',
            'styles' => array ('vendor/datatables/dataTables.bootstrap4.min.css'),

            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js'),    
          //  'productPublish' => $this->core_model->get_all('product_publish', array('id_publish' => $idProductList)),
            'products' => $this->core_model->getUserProducts($idProductList,$this->ion_auth->user()->row()->id),
            'idProductList' => $idProductList,
            'productPublish' => $this->core_model->getProductPublish($idProductList),


        );
        
        $this->load->view('layout/header', $data);
        $this->load->view('encarte/productPublish');
        $this->load->view('layout/footer');

    }


   
    public function edit($publish_id = null) {
 
         if (!$publish_id || !$this->core_model->getById('product_publish', array('id' => $publish_id))) {
             
             $this->session->set_flashdata('error', 'Lista não encontrada');
             redirect('products');
 
         } else {
 /*
         $data = array (
 
             'titulo' => 'Editar Usuário',
             'usuario' => $this->ion_auth->user($user_id)->row(),
             'perfil' => $this->ion_auth->get_users_groups($user_id)->row(),
         );*/
 
 $this->form_validation->set_rules('description','', 'trim|required');

 if ($this->form_validation->run()) {

     $data = elements(
 
             array('description',
         
         ), $this->input->post()
 
     );
 
     $data = html_escape($data);
 
     $this->core_model->update('publish', $data, array('id' => $publish_id));
    
     redirect ('encarte/productList');
 
 
 } else {
 
     $data = array (
 
         'titulo' => 'Atualizar Lista',
         'scripts' => array(
             'vendor/mask/jquery.mask.min.js',
             'vendor/mask/app.js',
         ),
         'publish' => $this->core_model->getById('publish', array('id' => $publish_id)),
         
     );
     $this->load->view('/layout/header', $data);
     $this->load->view('/encarte/edit');
     $this->load->view('/layout/footer');
 }
         }
     }




    public function add() {

        if (!$this->ion_auth->is_admin()) {
            $this->session->set_flashdata('error', 'Acesso não permitido');
            redirect('home');
        } else {

        $data = array (
            'titulo' => 'Cadastrar Lista',
        );

        $this->form_validation->set_rules('description','', 'trim|required');

        if ($this->form_validation->run()) {
                 $data = array (
                     'description' => $this->input->post('description'),
                     'id_user' => $this->ion_auth->user()->row()->id,
                     'date' => sysdate,
                     
                 );
               
                 $data = html_escape($data);

                $this->core_model->insert('publish', $data);
   
                redirect ('encarte/productList');
              
        } else {
            $data = array (
                'titulo' => 'Cadastrar Produto',
            );

            $this->load->view('layout/header', $data);
            $this->load->view('encarte/add');
            $this->load->view('layout/footer');
        }
       
      
    }

    }

    public function addProduct ($idProductList) {

 $product_customer = $this->core_model->getById('product_customer', array('id' => $this->input->post("product")));

$date = date('Y-m-d H:i:s');
        $data = array (
            'id_product_customer' => $this->input->post("product"),
            'id_publish' => $idProductList,
            'product_price' => $product_customer->price,
            'date' => $date,

            
        );
      //print_r($this->input->post());
      //die();
     
       $this->core_model->insert('product_publish', $data);

       redirect ('encarte/productPublish/'.$idProductList);


    }

    public function deleteProduct($idProductPublish,$idPublish) {

        if ($idProductPublish != NULL) {

            $data = array(
 
               'status' => 0,
            
            );

            $this->core_model->update('product_publish', $data, array('id' => $idProductPublish));
            redirect ('encarte/productPublish/'.$idPublish);

        } 


    }
   


}