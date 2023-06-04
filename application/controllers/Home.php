<?php
defined ('BASEPATH') OR exit ('Not allowed!');

class Home extends CI_Controller, BaseController {

    
    public function __construct () {
        

        parent::__construct();
        $this->load->helper('url');
        $this->lang->load($this->session->userdata['userLanguage'], $this->session->userdata['userLanguage']);

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão expirou');
            redirect ('login');
        }

    }

    public function index() {
        $this->load->view('layout/header');

        $this->load->view('home/index');
        
        $this->load->view('layout/footer');



    }

   


}
