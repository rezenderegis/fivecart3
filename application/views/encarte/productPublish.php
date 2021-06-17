<style>
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

</style>

   <?php $this->load->view('layout/sidebar'); ?>

     
            <!-- Main Content -->
            <div id="content">

               <?php $this->load->view('layout/navbar');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
  </ol>
</nav>

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


 <!-- DataTales Example -->
 <div class="card shadow mb-4">

<div class="card-body"> 
 <table class="table table-striped">
 <tr>
 <td>Descrição</td>
 <td><?=$publish->description?></td>
 <tr>
 <tr>
 <td>Texto Cabeçalho</td>
 <td><?=$publish->header2?></td>
 <tr>
</table>

<!--
<a href="#about">About</a>
    <a href="#base">Base</a>
    <a href="#blog">Blog</a>
    <a href="#contact">Contact</a>
    <a href="#custom">Custom</a>
    <a href="#support">Support</a>
    <a href="#tools">Tools</a>
    -->
<a title="Alterar Dados" href="<?php echo base_url('encarte/edit/'.$idProductList);?>" class="btn btn-primary btn-sm"><i class="fas fa-box-open"></i>&nbsp;Alterar Dados</a>

</div>

<!--
<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Dropdown</button>
  <div id="myDropdown" class="dropdown-content">
    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()" name="product">
    <?php foreach ($products as $product) {?>
<a href="<?php echo $product['id'];?>"><?php echo $product['name'];?></a>

<?php }?>
    
  </div>
</div>
    -->
<div class="card-header py-3">
<form method="POST" name="form_addProduct" action ="<?php echo base_url('encarte/addProduct/'.$idProductList);?>">

<select class="form-control form-control-sm col-sm-6" name="product" >
<?php foreach ($products as $product) {?>
<option value="<?php echo $product['id'];?>"><?php echo $product['name'];?></option>

<?php }?>
</select>
<br>
  <?php
                        if ($publish->id_template != '') { ?>
                        
                        <table align="left">
                            <tr>
                            <td>
                            <button type="submit" class="btn btn-sm btn-primary">Adicionar Produto</button>

                            </td>
                           <td>
                            <a title="Visualizar Encarte" href="<?php echo base_url('encarte/showPublish/'.$idProductList.'/'.$publish->id_template);?>" class="btn btn-primary btn-sm float-left"><i class="fas fa-box-open"></i>&nbsp;Visualizar Encarte</a> 
                        </td>
                        <td>
                            <a title="Alterar Template" href="<?php echo base_url('encarte/index/'.$idProductList);?>" class="btn btn-primary btn-sm float-left"><i class="fas fa-box-open"></i>&nbsp;Alterar Template</a>
                        </td>


                            <?php } else { ?>
                        <a title="Gerar Encarte" href="<?php echo base_url('encarte/index/'.$idProductList);?>" class="btn btn-primary btn-sm float-right"><i class="fas fa-box-open"></i>&nbsp;Gerar Encarte</a>
                               <?php }?> 
                               </tr>
    
                               </table>

</form>

                        

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <!-- 04-06: I excluded dataTable class because she wasnt organizing like query-->
                                <table class="table table-bordered "  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="no-sort">Produto</th>

                                            <th class="no-sort">Preço</th>
                                            <th class="text-right no-sort"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php //print_r($productPublish); die();?>
                                        <?php foreach ($productPublish as $productPub) : ?>
                                        <tr>
                                            <td><?=$productPub['name'] ?></td>
                                            <td>   <a href="<?php echo base_url('/encarte/editProductPublish/'.$productPub['id_product_publish'].'/'.$productPub['id_publish']); ?>" class="money"><?=$productPub['price']?></a> </td>

                                            <td class="text-right">
                                                <a title="Excluir" href="javascript(void)" data-toggle="modal" data-target="#user-<?php echo $productPub['id_product_publish']; ?>" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a> 

                                            </td>
                                            
                                        </tr>


<!-- Logout Modal-->



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
                                        









                                        <?php endforeach;?>
                                    </tbody>
                                </table>
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