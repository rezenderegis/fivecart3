
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">




                          <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> 

                            
                            <div class="col-lg-12">

<?php if ($message = $this->session->flashdata('info')): ?>
    <div class "row">
    <div class ="col-md-12">

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
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
                                        <h1 class="h4 text-gray-900 mb-4">
                                        <?=lang('login_subheading');?>    
                                        Seja bem vindo!</h1>
                                    </div>
                                    <form class="user" name="form_auth" method="POST" action="<?=base_url('login/auth');?>">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                
                                                placeholder="Entre com seu e-mail">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                 placeholder="Digite sua senha">
                                        </div>
                                      
  

                                        <button type="submit"  class="btn btn-primary btn-user btn-block">
                                            Entrar
</button>
                                        <hr>

<!--                                        
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                        -->
                                    </form>
                                    <hr>
                                    <div class="text-center">  
                                        <a class="small" href="<?php echo base_url('account/forgotPasswordFormEmail/');?>">Esqueceu a Senha?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('account/add2');?>">Criar uma Conta!</a>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>

            </div>

        </div>

        

    </div>

    