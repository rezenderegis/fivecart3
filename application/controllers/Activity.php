<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller  {

    
    public function __construct () {

        parent::__construct();
        $this->load->helper('url');

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão expirou');
            redirect ('login');
        }

    }

    public function index() {
        $id_responsible = $this->input->post('id_responsible');
        $tag1_form = $this->input->post('tag1');
        $tag2_form = $this->input->post('tag2');
        $tag3_form = $this->input->post('tag3');
        $tag4_form = $this->input->post('tag4');
        $tecnical_responsible = $this->input->post('tecnical_responsible');

        
        $userTeam = $this->core_model->getUserTeam();
        $tag1 = $this->core_model->tag1();
        $tag2 = $this->core_model->tag2();
        $tag3 = $this->core_model->tag3();
        $tag4 = $this->core_model->tag4();
        $status = $this->core_model->getStatus();



        $data = array (
            'titulo' => 'Activities',
            'styles' => array ('vendor/datatables/dataTables.bootstrap4.min.css'),
            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js',
            'vendor/mask/jquery.mask.min.js',
            'vendor/mask/app.js'),    
            'products' => $this->core_model->getAllProducts( $id_responsible,$tag1_form,$tag2_form,$tag3_form,$tag4_form,$tecnical_responsible ), 
            'usersTeam' => $userTeam,
            'tags1' => $tag1,
            'tags2' => $tag2,
            'tags3' => $tag3,
            'tags4' => $tag4,
            'status' => $status,


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
            redirect('activity');

        }
    
        else {


        $this->form_validation->set_rules('name','', 'trim|required');
        $this->form_validation->set_rules('description','', 'trim|required');
        $this->form_validation->set_rules('id_responsible','', 'trim|required');
        $this->form_validation->set_rules('date_delivery','', 'trim|required');


if ($this->form_validation->run()) {

    $data = str_replace("/", "-", $this->input->post('date_delivery'));


    $data = array (
        'name' => $this->input->post('name'),
        'description' => $this->input->post('description'),
        'id_responsible' => $this->input->post('id_responsible'),
        'date_delivery' =>  date('Y-m-d', strtotime($data)),
        'phather_actity' => $this->input->post('phather_actity'),
        'tag1' => $this->input->post('tag1'),
        'tag2' => $this->input->post('tag2'),
        'tag3' => $this->input->post('tag3'),
        'tag4' => $this->input->post('tag4'),
        'tecnical_responsible' => $this->input->post('tecnical_responsible'),
        'status_exec' => $this->input->post('status_exec'),


    );
    

    $data = html_escape($data);

    $this->core_model->update('products', $data, array('id' => $product_id));

    redirect ('activity');


} else {
    $userTeam = $this->core_model->getUserTeam();
    $status = $this->core_model->getStatus();

    $data = array (

        'titulo' => 'Atualizar Produto',
        'scripts' => array(
            'vendor/mask/jquery.mask.min.js',
            'vendor/mask/app.js',
        ),
        'product' => $this->core_model->getById('products', array('id' => $product_id)),
        'product_price' => $this->core_model->getById('product_customer', array('id_product' => $product_id, 'id_user'  => $this->ion_auth->user()->row()->id)),
        'usersTeam' => $userTeam,
        'status' => $status,

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


        if ($this->form_validation->run()) {

            
            $data = str_replace("/", "-", $this->input->post('date_delivery'));
            


                 $data = array (
                     'name' => $this->input->post('name'),
                     'description' => $this->input->post('description'),
                     'id_owner' => $this->ion_auth->user()->row()->id,
                     'id_responsible' => $this->input->post('id_responsible'),
                     'date_delivery' =>  date('Y-m-d', strtotime($data)),
                     'phather_actity' => $this->input->post('phather_actity'),
                     'tag1' => $this->input->post('tag1'),
                     'tag2' => $this->input->post('tag2'),
                     'tag3' => $this->input->post('tag3'),
                     'tag4' => $this->input->post('tag4'),
                     'tecnical_responsible' => $this->input->post('tecnical_responsible'),
                     'status_exec' => $this->input->post('status_exec'),

                 );
               

                 $data = html_escape($data);

                $idProduct = $this->core_model->insert('products', $data);
                 
               
                redirect ('activity');
              
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