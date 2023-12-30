<style>
  .imgProductInclude {

align: center;

    object-fit: scale-down;
    width:  100px;
    height: 100px;
    object-position: bottom;
    

}
  </style>
   <?php //$this->load->view('layout/sidebar'); ?>

   <?php $this->load->view('/layout/watsapp');?>

            <!-- Main Content -->
            <div id="content">

               <?php $this->load->view('layout/navbar');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">


<div class="cabecalho">
<?php echo $titulo; ?>
</div>
<?php if ($message = $this->session->flashdata('error')): ?>
    <div class "row">
    <div class ="col-md-12">

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong><?php echo $message;?></strong> 
  <a href="<?php echo base_url('encarte/allCarts');?>" class="p-1 mb-2 bg-warning text-dark">Clique Aqui</a>

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
  <br/>
  <div class="container">

  <?php 
  if ($this->session->userdata('idpublish')) { 
    ?>
                        
                                <a title="Voltar" href="<?=base_url('encarte/productPublish/'. $this->session->userdata('idpublish')); ?>"  class="btn btn-primary btn-bg float-left">&nbsp;Voltar</a>

                               
                                <?php }?>
  </div>
  <br/>
                      <div class="container">
                        <div class="row">
                          <div class="align-self-start">
                            <a title="Cadastrar Novo Produto" href="<?php echo base_url('product/add');?>" class="btn btn-primary btn-bg float-left"><i class="fas fa-box-open"></i>&nbsp;Novo</a>
                            &nbsp;
                          </div>

                        <div class="align-self-start">
                          &nbsp;
                          <a title="Meus Produtos" href="<?=base_url('product/index/0/1'); ?>" class="btn btn-primary btn-bg float-left"><i class="fas fa-box-open"></i>&nbsp;Meus Produtos</a>
                        </div>
                        <div class="align-self-start">
                                      
                        <a title="Produtos da Plataforma" href="<?=base_url('product/index/0/2'); ?>" class="btn btn-primary btn-bg float-left"><i class="fas fa-box-open"></i>&nbsp;Produtos da Plataforma</a>
                        </div>  

                        </div>
                      </div>

											<form method="POST" name="form_updateFoto"> <!-- Change 'update_products.php' to your actual update endpoint -->
    <div class="card-body">
        <div class="table-responsive">
            <table id="product_table" class="table table-based dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-right">Id</th>
                        <th>Select</th> <!-- Add a column for checkboxes -->
                        <th>Nome</th>
                        <th>Preço</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product) : ?>
                        <tr>
                            <td><?= $product['id'] ?></td>
                            <td>
                                <input type="checkbox" name="selected_products[]" value="<?= $product['id'] ?>">
                            </td>
                            <td>
                                <?php if ($product['id_owner'] != $this->ion_auth->user()->row()->id) { ?>
                                    <a title="Editar" href="<?php echo base_url('/product/editPrice/' . $product['id']); ?>"><?php echo $product['name'] ?></a>
                                <?php } else { ?>
                                    <a title="Editar" href="<?php echo base_url('/product/edit/' . $product['id']); ?>"><?php echo $product['name'] ?></a>
                                <?php } ?>
                            </td>
                            <td class="money"><?= $product['price'] ?></td>
                            <td class="text-right">
                                <a title="Imagem" href="<?php echo base_url('/upload/index/' . $product['id']); ?>" class="btn btn-sm btn-primary">
                                    <?php if ($product['image_link'] != null) { ?>
                                        <img src="<?php echo base_url('/images/Products/' . $product['image_link']); ?>" class="imgProductInclude">
                                    <?php } else { ?>
                                        <img src="<?php echo base_url('/images/Products/no_image.png'); ?>" class="imgProductInclude">
                                    <?php } ?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <button type="submit" class="btn btn-primary">Update Selected Products</button>
    </div>
</form>

                                </table>
                            </div>
                        </div>
                    </div>





                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <script>


$(document).ready(function () {

$('#product_table').DataTable({
"order": [[ 1, "desc" ]]
});
$('.dataTables_length').addClass('bs-select');
});




</script>
