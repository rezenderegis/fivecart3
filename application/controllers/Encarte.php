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

    public function index() {
        $this->load->view('layout/header');

        $this->load->view('encarte/encarte');
        $this->load->view('layout/footer');

     

    }

    public function new() {
       // print_r($_REQUEST);
        //print_r($_SESSION);
        //die();
        $this->load->view('layout/header');

        $this->load->view('encarte/selectProduct');
        $this->load->view('layout/footer');


    }


}