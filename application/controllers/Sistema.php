<?php
defined ('BASEPATH') OR exit ('Not allowed!');

class Sistema extends CI_Controller {

    
    public function __construct () {

        parent::__construct();
        $this->load->helper('url');

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão expirou');

            redirect ('login');

        }

    }



}