
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


<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
	</script>
	
	<script src=
"https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js">
	</script>



   <?php $this->load->view('layout/sidebar'); ?>

            <!-- Main Content -->
            <div class="tudo">

               <?php $this->load->view('layout/navbar');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Validar</h1>


<div id="encarte"  style="background-color: #FFFFFF; 
                 width: 452px; height: 930px;">

<div class="container_text_button">
  <img src="<?= base_url() . "images/templates/".$template->header_image; ?>" width="455" height="200">  
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
    <img src="<?= base_url() . "images/templates/".$template->footer_image; ?>" width="455" height="50">
<div>
</div>
</div>
</div>


<input id="btn-Preview-Image" type="button"
                value="Preview" /> 
          
    <a id="btn-Convert-Html2Image" href="#">
        Download
    </a>
  
    <br/>
      
    <h3>Preview :</h3>
      
    <div id="previewImage"></div>
      
    <script>
        $(document).ready(function() {
          
            // Global variable
            var element = $("#encarte"); 
          
            // Global variable
            var getCanvas; 
  
            $("#btn-Preview-Image").on('click', function() {
                html2canvas(element, {
                 
                    onrendered: function(canvas) {
                        $("#previewImage").append(canvas);
                        getCanvas = canvas;
                    }
                });
            });
  
            $("#btn-Convert-Html2Image").on('click', function() {
                var imgageData = 
                    getCanvas.toDataURL("image/png");
              
                // Now browser starts downloading 
                // it instead of just showing it
                var newData = imgageData.replace(
                /^data:image\/png/, "data:application/octet-stream");
              
                $("#btn-Convert-Html2Image").attr(
                "download", "GeeksForGeeks.png").attr(
                "href", newData);
            });
        });
    </script>
    </center>