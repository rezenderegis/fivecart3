


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
grid-template-columns: auto auto auto;
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

.button_spinner {
  background-color: #008CBA; /* Green */
  border: none;
  color: white;
  padding: 5px 5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;

}

.button {
  padding: 5px 10px;
  font-size: 15px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #001F79;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #1C8CBA;
}

.button:hover {background-color: #1C8CBA}

.button:active {
  background-color: #1C8CBA;
  box-shadow: 0 5px #1C8CBA;
  transform: translateY(4px);
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

div.gallery img {
  padding-left: 60px;
margin-top: -1px;

/** @todo Ficou feio isso, esse -70 pra alinhar a esquerda */
margin-left: -70px;

align: center;


/**The problem with this configuration is that images is generated with difrent sizes and becoume layout
ugly. */
/** Altura da foto*/
/*
width: 80%;
height: 180px;*/


/**The problem with this configuration is that a image stay with the same size and is necessary
to adjust the must manualy. */
/*
width: 100%;
height: auto;*/
    
    
    /**This is the best option now, but sometimes is necessary adjust manualy the images. */
    /*
    width:  75%;
    height: 150px;
    object-position: bottom;
  
    The best way is use to use object-fit: scale-down;, but html2canvas didn't support.
    I saw it in https://html2canvas.hertzen.com/features/
    Whit object-fit is not necessary manual adjusments: .

    object-fit: scale-down;
    width:  75%;
    height: 150px;
    object-position: bottom;
    
    */
    /** I decied to go in this way and chage in the future, this is a MVP, is a test, I 
    won't spent more time with this now
    I cant decrease the width and heigh less than width:  75%; height: 150%;, because of quality
    */
    object-fit: scale-down;
    width:  75%;
    height: 150px;
    object-position: bottom; 

   
}

div.desc {
font-family: "Helvetica", sans-serif;
padding: 4px;
text-transform: uppercase;
font-size: 11px;
text-align: center;
width: 150px;
margin-left: 1px;
margin-right: 1px;
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
padding-left: 60px;
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
  padding-left: 140px;
  bottom: -99px;
    width:  140px;
    height: 90px;
  position: absolute;
  align: center;
  object-position: bottom; 

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
  text-transform: capitalize;
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
h4{margin:0;width:400px; text-transform: capitalize; }
.left {float:left;width:45px; }
.right {float:left;margin:0 0 0 5px;width:215px;}

</style>

<script src="./src/bootstrap-input-spinner.js"></script>
<script>
    $("input[type='number']").inputSpinner()
</script>
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
  font-size: 16px;" href="<?php echo base_url('product');?>">Concluir</a>

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
  font-size: 16px;"  onclick="goBack()">Voltar</button>

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
  
  <img  src="<?= base_url() . "images/templates/4_Ofertas_Azul_header.jpg"; ?>" width="455" height="200">  


</div>
<div class="grid-container">
<?php // foreach ($productPublish as $product) { ?>
<div class="gallery">
<div class="container_picture">
    <img src="<?= base_url() . "images/Products/".$productPublish->image_link; ?>" alt="Snow" width="100" height="130"
    <?php  if ($productPublish->image_width || $productPublish->image_height) {?> style="width: <?=$productPublish->image_width;?>;
height: <?=$productPublish->image_height?>;"  <?php }?>
    >

    <div class="textocentro"><?php echo 'R$'.number_format($productPublish->price, 2, ',', '.'); ?> </div>
</div>
    <div class="desc"><?=$productPublish->name?></div>
</div>

<?php // }?>


</div>
<div class="container_text_button">
    <img src="<?= base_url() . "images/templates/4_Ofertas_Azul_Footer.png"; ?>" width="455" height="50">
  
</div>
</div>
                      

<form method="POST" name="form_addProduct" action ="<?php echo base_url('encarte/changeProductDimension/'.$productPublish->id);?>">
<form method="POST" name="form_add">
  <table>
    <tr>
      
          <div class="form-group">
              <div class="col-md-4">
                <td>
              <label >Largura  </label>
    </td>
    <td>
              <input name = "image_width" type="number" value="<?=$productPublish->image_width ?>" min="20" max="150" step="10" class="button_spinner"/>
    </td>
            </div>
    
    <tr> 
    <div class="col-md-4">
      <td>
      <label >Altura</label>
    </td>
    <td>
      <input name = "image_height" type="number" value="<?=$productPublish->image_height ?>" min="20" max="150" step="10" class="button_spinner"/>
    </td>
    </div>
    </tr>
</div>
    </table>
<button type="submit" class="button">Ajustar Imagem</button>
</form>


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
      

    