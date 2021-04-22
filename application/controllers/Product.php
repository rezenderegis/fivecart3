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

    public function index() {

        $data = array (
            'titulo' => 'Produtos Cadastrados',
            'styles' => array ('vendor/datatables/dataTables.bootstrap4.min.css'),

            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js'),    
            'products' => $this->core_model->get_all('products'), 

        );

        $this->load->view('layout/header', $data);
        $this->load->view('products/index');
        $this->load->view('layout/footer');

    }



    public function edit($product_id = null) {

       /* if ($this->session->userdata('user_id') != $user_id && !$this->ion_auth->is_admin() ) {
            $this->session->set_flashdata('error', 'Usuário não encontrado');
            redirect('home');
        } {*/

        if (!$product_id || !$this->core_model->getById('products', array('id' => $product_id))) {
            
            $this->session->set_flashdata('error', 'Produto não encontrado');
            redirect('products');

        } else {
/*
        $data = array (

            'titulo' => 'Editar Usuário',
            'usuario' => $this->ion_auth->user($user_id)->row(),
            'perfil' => $this->ion_auth->get_users_groups($user_id)->row(),
        );*/

$this->form_validation->set_rules('name','', 'trim|required');
$this->form_validation->set_rules('description','', 'trim|required');
$this->form_validation->set_rules('id_cathegory','', 'trim|required');
//$this->form_validation->set_rules('image_link','', 'trim|required');

if ($this->form_validation->run()) {

    $data = elements(

            array('name', 'description','id_owner','id_cathegory','image_link','bar_code', 'status'
        
        ), $this->input->post()

    );

    $data = html_escape($data);

    $this->core_model->update('products', $data, array('id' => $product_id));
   
    redirect ('product');


} else {

    $data = array (

        'titulo' => 'Atualizar Produto',
        'scripts' => array(
            'vendor/mask/jquery.mask.min.js',
            'vendor/mask/app.js',
        ),
        'product' => $this->core_model->getById('products', array('id' => $product_id)),
        
    );
    $this->load->view('/layout/header', $data);
    $this->load->view('/products/edit');
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
            'titulo' => 'Cadastrar Produto',
        );

        $this->form_validation->set_rules('name','', 'trim|required');
        $this->form_validation->set_rules('description','', 'trim|required');
        $this->form_validation->set_rules('id_cathegory','', 'trim|required');

        if ($this->form_validation->run()) {
                 $data = array (
                     'name' => $this->input->post('name'),
                     'description' => $this->input->post('description'),
                     'id_owner' => $this->ion_auth->user()->row()->id,
                     'id_cathegory' => $this->input->post('id_cathegory'),
                     'image_link' => 1,
                     'bar_code' => $this->input->post('bar_code'),
                     'status' => $this->input->post('status'),

                 );
               
                 $data = html_escape($data);

                $this->core_model->insert('products', $data);
   
                redirect ('product');
              
        } else {
            $data = array (
                'titulo' => 'Cadastrar Produto',
            );

            $this->load->view('layout/header', $data);
            $this->load->view('products/add');
            $this->load->view('layout/footer');
        }
       
      
    }

    }







}


?>