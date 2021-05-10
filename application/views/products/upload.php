
   <?php $this->load->view('layout/sidebar'); ?>

            <!-- Main Content -->
            <div id="content">

               <?php $this->load->view('layout/navbar');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                   
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
                        <div class="card-header py-3">

                            <a title="Voltar" href="<?php echo base_url('Home')?>" class="btn btn-success btn-sm float-right"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>

                        </div>

                        <div class="card-body">
  <?php echo form_open_multipart('upload/do_upload/'.$idProduct);?>
  <div class="form-group">
      <div class="col-md-4">
      <label >Arquivo</label>
    <input type="file" class="form-control" name="userfile" size="20">
    <?php echo form_error('name', '<small class = "form-text text-danger">','</small>');?>
  </div>
  
</div>
<?php echo $idProduct; ?>
<input type="hidden" name="productId" value="<?php echo $idProduct; ?>">


  <button type="submit" class="btn btn-primary btn-sm">Upload</button>
</form>
           
                            </div>
                        </div>

     <?php 
     echo $error; 
     if ($error == '0') {
    echo "IMAGE". $productData->image_link;
    // if ($productIdFromUpload) { ?>
     <div class="container_picture">

    <img src="<?= base_url() . "images/Products/".$productData->image_link; ?>" alt="Snow" width="200" height="250">
</div>
     
     <?php 
     } else {
       echo $error;
     }
  //   }

     ?>

                    </div>





                </div>
                <!-- /.container-fluid -->

            </div>



            <!-- End of Main Content -->
