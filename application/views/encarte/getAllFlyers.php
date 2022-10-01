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
                 

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="product_table" class="table table-bordered dataTable"  width="100%" cellspacing="0" >
                                
                                
                                <thead>
                                        <tr>
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

                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($publish as $pub) : ?>

                                        <tr>
                                            <td><?=$pub['company_name']?></td>
                                            <td><?=$pub['email']?></td>
                                            <td><?=$pub['mobile_number']?></td>
                                            <td><?=$pub['created_on1']?></td>
                                            <td><?=$pub['last_login1']?></td>
                                            <td><?=$pub['date_flyer']?></td>
                                            <td><?=$pub['dateUpdate']?></td>
                                            <td>
                                            <a href="http://ec2-3-87-24-65.compute-1.amazonaws.com/publish/<?=$pub['id_user']?>/<?=$pub['id_publish']?>" class="btn btn-primary btn-sm" role="button" aria-disabled="true" id="showPictureButton"><i class="fa fa-file-picture-o"></i><?=$pub['id_publish']?></a>
  
                                            </td>
                                            <td><?=$pub['id_user']?></td>
                                            <td><?=$pub['description']?></td>

                                               
                                            

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
