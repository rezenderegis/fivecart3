
<style>
div.gallery {
  display: grid;
  grid-template-columns: auto auto auto;

  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 300px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}
</style>


   <?php $this->load->view('layout/sidebar'); ?>
<?php
$cards = array("Barra_Superior_Azul_Claro", "Barra_Superior_Azul_Escuro", "Barra_Superior_Azul_Vermelho");
$cardsInferior = array("Barra_Inferior_Azul_Claro", "Barra_Inferior_Azul_Escuro", "Barra_Inferior_Vermelho");
?>
     
            <!-- Main Content -->
            <div id="content">

               <?php $this->load->view('layout/navbar');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Validar</h1>

<form action="<?php echo base_url('/encarte/new'); ?>">
   
<!-- -->



<div class="gallery">
  <a target="_blank">
    <img src="<?= base_url() . "images/Products/ketchup-tradicional-320g-hemmer-s-fundo.jpg"; ?>" alt="Cinque Terre" width="100" height="130">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>

<div class="gallery">
  <a target="_blank">
    <img src="<?= base_url() . "images/Products/molho-barbecue-com-mel-330g-hemmer-s-fundo.jpg"; ?>" alt="Forest" width="100" height="130">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>

<div class="gallery">
  <a target="_blank" href="<?php echo base_url('/encarte/new'); ?>">
    <img src="<?= base_url() . "images/Products/ketchup-tradicional-1kg-hemmer.jpg"; ?>" alt="Mountains" width="100" height="130">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>



<div class="gallery">
  <a target="_blank">
    <img src="<?= base_url() . "images/Products/ketchup-tradicional-320g-hemmer-s-fundo.jpg"; ?>" alt="Cinque Terre" width="100" height="130">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>

<div class="gallery">
  <a target="_blank">
    <img src="<?= base_url() . "images/Products/molho-barbecue-com-mel-330g-hemmer-s-fundo.jpg"; ?>" alt="Forest" width="100" height="130">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>

<div class="gallery">
  <a target="_blank" href="<?php echo base_url('/encarte/new'); ?>">
    <img src="<?= base_url() . "images/Products/ketchup-tradicional-1kg-hemmer.jpg"; ?>" alt="Mountains" width="100" height="130">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>


<div class="gallery">
  <a target="_blank">
    <img src="<?= base_url() . "images/Products/ketchup-tradicional-320g-hemmer-s-fundo.jpg"; ?>" alt="Cinque Terre" width="100" height="130">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>

<div class="gallery">
  <a target="_blank">
    <img src="<?= base_url() . "images/Products/molho-barbecue-com-mel-330g-hemmer-s-fundo.jpg"; ?>" alt="Forest" width="100" height="130">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>

<div class="gallery">
  <a target="_blank" href="<?php echo base_url('/encarte/new'); ?>">
    <img src="<?= base_url() . "images/Products/ketchup-tradicional-1kg-hemmer.jpg"; ?>" alt="Mountains" width="100" height="130">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>


<div class="gallery">
  <a target="_blank">
    <img src="<?= base_url() . "images/Products/ketchup-tradicional-320g-hemmer-s-fundo.jpg"; ?>" alt="Cinque Terre" width="100" height="130">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>

<div class="gallery">
  <a target="_blank">
    <img src="<?= base_url() . "images/Products/molho-barbecue-com-mel-330g-hemmer-s-fundo.jpg"; ?>" alt="Forest" width="100" height="130">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>

<div class="gallery">
  <a target="_blank" href="<?php echo base_url('/encarte/new'); ?>">
    <img src="<?= base_url() . "images/Products/ketchup-tradicional-1kg-hemmer.jpg"; ?>" alt="Mountains" width="100" height="130">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>








<!-- -->
    <!--
    <img src="<?= base_url() . "images/Barra_Superior_Azul_Claro.jpg"; ?>" width="421" height="96">  
    <br/>
    <div>
    <br/>
    <img src="<?= base_url() . "images/Barra_Superior_Azul_Claro.jpg"; ?>" width="100" height="120">
    <img src="<?= base_url() . "images/Barra_Superior_Azul_Claro.jpg"; ?>" width="100" height="120">
    <img src="<?= base_url() . "images/Barra_Superior_Azul_Claro.jpg"; ?>" width="100" height="120">
    <br/><br/>
    <img src="<?= base_url() . "images/Barra_Superior_Azul_Claro.jpg"; ?>" width="100" height="120">
    <img src="<?= base_url() . "images/Barra_Superior_Azul_Claro.jpg"; ?>" width="100" height="120">
    <img src="<?= base_url() . "images/Barra_Superior_Azul_Claro.jpg"; ?>" width="100" height="120">
    <br/><br/>
    <img src="<?= base_url() . "images/Barra_Superior_Azul_Claro.jpg"; ?>" width="100" height="120">
    <img src="<?= base_url() . "images/Barra_Superior_Azul_Claro.jpg"; ?>" width="100" height="120">
    <img src="<?= base_url() . "images/Barra_Superior_Azul_Claro.jpg"; ?>" width="100" height="120">
    
</div>
    <br/>
    <img src="<?= base_url() . "images/Barra_Inferior_Azul_Claro.jpg"; ?>" width="421" height="96">
    <br/>
    <br/>

<button type="submit" class="btn btn-primary">Submit</button>

<img src="<?= base_url() . "images/Centro.jpg"; ?>" width="422" height="423">

</form>

</div>
              




            </div>

-->

