
<style>



.grid-container {
  display: grid;
  width: 300px;
  grid-template-columns: auto auto auto	;
  padding: 0px;
  
}

div.gallery {
 
  margin: 0px;
  border: 0px solid #ccc;
  float: left;
  width: 150px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100px;
  height: auto;
}

div.desc {
  padding: 10px;
  text-align: left;
  width: 150px;

}

/* Bottom right text */
.text-block {
  position: absolute;
  bottom: 5px;
  right: 5px;
  background-color: black;
  color: white;
  padding-left: 20px;
  padding-right: 20px;
}

.textocentro {
  position: absolute;
  bottom: 0px;
  right: 20px;
  background-color: yellow;
  color: red;
  padding-left: 20px;
  padding-right: 20px;

}


.container_picture {

   position: relative;
   text-align: center;
}

.container_text_button{
  position: relative;
}

.text_button_right {
  position: absolute;
  bottom: 20px;
  left: 280px;
  color: white;
  text: bold;
  width: 200px;
  padding-left: 20px;
  padding-right: 20px;
  align: center;
}

.text_button_left {
  position: absolute;
  bottom: 20px;
  left: 10px;
  color: yellow;
  text: bold;
  width: 200px;
  padding-left: 20px;
  padding-right: 20px;
  align: center;
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

<div class="container_text_button">

  <img src="<?= base_url() . "images/customers/taNoEncarte.jpg"; ?>" width="455" height="200">  
  <div class="text_button_right"><?php echo $_REQUEST['text_right'];?></div>
  <div class="text_button_left"><?php echo $_REQUEST['text_left'];?></div>

</div>

<div class="grid-container">

<?php foreach ($productPublish as $product) { ?>
<div class="gallery">
<div class="container_picture">
    <img src="<?= base_url() . "images/Products/".$product['image_link']; ?>" alt="Snow" width="100" height="130">
    <div class="textocentro"> R$ <?=$product['price']?> </div>
</div>
    <div class="desc"><?=$product['name']?></div>
</div>
<?php }?>


</div>
    <img src="<?= base_url() . "images/customers/Barra_inferior_sm.jpg"; ?>" width="455" height="50">
    





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

