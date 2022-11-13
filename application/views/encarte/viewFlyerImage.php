
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

.imgProduct {

align: center;

    object-fit: scale-down;
    width:  400px;
    height: 600px;
    object-position: top;
    

}
</style>





</head>







<?php $this->load->view('/layout/watsapp');?>

            <!-- Main Content -->
            <div id="content">




     
            
 <?php $this->load->view('layout/navbar');?>

 <div id="content">
 <div class="container-fluid">
 <a class="btn btn-primary btn-lg" href="<?= base_url() . "encarte/callUrlAws/".$publishId."/".$user."/".$id_product."/1"; ?>"> Download Alta Resolução</a>
 
 <br/>
<br/>
 <div class="card shadow mb-4">
  
 <div class="card-body"> 

                <!-- Begin Page Content -->
 <picture>

<img src="<?= base_url() . "encarte/callUrlAws/".$publishId."/".$user."/".$id_product."/0"; ?>" class="img-fluid img-thumbnail imgProduct"/>
</picture>
<!-- viewFlyerImage/1/52 -->







</div>
     
</div>           
</div>
</div>
</div>