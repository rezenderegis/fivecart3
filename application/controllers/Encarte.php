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

    public function index() {
        $this->load->view('layout/header');

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
            'publish' => $this->core_model->get_all('publish'), 

        );
        $this->load->view('layout/header', $data);
        $this->load->view('encarte/productList');
        $this->load->view('layout/footer');

    
    }

    public function new() {
       // print_r($_REQUEST);
        //print_r($_SESSION);
        //die();
        $this->load->view('layout/header');

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
           // 'productPublish' => $this->core_model->get_all('product_publish'), 
            'productPublish' => $this->core_model->get_all('product_publish', array('id' => $idProductList)),

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
   


}