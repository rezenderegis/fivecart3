

   <?php //$this->load->view('layout/sidebar'); ?>

     
            <!-- Main Content -->
            <div id="content">

               <?php $this->load->view('layout/navbar');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
  </ol>
</nav>

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


<?php if ($message = $this->session->flashdata('success')): ?>
    <div class "row">
    <div class ="col-md-12">

    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><i class="far fa-thumbs-up"></i><?php echo $message;?></strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>
</div>
<?php endif; ?>   

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
                        <div class="card-header py-3">

                        <a title="Cadastrar Novo Usuário" href="<?php echo base_url('usuario/add');?>" class="btn btn-success btn-sm float-right"><i class="fas fa-user-plus"></i>&nbsp;Novo</a>


                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Login</th>
                                            <th>Categoria</th>
                                            <th>Criado</th>
                                            <th>Ultimo Login</th>

                                            <th class="text-center">Ativo</th>
                                            <th class="text-right no-sort">Action</th>
											<th>Logo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
  
                                        <?php foreach ($usuarios as $user) : ?>
                                        <tr>
                                            <td><?=$user['id']?></td>
                                            <td><?=$user['username'] ?></td>
                                            <td><?=$user['email'] ?></td>
                                         
                                                <td><?=$user['shop_type_description'] ?></td>

                                         
                                                <td><?=$user['created_on1'] ?></td>
                                                <td><?=$user['last_login1'] ?></td>
 
                                            <td class="text-center pr-4"><?php echo ($user['active']) == 1 ? '<span class="badge badge-info btn-sm">Sim</span>' : '<span class="badge badge-warning">Não</span>' ?></td>
                                            <td class="text-right">
                                                <a title="Editar" href="<?php echo base_url('/usuario/edit/'.$user['id']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-user-edit"></i></a> 
                                                <a title="Excluir" href="javascript(void)" data-toggle="modal" data-target="#user-<?php echo $user['id']; ?>" class="btn btn-sm btn-danger"><i class="fas fa-user-times"></i></a> 

                                            </td>
											<td>
																					<img src="<?php echo $user['image_address']; ?>" alt="View Image" style="width: 150px; height: 150px;">

                                          </td>
                                        </tr>


<!-- Logout Modal-->
<div class="modal fade" id="user-<?php echo $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja deletar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Para excluir o registro cliquem em Sim</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Não</button>
                    <a class="btn btn-danger btn-sm" href="<?php echo base_url('usuario/delete/'.$user['id']);?>">Sim</a>
                </div>
            </div>
        </div>
    </div>









                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>





                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
