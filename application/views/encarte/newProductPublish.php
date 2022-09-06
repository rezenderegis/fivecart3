

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

 <form method="POST" name="form_add">

 <div class="form-group">
  <div class="col-md-4">
  <label >Nome do Encarte</label>
<input type="text" class="form-control" name="description" placeholder="Descrição" value="">
<?php echo form_error('name', '<small class = "form-text text-danger">','</small>');?>
</div>
<div class="col-md-4">
      <label ></label>
  </div>
</div>

  <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
</form>






<div class="card-header py-3">
<label >Produtos</label>

<form method="POST" name="form_addProduct" action ="<?php echo base_url('encarte/addProduct/'.$idProductList);?>">
<br>
<select class="form-control form-control-lg" name="product">
<?php foreach ($products as $product) {?>
<option value="<?php echo $product['id'];?>"><?php echo $product['name'];?></option>

<?php }?>
</select>
<br>
  <button type="submit" class="btn btn-primary">Adicionar Produto</button>

</form>

        
                        <a title="Gerar Encarte" href="<?php echo base_url('encarte/index/'.$idProductList);?>" class="btn btn-success btn-sm float-right"><i class="fas fa-box-open"></i>&nbsp;Gerar Encarte</a>


                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Produto</th>
                                            <th>Preço</th>
                                            <th class="text-right no-sort">Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php //print_r($productPublish); die();?>
                                        <?php foreach ($productPublish as $productPub) : ?>
                                        <tr>
                                            <td><?=$productPub['id_product_publish']?></td>
                                            <td><?=$productPub['name'] ?></td>
                                            <td><?=$productPub['price']?></td>
                  
                                            <td class="text-right">
                                            <a title="Editar" href="<?php echo base_url('/encarte/editProductPublish/'.$productPub['id_product_publish'].'/'.$productPub['id_publish']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a> 
                                                <a title="Excluir" href="javascript(void)" data-toggle="modal" data-target="#user-<?php echo $productPub['id_product_publish']; ?>" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a> 

                                            </td>
                                            
                                        </tr>


<!-- Logout Modal-->

<div class="modal fade" id="user-<?php echo $productPub['id_product_publish']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <a class="btn btn-danger btn-sm" href="<?php echo base_url('encarte/deleteProduct/'.$productPub['id_product_publish'].'/'.$productPub['id_publish']);?>">Sim</a>
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
