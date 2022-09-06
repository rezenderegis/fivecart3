

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
grid-template-columns: auto auto;
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


.container_picture {

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
    width:  100%;
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
color: <?=$template->font_color;?>;
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
      width:  300px;
      height: 300px;
      object-position: bottom;
      margin-top: 8px;
  vertical-align: middle;

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

.rowFormat {
  display: flex;
  flex-wrap: wrap;
  padding: 0 4px;
}

/* Create two equal columns that sits next to each other */
.columnFormat {
  flex: 50%;
  padding: 0 4px;
}

.imageFormat {
  margin-top: 8px;
  vertical-align: middle;
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

 <!-- DataTales Example -->
 <div class="card shadow mb-4">

<div class="card-body"> 
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
 <td><?=$publish->footer_text?></td>
 <tr>
 <tr>
 <td>Texto Rodapé 2</td>
 <td><?=$publish->footer_text2?></td>
 <tr>
</table>

<table class"table"">
  <tr>
    <td>

<div class="dropdown">
  <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

                       <a href="http://ec2-3-87-24-65.compute-1.amazonaws.com/publish/<?= $this->ion_auth->user()->row()->id?>/<?=$idProductList?>" class="btn btn-primary btn-sm" role="button" aria-disabled="true"><i class="fa fa-file-picture-o"></i>Visualizar</a>
                       <!--  <a href="<?php echo base_url('encarte/viewFlyerImage/'.$this->ion_auth->user()->row()->id.'/'.$idProductList);?>" class="btn btn-primary btn-sm" role="button" aria-disabled="true"><i class="fa fa-file-picture-o"></i>Visualizar</a> -->

                        

    </td>
    </table>



<div class ="container_text_button">
  <img  src="<?= base_url() . "images/templates/".$template->header_image ?>" width="350" height="100">  
  <div class="text_button_right">
    <h6><?=$publish->header2 ?><h6>
  </div>
</div>
<br/>

<div class="dropdown">
  <button onclick="myFunction()" class="btn btn-primary btn-sm">Adicionar Produto</button>
  <div id="myDropdown" class="dropdown-content">
    <input type="text" placeholder="Procurar..." id="myInput" onkeyup="filterFunction()" name="product">
    <?php foreach ($products as $product) {?>
    <a href="<?php echo base_url('encarte/addProduct1/'.$idProductList.'/'.$product['id']);?>"><?php echo $product['name'];?></a>

    <?php }?>
    
</div>

</div>
    
  
  <div class="grid-container">
<?php foreach ($productPublish as $product) { ?>
<div class="gallery">
<div class="container_picture">


    <img src="<?php echo "http://meusencartes.com.br/fivecart3/images/Products/".$product['image_link']; ?>" alt="Snow" >

    <div class="textocentro"><?php echo 'R$'.number_format($product['price'], 2, ',', '.'); ?> </div>
</div>
    <div class="desc"><?=$product['name']?></div>
</div>
<?php }?>
</div>

<!-- Logout Modal-->


<!--
<div class="modal fade" id="user-<?php echo $productPub['id_product_publish']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja deletar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Para excluir o registro cliquem em Sim</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Não</button>
                    <a class="btn btn-danger btn-sm" href="<?php echo base_url('encarte/deleteProduct/'.$productPub['id_product_publish'].'/'.$productPub['id_publish']);?>">Sim</a>
                </div>
            </div>
        </div>
    </div>
                                        
-->



                            </div>
                        </div>
                        <img  src="<?= base_url() . "images/templates/".$template->footer_image ?>" width="350" height="100">  

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