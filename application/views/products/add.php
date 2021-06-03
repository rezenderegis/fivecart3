
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
<div class="cabecalho">
<?php echo $titulo; ?>
</div>
                   
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
                        <div class="card-header py-3">

                            <a title="Voltar" href="<?php echo base_url('product')?>" class="btn btn-success btn-sm float-left"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>

                        </div>

                        <div class="card-body">
                            
<form method="POST" name="form_add">
  <div class="form-group">
      <div class="col-md-4">
      <label >Nome do Produto</label>
    <input type="text" class="form-control" name="name" placeholder="Nome do Produto" value="" maxlength="31">
    <?php echo form_error('name', '<small class = "form-text text-danger">','</small>');?>
  </div>
  
    <div class="col-md-4">
      <label >Descrição do Produto</label>
    <input type="text" class="form-control" name="description" placeholder="Descrição do Produto" value="" maxlength="31">
    <?php echo form_error('description', '<small class = "form-text text-danger">','</small>');?>

  </div>
  
   
  <!--
  <div class="col-md-4">
      <label >Categoria</label>
    <input type="text" class="form-control" name="id_cathegory" placeholder="Categoria" value="">
    <?php echo form_error('id_cathegory', '<small class = "form-text text-danger">','</small>');?>
  
  </div>
    <div class="col-md-4">
      <label >Situação</label>
    <input type="text" class="form-control" name="status" placeholder="Situação" value="">
    <?php echo form_error('status', '<small class = "form-text text-danger">','</small>');?>
    </div>
    -->

    <div class="form-group col-md-4">
    <label >Segmento do Produto</label>

                                <select class="form-control " name="shop_type">
                                <option value=""></option>
                                <option value="1">Supermercado</option>
                                <option value="2">Açougue</option>
                                <option value="3">Verdurão</option>
                                <option value="4">Cosméticos</option>
                                <option value="5">Hamburgeria</option>
                                <option value="6">Restaurante</option>
                                <option value="7">Outros</option>

                                </select>
                                <?php echo form_error('shop_type', '<small class = "form-text text-danger">','</small>');?>

                            </div>

    <div class="col-md-4">
      <label >Preço</label>
    <input type="text" class="form-control form-control-user-date money" name="price" placeholder="Preço" value="">
    <?php echo form_error('preco', '<small class = "form-text text-danger">','</small>');?>
    </div>
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
