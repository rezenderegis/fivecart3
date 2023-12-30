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
  padding: 4px;
  text-align: center;
  font-size: 10px;

}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 10px;
  float: left;
  width: 12.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 25.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 50%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

<style>
.image-container {
    position: relative;
    display: inline-block; /* Faz o contêiner se ajustar ao tamanho da imagem */
}

.image-container img {
    display: block; /* Remove qualquer espaço abaixo da imagem */
}

.btn-over-image {
    position: absolute;
    top: 50%; /* Centraliza o botão verticalmente */
    left: 50%; /* Centraliza o botão horizontalmente */
    transform: translate(-50%, -50%); /* Ajusta a posição exata do botão */
    /* Estilize seu botão como desejar */
}
</style>
</style>
<?php $this->load->view('/layout/watsapp');?>

</div>
   <?php //$this->load->view('layout/sidebar'); ?>
   </head>

            <!-- Main Content -->
            <div id="content">

               <?php $this->load->view('layout/navbar');?>

               <div class="container-fluid">

              
                <div class="cabecalho">
Posts
</div>
<div class="card shadow mb-6">

     
 
<!-- ($user_detail->beta_tester == 1) { -->
<br/>
  <div class="container-fluid">
                        <div class="row">
                          <div class="align-self-start">
                          <a title="Posts" href="<?=base_url('encarte/allCarts/2'); ?>" class="btn btn-primary btn-bg ">Posts</a>
                            &nbsp;
                          </div>

                        <div class="align-self-start">
                          &nbsp;
                          <a title="Posts" href="<?=base_url('encarte/allCarts/1'); ?>" class="btn btn-primary btn-bg ">Encartes</a>
                        </div>
                      

                        </div>
  </div>

<div class="card-body">




  <!-- Begin Page Content -->
  <div class="container-fluid">

  

<?php



foreach ($templates as $template) {

	$address = "";

	if ($template['type_template'] == 1) {

	
	$address = "http://localhost:3333/publish/generateHtmlTest/610/1121/0/0/".strval($template['id']);

} else {
	$address = "http://localhost:3333/publish/generateHtmlTest/610/1121/3383/0/".strval($template['id']);
}

    ?>

<div class="responsive">
  <div class="gallery">
  <div class="desc"><?php echo "<strong>#".$template['id']."-".$template['description']."</strong><br>";
  if ($template['id_user'] == 1)  {
		
		echo "Meus Encartes";}?></div>

<a target="_blank" href="<?php echo $address; ?>">
  <div class="image-container">
    <?php if ($template['type_template'] == 1) {
			 ?>
      <img src="<?php echo "http://postater.com/images/posts/templates/" . $template['complete_image']; ?>"  >
    <?php } else if ($template['type_template'] == 2) { ?>
      <img src="<?php echo "http://postater.com/images/posts/templates/". $template['complete_image']; ?>"  >
    <?php } ?>
    <button class="btn-over-image">Clique Aqui</button>
  </div>
</a>
  </div>
</div>
<?php }?>


<div class="clearfix"></div>


 
     
                   
</div>

</div>
</div>

</div>
</div>
