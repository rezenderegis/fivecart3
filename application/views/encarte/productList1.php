
   <style>
div.gallery {
  border: 1px solid #ccc;
  
}

div.button_header {
  margin: auto;
  align: left;
  width: 100%;
  padding: 10px;
  
}

div.gallery:hover {
  border: 3px solid #777;
  
}

div.gallery img {
  width: 100%;
  height: auto;
  
}

div.desc {
  padding: 15px;
  text-align: center;
  font-size: 14px;

}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 10px;
  float: left;
  width: 24.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}
</style>



   <?php $this->load->view('layout/sidebar'); ?>


</head>







<?php $this->load->view('/layout/watsapp');?>

            <!-- Main Content -->
            <div id="content">




     
            
               <?php $this->load->view('layout/navbar');?>




               <?php if (strcmp($type, 'first') == 0) {?>
               <div class="button_header">
                <a title="Criar Nova Lista" href="<?php echo base_url('product/add/first');?>" class="btn btn-success btn-sm"><i class="fas fa-box-open"></i>&nbsp;Novo Encarte</a>
                </div>

                <?php } else { ?>
                <div class="button_header">
                <a title="Criar Nova Lista" href="<?php echo base_url('encarte/allCarts');?>" class="btn btn-success btn-sm"><i class="fas fa-box-open"></i>&nbsp;Novo Encarte</a>
                </div>
                <?php } ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <div class="cabecalho">
Meus encartes criados
</div>
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

</div>


  
<?php
//print_r($templates);
foreach ($templates as $template) {
  //echo "<pre>";
//print_r($template);
    ?>


<div class="responsive">
  <div class="gallery">
  <div class="desc"><?php echo "<strong>".$template['description']."</strong><br> Data Criação: ".$template['dates_creation']."ID Template #".$template['id'];?></div>
    <a target="" href="<?php echo base_url('/encarte/productPublish/'.$template['id']); ?> ">
      <img src="<?= base_url() . "images/templates/".$template['complete_image']; ?>" alt="Cinque Terre" width="600" height="400">
    </a>
  </div>
</div>

<?php 

}?>


<div class="clearfix"></div>

 
     
                   

</div>
