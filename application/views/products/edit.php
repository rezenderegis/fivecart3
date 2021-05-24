

   <?php $this->load->view('layout/sidebar'); ?>

     
            <!-- Main Content -->
            <div id="content">

               <?php $this->load->view('layout/navbar');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

       

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Usuários</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
  </ol>
</nav>

                   
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
                        <div class="card-header py-3">

                            <a title="Voltar" href="<?php echo base_url('Home')?>" class="btn btn-success btn-sm float-right"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>

                        </div>

                        <div class="card-body">
 <?php 
  $editValue = '';
 if ($this->ion_auth->user()->row()->id != $product->id_owner) {
 $editValue = "DISABLED"; }  ?>                           
<form method="POST" name="form_edit">
  <div class="form-group">
      <div class="col-md-4">
      <label >Nome do Produto</label>
    <input type="text" class="form-control" name="name" placeholder="Nome do Produto"  value="<?php echo $product->name;?>"  >
    <?php echo form_error('name', '<small class = "form-text text-danger">','</small>');?>
  </div>
  
    <div class="col-md-4">
      <label >Descrição do Produto</label>
    <input type="text" class="form-control" name="description" placeholder="Descrição do Produto" value="<?php echo $product->description;?>">
    <?php echo form_error('description', '<small class = "form-text text-danger">','</small>');?>

  </div>
  
    <div class="col-md-4">
      <label >Código de Barras</label>
    <input type="text" class="form-control" name="barcode" placeholder="Código de Barras" value="<?php echo $product->bar_code;?>" >
    <?php echo form_error('barcode', '<small class = "form-text text-danger">','</small>');?>
  
  </div>
  <div class="col-md-4">
      <label >Categoria</label>
    <input type="text" class="form-control" name="id_cathegory" placeholder="Categoria" value="<?php echo $product->id_cathegory;?>" >
    <?php echo form_error('id_cathegory', '<small class = "form-text text-danger">','</small>');?>
  
  </div>
  <!--
    <div class="col-md-4">
      <label >Situação</label>
    <input type="text" class="form-control" name="status" placeholder="Situação" value="<?php echo $product->status;?>"<?=$editValue; ?> >
    <?php echo form_error('status', '<small class = "form-text text-danger">','</small>');?>
    </div>
    <div class="col-md-4">
      <label >Preço</label>
    <input type="text" class="form-control form-control-user-date money" name="price" placeholder="Situação" value="<?php echo $product_price->price;?>">
    <?php echo form_error('price', '<small class = "form-text text-danger">','</small>');?>
    </div>
   -->
</div>

  <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
</form>




                        
                            </div>
                        </div>
                    </div>





                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
