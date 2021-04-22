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
   


}