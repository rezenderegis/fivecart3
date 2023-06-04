

   <?php //$this->load->view('layout/sidebar'); ?>

     
            <!-- Main Content -->
            <div id="content">

               <?php $this->load->view('layout/navbar');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

       

                   
 <!-- DataTales Example -->
 <div class="card shadow mb-4">

                        <div class="card-body">
<form method="POST" name="form_edit">
  <div class="form-group">
    <div class="col-md-4">
      <label ><?=lang('price');?></label>
   

    <input type="text" class="form-control form-control-user-date money" name="product_price" placeholder="<?=lang('price');?>" value="<?php if ($productPublish->price != 0.00) {echo $productPublish->price;}?>">
    <?php echo form_error('status', '<small class = "form-text text-danger">','</small>');?>
    </div>
    <input type="hidden" name="product_publish_id" value="<?php echo $productPublish->id_publish; ?>"
</div>
<br/>
  <button type="submit" class="btn btn-primary btn-sm"><?=lang('save');?></button>
</form>




                        
                            </div>
                        </div>
                    </div>





                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
