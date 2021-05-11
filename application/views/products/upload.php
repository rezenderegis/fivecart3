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
  <div class="alert alert-info" role="alert">
Regras para upload de arquivo
  <ul>
  <li> o arquivo deve ter no máximo 5M</li>
  <li> o arquivo deve ter estar no formato .PNG</li>

</ul>
</div>
      <div class="col-md-6">
      <label >Arquivo</label>

<div class="input-group">

<input type="file" class="form-control" id="userfile" name="userfile" aria-describedby="inputGroupFileAddon04" aria-label="Upload">

<input type="hidden" name="productId" value="<?php echo $idProduct; ?>">
<button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Button</button>
</div> 

</form>
           
<br/>
     <?php 
     
     if ($error == '0') { ?>
      <div class="alert alert-secondary" role="alert">
     <b> Imagem:</b> <?=$productData->image_link;?>
    </div>
    <?php
    // if ($productIdFromUpload) { ?>

    <img class="img-fluid img-thumbnail" src="<?= base_url() . "images/Products/".$productData->image_link; ?>" alt="Snow" width="200" height="250">
     
     <?php 
     } else { ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Erro!</strong> <?=$error ?>
  </div>
<?php 
     }
  //   }

     ?>
                            </div>

                        </div>


                    </div>





                </div>
                <!-- /.container-fluid -->

            </div>



            <!-- End of Main Content -->
