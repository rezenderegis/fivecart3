

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">




<!--                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->

                            
                            <div class="col-lg-12">

<?php if ($message = $this->session->flashdata('info')): ?>
    <div class "row">
    <div class ="col-md-12">

    <div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong><?php echo $message;?></strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>
</div>
<?php endif; ?>  

<?php if ($message = $this->session->flashdata('error')): ?>
    <div class "row">
    <div class ="col-md-12">

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong><?php echo $message;?></strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>
</div>
<?php endif; ?>  
                                <div class="p-5">
                                    
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Seja bem vindo!</h1>
                                    </div>
                                  
                 
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

  <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
</form>





                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Esqueceu a Senha?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('account/add/');?>">Criar uma Conta!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        

    </div>

    