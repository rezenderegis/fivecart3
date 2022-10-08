<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '435688927479728'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=435688927479728&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
  
  
  <style>
div.gallery {
  border: 1px solid #ccc;
  
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
<?php $this->load->view('/layout/watsapp');?>

</div>
   <?php //$this->load->view('layout/sidebar'); ?>


            <!-- Main Content -->
            <div id="content">

               <?php $this->load->view('layout/navbar');?>

           
                <!-- Begin Page Content -->
                <div class="container-fluid">

                <div class="cabecalho">
Escolha o MODELO para criar seu encarte
</div>
             
</head>

  
<?php
foreach ($templates as $template) {
    ?>

<div class="responsive">
  <div class="gallery">
  <div class="desc"><?php echo "<strong>#".$template['id']."-".$template['description']."</strong><br>";
  if ($template['id_user'] == 1)  { echo "Oferecimento Meus Encartes";}?></div>

    <a target="" href="<?php echo base_url('/encarte/addFromCart/'.$template['id']); ?> ">
      <img src="<?= base_url() . "images/templates/".$template['complete_image']; ?>" alt="Cinque Terre" width="600" height="400">
      <img src="<?= base_url() . "images/templates/meio.png"; ?>" alt="Cinque Terre" width="600" height="400">
      <img src="<?= base_url() . "images/templates/".$template['footer_image']; ?>" alt="Cinque Terre" width="600" height="400">

    </a>
  </div>
</div>
<?php }?>


<div class="clearfix"></div>


 
     
                   

</div>
