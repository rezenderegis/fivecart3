<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '435688927479728'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=435688927479728&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->




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
                            <h1 class="h4 text-gray-900 mb-4">New User</h1>
                        </div>
                        <form class="user" method="POST" name="form_add2">


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
<div class="form-group">
<!--
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName" name="first_name"
                                        placeholder="Nome" value="<?=set_value('first_name');?>">
                                        <?php echo form_error('first_name', '<small class = "form-text text-danger">','</small>');?>

                                </div>
-->                          
                            
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email"
                                    placeholder="Email" value="<?=set_value('email');?>">
                                    <?php echo form_error('email', '<small class = "form-text text-danger">','</small>');?>

                            </div>

                            <div class="form-group">
                                <input type="mobile_numer" class="form-control form-control-user" id="exampleInputEmail" name="mobile_number"
                                    placeholder="Phone" value="<?=set_value('mobile_number');?>">
                                    <?php echo form_error('mobile_number', '<small class = "form-text text-danger">','</small>');?>

                            </div>
                            <!--
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="city"
                                    placeholder="Cidade" value="<?=set_value('city');?>">
                                    <?php echo form_error('city', '<small class = "form-text text-danger">','</small>');?>

                            </div>

                            <div class="form-group">
                                <input type="mobile_numer" class="form-control form-control-user" id="exampleInputEmail" name="address"
                                    placeholder="Endereço da Empresa" value="<?=set_value('address');?>">
                                    <?php echo form_error('address', '<small class = "form-text text-danger">','</small>');?>

                            </div>
-->
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="company_name"
                                    placeholder="Company Name" value="<?=set_value('company_name');?>" maxlength="25">
                                    <?php echo form_error('company_name', '<small class = "form-text text-danger">','</small>');?>

                            </div>

                            
                            <div class="form-group">
                                <select class="form-control " name="shop_type">
                                <option value="">Business</option>
                                <option value="1">Supermarket</option>
                                <option value="2">Beef House</option>
                                <option value="3">Fruit House</option>
                                <option value="4">Beauth</option>
                                <option value="5">Sandwich</option>
                                <option value="6">Restaurant</option>
                                <option value="7">liquor</option>
                                <option value="99">Another</option>

                                </select>
                                <?php echo form_error('shop_type', '<small class = "form-text text-danger">','</small>');?>

                            </div>
                            <div class="form-group">
                                <select class="form-control " name="language">
                                <option value="">Language</option>
                                <option value="english">English</option>
                                <option value="portuguese">Portuguese</option>


                                </select>
                                <?php echo form_error('language', '<small class = "form-text text-danger">','</small>');?>

                            </div>
                            <div class="form-group">
                                <select class="form-control " name="country">
                                <option value="">Country</option>
                                <option value="brasil">Brasil</option>
                                <option value="united_states">United States</option>


                                </select>
                                <?php echo form_error('country', '<small class = "form-text text-danger">','</small>');?>

                            </div>


                            
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" name="password"
                                        id="exampleInputPassword" placeholder="Password">
                                        <?php echo form_error('password', '<small class = "form-text text-danger">','</small>');?>

                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleRepeatPassword" placeholder="Repeat Password" name="confirm_password">
                                        <?php echo form_error('confirm_password', '<small class = "form-text text-danger">','</small>');?>

                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-user btn-block btn-sm">Save</button>
 
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?php echo base_url('account/forgotPasswordFormEmail/');?>">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?php echo base_url('login');?>">Already have an account? Log in!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>