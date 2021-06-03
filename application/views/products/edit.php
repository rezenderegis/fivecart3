

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

                            <a title="Voltar" href="<?php echo base_url('product')?>" class="btn btn-success btn-sm float-right"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>

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
    <input type="text" class="form-control" name="name" placeholder="Nome do Produto"  value="<?php echo $product->name;?>"  maxlength="31">
    <?php echo form_error('name', '<small class = "form-text text-danger">','</small>');?>
  </div>
  
    <div class="col-md-4">
      <label >Descrição do Produto</label>
    <input type="text" class="form-control" name="description" placeholder="Descrição do Produto" value="<?php echo $product->description;?>" maxlength="31">
    <?php echo form_error('description', '<small class = "form-text text-danger">','</small>');?>

  </div>
  
  <!--
    <div class="col-md-4">
      <label >Situação</label>
    <input type="text" class="form-control" name="status" placeholder="Situação" value="<?php echo $product->status;?>"<?=$editValue; ?> >
    <?php echo form_error('status', '<small class = "form-text text-danger">','</small>');?>
    </div>
 -->

 <div class="form-group col-md-4">
    <label >Segmento do Produto</label>

                                <select class="form-control " name="shop_type">
                                <option value=""></option>
                                <option value="1" <?php echo ($product->shop_type == 1) ? 'selected' : '' ?>>Supermercado</option>
                                <option value="2" <?php echo ($product->shop_type == 2) ? 'selected' : '' ?>>Açougue</option>
                                <option value="3" <?php echo ($product->shop_type == 3) ? 'selected' : '' ?>>Verdurão</option>
                                <option value="4" <?php echo ($product->shop_type == 4) ? 'selected' : '' ?>>Cosméticos</option>
                                <option value="5" <?php echo ($product->shop_type == 5) ? 'selected' : '' ?>>Hamburgeria</option>
                                <option value="6" <?php echo ($product->shop_type == 6) ? 'selected' : '' ?>>Restaurante</option>
                                <option value="7" <?php echo ($product->shop_type == 7) ? 'selected' : '' ?>>Outros</option>

                                </select>
                                <?php echo form_error('shop_type', '<small class = "form-text text-danger">','</small>');?>

                            </div>

    <div class="col-md-4">
      <label >Preço</label>
    <input type="text" class="form-control form-control-user-date money" name="price" placeholder="Situação" value="<?php echo $product_price->price;?>">
    <?php echo form_error('price', '<small class = "form-text text-danger">','</small>');?>
    </div>
   
</div>

  <button type="submit" class="btn btn-primary btn-sm">Salvar</button>

                            
  <?php if ($product->id_owner == $this->ion_auth->user()->row()->id) {?>

<a title="Excluir" href="javascript(void)" data-toggle="modal" data-target="#user-<?php echo $product->id; ?>" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Excluir</a> 
<?php }?>


<?php //print_r($product); die();?>
<!-- Logout Modal-->
<div class="modal fade" id="user-<?php echo $product->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja deletar?</h5>
<button class="close" type="button" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">Para excluir o registro cliquem em Sim</div>
<div class="modal-footer">
<button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Não</button>
<a class="btn btn-danger btn-sm" href="<?php echo base_url('usuario/delete/'.$product->id);?>">Sim</a>



</div>
</div>
</div>
</div>

</form>

     


                        
                            </div>
                        </div>
                    </div>





                </div>
                <!-- /.container-fluid -->


             




            </div>
            <!-- End of Main Content -->
