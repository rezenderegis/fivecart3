
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
</style>



   <?php $this->load->view('layout/sidebar'); ?>


</head>







<?php $this->load->view('/layout/watsapp');?>

            <!-- Main Content -->
            <div id="content">




     
            
               <?php $this->load->view('layout/navbar');?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

<a href="http://ec2-3-87-24-65.compute-1.amazonaws.com/publish/<?=$user?>/<?=$publishId?>" download="w3logo">
<img src="http://ec2-3-87-24-65.compute-1.amazonaws.com/publish/<?=$user?>/<?=$publishId?>" />
</a>


</div>





<div class="clearfix"></div>

 
     
                   

</div>
