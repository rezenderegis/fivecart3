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

        $userTeam = $this->core_model->getUserTeam();
        

        $data = array (
            'titulo' => 'Activities',
            'styles' => array ('vendor/datatables/dataTables.bootstrap4.min.css'),
            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js',
            'vendor/mask/jquery.mask.min.js',
            'vendor/mask/app.js'),    
            'products' => $this->core_model->getAllProducts(), 

        );

        $this->load->view('layout/header', $data);
        $this->load->view('products/index');
        $this->load->view('layout/footer');

    }


    public function edit($product_id = null) {

      

        $idProduct = $this->core_model->getById('products', array('id' => $product_id));
        $idUserProduct = $idProduct->id_owner;

        if ($product_id && !$this->core_model->getById('products', array('id' => $product_id))) {
            $this->session->set_flashdata('error', 'Produto não encontrado');
            redirect('product');

        }
    
        else {


        $this->form_validation->set_rules('name','', 'trim|required');
        $this->form_validation->set_rules('description','', 'trim|required');
        $this->form_validation->set_rules('id_responsible','', 'trim|required');
        $this->form_validation->set_rules('date_delivery','', 'trim|required');
        $this->form_validation->set_rules('id_activity','', 'trim|required');


if ($this->form_validation->run()) {

    $data = elements(

            array('name', 'description','id_responsible','date_delivery','id_activity','tecnical_responsible','status_exec'
        
        ), $this->input->post()

    );
    

    $data = html_escape($data);

    $this->core_model->update('products', $data, array('id' => $product_id));

    redirect ('activity');


} else {
    $userTeam = $this->core_model->getUserTeam();

    $data = array (

        'titulo' => 'Atualizar Produto',
        'scripts' => array(
            'vendor/mask/jquery.mask.min.js',
            'vendor/mask/app.js',
        ),
        'product' => $this->core_model->getById('products', array('id' => $product_id)),
        'product_price' => $this->core_model->getById('product_customer', array('id_product' => $product_id, 'id_user'  => $this->ion_auth->user()->row()->id)),
        'usersTeam' => $userTeam,

    );
   
    $this->load->view('/layout/header', $data);
    $this->load->view('/products/edit');
    $this->load->view('/layout/footer');
}
        }
    }
    
    public function add() {


        $data = array (
            'titulo' => 'Include Activity',
        );

        $this->form_validation->set_rules('name','', 'trim|required');
        $this->form_validation->set_rules('description','', 'trim|required');
        $this->form_validation->set_rules('id_responsible','', 'trim|required');
        $this->form_validation->set_rules('date_delivery','', 'trim|required');
        $this->form_validation->set_rules('id_activity','', 'trim|required');


        if ($this->form_validation->run()) {

            
            $data = str_replace("/", "-", $this->input->post('date_delivery'));
            


                 $data = array (
                     'name' => $this->input->post('name'),
                     'description' => $this->input->post('description'),
                     'id_owner' => $this->ion_auth->user()->row()->id,
                     'id_responsible' => $this->input->post('id_responsible'),
                     'date_delivery' =>  date('Y-m-d', strtotime($data)),
                     'id_activity' => $this->input->post('id_activity'),
                     'phather_actity' => $this->input->post('phather_actity'),
                     'tecnical_responsible' => $this->input->post('tecnical_responsible'),
                     'status_exec' => $this->input->post('status_exec'),

                     
                 );
               

                 $data = html_escape($data);

                $idProduct = $this->core_model->insert('products', $data);
                 
               
                redirect ('product');
              
        } else {
            $userTeam = $this->core_model->getUserTeam();
            $status = $this->core_model->getStatus();

            $data = array (
                'titulo' => 'Cadastrar Produto',
                'scripts' => array(
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js',
                ),
                'usersTeam' => $userTeam,
                'status' => $status,
            );

            $this->load->view('layout/header', $data);
            $this->load->view('products/add');
            $this->load->view('layout/footer');
        }
       
      
    

    }


public function delete ($id_activity=0) {

    $dataPublish = array ('status' => 0);
        $this->core_model->update('products', $dataPublish, array('id' => $id_activity));

       // $this->load->view('encarte/selectProduct',$data);


redirect ('product');



}

}
?>