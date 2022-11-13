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

.container_text_button{
position: relative;
}
.text_button_right {
font-family: "Helvetica", sans-serif;
position: absolute;
font-size: 12px;
bottom: 8px;
left: 100px;
color: white;
text: bold;
width: 300px;
padding-left: -100px;
align: right;
}
</style>


   <?php //$this->load->view('layout/sidebar'); ?>

     
            <!-- Main Content -->
            <div id="content">
           
               <?php $this->load->view('layout/navbar');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Usuários</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
  </ol>
</nav>

<!-- <div class="card-header py-3">

<a title="Voltar" href="<?php echo base_url('encarte/allCarts')?>" class="btn btn-primary btn-lg float-left"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>

</div> -->    

<div class="cabecalho">
Confirme o Modelo
</div> 
        
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
                     

                        <div class="card-body">
  
                        <?php 
                                                $descriton_post = '';

                        if ($template->type_template == 1) {
  $width = 300;
  $height = 100;
  $descriton_post = "Encarte";

} elseif ($template->type_template == 2) {
  $width = 400;
  $height = 350;
  $descriton_post = "Post";
} ?>

<form method="POST" name="form_add">
<button type="submit" class="btn btn-primary btn-lg btn-block">Confirmar</button>
<br/> <br/>
<input type="hidden" id="description" name="description" value=<?=$descriton_post?>>

<!--  

<div class="form-group">
      <div class="col-md-4">
      <label >Descrição do Encarte</label>
    <input type="text" class="form-control" name="description" placeholder="Descrição" value="" maxlength="31">
    <?php echo form_error('description', '<small class = "form-text text-danger">','</small>');?>
  </div>
<BR/>


  <div class="col-md-4">
      <label >Texto Cabeçalho Direita</label>
    <input type="text" class="form-control" name="header2" placeholder="Texto Cabeçalho Direita" value="" maxlength="21" >
    <?php echo form_error('header2', '<small class = "form-text text-danger">','</small>');?>
  </div>


  <div class="form-group">
      <div class="col-md-4">
      <label >Rodapé 1 (Dica: Colocar Telefone)</label>
    <input type="text" class="form-control" name="footer_text" placeholder="Rodapé" value="" maxlength="49">
    <?php echo form_error('footer_text', '<small class = "form-text text-danger">','</small>');?>
  </div>

    <div class="col-md-4">
      <label >Rodapé 2 (Dica - Colocar Endereço)</label>
    <input type="text" class="form-control" name="footer_text2" placeholder="Rodapé 2" value="" maxlength="73">
    <?php echo form_error('footer_text2', '<small class = "form-text text-danger">','</small>');?>
  </div>
</div>

  <div class="form-group col-md-4">
    <label >Tamanho do Encarte</label>

                                <select class="form-control " name="column_amount">
                                <option value="3">Mini - 3 Colunas</option>
                                <option value="4">Médio - 4 Colunas</option>
                                <option value="5">Grande - 5 Colunas </option>
                                <option value="6">Grande - 6 colunas </option>
                                </select>
                                <?php echo form_error('column_amount', '<small class = "form-text text-danger">','</small>');?>

                            </div>
-->

  <div class ="container_text_button">
  <img  src="<?= base_url() . "images/templates/".$template->header_image ?>" width=<?=$width?> height=<?=$height?>>  

</div>
    <div class="col-md-4">
  </div>
</div>



</form>




                        
                            </div>
                        </div>
                    </div>





                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
