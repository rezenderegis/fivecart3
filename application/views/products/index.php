

   <?php $this->load->view('layout/sidebar'); ?>

     
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

                        <a title="Cadastrar Novo Produto" href="<?php echo base_url('product/add');?>" class="btn btn-success btn-sm float-right"><i class="fas fa-box-open"></i>&nbsp;Novo</a>


                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-based dataTable"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome</th>
                                            <th>Preço</th>

                                            <th>Código Barras</th>
                                            <th>Situação</th>
                                            <th class="text-right no-sort">Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($products as $product) : ?>

                                        <tr>
                                            <td><?=$product['id']?></td>

                                          
                                            <td> <a  href="<?php echo base_url('/upload/index/'.$product['id']); ?>"> <?=$product['name'] ?></a> 
</td>
                                            <td class="money"><?=$product['price'] ?></td>

                                            <td><?=$product['bar_code'] ?></td>
                                            <td class="text-center pr-4"><?php echo ($product['name']) == 1 ? '<span class="badge badge-info btn-sm">Sim</span>' : '<span class="badge badge-warning">Não</span>' ?></td>
                                            <td class="text-right">
                                            <a title="Imagem" href=" <?php echo base_url('/upload/index/'.$product['id']); ?>" class="btn btn-sm btn-primary" ><i class="fas fa-images"></i></a> 

                                            <?php if ($product['id_owner'] != $this->ion_auth->user()->row()->id) {?>
                                                <a title="Editar" href="<?php echo base_url('/product/editPrice/'.$product['id']); ?>" class="btn btn-sm btn-primary" ><i class="fas fa-edit"></i> </a> 

                                                <?php } else {?>
                                                <a title="Editar" href="<?php echo base_url('/product/edit/'.$product['id']); ?>" class="btn btn-sm btn-primary" ><i class="fas fa-edit"></i> </a> 
                                               <?php }?>
                                                <?php if ($product['id_owner'] == $this->ion_auth->user()->row()->id) {?>

                                                <a title="Excluir" href="javascript(void)" data-toggle="modal" data-target="#user-<?php echo $product['id']; ?>" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a> 
                                                <?php }?>

                                            </td>

                                        </tr>

<?php //print_r($product); die();?>
<!-- Logout Modal-->
<div class="modal fade" id="user-<?php echo $product['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <a class="btn btn-danger btn-sm" href="<?php echo base_url('usuario/delete/'.$product['ID']);?>">Sim</a>
                
                
                
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
