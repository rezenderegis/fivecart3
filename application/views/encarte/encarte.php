<style>
ul {
  list-style-type: none;
}

li {
  display: inline-block;
}

input[type="checkbox"][id^="cb"] {
  display: none;
}
input[type="checkbox"][id^="rd"] {
  display: none;
}

label {
  border: 1px solid #fff;
  padding: 10px;
  display: block;
  position: relative;
  margin: 10px;
  cursor: pointer;
}

label:before {
  background-color: white;
  color: white;
  content: " ";
  display: block;
  border-radius: 50%;
  border: 1px solid grey;
  position: absolute;
  top: -5px;
  left: -5px;
  width: 25px;
  height: 25px;
  text-align: center;
  line-height: 28px;
  transition-duration: 0.4s;
  transform: scale(0);
}

label img {
  height: 100px;
  width: 100px;
  transition-duration: 0.2s;
  transform-origin: 50% 50%;
}

:checked + label {
  border-color: #ddd;
}

:checked + label:before {
  content: "✓";
  background-color: grey;
  transform: scale(1);
}

:checked + label img {
  transform: scale(0.9);
  box-shadow: 0 0 5px #333;
  z-index: -1;
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
                    <h1 class="h3 mb-4 text-gray-800">Home</h1>

<form action="<?php echo base_url('/encarte/new'); ?>">
                    <?php
  

?>
<ul>
    
<?php
$i = 0;
foreach ($cards as $card) {
    $i++;
    ?>
    <li><input type="checkbox" id=<?php echo "cb".$i; ?> name="cabecalho" value="<?php echo $card; ?>"/>
    <label for=<?php echo "cb".$i; ?>><img src="<?= base_url() . "images/$card.jpg"; ?>" /></label>
  </li>
<?php
}
?>
</ul>
    <img src="<?= base_url() . "images/Centro.jpg"; ?>" width="422" height="423">



    
    </div>

    <div class="container-fluid">


    <ul>
<?php
$i = 0;
foreach ($cards as $card) {
    $i++;
    ?>
    <li><input type="checkbox" id=<?php echo "rd".$i; ?> name="footer_picture" value="<?php echo $card; ?>"/>
    <label for=<?php echo "rd".$i; ?>><img src="<?= base_url() . "images/$card.jpg"; ?>" /></label>
  </li>
<?php
}
?>
</ul>


<div class="form-group">
    <label for="formGroupExampleInput">Texto Esquerda</label>
    <input type="text" class="form-control col-md-4" id="formGroupExampleInput" placeholder="Example input" name="text_left">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Texto Direita</label>
    <input type="text" class="form-control col-md-4" id="formGroupExampleInput2" placeholder="Another input" name="text_right">
</div>


<button type="submit" class="btn btn-primary">Submit</button>

</form>

</div>
               

            </div>



