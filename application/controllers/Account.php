<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller  {

    
    public function __construct () {

        parent::__construct();
        $this->load->helper('url');

    }


    public function add() {


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

                     'active' => 1,

                 );
                 $aditional_data = $this->security->xss_clean($aditional_data);
                 $group = array(2);
                 $group = $this->security->xss_clean($group);
                
                $idUserInserted = $this->ion_auth->register($username, $password,$email,$aditional_data,$group);
            
                
                if ( $idUserInserted) {
                


                $dataDetails = array (
                    'address' => $this->input->post('address'),
                    'mobile_number' => $this->input->post('mobile_number'),
                    'id_user' => $idUserInserted,
                    'footer_text' => 'Faça seu pedido pelo telefone: '.$this->input->post('mobile_number'),
                    'footer_text2' => $this->input->post('address'),
                    'image_link' => 'no-image-icon-23485.png',
                );
              
                $dataDetails = html_escape($dataDetails);

               $this->core_model->insert('user_detail', $dataDetails);
            
                $this->core_model->insertProductDefalt($idUserInserted);

                        $this->session->set_flashdata('success','Dados salvos com sucesso');

                } else {
                    $this->session->set_flashdata('error','Erro ao salvar os dados');

                }
                redirect ('login');
              
        } else {
            $data = array (
                'titulo' => 'Cadastrar Usuário',
            );

            $this->load->view('layout/header', $data);
            $this->load->view('account/index');
            $this->load->view('layout/footer');
        }
       
      
    }


    public function add2() {

        $this->form_validation->set_rules('first_name','', 'trim|required');
        $this->form_validation->set_rules('last_name','', 'trim|required');
        $this->form_validation->set_rules('email','', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('mobile_number','', 'trim|required');
        $this->form_validation->set_rules('address','', 'trim|required');
        $this->form_validation->set_rules('password','Senha', 'required|min_length[5]|max_length[255]');
        $this->form_validation->set_rules('confirm_password','Confirma', 'matches[password]');
        $this->form_validation->set_rules('city','', 'trim|required');

        /// print_r($this->form_validation);
      //  die();
        if ($this->form_validation->run()) {
            
         
                  $username = $this->security->xss_clean($this->input->post("username"));
                  $password = $this->security->xss_clean($this->input->post("password"));
                  $email = $this->security->xss_clean($this->input->post("email"));

                 $aditional_data = array (
                     'first_name' => $this->input->post('first_name'),
                     'last_name' => $this->input->post('last_name'),
                     'username' => $this->input->post('username'),
                     'active' => 1,
                 );
                 $aditional_data = $this->security->xss_clean($aditional_data);
                 $group = array(2);
                 $group = $this->security->xss_clean($group);
                
                $idUserInserted = $this->ion_auth->register($username, $password,$email,$aditional_data,$group);
            
                if ( $idUserInserted) {
                
                $dataDetails = array (
                    'address' => $this->input->post('address'),
                    'mobile_number' => $this->input->post('mobile_number'),
                    'id_user' => $idUserInserted,
                    'footer_text' => 'Faça seu pedido pelo telefone: '.$this->input->post('mobile_number'),
                    'footer_text2' => $this->input->post('address'),
                    'image_link' => 'no-image-icon-23485.png',
                    'city' => $this->input->post('city'),
                    'company_name' => $this->input->post('company_name'),


                );
              
                $dataDetails = html_escape($dataDetails);

               $this->core_model->insert('user_detail', $dataDetails);
            
                $this->core_model->insertProductDefalt($idUserInserted);

                        $this->session->set_flashdata('success','Dados salvos com sucesso');

                } else {
                    $this->session->set_flashdata('error','Erro ao salvar os dados');

                }
                redirect ('login');
              
        } else {

            $data = array (
                'titulo' => 'Cadastrar Usuário',
            );

            $this->load->view('layout/header', $data);
            $this->load->view('account/index2');
            $this->load->view('layout/footer');
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
            'usuarios' => $this->ion_auth->users()->result(), 

        );
       
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
$this->form_validation->set_rules('username','', 'trim|required');
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


    public function editUserDetails ($idUser=0) {

        $this->form_validation->set_rules('footer_text','', 'trim|required');

        if ($this->form_validation->run()) {


    $data = elements(

        array('footer_text', 'footer_text2'
    
    ), $this->input->post()

);

$data = html_escape($data);


$this->core_model->update('user_detail', $data, array('id_user' => $this->ion_auth->user()->row()->id));

redirect ('encarte/productList1');

} else {

    $data = array (

        'titulo' => 'Editar Usuário',
        'user_detail' => $this->core_model->getById('user_detail', array('id_user' => $this->ion_auth->user()->row()->id)),
    );

        $this->load->view('/layout/header', $data);
        $this->load->view('/users/editUserDetails');
        $this->load->view('/layout/footer');

}

    }

    public function forgotPassword() {

        $this->load->model("email_model");
        $this->email_model->enviar('rezenderegis@gmail.com  ','fabricio');

    }


    public function forgotPasswordChange($code=0) {
        $user_id = null;
     /*   if ($this->session->userdata('user_id') != $user_id && !$this->ion_auth->is_admin() ) {
            $this->session->set_flashdata('error', 'Usuário não encontrado');
            redirect('home');
        } {*/

      //      echo $hash; die();


$this->form_validation->set_rules('password','Senha', 'trim|min_length[5]|max_length[255]');
$this->form_validation->set_rules('confirm_password','Confirma', 'matches[password]');

if ($this->form_validation->run()) {
    
    $data = elements(

            array('password'
        
        ), $this->input->post()

    );

    $data = array(
 
        'password' => $this->input->post("password"),
        'forgotten_password_selector' => '',
     
     );

    $data = $this->security->xss_clean($data);

    $password = $this->input->post("password");
    $userData = $this->ion_auth->forgotten_password_check($code);
    if (!$userData) 
    {
        $this->session->set_flashdata('error', 'Erro no código');
        $this->load->view('/layout/header');
    $this->load->view('/account/forgotPassword');
    $this->load->view('/layout/footer');

    } else {    

    
    if ($this->ion_auth->update($userData->id, $data)) {


        $this->session->set_flashdata('success', 'Dados salvos com sucesso');

    } else {
        $this->session->set_flashdata('error', 'Erro ao salvar os dados');
    }
 
  

    
        redirect('login');
    }
    

} else {


    $user = $this->ion_auth->forgotten_password_check($code);
    
    if ($user)
    {
        $this->load->view('/layout/header');
        $this->load->view('/account/forgotPassword');
        $this->load->view('/layout/footer');

    } else 
    {
        $this->session->set_flashdata('error', 'Código inválido!');

        $this->load->view('/layout/header');
        $this->load->view('/account/forgotPasswordFormEmail');
        $this->load->view('/layout/footer');

    }

  

}



        
    
    }


    public function forgotPasswordFormEmail() {
       
        /*   if ($this->session->userdata('user_id') != $user_id && !$this->ion_auth->is_admin() ) {
               $this->session->set_flashdata('error', 'Usuário não encontrado');
               redirect('home');
           } {*/
   
             
    $this->form_validation->set_rules('email','', 'trim|required|valid_email');
    

   if ($this->form_validation->run()) {

    if (!$this->core_model->getById('users',array('email' => $this->input->post("email")))) {
        $this->session->set_flashdata('error', 'Esse e-mail não está cadastrado!');

        $this->load->view('/layout/header');
       $this->load->view('/account/forgotPasswordFormEmail');
       $this->load->view('/layout/footer');
    } else {
    
       $email = $this->security->xss_clean($this->input->post("email"));
   
       $this->load->model("email_model");
       $this->email_model->enviar($email);

       $this->session->set_flashdata('error', 'Verifique sua caixa de entrada!');

           redirect('login');
   
    }
   
   } else {
   
   
       $this->load->view('/layout/header');
       $this->load->view('/account/forgotPasswordFormEmail');
       $this->load->view('/layout/footer');
   
   }
   



       
       }
      
    





}


?>