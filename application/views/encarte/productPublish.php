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
left: 200px;
color: white;
text: bold;
width: 300px;
padding-left: 50px;
padding-right: 10px;
align: right;
}


.container_text_button{
position: relative;
}


/* Dropdown Button */
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
  background-color: #3e8e41;
}

/* The search field */
#myInput {
  box-sizing: border-box;
  background-image: url('searchicon.png');
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
}

/* The search field when it gets focus/clicked on */
#myInput:focus {outline: 3px solid #ddd;}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f6f6f6;
  min-width: 230px;
  border: 1px solid #ddd;
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}


.imgProduct {

  align: center;

      object-fit: scale-down;
      width:  150px;
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

.tableFit {
    width: auto !important;
    table-layout: auto !important;
}

.alignCenter {
  vertical-align: middle;

}

.price {
  font-family: "Helvetica", sans-serif;
  padding: 4px;
  font-size: 30px;
}
</style>

   <?php //$this->load->view('layout/sidebar'); ?>

     
<!-- Main Content -->
<div id="content">

               <?php $this->load->view('layout/navbar');?>

                <!-- Begin Page Content -->




 <div class="container-fluid">



<?php if ($message = $this->session->flashdata('error')): ?>
    <div class "row">
    <div class ="col-md-12">

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong><?php echo $message;?></strong> 
  <a href="<?php echo base_url('uploadFile/uploadFile/'.$this->ion_auth->user()->row()->id);?>" class="p-1 mb-2 bg-warning text-dark">Clique Aqui</a>

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
<div class="cabecalho">
Produtos do Encarte
</div>

<a class="btn btn-primary btn-lg" href="<?php echo base_url('uploadFile/uploadFile/'.$this->ion_auth->user()->row()->id);?>">Ajustar Logo</a>
<br/>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">

<?php 
 $footer_text = "";
 $footer_text2 = "";

if ($publish->footer_text) {
  $footer_text = $publish->footer_text;
  $footer_text2 = $publish->footer_text2;
}else if ($userDetail->footer_text) {
 

  $footer_text = $userDetail->footer_text;
  $footer_text2 = $userDetail->footer_text2;
} else if ($template->footer_text2) {
  
  $footer_text = $template->footer_text;
  $footer_text2 = $template->footer_text2;

  
}


?>


<div class="card-body"> 

  <!--
 <table class="table table-striped">
 <tr>
 <td><strong>Descrição</strong></td>
 <td><strong><?=$publish->description?></strong></td>
 <tr>
 <tr>
 <td>Texto Cabeçalho</td>
 <td><?=$publish->header2?></td>
 <tr>
 <tr>
 <td>Texto Rodapé 1</td>
 <td>
 <a href="<?php echo base_url('encarte/edit/'.$idProductList);?>"><?=$footer_text?></a>

</td>
 <tr>
 <tr>
 <td>Texto Rodapé 2</td>
 <td>
 <a href="<?php echo base_url('encarte/edit/'.$idProductList);?>"><?=$footer_text2?></a>
 
 </td>
 <tr>
</table>
-->
<table class"table"">
  <tr>
    <td>

<div class="dropdown">
  <button class="btn btn-primary btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Alterar
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="<?php echo base_url('encarte/edit/'.$idProductList);?>">Textos</a>
    <?php
    if ($publish->id_template != '') { ?>
    <a class="dropdown-item" href="<?php echo base_url('encarte/index/'.$idProductList);?>">Template</a>
   
                        <?php } else { ?>
                          <a class="dropdown-item" href="<?php echo base_url('encarte/index/'.$idProductList);?>">Gerar Encarte</a>
                           <?php }?> 

                
      </div>
</div>
                        </td>

     
                        <td>

                       <!--  <a href="<?php echo base_url('encarte/viewFlyerImage/'.$this->ion_auth->user()->row()->id.'/'.$idProductList);?>" class="btn btn-primary btn-sm" role="button" aria-disabled="true"><i class="fa fa-file-picture-o"></i>Visualizar</a> -->

                      <?php 
                     
                      if ($template->type_template == 1) {
                      if ($existProductWithoutPrice == 1) { ?>
                       <a title="Visualizar" href="javascript(void)" data-toggle="modal" data-target="#user-showPictureButton" class="btn btn-warning btn-lg text-dark">Visualizar</a> 
                        <?php } else { ?>
                          <a href="http://ec2-3-87-24-65.compute-1.amazonaws.com/publish/<?= $this->ion_auth->user()->row()->id?>/<?=$idProductList?>/0" class="btn btn-primary btn-lg" role="button" aria-disabled="true" id="showPictureButton"><i class="fa fa-file-picture-o"></i>Visualizar</a>

                          <?php } 
                      }
                          ?>
                        

    </td>
    <td> 
    <a class="btn btn-primary btn-lg" href="<?php echo base_url('product/index/0/1');?>">Novo Produto</a>

   
    </td>
    </table>



<div class ="container_text_button">
<?php if ($template->type_template == 1) { ?>
  <img  src="<?= base_url() . "images/templates/".$template->header_image ?>" width="300" height="100">  
  <?php } else {?>
    <img  src="<?= base_url() . "images/templates/".$template->header_image ?>" width="150" height="100">  
<?php }?>
  <div class="text_button_right">
    <h6><?=$publish->header2 ?><h6>
  </div>
</div>
<br/>

<div class="dropdown">
  <button onclick="myFunction()" class="btn btn-primary btn-lg">Adicionar Produto</button>
  <div id="myDropdown" class="dropdown-content">
    <input type="text" placeholder="Procurar..." id="myInput" onkeyup="filterFunction()" name="product">
    <?php foreach ($products as $product) {?>
    <a href="<?php echo base_url('encarte/addProduct1/'.$idProductList.'/'.$product['id']);?>"><?php echo $product['name'];?>
    <!-- <img src="<?php echo base_url('/images/Products/'.$product['image_link']); ?>" class="imgProduct">
    -->
  </a>

    <?php }?>
    
</div>

</div>


                      


    
                        <div class="card-body">
                            <div class="table-responsive">
                                <!-- 04-06: I excluded dataTable class because she wasnt organizing like query-->
                                <table class="table tableFit"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="no-sort">Produto</th>
                                            <th class="text-right no-sort"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    
                                    $id_product_publish = 0;
                                    ?>
                                        <?php foreach ($productPublish as $productPub) : ?>
                                          <?php $id_product_publish =  $productPub['id_product_publish']; ?>
                                        <tr>
                                       
                                            <td>
                                                <img src="<?php echo base_url('/images/Products/'.$productPub['image_link']); ?>" class="imgProduct">
                                                <br/>
                                                <?=$productPub['name'] ?>
                                                <br/>
                                                <table>
                                                <tr>
                                                  <td>
                                                <a href="<?php echo base_url('/encarte/editProductPublish/'.$productPub['id_product_publish'].'/'.$productPub['id_publish']); ?>" class="money price <?php if ($productPub['price'] == 0.00) {echo 'bg-warning';}?>"><?=$productPub['price']?></a>
                                        </td> 
                                                <?php if ($template->type_template == 2) {?>
                                                  <td>
                                                <a href="http://ec2-3-87-24-65.compute-1.amazonaws.com/publish/<?= $this->ion_auth->user()->row()->id?>/<?=$idProductList?>/<?=$productPub['id_product_publish']?>"  role="button" aria-disabled="true" id="showPictureButton" class="btn btn-warning btn-lg text-dark"> Visualizar  </a>
                                                </td>
                                                <?php }?>
                                                </table>
                                              </td>
                                            <td class="alignCenter">
                                                <!--<a title="Excluir" href="javascript(void)" data-toggle="modal" data-target="#user-<?php echo $productPub['id_product_publish']; ?>" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a> -->
                                                <a href="<?php echo base_url('encarte/deleteProduct/'.$productPub['id_product_publish'].'/'.$productPub['id_publish']);?>"  class="btn btn-lg btn-danger"><i class="far fa-trash-alt"></i></a> 



    
                                            </td>
                                          
                                        </tr>
                                     
                                    









                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php                       if ($template->type_template == 1) {
?>
                        <img  src="<?= base_url() . "images/templates/".$template->footer_image ?>" width="300" height="100">  
<?php } ?>
                    


                    





    <div class="modal fade" id="user-showPictureButton" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja continuar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Existem produtos sem preço. Deseja continuar?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Não</button>
                    <a class="btn btn-danger btn-sm" href="http://ec2-3-87-24-65.compute-1.amazonaws.com/publish/<?= $this->ion_auth->user()->row()->id?>/<?=$idProductList?>/0">Sim</a>
                </div>
            </div>
        </div>
    </div>



                                   
    </div>
             
                <!-- /.container-fluid -->
 </div>
            <!-- End of Main Content -->
<script>

    /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
    </script>