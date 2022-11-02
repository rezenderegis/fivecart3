

   <?php //$this->load->view('layout/sidebar'); ?>

     
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
                       <!--
                        <div class="card-header py-3">
                            <a title="Voltar" href="<?php echo base_url('Home')?>" class="btn btn-primary btn-lg float-right"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
                        </div>
                        -->
                        <div class="card-body">
                         
<form method="POST" name="form_edit">
  <div class="form-group">
      <div class="col-md-6">
      <label >Descrição da Lista</label>
    <input type="text" class="form-control" name="description" placeholder="Descrição" value="<?php echo $publish->description;?>">
    <?php echo form_error('description', '<small class = "form-text text-danger">','</small>');?>
  
  </div>
  <?php if ($template->type_template == 1) {?>

  <div class="col-md-6">
      <label >Texto Cabeçalho Direita</label>
    <input type="text" class="form-control" name="header2" placeholder="Texto Cabeçalho Direita" value="<?php echo $publish->header2;?>" maxlength="21">
    <?php echo form_error('header2', '<small class = "form-text text-danger">','</small>');?>
  </div>
<?php }?>
  <div class="form-group">
      <div class="col-md-6">
      <label >Rodapé 1 (Dica: Colocar Telefone)</label>
    <input type="text" class="form-control" name="footer_text" placeholder="Rodapé" value="<?php echo $publish->footer_text;?>" maxlength="49">
    <?php echo form_error('footer_text', '<small class = "form-text text-danger">','</small>');?>
  </div>

    <div class="col-md-6">
      <label>Rodapé 2 (Dica - Colocar Endereço)</label>
    <input type="text" class="form-control" name="footer_text2" placeholder="Rodapé 2" value="<?php echo $publish->footer_text2;?>" maxlength="73">
    <?php echo form_error('footer_text2', '<small class = "form-text text-danger">','</small>');?>
  </div>
</div>
<?php if ($template->type_template == 1) {?>
<div class="form-group col-md-6">
    <label >Tamanho do Encarte</label>

                                <select class="form-control " name="column_amount">
                                <option value="3" <?php if ($publish->column_amount == 3) {echo 'selected';}?>>Mini - 3 Colunas</option>
                                <option value="4" <?php if ($publish->column_amount == 4) {echo 'selected';}?>>Médio - 4 Colunas</option>
                                <option value="5" <?php if ($publish->column_amount == 5) {echo 'selected';}?>>Grande - 5 Colunas </option>
                                <option value="6" <?php if ($publish->column_amount == 6) {echo 'selected';}?>>Grande - 6 colunas </option>
                                </select>
                                <?php echo form_error('column_amount', '<small class = "form-text text-danger">','</small>');?>

 </div>
<?php }?>

    <input type="hidden" name="product_id" value="<?php echo $publish->id; ?>"
</div>

  <button type="submit" class="btn btn-primary btn-lg">Salvar</button>
</form>




                        
                            </div>
                        </div>
                    </div>





                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
