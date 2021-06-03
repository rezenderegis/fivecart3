

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
Dados do Seu Novo Encarte
</div> 
                   
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
                        <div class="card-header py-3">

                            <a title="Voltar" href="<?php echo base_url('encarte/allCarts')?>" class="btn btn-success btn-sm float-left"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>

                        </div>

                        <div class="card-body">
                            
<form method="POST" name="form_add">
  <div class="form-group">
      <div class="col-md-4">
      <label >Descrição do Encarte</label>
    <input type="text" class="form-control" name="description" placeholder="Descrição" value="" maxlength="31">
    <?php echo form_error('description', '<small class = "form-text text-danger">','</small>');?>
  </div>

  <div class="col-md-4">
      <label >Texto Cabeçalho Direita</label>
    <input type="text" class="form-control" name="header2" placeholder="Texto Cabeçalho Direita" value="" maxlength="21">
    <?php echo form_error('header2', '<small class = "form-text text-danger">','</small>');?>
  </div>


  
    <div class="col-md-4">
      <label ></label>

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
