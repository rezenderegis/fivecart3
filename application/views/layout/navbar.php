 <!-- Topbar -->
 <nav class="navbar navbar-expand bg-gradient-primary topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>

<!--
<button style=" background-color: #4C71DE; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;"  onclick="goBack()">Voltar</button>
-->

<script>
function goBack() {
  window.history.back();
}
</script>
<!-- Topbar Navbar -->
<ul class="navbar-nav float-left">

<li class="nav-item">
        <a class="nav-link dropdown-toggle" href="<?=base_url('encarte/productList1'); ?>" id="userDropdown" role="button">
        <i class="fas fa-book-open fa-lg" style="color:white"></i>
        &nbsp;
        <span class="mr-2 d-none d-lg-inline text-white h3 ">Meus Encartes</span>
        </a>
    
    </li>

<li class="nav-item">
        <a class="nav-link dropdown-toggle" href="<?=base_url('encarte/allCarts'); ?>" id="userDropdown">
        
        <i class="fas fa-image fa-lg" style="color:white"></i>
        &nbsp;
        <span class="mr-2 d-none d-lg-inline text-white h3">Modelos</span>
        </a>
    
    </li>
    <li class="nav-item">
        <a class="nav-link dropdown-toggle" href="<?=base_url('product/index/0/1'); ?>" id="userDropdown" role="button">
        <i class="fas fa-box-open fa-lg" style="color:white"></i>  
        &nbsp;
        <span class="mr-2 d-none d-lg-inline text-white h3">Produtos</span>
        </a>
    
    </li>

    <?php 
    if ($this->ion_auth->is_admin()) { ?>
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            &nbsp;
            <span class="mr-2 d-none d-lg-inline text-white h3">Admin</span>
        </a>
        
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="<?=base_url('encarte/productList'); ?>">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-white h3"></i>
               &nbsp;
                Meus Encartes
            </a>
         
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?=base_url('usuario'); ?>">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-white h3"></i>
                &nbsp;
                Usuarios
            </a>
            <a class="dropdown-item" href="<?=base_url('encarte/getAllFlyers'); ?>">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-white h3"></i>
                &nbsp;
                Encartes Cadastrados
            </a>

            

        </div>
        
    </li>
    <?php } ?>
</ul>

<ul class="navbar-nav ml-auto">



    
    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           
           <i class="fas fa-user fa-sm fa-fw mr-2 text-white fa-lg"></i>

            <span class="mr-2 d-none d-lg-inline text-white h3">&nbsp;Bem vindo, <?=$this->ion_auth->user()->row()->first_name ?></span>
        </a>
        
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="<?php echo base_url('usuario/edit/'.$this->session->userdata('user_id'));?>">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-900 fa-lg"></i>
                Dados do Usuário
            </a>
            <a class="dropdown-item" href="<?=base_url('usuario/editUserDetails'); ?>">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-900 fa-lg"></i>
                Detalhes do Usuário
            </a>
       
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-900 fa-lg"></i>
                Sair
            </a>
        </div>
    </li>

</ul>

</nav>
<!-- End of Topbar -->