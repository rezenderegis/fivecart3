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
                
                if ( $this->ion_auth->register($username, $password,$email,$aditional_data,$group)) {
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
        );

$this->form_validation->set_rules('first_name','', 'trim|required');
$this->form_validation->set_rules('last_name','', 'trim|required');
$this->form_validation->set_rules('email','', 'trim|required|valid_email|callback_email_check');
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
    );

    $this->load->view('/layout/header', $data);
    $this->load->view('/users/edit');
    $this->load->view('/layout/footer');

}



        }
    }
    }







}


?>