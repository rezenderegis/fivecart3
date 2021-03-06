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

    public function index($idProduct=0,$nameImage='')
    {
       
            $productData = $this->core_model->getById('products', array('id' => $idProduct));
            $this->load->view('/layout/header');
            $this->load->view('products/upload', array('error' => '0', 'idProduct' => $idProduct,
             'nameImage' => $nameImage, 'productIdFromUpload' => '', 'productData' => $productData));
            $this->load->view('/layout/footer');

    }

    public function do_upload($idProduct=0)
 
    {
      date_default_timezone_set('America/Sao_Paulo');

         
     
          $config['upload_path']          = './images/Products/';

            $config['allowed_types']        = 'gif|jpg|png|jpeg';

          //  $config['max_size']             = 5120;
          //  $config['max_width']            = 1024;
         //   $config['max_height']           = 768;
         $config['detect_mime']           = true;
         $config['mod_mime_fix']           = true;

         $config['remove_spaces']           = true;

         $config['file_name']           = $this->ion_auth->user()->row()->id.'_'.date('Ymd-H-i-s');

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('userfile'))
            {

                    $error = array('error' => $this->upload->display_errors(),
                    'productIdFromUpload' => '',
                    'idProduct' => $idProduct, 'nameImage' => '', 'productData' => ''
                
                );
       
                $this->load->view('/layout/header');

                    $this->load->view('products/upload', $error);
                    $this->load->view('/layout/footer');

            }
            else
            {
                   
                    $data = array('upload_data' => $this->upload->data());
                    $uploadData = $data['upload_data'];
                    
                       // print_r($uploadData); die();
                    $data = array (
                        'image_link' => $uploadData['file_name'], 'image_name_origin' => $uploadData['client_name']);
 
                    $this->core_model->update('products', $data, array('id' => $this->input->post('productId')));
                    $productData = $this->core_model->getById('products', array('id' => $idProduct));

                  // echo  $data['file_name'];
                   //echo "<br/>";
                   $fileName = $uploadData['file_name'];

                 $dataProductId = array (
                        'productIdFromUpload' => $fileName,
                        'idProduct' => $idProduct, 'nameImage' => '', 'productData' => $productData, 'error' => '0');

                        $productId = $this->input->post('productId');
                      
                        $this->load->view('/layout/header');
                        $this->load->view('products/upload', $dataProductId);
                        $this->load->view('/layout/footer'); 
                        
            }
            
    }
}
?>