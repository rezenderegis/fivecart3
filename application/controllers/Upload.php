<?php
defined ('BASEPATH') OR exit ('Not allowed!');

class Upload extends CI_Controller {
    


public function __construct()
    {
            parent::__construct();
            $this->load->helper(array('form', 'url'));

            if (!$this->ion_auth->logged_in()) {
                $this->session->set_flashdata('info', 'Sua sessão expirou');
                redirect ('login');
            }

    }

    public function index()
    {
            $this->load->view('upload/upload', array('error' => ' ' ));
    }

    public function do_upload()
    {
       
            $config['upload_path']          = base_url() . 'images/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);
            //    print_r($this->upload->do_upload('userfile'));
           //     die();
            if ( ! $this->upload->do_upload('userfile'))
            {
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('upload/upload', $error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());

                    $this->load->view('upload_success', $data);
            }
    }
}
?>