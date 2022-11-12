<?php
defined ('BASEPATH') OR exit ('Not allowed!');

class Help extends CI_Controller {

    
    public function __construct () {

        parent::__construct();
        $this->load->helper('url');

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão expirou');
            redirect ('login');
        }

    }

    public function new($type, $publishId) {

        $helpFundo = $this->core_model->getById('help', array('id_user' => $this->ion_auth->user()->row()->id, 'id_publish' => $publishId,'type_help' => 1, 'status' => 1));
        $helpLogo = $this->core_model->getById('help', array('id_user' => $this->ion_auth->user()->row()->id, 'id_publish' => $publishId,'type_help' => 2, 'status' => 1));
      
        if ($type == 1 && $helpFundo) {
            $this->session->set_flashdata('success', 'Solicitação em processamento! Aguarde!');

            redirect('encarte/productPublish/'.$publishId);
        } else if ($type == 2 && $helpLogo) {
            $this->session->set_flashdata('success', 'Solicitação em processamento! Aguarde!');

            redirect('encarte/productPublish/'.$publishId);
        } else {
        
        $data = array (
            'id_user' => $this->ion_auth->user()->row()->id,
            'type_help' => $type,
            'id_publish' => $publishId,
        );

       $this->core_model->insert('help', $data);



        $this->session->set_flashdata('success', 'Solicitação registrada! Em processamento!');

        redirect('encarte/productPublish/'.$publishId);
    }
    
    }




}