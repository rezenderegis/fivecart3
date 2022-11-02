<?php
defined ('BASEPATH') OR exit ('Not allowed!');

class Login extends CI_Controller {

   

    

    public function index() {

            $data = array(
                'titulo' => 'Login',
            );
       
            $this->load->view('layout/header', $data);
            $this->load->view('login/index');

            $this->load->view('layout/footer');

        

}

public function auth($emailReceived=0,$passwordReceived=0) {
   
    $identity = '';
    $password = '';

    if ($emailReceived != 0) {
        $identity = $emailReceived;
        $password = $passwordReceived;
    } else {
    $identity = $this->security->xss_clean($this->input->post('email'));
    $password = $this->security->xss_clean($this->input->post('password'));
    }
    $remember = FALSE; // remember the user
    //echo $identity."pass ".$password; die();
    $dataUser = $this->core_model->getById('users', array('email' => $this->input->post('email'), 'active' => 0));
    if ($dataUser) {
        $email = $this->input->post('email');

        /**    
        $this->session->set_flashdata('error', 'Seu e-mail ainda não foi confirmado. <br/>Cliqe no link para reeenviar!
        <a href="localhost:8888/fivecart3/account/resendCode/'.$email.'>">REENVIAR CÓDIGO</a> ');  
         * 
         */
        $this->load->model("email_model");

        $this->email_model->resendCode($this->input->post('email'));
        $this->session->set_flashdata('error', 'O código de acesso foi reenviado ao seu e-mail. <br/><b>Entre no seu e-mail e confirme</b>');
\       redirect ('login');
    } else {
        
        //$this->session->set_userdata('type_product', 'first');

    if ($this->ion_auth->login($identity, $password, $remember)) {
        $this->session->set_userdata('idpublish', '');

        $getProductPublish =  $this->core_model->get_all('publish', array ('id_user' => $this->ion_auth->user()->row()->id, 'status'=> 1 ));
        if (count($getProductPublish) > 0) {
            redirect('encarte/productList1');
        } else {
            redirect('encarte/allCarts');

        }

    } else {
        $this->session->set_flashdata('error', 'Usuário ou senha não encontrados!');
       redirect ('login');

    }
}

}

public function logout() {

    $this->ion_auth->logout();

    redirect('login');

}



}