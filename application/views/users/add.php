

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

                        <a title="Cadastrar Novo Usuário" href="<?php echo base_url('usuario')?>" class="btn btn-success btn-sm float-right"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>


                        </div>

                        <div class="card-body">
                            
<form method="POST" name="form_add">
  <div class="form-group">
      <div class="col-md-4">
      <label >Nome</label>
    <input type="text" class="form-control" name="first_name" placeholder="Seu Nome" value="<?=set_value('first_name');?>">
    <?php echo form_error('first_name', '<small class = "form-text text-danger">','</small>');?>
  </div>

    <div class="col-md-4">
      <label >Segundo Nome</label>
    <input type="text" class="form-control" name="last_name" placeholder="Segundo Nome" value="<?=set_value('last_name');?>">
    <?php echo form_error('last_name', '<small class = "form-text text-danger">','</small>');?>

  </div>

    <div class="col-md-4">
      <label >Login</label>
    <input type="text" class="form-control" name="email" placeholder="E-mail" value="<?=set_value('email');?>">
    <?php echo form_error('email', '<small class = "form-text text-danger">','</small>');?>
  
  </div>

    <div class="col-md-4">
      <label >Username</label>
    <input type="text" class="form-control" name="username" placeholder="Usuário" value="<?=set_value('username');?>">
    <?php echo form_error('username', '<small class = "form-text text-danger">','</small>');?>
    </div>

    <div class="form-group">
      <div class="col-md-4">
      <label >Telefone</label>
    <input type="text" class="form-control" name="mobile_number" placeholder="Telefone" value="">
    <?php echo form_error('mobile_numer', '<small class = "form-text text-danger">','</small>');?>
  </div>

    <div class="col-md-4">
      <label >Endereço</label>
    <input type="text" class="form-control" name="address" placeholder="Endereço" value="">
    <?php echo form_error('address', '<small class = "form-text text-danger">','</small>');?>
  </div>
</div>

    <div class="col-md-4">
      <label >Senha</label>
    <input type="password" class="form-control" name="password" placeholder="Senha" value="">
    <?php echo form_error('password', '<small class = "form-text text-danger">','</small>');?>
    </div>


    <div class="col-md-4">
      <label >Confirme sua Senha</label>
    <input type="password" class="form-control" name="confirm_password" placeholder="Confirme" value="">
    <?php echo form_error('confirm_password', '<small class = "form-text text-danger">','</small>');?>
    </div>

    <div class="col-md-4">
      <label >Ativo</label>
      <select class="form-control" name="active">
          <option value="0">Não</option>
          <option value="1">Sim</option>
</select>
    </div>

    <div class="col-md-4">
      <label>Perfil</label>
      <select class="form-control" name="perfil">
          <option value="2">Vendedor</option>
          <option value="1">Administrador</option>
          </select>
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
