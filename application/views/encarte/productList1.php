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
  padding: 5px;
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
</style>



   <?php //$this->load->view('layout/sidebar'); ?>


</head>







<?php $this->load->view('/layout/watsapp');?>

            <!-- Main Content -->
<div id="content">




     
            
               <?php $this->load->view('layout/navbar');?>

               <div class="cabecalho">
       <?=lang('my_posts');?>
    </div>

    <div class="container-fluid">
    <div class="card shadow mb-6">

    <div class="card-body">
       
      
                <?php if ($message = $this->session->flashdata('error')): ?>
    <div class "row">
    <div class ="col-md-12">

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong><?php echo $message;?></strong> 
  <a href="<?php echo base_url('encarte/allCarts');?>" class="p-1 mb-2 bg-warning text-dark"><?=lang('click_here');?></a>

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>
</div>
<?php endif; ?>   


<?php if ($message = $this->session->flashdata('success')): ?>
    <div class "row">
    <div class ="col-md-12">

    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><i class="far fa-thumbs-up"></i><?php echo $message;?></strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>
</div>
<?php endif; ?>   
<div class="container-fluid">
                        <div class="row">
                          <div class="align-self-start">
                          <a title="Posts" href="<?=base_url('encarte/productList1/0/2'); ?>" class="btn btn-primary btn-bg"> <?=lang('product_list_posts');?>
</a>

                          &nbsp;
                          </div>

                        <div class="align-self-start">
                          &nbsp;
                          <a title="Encartes" href="<?=base_url('encarte/productList1/0/1'); ?>" class="btn btn-primary btn-bg "><?=lang('product_list_booklets');?></a>

                        </div>
                      

                        </div>
  </div>
<br/> 

<?php if (strcmp($type, 'first') == 0) {?>
               <div class="button_header">
                <a title="Criar Nova Lista" href="<?php echo base_url('product/add/first');?>" class="btn btn-primary btn-bg"><i class="fas fa-box-open"></i>&nbsp; <?=lang('product_list_new_booklets');?></a>
                </div>

                <?php } else { ?>
                <div class="button_header">
                <a title="Criar Nova Lista" href="<?php echo base_url('encarte/allCarts');?>" class="btn btn-primary btn-bg"><i class="fas fa-box-open"></i>&nbsp; <?=lang('product_list_new_booklets');?></a>
                </div>
                <?php } ?>

                

  
<?php
//print_r($templates);
foreach ($templates as $template) {
  //echo "<pre>";
?>


<div class="responsive">
  <div class="gallery">
  <div class="desc"><?php echo "<strong>".$template['description_publish']."</strong> (#".$template['id_publish_sh'].") <br><strong>  Data:</strong> ".$template['dates_creation']."<strong>Template </strong>".$template['id_template'];?></div>
    <a target="" href="<?php echo base_url('/encarte/productPublish/'.$template['id_publish_sh']); ?> ">
    <img src="<?= base_url() . "images/templates/".$template['complete_image']; ?>" alt="Cinque Terre" width="400" height="200">

 
    </a>
  </div>
</div>

<?php 

}?>


<div class="clearfix"></div>

</div>
</div>
</div>
</div>
