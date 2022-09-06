

   <?php //$this->load->view('layout/sidebar'); ?>

     
            <!-- Main Content -->
            <div id="content">

               <?php $this->load->view('layout/navbar');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class "row">
    <div class ="col-md-12">

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong><?php echo "Selecione um modelo";?></strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>


                    <div class "row">
    <div class ="col-md-12">

 
    
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>
</div>


                    <button onclick="goBack()" class="btn btn-primary">Voltar</button>

                    </div>
<script>
function goBack() {
  window.history.back();
}
</script>



                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
