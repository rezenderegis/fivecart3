
<body class="bg-gradient-primary">





<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>


                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            
                            <h1 class="h4 text-gray-900 mb-4">Altere sua senha!</h1>
                        </div>

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
                        <form class="user" method="POST" name="form_forgotPasswordFormEmail">
                                

                            <div class="form-group row">
                                
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email"
                                    placeholder="Email" value="<?=set_value('email');?>">
                                    <?php echo form_error('email', '<small class = "form-text text-danger">','</small>');?>

                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-user btn-block btn-sm">Enviar</button>
 
                        </form>
                    
                        <hr>
                      
                        
                      
                    </div>
                    <div class="text-center">  
                                        <a class="small" href="<?php echo base_url('login');?>">Voltar</a>
                                    </div>  
                </div>
            </div>
        </div>
    </div>

</div>