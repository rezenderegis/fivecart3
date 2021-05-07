

<html>
    <head></head>
<style>



#salvar {
top: 0;
right: 0;
height: 20px;
padding: 10px 10px;
}

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
text-align: center;
width: 150px;


}

/* Bottom right text */
.text-block {
position: absolute;
text-align: center;
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
 align: right;

 display: block;
margin-left: auto;
margin-right: auto;
width: 80%;

}

.container_text_button{
position: relative;
}

.tudo {
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  
  <script src="html2canvas.js"></script>

  <!-- <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script> -->

<!--
  <script src="html2canvas.min.js"></script>

<script src="canvas2image.js"></script> -->
<body>
<?php 


$products = array(

   ["name" => "KETCHUP TRADICIONAL 3,8G HEMMER", "image" => 	"ketchup-tradicional-3-8kg-hemmer-s-fundo.png", "price" => "3,00"],
   ["name" => "KETCHUP TRADICIONAL 320G HEMMER	", "image" =>  "ketchup-tradicional-320g-hemmer-s-fundo.png", "price" => "3,00"],
   ["name" => "KETCHUP TRADICIONAL HEMMER 1KG	", "image" => "ketchup-tradicional-1kg-hemmer-S-FUNDO.png", "price" => "3,00"],
   ["name" => "MOLHO BARBECUE COM MEL HEMMER 330G	", "image" => "molho-barbecue-com-mel-330g-hemmer-s-fundo.png", "price" => "3,00"],
   ["name" => "MOLHO BARBECUE HEMMER 330G	" , "image" => "molho-barbecue-330g-hemmer-S-FUNDO.png", "price" => "3,00"],
   ["name" => "MOSTARDA AMARELA 200G HEMMER	", "image" => "mostarda-amarela-200g-hemmer-s-fundo.png", "price" => "3,00"],
   ["name" => "MOSTARDA AMARELA HEMMER 3,6KG	" , "image" => "mostarda-amarela-3-6kg-hemmer-S-FUNDO.png", "price" => "3,00"],
   ["name" => "MOSTARDA AMARELA HEMMER 700G" , "image" => "mostarda-amarela-700g-hemmer-S-FUNDO.png", "price" => "3,00"],
   ["name" => "PIMENTA BIQUINHO VERMELHA 2KG	" , "image" => "pimenta-biquinho-vermelha-2kg-hemmer-S-fundo.png", "price" => "3,00"]

);


?>
          <?php //include 'footer.php'; ?> 

 <?php //include 'sidebar.php'; ?> 

          <!-- Main Content -->
          <div class="tudo">

          <?php //include 'navbar.php'; ?> 

              <!-- Begin Page Content -->
              <div class="container-fluid">

                  <!-- Page Heading -->
                  <h1 class="h3 mb-4 text-gray-800">Validar</h1>

<div id="encarte"  style="background-color: #FFFFFF; 
               width: 452px; height: 930px;">

<div class="container_text_button">
<img src="1_super_ofertas_header.jpg" width="455" height="200">  
<div class="text_button_right"><?php echo $_REQUEST['text_right'];?></div>
<div class="text_button_left"><?php echo $_REQUEST['text_left'];?></div>
</div>
<div class="grid-container">
<?php foreach ($products as $product) { ?>
<div class="gallery">
<div class="container_picture">
  <img src="<?=$product['image']; ?>" alt="Snow" width="100" height="130">
  <div class="textocentro"> R$ <?=$product['price']?> </div>
</div>
  <div class="desc"><?=$product['name']?></div>
</div>
<?php }?>
</div>
  <img src="1_super_ofertas_footer.png" width="455" height="50">
<div>
</div>
</div>
</div>

<script>
function doDownload() {
  window.scrollTo(0,0);
  html2canvas(document.getElementById("encarte")).then(function (canvas){
    console.log(canvas.toDataURL("image/jpeg", 0.9));
  });
}
</script>
  </center> 
    <button onclick="doDownload();">Download</button>
    </body>
    </html>
