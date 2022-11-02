<?php
defined ('BASEPATH') OR exit ('Not allowed!');

class UploadFile extends CI_Controller {
    


public function __construct()
    {
            parent::__construct();
            $this->load->helper(array('form', 'url'));

            if (!$this->ion_auth->logged_in()) {
                $this->session->set_flashdata('info', 'Sua sessão expirou');
                redirect ('login');
            }

    }

    public function uploadFile($id=0,$nameImage='', $type='user_detail',$atribute_find='id_user')
    {
       
           $uploadData = $this->core_model->getById($type, array($atribute_find => $id));
          

          $this->load->view('/layout/header');
            $this->load->view('upload/uploadFile', array('error' => '0', 'idProduct' => $id,
             'nameImage' => $nameImage, 'productIdFromUpload' => '', 'uploadData' => $uploadData));
            $this->load->view('/layout/footer');

    }


    public function do_upload($id=1,$type='user_detail',$atribute_find='id_user')
 
    {

      date_default_timezone_set('America/Sao_Paulo');

      $location = '';
      //Location to save file by the type
      if ($type='user_detail') {
        $location = 'logos';
      }
      
        $config['upload_path']          = './images/'.$location.'/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 5120;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['detect_mime']          = true;
        $config['mod_mime_fix']         = true;
        $config['remove_spaces']        = true;
        $config['file_name']            = $this->ion_auth->user()->row()->id.'_'.date('Ymd-H-i-s');

        $this->load->library('upload', $config);

      
            if ( ! $this->upload->do_upload('userfile'))
            {
          
                    $error = array('error' => $this->upload->display_errors(),
                    'productIdFromUpload' => '',
                    'idProduct' => $id, 'nameImage' => '', 'productData' => ''
                
                );
       
                $this->load->view('/layout/header');

                $this->load->view('upload/uploadFile', $error);
                $this->load->view('/layout/footer');

            }
            else
            {
              
                    $data = array('upload_data' => $this->upload->data());
                    $uploadData = $data['upload_data'];
                    
                    $data = array (
                        'image_link' => $uploadData['file_name'], 'image_name_origin' => $uploadData['client_name']);
                                             
                    $this->core_model->update($type, $data, array($atribute_find => $this->input->post('genericIdUpload')));
                    $productData = $this->core_model->getById($type, array($atribute_find => $id));


                   $fileName = $uploadData['file_name'];

                 $dataUpload = array (
                        'productIdFromUpload' => $fileName,
                        'idProduct' => $id, 'nameImage' => '', 'uploadData' => $productData, 'error' => '0');

                       // $productId = $this->input->post('genericIdUpload');
                      
                        $this->load->view('/layout/header');
                        $this->load->view('upload/uploadFile', $dataUpload);
                        $this->load->view('/layout/footer'); 
                        
            }
            
    }


}
?>