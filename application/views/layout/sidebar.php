     <!-- Sidebar -->
     <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('encarte/productList1'); ?>">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas"></i>
        <!-- bg-login-image-->
    </div>
    <div class="sidebar-brand-text mx-3">Meus Encartes<sup></sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<?php if ($this->ion_auth->is_admin()): ?>
<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Administrativo</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Administrativo</h6>
            <a class="collapse-item" href="<?=base_url('encarte/productList'); ?>"> Meus Encartes</a>
            <a class="collapse-item"  href="<?=base_url('usuario'); ?>"><i class="fas fa-users"></i> Usuários</a>
            <a class="collapse-item"  href="<?=base_url('product/showAllProducts'); ?>"><i class="fas fa-users"></i> Imagem Produtos</a>

        </div>
    </div>
</li>

<?php endif; ?>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Addons
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item active">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
        aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Encarte</span>
    </a>
    <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Encartes</h6>
            <a class="collapse-item" href="<?=base_url('encarte/allCarts'); ?>">Modelos Disponíveis</a>
            <a class="collapse-item" href="<?=base_url('encarte/productList1'); ?>"> Meus Encartes</a>
            <a class="collapse-item" href="<?=base_url('product'); ?>">Produtos</a>
            <a class="collapse-item" href="<?=base_url('usuario/editUserDetails'); ?>">Detalhes do Usuário</a>

          
        </div>
        
    </div>
    
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

   <!-- Content Wrapper -->
   <div id="content-wrapper" class="d-flex flex-column">
