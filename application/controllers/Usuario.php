<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller  {

    
    public function __construct () {

        parent::__construct();
        $this->load->helper('url');

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão expirou');
            redirect ('login');
        }

    }

    public function delete($user_id = NULL) {


        if (!$this->ion_auth->is_admin()) {
            $this->session->set_flashdata('error', 'Acesso não permitido');
            redirect('home');
        } else {

        if (!$user_id || !$this->ion_auth->user($user_id)->row()) {
            $this->session->set_flashdata('error', 'Usuário não encontrado');
            redirect ('/usuario');
        }

        if ($this->ion_auth->is_admin($user_id)) {
            $this->session->set_flashdata('error', 'Usuário não pode ser apagado!');
            redirect ('/usuario');
        }

        if ($this->ion_auth->delete_user($user_id)) {
            $this->session->set_flashdata('success', 'Usuário excluído com sucesso!');
            redirect ('/usuario');
        } else {
            $this->session->set_flashdata('error', 'Erro ao deletar o usuário');
            redirect ('/usuario');
        }
    }

}
    
    public function add() {

        if (!$this->ion_auth->is_admin()) {
            $this->session->set_flashdata('error', 'Acesso não permitido');
            redirect('home');
        } else {

        $data = array (
            'titulo' => 'Cadastrar Usuário',
        );


        $this->form_validation->set_rules('first_name','', 'trim|required');
        $this->form_validation->set_rules('last_name','', 'trim|required');
        $this->form_validation->set_rules('email','', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('username','', 'trim|required|is_unique[users.username]');
        $this->form_validation->set_rules('mobile_number','', 'trim|required');
        $this->form_validation->set_rules('address','', 'trim|required');

        $this->form_validation->set_rules('password','Senha', 'required|min_length[5]|max_length[255]');
        $this->form_validation->set_rules('confirm_password','Confirma', 'matches[password]');

        if ($this->form_validation->run()) {
            

         
                  $username = $this->security->xss_clean($this->input->post("username"));
                  $password = $this->security->xss_clean($this->input->post("password"));
                  $email = $this->security->xss_clean($this->input->post("email"));

                 $aditional_data = array (
                     'first_name' => $this->input->post('first_name'),
                     'last_name' => $this->input->post('last_name'),
                     'username' => $this->input->post('username'),

                     'active' => $this->input->post('active'),

                 );
                 $aditional_data = $this->security->xss_clean($aditional_data);
                 $group = array($this->input->post('perfil'));
                 $group = $this->security->xss_clean($group);
                
                $idUserInserted = $this->ion_auth->register($username, $password,$email,$aditional_data,$group);
             //   print_r($idUserInserted); die();
                if ( $idUserInserted) {
                


                $dataDetails = array (
                    'address' => $this->input->post('address'),
                    'mobile_number' => $this->input->post('mobile_number'),
                    'id_user' => $idUserInserted,
                    'footer_text' => 'Faça seu pedido pelo telefone: '.$this->input->post('mobile_number'),
                    'footer_text2' => $this->input->post('address'),
                    //'logo' => 'no-image-icon-23485.png',
                );
              
                $dataDetails = html_escape($dataDetails);

               $this->core_model->insert('user_detail', $dataDetails);
            
                $this->core_model->insertProductDefalt($idUserInserted);

                        $this->session->set_flashdata('success','Dados salvos com sucesso');

                } else {
                    $this->session->set_flashdata('error','Erro ao salvar os dados');

                }
                redirect ('usuario');
              
        } else {
            $data = array (
                'titulo' => 'Cadastrar Usuário',
            );

            $this->load->view('layout/header', $data);
            $this->load->view('users/add');
            $this->load->view('layout/footer');
        }
       
      
    }

    }

    public function index () {

        if (!$this->ion_auth->is_admin()) {

            $this->session->set_flashdata('error', 'Acesso não permitido');
            redirect('home');

        } else {

        $data = array (
            'titulo' => 'Usuários Cadastrados',
            'styles' => array ('vendor/datatables/dataTables.bootstrap4.min.css'),

            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js'),    
            'usuarios' => $this->core_model->getUsers(), 

        );
     
       //from_unixtime(created_on ,'%Y-%m-%d'),from_unixtime(last_login  ,'%Y-%m-%d')
        $this->load->view('layout/header', $data);
        $this->load->view('users/index');
        $this->load->view('layout/footer');

    }
    }


    public function email_check($email){

        $usuario_id = $this->input->post('usuario_id');

        
        if ($this->core_model->getById('users',array('email' => $email, 'id !=' => $usuario_id))) {

            $this->form_validation->set_message('email_check', 'Esse e-mail já existe');
            return FALSE;

        } else {    
          
            return TRUE;
        }

    }

    public function username_check($username){

        $usuario_id = $this->input->post('usuario_id');

        
        if ($this->core_model->getById('users',array('username' => $username, 'id !=' => $usuario_id))) {

            $this->form_validation->set_message('username_check', 'Esse usuário já existe');
            return FALSE;

        } else {    
          
            return TRUE;
        }

    }
    public function edit($user_id = null) {
       
        if ($this->session->userdata('user_id') != $user_id && !$this->ion_auth->is_admin() ) {
            $this->session->set_flashdata('error', 'Usuário não encontrado');
            redirect('home');
        } {

        if (!$user_id || !$this->ion_auth->user($user_id)->row()) {
            
            $this->session->set_flashdata('error', 'Usuário não encontrado');
            redirect('usuario');

        } else {

        $data = array (

            'titulo' => 'Editar Usuário',
            'usuario' => $this->ion_auth->user($user_id)->row(),
            'perfil' => $this->ion_auth->get_users_groups($user_id)->row(),
            'user_detail' => $this->core_model->getById('user_detail', array('id_user' => $user_id)),

        );

$this->form_validation->set_rules('first_name','', 'trim|required');
$this->form_validation->set_rules('last_name','', 'trim|required');
//$this->form_validation->set_rules('email','', 'trim|required|valid_email|callback_email_check');
$this->form_validation->set_rules('password','Senha', 'trim|min_length[5]|max_length[255]');
$this->form_validation->set_rules('confirm_password','Confirma', 'matches[password]');

if ($this->form_validation->run()) {
    
    $data = elements(

            array('first_name', 'last_name','email','username','password','active'
        
        ), $this->input->post()

    );

    $data = $this->security->xss_clean($data);

    $password = $this->input->post("password");

    if (!$password){
        unset($data['password']);
    } 

    if ($this->ion_auth->update($user_id, $data)) {

        $perfil_usuario_db = $this->ion_auth->get_users_groups($user_id)->row();

        $perfil_usuario_post = $this->input->post('perfil');


        $dataDetails = elements(

            array('address', 'mobile_number'
        
        ), $this->input->post()

    );

    $dataDetails = html_escape($dataDetails);

    $this->core_model->update('user_detail', $dataDetails, array('id_user' => $user_id));



        //If were diferent, update group. 
 if (($perfil_usuario_db->id != NULL && $perfil_usuario_post != NULL)  && ($perfil_usuario_db->id != $perfil_usuario_post)) {

    try {
            $this->ion_auth->remove_from_group($perfil_usuario_db->id, $user_id);
            $this->ion_auth->add_to_group($perfil_usuario_post, $user_id);
        } catch (Exception $e) {
            $this->db->trans_rollback();

            echo 'Exceção capturada: ',  $e->getMessage(), "\n";

        }
        }

        $this->session->set_flashdata('success', 'Dados salvos com sucesso');

    } else {
        $this->session->set_flashdata('eror', 'Erro ao salvar os dados');
    }
 
    if ($this->ion_auth->is_admin()) {
        
    redirect ('usuario');
    } else {
        redirect('home');

    }

} else {

    $data = array (

        'titulo' => 'Editar Usuário',
        'usuario' => $this->ion_auth->user($user_id)->row(),
        'perfil' => $this->ion_auth->get_users_groups($user_id)->row(),
        'user_detail' => $this->core_model->getById('user_detail', array('id_user' => $user_id)),

    );

    $this->load->view('/layout/header', $data);
    $this->load->view('/users/edit');
    $this->load->view('/layout/footer');

}



        }
    }
    }


    public function editUserDetails1 ($type=1) {
        //$type - 1: User Detail, $type - 2: Default Encarte

        $this->form_validation->set_rules('footer_text','', 'trim');
        $user_detail = $this->core_model->getById('user_detail', array('id_user' => $this->ion_auth->user()->row()->id));

        if ($this->form_validation->run()) {

            $footer_text = $user_detail->footer_text;
            $footer_text2 = $user_detail->footer_text2;


if (!$user_detail->footer_text) {

    $footer_text = 'Faça seu pedido pelo telefone: '.$this->input->post('mobile_number');
}
if (!$user_detail->footer_text2) {
  
    $footer_text2 = $this->input->post('address');
}


$data = array (
         'address' => $this->input->post('address'),
         'mobile_number' => $this->input->post('mobile_number'),
         'footer_text' => $footer_text,
         'footer_text2' => $footer_text2,
        'city' => $this->input->post('city'),
       'company_name' => $this->input->post('company_name')
         );
   
     $data = html_escape($data);

//print_r($data); die();

$data = html_escape($data);


$this->core_model->update('user_detail', $data, array('id_user' => $this->ion_auth->user()->row()->id));

redirect ('encarte/productList1');

} else {

    $data = array (

        'titulo' => 'Editar Usuário',
        'user_detail' => $user_detail,
    );

        $this->load->view('/layout/header', $data);
   
         $this->load->view('/users/editUserDetails');

        $this->load->view('/layout/footer');

}

    }



    public function editUserDetails () {
        //$type - 1: User Detail, $type - 2: Default Encarte

        $this->form_validation->set_rules('footer_text','', 'trim');
        $user_detail = $this->core_model->getById('user_detail', array('id_user' => $this->ion_auth->user()->row()->id));

        if ($this->form_validation->run()) {

            $footer_text = $user_detail->footer_text;
            $footer_text2 = $user_detail->footer_text2;



$data = array (
         'address' => $this->input->post('address'),
         'mobile_number' => $this->input->post('mobile_number'),
         'footer_text' => $this->input->post('footer_text'),
         'footer_text2' => $this->input->post('footer_text2'),
        'city' => $this->input->post('city'),
       'company_name' => $this->input->post('company_name')
         );
   
     $data = html_escape($data);



$data = html_escape($data);


$this->core_model->update('user_detail', $data, array('id_user' => $this->ion_auth->user()->row()->id));

redirect ('encarte/productList1');

} else {

    $data = array (

        'titulo' => 'Editar Usuário',
        'user_detail' => $user_detail,
    );

        $this->load->view('/layout/header', $data);
       

            $this->load->view('/users/editUserDetails');
  
        $this->load->view('/layout/footer');

        

}

    }


    public function changeUser() {

        if ($this->input->post("user")) {
            $this->session->set_userdata('user_id', $this->input->post("user"));
            redirect('encarte/allCarts');
        } else {

        $data = array (
            'titulo' => 'Produtos Cadastrados',
            'styles' => array ('vendor/datatables/dataTables.bootstrap4.min.css'),

            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js',
            'vendor/mask/jquery.mask.min.js',
            'vendor/mask/app.js'),   
            'userHistorys' => $this->core_model->getUserHistory(),  
            'users' => $this->core_model->get_all("users"),
           
        );
        $this->load->view('layout/header', $data);
        $this->load->view('users/changeUser');
        $this->load->view('layout/footer');
    }

      

    }
   
    public function adjustLoogo($type_logo=0, $idUser=0) {
        //1 - Logo Flyer, 2 - Logo Post
    if (($idUser == $this->ion_auth->user()->row()->id) || ( $this->ion_auth->user()->row()->id == 1)) {
  
       $userDetail = $this->core_model->getById('user_detail', array('id_user' =>  $idUser));

       $imageWidth = '';
       $imageHeight = '';
       $minSize = '';
       $maxSize = '';
        if ($type_logo == 1) {  
            if ($userDetail->image_width || $userDetail->image_height) {
                
                $imageWidth = $userDetail->image_width;
                $imageHeight = $userDetail->image_height; 
                $minSize = 50;
                $maxSize = 150;
            } 
        }elseif ($type_logo == 2) {
           
            if ($userDetail->image_width_big || $userDetail->image_height_big) {
              $imageWidth = $userDetail->image_width_big;
              $imageHeight = $userDetail->image_height_big; 
              $minSize = 10;
              $maxSize = 400;
          }
      }

        
       
        $data = array (
            'titulo' => 'Gerar Encarte',            
            'user_detail' => $this->core_model->getById('user_detail', array('id_user' =>  $idUser)),
            'type_logo' => $type_logo,
            'imageWidth' => $imageWidth,
            'imageHeight' => $imageHeight,
            'minSize' => $minSize,
            'maxSize' => $maxSize,
            'scripts' => array('vendor/datatables/jquery.dataTables.min.js', 
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'vendor/datatables/app.js',
         'vendor/mask/jquery.mask.min.js',
            'vendor/mask/app.js',
            'js/bootstrap-input-spinner.js',
          

            )
        );

      $this->load->view('layout/header', $data);
      $this->load->view('users/adjustLogo');   
      $this->load->view('layout/footer');
    

    } else {
        $this->session->set_flashdata('error', 'Acesso não permitido');
        redirect('home');
    }

    }

    public function changeLogoDimension ($type_logo,$id_user=0) {
       
       // if ($this->input->post("image_width") != '' || $this->input->post("image_height") != '') {
          
        if ($type_logo == 1) {
            $data = array (

                'image_width' => $this->input->post("image_width"),
                'image_height' => $this->input->post("image_height"),
                
                
            );
        } elseif ($type_logo == 2) {
            $data = array (

                'image_width_big' => $this->input->post("image_width"),
                'image_height_big' => $this->input->post("image_height"),
                
                
            );
          
        }
        $this->core_model->update('user_detail', $data, array('id_user' => $id_user));

   // }



        redirect('usuario/adjustLoogo/'.$type_logo.'/'.$id_user);

    }


}


?>
