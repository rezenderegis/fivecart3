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




                
<form method="POST" name="form_getAllFlyers">
  <div class="form-group">
  <div class="form-group col-md-4">
    <label >Tem Encarte</label>

                                <select class="form-control " name="has_flyer">
                                <option value="0">Todos</option>
                                <option value="1">Sim</option>
                                <option value="2">Não</option>
                             

                                </select>
    <div class="form-group col-md-4">
    <label >Tem Produto</label>

                                <select class="form-control " name="has_product">
                                <option value="0"></option>
                                <option value="1">Sim</option>
                                <option value="2">Não</option>
                             

                                </select>
                                <?php echo form_error('shop_type', '<small class = "form-text text-danger">','</small>');?>

                            </div>
                            <div class="form-group col-md-4">
    <label >Tem logo</label>

                                <select class="form-control " name="has_logo">
                                <option value=""></option>
                                <option value="1">Sim</option>
                                <option value="2">Não</option>
                             

                                </select>

                         
                                <?php echo form_error('shop_type', '<small class = "form-text text-danger">','</small>');?>

                            </div>


</div>


  <button type="submit" class="btn btn-primary btn-lg">Salvar</button>
</form>




                        







 <!-- DataTales Example -->
 <div class="card shadow mb-4">
  <br/>
                 

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="product_table" class="table table-bordered dataTable"  width="100%" cellspacing="0" >
                                
                                
                                <thead>
                                        <tr>
                                        <th>ID Publish</th>
                                            <th>Empresa</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Data Usuario</th>
                                            <th>Ultimo Login</th>
                                            <th>Data Encarte</th>
                                            <th>Date Update</th>

                                            <th>Id Publish</th>
                                            <th>ID User</th>
                                            <th>Description</th>
                                            <th>Prod Encarte</th>
                                            <th>Categoria</th>
                                            <th>Logo</th>
                                            <th>Link</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($publish as $pub) : ?>

                                        <tr>
                                        <td><?=$pub['id']?></td>
                                        
                                            <td><?=$pub['company_name']?></td>
                                            <td><?=$pub['email']?></td>
                                            <td><?=$pub['mobile_number']?></td>
                                            <td><?=$pub['created_on1']?></td>
                                            <td><?=$pub['last_login1']?></td>
                                            <td><?=$pub['date_flyer']?></td>
                                            <td><?=$pub['dateUpdate']?></td>
                                            <td>
                                            <a href="http://postater.com/publish/<?=$pub['id_user_post']?>/<?=$pub['id_publish']?>/0" class="btn btn-primary btn-sm" role="button" aria-disabled="true" id="showPictureButton"><i class="fa fa-file-picture-o"></i><?=$pub['id_publish']?></a>


                                            </td>
                                            <td><?=$pub['iduserenc']?></td>
                                            <td><?=$pub['description']?></td>
                                            <td><?=$pub['qtd_product']?></td>
                                            
                                            <td><?=$pub['shop_type_description']?></td>

                                            <td>
                                            <a href="<?php echo base_url('/usuario/adjustLoogo/1/'.$pub['iduserenc']); ?>"><?=$pub['image_link']?></a>

                                          </td>

                                          <td>
                                          <a title="View" href="<?php echo base_url('encarte/viewFlyerImage/'.$pub['id_user'].'/'.$pub['id_publish']);?>" class="btn btn-primary btn-sm">&nbsp;View</a>

                                          </td>

                                         

                                        </tr>










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

            <script>


$(document).ready(function () {

$('#product_table').DataTable({
"order": [[ 1, "desc" ]]
});
$('.dataTables_length').addClass('bs-select');
});




</script>
