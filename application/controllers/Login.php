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

public function auth() {
   

    $identity = $this->security->xss_clean($this->input->post('email'));
    $password = $this->security->xss_clean($this->input->post('password'));
    $remember = FALSE; // remember the user
    //echo $identity."pass ".$password; die();
    //print_r($this->ion_auth->login($identity, $password, $remember)); die();
    if ($this->ion_auth->login($identity, $password, $remember)) {
        
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

public function logout() {

    $this->ion_auth->logout();

    redirect('login');

}



}