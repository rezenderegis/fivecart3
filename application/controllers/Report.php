<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller  {

    
    public function __construct () {

        parent::__construct();
        $this->load->helper('url');

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão expirou');
            redirect ('login');
        }

    }

    public function index($id_activity=0) {

        $data = array (
            'titulo' => 'Produtos Cadastrados',
            'styles' => array ('vendor/datatables/dataTables.bootstrap4.min.css'),
            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js',
            'vendor/mask/jquery.mask.min.js',
            'vendor/mask/app.js'),    
            'products' => $this->core_model->get_all('activity_report', array('id_activity' => $id_activity)), 
            'id_activity' => $id_activity,
        );

        $this->load->view('layout/header', $data);
        $this->load->view('report/index');
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

$this->form_validation->set_rules('name','', 'trim|required');
$this->form_validation->set_rules('description','', 'trim|required');
//$this->form_validation->set_rules('id_cathegory','', 'trim|required');
$this->form_validation->set_rules('price','', 'trim|required');

//$this->form_validation->set_rules('image_link','', 'trim|required');

if ($this->form_validation->run()) {

    $data = elements(

            array('name', 'description','id_cathegory','image_link','bar_code', 'status'
        
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
    
    public function add($id_activity) {


        $data = array (
            'titulo' => 'Cadastrar Produto',
        );

        $this->form_validation->set_rules('description','', 'trim|required');


        if ($this->form_validation->run()) {
                 $data = array (
                     'description' => $this->input->post('description'),
                     'id_activity' => $id_activity,


                 );
               

                 $data = html_escape($data);

                $idProduct = $this->core_model->insert('activity_report', $data);
                 
               
                redirect ('report/index/'.$id_activity);
              
        } else {
            $data = array (
                'titulo' => 'Add Report',
                'scripts' => array(
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js',
                ),
            );

            $this->load->view('layout/header', $data);
            $this->load->view('report/add');
            $this->load->view('layout/footer');
        }
       
      
    

    }







}


?>