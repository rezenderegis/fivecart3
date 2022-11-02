


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


.imgLogo {
  height: <?=$imageHeight?>px;
  width: <?=$imageWidth?>px;
}

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

<?php $this->load->view('layout/navbar');?>
<div id="principal">
<table>
                               <tr>

                             
                             <td>
                             <a title="Voltar" href="<?=base_url('uploadFile/uploadFile/1'); ?>"  class="btn btn-primary btn-lg float-left">&nbsp;Voltar</a>

                             </td>
                           
                             <td>

                                <td>
                         
                            <a title="Logo Encarte" href="<?=base_url('usuario/adjustLoogo/1'.'/'.$user_detail->id_user); ?>"  class="btn btn-primary btn-lg float-left">&nbsp;Logo Encarte</a>
                                </td>
                              <td>
                            <a title="Logo Post" href="<?=base_url('usuario/adjustLoogo/2'.'/'.$user_detail->id_user); ?>"  class="btn btn-primary btn-lg float-left">&nbsp;Logo Post</a>
</td>
</table>


<div class="cabecalho">
      Logo <?php 
      $max = '';
      if ($type_logo == 1) { $max = 150; echo " de Encarte";} elseif ($type_logo == 2) { 
        $max = 400;
        echo " de Post";}?>
    </div>


 

<img class="imgLogo" src="<?= base_url() . "images/logos/".$user_detail->image_link; ?>" alt="Snow" >

</div>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong><?php echo "Ajuste o tamanho da sua logo caso não tenha ficado legall!!"; ?>
</strong> 
<strong><br/><?php echo "Tamanho máximo é ".$max; ?>
</strong> 
</div>
<div id="formulario">
<form method="POST" name="form_changeLogoDimension" action ="<?php echo base_url('usuario/changeLogoDimension/'.$type_logo.'/'.$user_detail->id_user);?>">
<form method="POST" name="form_add">
  <table>
    <tr>
      
          <div class="form-group">
              <div class="col-md-4">
                <td>
              <label >Largura  </label>
    </td>

    <td>
              <input name = "image_width" type="number" value="<?=$imageWidth ?>" min=<?=$minSize?> max=<?=$maxSize?> step="10" class="button_spinner"/>
    </td>
            </div>
    
    <tr> 
    <div class="col-md-4">
      <td>
      <label >Altura</label>
    </td>
    <td>
      <input name = "image_height" type="number" value="<?=$imageHeight ?>" min=<?=$minSize?> max=<?=$maxSize?>  step="10" class="button_spinner"/>
    </td>
    </div>
    </tr>
</div>
    </table>
    
<button type="submit" class="button">Ajustar Imagem</button>

</form> 
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
      

    