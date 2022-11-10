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

    public function index($publish,$type_template=0) {        

        $data = array (

            'titulo' => 'Gerar Encarte',
            'publishId' => $publish,
           // 'templates' => $this->core_model->get_all('template', array('id_user' => $this->ion_auth->user()->row()->id)), 
             'templates' => $this->core_model->getTemplates($type_template), 

        );
        $this->load->view('layout/header', $data);
        $this->load->view('encarte/allCartsSelect');
        $this->load->view('layout/footer');
    }


    public function allCarts($type=0) {

        $title = 'Todos os Encartes';
        $userProducts =  $this->core_model->get_all('product_customer', array ('id_user' => $this->ion_auth->user()->row()->id));

        //TODO: This is not workink
        if (count($userProducts) == 0){
            $title = 'Cadastre produtos para criar seu ENCARTE';
            
        }
  
        $data = array (

            'titulo' => $title,
             'templates' => $this->core_model->getTemplates($type), 
            'user_detail' =>  $this->core_model->getById('user_detail', array ('id_user' => $this->ion_auth->user()->row()->id))

        );

        $this->load->view('layout/header', $data);

        if (count($userProducts) == 0){

            redirect ('product/index/0/1', $data);
         } else {

         
            $this->core_model->insertLog('allCarts', '');

            $this->load->view('encarte/allCarts1');
         
        }
        $this->load->view('layout/footer');
    }

    public function productList($idPublish=0) {

        if ($idPublish != 0)
        { 
        $data = array (
            'titulo' => 'Encartes Cadastrados',
            'styles' => array ('vendor/datatables/dataTables.bootstrap4.min.css'),

            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js'),    
            'publish' => $this->core_model->get_all('publish', array('id_user' => $this->ion_auth->user()->row()->id, 'id' => $idPublish)), 

        );
    } else {

        $data = array (
            'titulo' => 'Encartes Cadastrados',
            'styles' => array ('vendor/datatables/dataTables.bootstrap4.min.css'),

            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js'),    
            'publish' => $this->core_model->get_all('publish', array('id_user' => $this->ion_auth->user()->row()->id)), 

        );


    }
        $this->load->view('layout/header', $data);
        $this->load->view('encarte/productList');
        $this->load->view('layout/footer');

    
    }


    public function productList1($idPublish=0,$typeFind=0) {
      
        $userProducts =  $this->core_model->get_all('product_customer', array ('id_user' => $this->ion_auth->user()->row()->id));
       
       
        $this->session->unset_userdata('idpublish');
     
        $logo =  $this->core_model->getById('user_detail', array ('id_user' => $this->ion_auth->user()->row()->id));
        if (count($userProducts) == 0){
            $this->core_model->insertLog('encarte->productList1', 'Redirect user whithout product');

            redirect ('product/index/0/1');
         } else {
            
            $this->core_model->insertLog('encarte->productList1', 'Load sreen');


        if (count($userProducts) == 0) {
            $type="first";
        } else {
            $type="not_first";

        }
       
        if ($idPublish != 0)
        { 
            
        $data = array (
            'titulo' => 'Encartes Cadastrados',
            'styles' => array ('vendor/datatables/dataTables.bootstrap4.min.css'),
            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js'), 
            'templates' => $this->core_model->get_all('template'),    
            'publish' => $this->core_model->get_all('publish', array('id_user' => $this->ion_auth->user()->row()->id, 'id' => $idPublish)), 
            'type' => $type,

        );
    } else {
        
        $data = array (
            'titulo' => 'Encartes Cadastrados',
            'styles' => array ('vendor/datatables/dataTables.bootstrap4.min.css'),
            'templates' => $this->core_model->getPublishWithTemplate($typeFind), 

            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js'),    
            'type' => $type,


        );


    }

    $publish =  $this->core_model->getById('publish', array ('id_user' => $this->ion_auth->user()->row()->id));
    if (!$publish){
       $this->session->set_flashdata('error', 'Crie seu primeiro encarte!');
     } 

        $this->load->view('layout/header', $data);
        $this->load->view('encarte/productList1');
        $this->load->view('layout/footer');
    }
    
    }

    public function productList2($idPublish=0,$idUser=0) {
        
        if ($idUser == 0 ) {
            $idUser = $this->ion_auth->user()->row()->id;
        } else {
            $idUser = $idUser;
        }


        $userProducts =  $this->core_model->get_all('product_customer', array ('id_user' => $idUser));

        $logo =  $this->core_model->getById('user_detail', array ('id_user' => $idUser));
        if ($logo->image_link == 'no-image-icon-23485.png' || count($userProducts) == 0){
           redirect ('encarte/allCarts');
        } else {
            
        

        if (count($userProducts) == 0) {
            $type="first";
        } else {
            $type="not_first";

        }

        if ($idPublish != 0)
        { 
        $data = array (
            'titulo' => 'Encartes Cadastrados',
            'styles' => array ('vendor/datatables/dataTables.bootstrap4.min.css'),

            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js'), 
            'templates' => $this->core_model->get_all('template'),    
            'publish' => $this->core_model->get_all('publish', array('id_user' => $idUser , 'id' => $idPublish)), 
            'type' => $type,

        );
    } else {

        $data = array (
            'titulo' => 'Encartes Cadastrados',
            'styles' => array ('vendor/datatables/dataTables.bootstrap4.min.css'),
            'templates' => $this->core_model->getPublishWithTemplate1($idUser), 

            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js'),    
            'publish' => $this->core_model->getPublishWithTemplate1($idUser ),            
            'type' => $type,


        );


    }
        $this->load->view('layout/header', $data);
        $this->load->view('encarte/productList1');
        $this->load->view('layout/footer');
    }
    
    }

    public function new($publishId, $var) {

        $publish = $this->core_model->getById('publish', array('id' => $publishId));

        if ($var != '') {

        $data = array (

            'titulo' => 'Gerar Encarte',
            'productPublish' => $this->core_model->getProductPublish($publishId),
            'template' => $this->core_model->getById('template', array('id' => $var)),
            'publish' =>  $publish,
            
        );
      $dataPublish = array ('id_template' => $var);
       // $this->load->view('/layout/header', $data);
      //  $this->load->view('encarte/selectProduct',$data);
        $this->core_model->update('publish', $dataPublish, array('id' => $publishId));

        $date = date('Y-m-d H:i:s');

        $dataUpdate = array('dateUpdate' => $date,);

        $this->core_model->update('publish', $dataUpdate, array('id' => $publishId));



        $this->session->set_flashdata('success', 'Modelo alterado com sucesso!');

        redirect('encarte/productList1');
     //   $this->load->view('layout/footer');
    } else {
        $this->load->view('/layout/header');
        $this->load->view('layout/mensagem');

        $this->load->view('layout/footer');

    }
    
    }

    public function showPublish($publishId,$template) {

        $publish = $this->core_model->getById('publish', array('id' => $publishId));
//            'user_detail' => $this->core_model->getById('user_detail', array('id_user' => $this->ion_auth->user()->row()->id)),

        
        $data = array (
            'titulo' => 'Gerar Encarte',
            'productPublish' => $this->core_model->getProductPublish($publishId),
            'template' => $this->core_model->getById('template', array('id' => $template)),
            'publish' =>  $publish, 
            
            'user_detail' => $this->core_model->getById('user_detail', array('id_user' =>  $this->ion_auth->user()->row()->id)),
            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js',
         'vendor/mask/jquery.mask.min.js',
            'vendor/mask/app.js')
        );

      $dataPublish = array ('id_template' => $this->input->post("template"));

      $this->load->view('encarte/showPublish',$data);   
    
    }

    public function getAllFlyers() {

        if (!$this->ion_auth->is_admin()) {
            $this->session->set_flashdata('error', 'Acesso não permitido');
            redirect('home');
        } else {


        $publish = $this->core_model->getAllFlyers($this->input->post('has_product'),
        $this->input->post('has_logo'),
        $this->input->post('has_flyer'));

 
        $data = array (
            'titulo' => 'Encartes Cadastrados',
            'publish' =>  $publish, 
            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js',
         'vendor/mask/jquery.mask.min.js',
            'vendor/mask/app.js')
        );

        $this->load->view('layout/header', $data);
        $this->load->view('encarte/getAllFlyers');   

        $this->load->view('layout/footer');
    }
    
    }








    public function newPublish() {
        
        $data = array (
            'titulo' => 'Produtos Cadastrados',
            'styles' => array ('vendor/datatables/dataTables.bootstrap4.min.css'),
            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js',
         'vendor/mask/jquery.mask.min.js',
            'vendor/mask/app.js'),    
            'products' => $this->core_model->getProducts($this->ion_auth->user()->row()->id)

        );

        $this->load->view('/layout/header');
        $this->load->view('layout/mensagem');

        $this->load->view('layout/footer');

    }


    public function productPublishBeta($idProductList = NULL) {
        $userDetail = $this->core_model->getById('user_detail', array('id_user' => $this->ion_auth->user()->row()->id));

        $publish = $this->core_model->getById('publish', array('id' => $idProductList, 'id_user' => $this->ion_auth->user()->row()->id));
        $idTemplate = $publish->id_template;
       
        $existProductWithoutPrice = 0;
        foreach($this->core_model->getProductPublish($idProductList) as $verify) {
            //print_r($verify); die();
            if ($verify['price'] == '0.00') {
                $existProductWithoutPrice = 1;
               
            }
        }
       
        $data = array (
            'titulo' => 'Produtos Cadastrados',
            'styles' => array ('vendor/datatables/dataTables.bootstrap4.min.css'),

            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js',
            'vendor/mask/jquery.mask.min.js',
            'vendor/mask/app.js'),    
            'products' => $this->core_model->getUserProducts($idProductList,$this->ion_auth->user()->row()->id),
            'idProductList' => $idProductList,
            'publish' => $publish,
            'template' => $this->core_model->getById('template', array('id' => $idTemplate)),
            'existProductWithoutPrice' => $existProductWithoutPrice,
            'productPublish' => $this->core_model->getProductPublish($idProductList),
            'userDetail' => $userDetail,


        );


        $logo =  $this->core_model->getById('user_detail', array ('id_user' => $this->ion_auth->user()->row()->id));
     //   print_r($logo);
      //  die();


      if (is_null($logo)) {
        $this->session->set_flashdata('error', 'Inclua uma Logo para melhorar a qualidade do seu encarte!');
 
    } else if (!$logo->image_link){
            $this->session->set_flashdata('error', 'Inclua uma Logo para melhorar a qualidade do seu encarte!');
          } 


        $this->load->view('layout/header', $data);
        $this->load->view('encarte/productPublish');
        $this->load->view('layout/footer');

    }



    public function productPublish($idProductList = NULL) {
       
        $this->session->set_userdata('idpublish', $idProductList);
        
        $userDetail = $this->core_model->getById('user_detail', array('id_user' => $this->ion_auth->user()->row()->id));
        
        $publish = $this->core_model->getById('publish', array('id' => $idProductList, 'id_user' => $this->ion_auth->user()->row()->id));
       
        $idTemplate = $publish->id_template;
       
        $existProductWithoutPrice = 0;
        foreach($this->core_model->getProductPublish($idProductList) as $verify) {
           
            if ($verify['price'] == '0.00') {
                $existProductWithoutPrice = 1;
               
            }
        }
       
        $logo =  $this->core_model->getById('user_detail', array ('id_user' => $this->ion_auth->user()->row()->id));

        $data = array (
            'titulo' => 'Produtos Cadastrados',
            'styles' => array ('vendor/datatables/dataTables.bootstrap4.min.css'),

            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js',
            'vendor/mask/jquery.mask.min.js',
            'vendor/mask/app.js'),    
            'products' => $this->core_model->getUserProducts($idProductList,$this->ion_auth->user()->row()->id),
            'idProductList' => $idProductList,
            'publish' => $publish,
            'template' => $this->core_model->getById('template', array('id' => $idTemplate)),
            'existProductWithoutPrice' => $existProductWithoutPrice,
            'user_detail' =>   $logo,
            'productPublish' => $this->core_model->getProductPublish($idProductList),
            'userDetail' => $userDetail,


        );





      if (is_null($logo)) {
        $this->session->set_flashdata('error', 'Inclua uma Logo para melhorar a qualidade do seu encarte!');
 
    } else if (!$logo->image_link){
            $this->session->set_flashdata('error', 'Inclua uma Logo para melhorar a qualidade do seu encarte!');
          } 


        $this->load->view('layout/header', $data);
        $this->load->view('encarte/productPublish');
        $this->load->view('layout/footer');

    }

    public function showAllPproducts($idProductList = NULL, $productName) {
        $products = $this->core_model->getUserProductsByName($idProductList,$this->ion_auth->user()->row()->id, $productName);
       print_r($products); die();
        return $products;
    }

    public function showCombo($idProductList = NULL, $productName) {
        $products = $this->core_model->getUserProductsByName($idProductList,$this->ion_auth->user()->row()->id, $productName);
      
        $data = array ("products" => $products, "productName" =>  $productName);
        $this->load->view('encarte/gethint', $data);

        return $products;
    }

    public function newProductPublish($idProductList = NULL) {
        
        $data = array (
            'titulo' => 'Produtos Cadastrados',
            'styles' => array ('vendor/datatables/dataTables.bootstrap4.min.css'),
            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js'),    
            'products' => $this->core_model->getProducts($this->ion_auth->user()->row()->id),
            'idProductList' => '',
            'productPublish' => $this->core_model->getProductPublish(0),

        );

        $this->load->view('layout/header', $data);
        $this->load->view('encarte/newProductPublish');
        $this->load->view('layout/footer');

    }
   
    public function edit($publish_id = null) {

        if (!$publish_id || !$this->core_model->getById('publish', array('id' => $publish_id, 'id_user' => $this->ion_auth->user()->row()->id))) {
             $this->session->set_flashdata('error', 'Lista não encontrada');
             redirect ('encarte/productList');

         } else {
 
            $this->form_validation->set_rules('description','', 'trim|required');

        if ($this->form_validation->run()) {

            $data = elements(
 
             array('description', 'header2','footer_text','footer_text2','column_amount','show_background',
         
         ), $this->input->post()
 
     );
 
     $data = html_escape($data);
 
     $this->core_model->update('publish', $data, array('id' => $publish_id));
    
     $date = date('Y-m-d H:i:s');

     $dataUpdate = array('dateUpdate' => $date,);

   $this->core_model->update('publish', $dataUpdate, array('id' => $publish_id));


     redirect ('encarte/productPublish/'.$publish_id);
 
 
 } else {

    $publish = $this->core_model->getById('publish', array('id' => $publish_id));
    $template = $this->core_model->getById('template', array('id' => $publish->id_template));
    
    
     $data = array (
 
         'titulo' => 'Atualizar Lista',
         'scripts' => array(
             'vendor/mask/jquery.mask.min.js',
             'vendor/mask/app.js',
         ),
         'publish' => $publish,
         'template' => $template,
         
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
                     'header2' => $this->input->post('header2'),
                     'id_user' => $this->ion_auth->user()->row()->id   
                 );
               
                 $data = html_escape($data);

                $idPublish = $this->core_model->insert('publish', $data);
   
                redirect ('encarte/productPublish/'.$idPublish);
              
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


    public function addFromCart($idTemplate=0) {

        $logo =  $this->core_model->getById('user_detail', array ('id_user' => $this->ion_auth->user()->row()->id));
      /*  if ($logo->image_link == 'no-image-icon-23485.png'){
           redirect ('usuario/editUserDetails');
        } else { */

        $userProducts =  $this->core_model->get_all('product_customer', array ('id_user' => $this->ion_auth->user()->row()->id));
            if (count($userProducts) == 0) {
                $type="first";

                $this->core_model->insertLog('addFromCart', 'System redirect add first product');

               redirect('product/add/'.$type);
    
            } else {




        $data = array (
            'titulo' => 'Cadastrar Lista',
        );
        $this->form_validation->set_rules('description','', 'trim|required');
        $userDetail =  $this->core_model->getById('user_detail', array ('id_user' => $this->ion_auth->user()->row()->id));
        if ($this->form_validation->run()) {
           /// echo $this->input->post('description'); 
                 $data = array (
                     'description' => $this->input->post('description'),
                     'header2' => $this->input->post('header2'),
                     'footer_text' => $userDetail->footer_text,
                     'footer_text2' => $userDetail->footer_text2,
                     'id_user' => $this->ion_auth->user()->row()->id,
                    'id_template' => $idTemplate,
                    'column_amount' => $this->input->post('column_amount'), 
                 );
            //   print_r($data); die();
                 $data = html_escape($data);
                 $this->core_model->insertLog('encarte->addFromCart', 'Insert publish');

                $idPublish = $this->core_model->insert('publish', $data);
   
                redirect ('encarte/productPublish/'.$idPublish);
              
        } else {

                $template = $this->core_model->getById('template', array('id' => $idTemplate));
                //print_r($template); die();
                $data = array (
                    'titulo' => 'Cadastar Novo Encarte',
                    'template' =>  $template
                );
    
                $this->core_model->insertLog('addFromCart', 'Load form');

                $this->load->view('layout/header', $data);
                $this->load->view('encarte/add');
                $this->load->view('layout/footer');

           
        }
            }
       // }
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
        
       $this->core_model->insert('product_publish', $data);
       $getProductPublish =  $this->core_model->get_all('product_publish', array ('id_publish' => $idProductList, 'status'=> 1 ));
       count($getProductPublish);
       redirect ('encarte/productPublish/'.$idProductList);
    }

    public function addProduct1 ($idProductList,$idProduct) {
        $product_customer = $this->core_model->getById('product_customer', array('id' => $idProduct));
      
       $date = date('Y-m-d H:i:s');
               $data = array (
                   'id_product_customer' => $idProduct,
                   'id_publish' => $idProductList,
                   'product_price' => $product_customer->price,
                   'date' => $date,         
               );
               
              $this->core_model->insert('product_publish', $data);
              
              
                $dataUpdate = array('dateUpdate' => $date,);

              $this->core_model->update('publish', $dataUpdate, array('id' => $idProductList));

              $getProductPublish =  $this->core_model->get_all('product_publish', array ('id_publish' => $idProductList, 'status'=> 1 ));
              count($getProductPublish);
              redirect ('encarte/productPublish/'.$idProductList);
           }

    public function deleteProduct($idProductPublish,$idPublish) {
        
        if ($idProductPublish != NULL) {

            $data = array(
 
               'status' => 0,
            
            );

            $this->core_model->update('product_publish', $data, array('id' => $idProductPublish));
            
            $date = date('Y-m-d H:i:s');

            $dataUpdate = array('dateUpdate' => $date,);

          $this->core_model->update('publish', $dataUpdate, array('id' => $idPublish));

            
            redirect ('encarte/productPublish/'.$idPublish);

        } 

    }
   
    public function editProductPublish($idProductPublish = NULL, $productPublish = null) {
        $this->form_validation->set_rules('product_price','', 'trim|required');

        if ($this->form_validation->run()) {
          

           /* $data = elements(
        
                    array('product_price',
                
                ), $this->input->post()
        
            );*/

            function floatvalue($val){
                $val = str_replace(",",".",$val);
                $val = preg_replace('/\.(?=.*\.)/', '', $val);
                return floatval($val);
        }
        
            ; 
        
        
            $data = array(
         
                'product_price' => floatvalue($this->input->post("product_price")),
             
             );


        
            $data = html_escape($data);
        
            $this->core_model->update('product_publish', $data, array('id' => $idProductPublish));
           
            redirect ('encarte/productPublish/'.$this->input->post("product_publish_id"));
        
        
        } else {
            $data = array (
        
                'titulo' => 'Atualizar Lista',
                'scripts' => array(
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js',
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js'
                ),
                'productPublish' => $this->core_model->getUniqueProductPublish($idProductPublish),
                
            );
         
            $this->load->view('/layout/header', $data);
            $this->load->view('/encarte/editProductPublish');
            $this->load->view('/layout/footer');
        }

    }


    public function saveImage($image = null) {

            $image = $_POST["image"];
            $image = explode(";", $image)[1];
            $image = explode(",", $image)[1];
            $image = base64_decode($image);

            file_put_contents("upload/filename.jpg", $image);
            echo $image;
    }



    public function testImage($idProduct=11,$idUser=15,$template=1) {

        
        
        $data = array (
            'titulo' => 'Gerar Encarte',
            'productPublish' => $this->core_model->getProductTest($idProduct,$idUser),
            'template' => $this->core_model->getById('template', array('id' => $template)),
            'publish' =>  0, 
            
            'user_detail' => $this->core_model->getById('user_detail', array('id_user' =>  $this->ion_auth->user()->row()->id)),
            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js',
         'vendor/mask/jquery.mask.min.js',
            'vendor/mask/app.js',
            'js/bootstrap-input-spinner.js',

            )
        );

        
      $dataPublish = array ('id_template' => 1);

      $this->load->view('encarte/testImage',$data);   
    
    }

    public function changeProductDimension ($idProduct) {


        $data = array (

            'image_width' => $this->input->post("image_width"),
            'image_height' => $this->input->post("image_height"),
            
            
        );
        $this->core_model->update('products', $data, array('id' => $idProduct));
        

        redirect('encarte/testImage/'.$idProduct.'/'.$this->ion_auth->user()->row()->id);

    }

    public function viewFlyerImage($user, $publishId) {

       
        $userProducts =  $this->core_model->get_all('product_customer', array ('id_user' => $this->ion_auth->user()->row()->id));

        $logo =  $this->core_model->getById('user_detail', array ('id_user' => $this->ion_auth->user()->row()->id));
        if ($logo->image_link == 'no-image-icon-23485.png' || count($userProducts) == 0){
           redirect ('encarte/allCarts');
        } else {
            
        

        if (count($userProducts) == 0) {
            $type="first";
        } else {
            $type="not_first";

        }

     

        $data = array (
            'titulo' => 'Encartes Cadastrados',
            'styles' => array ('vendor/datatables/dataTables.bootstrap4.min.css'),
            'templates' => $this->core_model->getPublishWithTemplate(), 

            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js'),    
            'publish' => $this->core_model->getPublishWithTemplate(),            
            'type' => $type,
            'publishId' => $publishId,
            'user' => $user,


        );


    
        $this->load->view('layout/header', $data);
        $this->load->view('encarte/viewFlyerImage');
        $this->load->view('layout/footer');
    }

    }



}