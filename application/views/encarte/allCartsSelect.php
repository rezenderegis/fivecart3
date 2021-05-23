
   <style>
div.gallery {
  border: 1px solid #ccc;
  
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

            <!-- Main Content -->
            <div id="content">

               <?php $this->load->view('layout/navbar');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

             
</head>

  
<?php
foreach ($templates as $template) {
    ?>

<div class="responsive">
  <div class="gallery">
  <div class="desc"><?php echo "<strong>".$template['description']."</strong><br>";
  if ($template['id_user'] == 1)  { echo "Oferecimento Meus Encartes";}?></div>

    <a target="_top" href="<?php echo base_url('/encarte/new/'.$publishId.'/'.$template['id']); ?>" value="<?php echo $template['id']; ?>" name="template">
      <img src="<?= base_url() . "images/templates/".$template['complete_image']; ?>" alt="Cinque Terre" width="600" height="400">
    </a>
  </div>
</div>
<?php }?>


<div class="clearfix"></div>

 
     
                   

</div>
