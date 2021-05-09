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

    public function index($idProduct=0)
    {


         $this->load->view('/layout/header');
            $this->load->view('products/upload', array('error' => ' ', 'idProduct' => $idProduct ));
            $this->load->view('/layout/footer');

    }

    public function do_upload($idProduct=0)
 
    {
       
            $config['upload_path']          = './images/';
            $config['allowed_types']        = 'gif|jpg|png';
            //$config['max_size']             = 100;
          //  $config['max_width']            = 1024;
         //   $config['max_height']           = 768;

            $this->load->library('upload', $config);
          //   print_r($config); die();
            if ( ! $this->upload->do_upload('userfile'))
            {
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('upload/upload', $error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                    $uploadData = $data['upload_data'];
                    
                    $data = array (
                        'image_link' => $uploadData['file_name']);
                      //  echo "produto". $idProduct; die();
                    //    print_r($data); die();
                    $this->core_model->update('products', $data, array('id' => $this->input->post('productId')));

                  // echo  $data['file_name'];
                 //  echo "<br/>";
                



                    $this->load->view('upload/upload_success', $data);
            }
    }
}
?>