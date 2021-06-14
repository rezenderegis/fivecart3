

<style>
div.cabecalho {
	margin: 1em 0 0.5em 0;
	font-weight: normal;
	position: relative;
	text-shadow: 0 -1px rgba(0,0,0,0.6);
	font-size: 28px;
	line-height: 40px;
	background: #355681;
	background: rgba(53,86,129, 0.8);
	border: 1px solid #fff;
	padding: 5px 15px;
	color: white;
	border-radius: 0 10px 0 10px;
	box-shadow: inset 0 0 5px rgba(53,86,129, 0.5);
	font-family: 'Muli', sans-serif;
}
</style>
  




   <?php $this->load->view('layout/sidebar'); ?>

     
            <!-- Main Content -->
            <div id="content">

               <?php $this->load->view('layout/navbar');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="cabecalho">
                Insira a logo da sua Empresa
</div>
       

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Usuários</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
  </ol>
</nav>

                   
 <!-- DataTales Example -->
 <div class="card shadow mb-4">

 

                        <div class="card-body">
<form method="POST" name="form_editUserDetails">
  <div class="form-group">
      <div class="col-md-4">
      <label >Rodapé 1 (Dica: Colocar Telefone)</label>
    <input type="text" class="form-control" name="footer_text" placeholder="Rodapé" value="<?php echo $user_detail->footer_text;?>" maxlength="49">
    <?php echo form_error('footer_text', '<small class = "form-text text-danger">','</small>');?>
  </div>

    <div class="col-md-4">
      <label >Rodapé 2 (Dica - Colocar Endereço)</label>
    <input type="text" class="form-control" name="footer_text2" placeholder="Rodapé 2" value="<?php echo $user_detail->footer_text2;?>" maxlength="73">
    <?php echo form_error('footer_text2', '<small class = "form-text text-danger">','</small>');?>
  </div>
</div>
<a title="Atualizar Logo" href="<?php echo base_url('uploadFile/uploadFile/'.$user_detail->id_user);?>" class="btn btn-success btn-sm float-center"><i class="fas fa-images"></i>&nbsp;Atualizar Logo</a>
<br/><br/>
<div class="alert alert-secondary col-md-4" role="alert">    
     <b> Logo</b> 
    </div>
    <div>
    <img class="img-fluid img-thumbnail bg-gradient-light" src="<?= base_url() . "images/logos/".$user_detail->image_link; ?>" alt="Snow" width="200" height="250">
                          </div>
<br/>


  <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
</form>




                        
                            </div>
                        </div>
                    </div>





                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
