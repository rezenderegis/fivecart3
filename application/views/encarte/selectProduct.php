


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
margin-bottom: -1;
display: inline-block;
  align-self: flex-end;

}

div.gallery:hover {
border: 1px solid #777;
}

div.gallery img {
  padding-left: 60px;
margin-top: -1px;
width: 100%;

width: 100px;
/** @todo Ficou feio isso, esse -70 pra alinhar a esquerda */
margin-left: -70px;

align: center;
/** Altura da foto*/
height: auto;
}

div.desc {
font-family: "Helvetica", sans-serif;
padding: 4px;
font-size: 13px;
text-align: center;
width: 150px;

margin-bottom: 0;

}

/* Bottom right text */
.text-block {
position: relative;
text-align: center;
bottom: 5px;
right: 5px;
background-color: black;
color: white;
padding-left: 20px;
padding-right: 20px;
}

.textocentro {
font-family: "Helvetica", sans-serif;
position: absolute;
font-size: 13px;
padding-top: 2px;
bottom: 0px;
right: 20px;
background-color: <?=$template->main_color;?>;
color: #FFFFFF;
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
font-family: "Helvetica", sans-serif;
position: absolute;
font-size: 12px;
bottom: 8px;
left: 250px;
color: white;
text: bold;
width: 200px;
padding-left: 35px;
padding-right: 10px;
align: right;
}

.text_button_left {
line-height: 125%;
font-family: "Sofia", sans-serif;
font-size: 40px;
position: absolute;
bottom: 70px;
left: 10px;
color: yellow;
text: bold;
width: 300px;
padding-left: 0px;
padding-right: 20px;
align: center;
}

.logo {
  border-radius: 0px;
  padding: 100px;
  bottom: -99px;
  width: 200px;
  position: absolute;
}


.footer_text {
font-size: 20px;
position: absolute;
bottom: 10;
left: 10px;
color: yellow;
text: bold;
padding-left: 20px;
padding-right: 20px;
align: left;
}


.iconDetails {
 margin-left:2%;
float:left; 
height:30px;
width:30px; 
} 

.container2 {
  font-family: "Helvetica", sans-serif;
  font-size: 15px;
  color: white;
position: absolute;
bottom: 0;
left: 10px;
    height:auto;
    padding:1.5%;
    float:left;
}
h4{margin:0;width:400px;}
.left {float:left;width:45px;}
.right {float:left;margin:0 0 0 5px;width:215px;}

</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Helvetica">

<script src="<?php echo base_url('public/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="<?php echo base_url('public/vendor/jquery/html2canvas.js'); ?>"></script>
<script src="<?php echo base_url('public/vendor/mask/jquery.mask.min.js'); ?>"></script>
<script src="<?php echo base_url('public/vendor/mask/app.js'); ?>"></script>


<div id="content">
</div>
<table>
<tr>
<td>
<button style=" background-color: #008CBA; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;" id="download-page-as-image" onClick="setUpDownloadPageAsImage();">Fazer Download do Encarte</button>

<br/><br/>
</td>
<td>
<a style=" background-color: #008CBA; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;" href="<?php echo base_url('encarte/productList1');?>">Concluir</a>

<br/><br/>
</td>

<td>
<button style=" background-color: #008CBA; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;"  onclick="goBack()">Mudar Modelo</button>

<br/><br/>
</td>
</tr>
</table>
<div id="encarte"  style="background-color: #FFFFFF; width: 452px; ">
<!-- I used to set width and height of div becouse of image generation, to generate in same size.
But I watched that depending of products and image exceded image limit. I decided to remove 
this tag to test and worked. I went to container2 and decrease padding of 1% to 0% and and bottom to 0-->
<!-- style="background-color: #FFFFFF;  width: 452px; height: 1025px;" -->
<div class="container_text_button">
  <?php if ($template->has_logo == 0) { ?>
<img class = "logo" src="<?= base_url() . "images/logos/maritimus_foods.png"; ?>">  
<?php } ?>
  <img  src="<?= base_url() . "images/templates/".$template->header_image; ?>" width="455" height="200">  

  <div class="text_button_right"><?php if ($publish->header2 != '') { echo $publish->header2; } else { echo $template->header_text_right;}?></div>

  <?php if ($template->header_left_text != '') { ?>
  <div class="text_button_left"><?php echo $template->header_left_text;?></div>
  <?php } ?>
</div>
<div class="grid-container">
<?php foreach ($productPublish as $product) { ?>
<div class="gallery">
<div class="container_picture">
    <img src="<?= base_url() . "images/Products/".$product['image_link']; ?>" alt="Snow" width="100" height="130">
    <div class="textocentro"><?php echo 'R$'.number_format($product['price'], 2, ',', '.'); ?> </div>
</div>
    <div class="desc"><?=$product['name']?></div>
</div>
<?php }?>
</div>
<div class="container_text_button">
    <img src="<?= base_url() . "images/templates/".$template->footer_image; ?>" width="455" height="50">
    <?php if ($template->has_footer_text == 0) { ?>
    <div class='container2'>
        <div class="left">
            <img src='<?= base_url() . "images/icons/watsapp_icon.png"; ?>' class='iconDetails'>
        </div>  
    <div   class="right" >
    <h4><?php echo $template->footer_text;?></h4>
    <div style="font-size:.7em;width:400px;float:left; padding-top:5px; "><?php echo $template->footer_text2;?></div>
    </div>
</div>
<?php } ?>
</div>
</div>
</div>
<script>
function goBack() {
  window.history.back();
}

function setUpDownloadPageAsImage() {
  
  window.scrollTo(0,0);
  html2canvas(document.getElementById("encarte")).then(function (canvas){
    
    console.log(canvas.toDataURL("image/jpeg", 0.99));
    simulateDownloadImageClick(canvas.toDataURL(), 'Fivecarte.png');

  });
  
}


function simulateDownloadImageClick(uri, filename) {
  

  var link = document.createElement('a');
  if (typeof link.download !== 'string') {
    window.open(uri);
  } else {
    link.href = uri;
    link.download = filename;
    accountForFirefox(clickLink, link);
  }
}

function clickLink(link) {
  link.click();
}

function accountForFirefox(click) { // wrapper function
  let link = arguments[1];
  document.body.appendChild(link);
  click(link);
  document.body.removeChild(link);
}


</script>
      

