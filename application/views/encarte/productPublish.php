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
.img-flag {
    width: 60px;
    height: 60px;
}

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
  background-color: #4469D7;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
  background-color: #eec458;
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
  color: #FFFFFF;
  background-color: #4469D7;
  min-width: 230px;
  border: 1px solid #ddd;
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #eec458}

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

.size_combo {
  font-size: 510px;
  width: 500;
  height: 100;
    background-color: #4469D7;


}
.custom-select {
  /* The container must be positioned relative: */
.custom-select {
  position: relative;
  font-family: Arial;
}

.custom-select select {
  display: none; /*hide original SELECT element: */
}

.select-selected {
  background-color: DodgerBlue;
}

/* Style the arrow inside the select element: */
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}

/* Point the arrow upwards when the select box is open (active): */
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}

/* style the items (options), including the selected item: */
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
}

/* Style items (options): */
.select-items {
  position: absolute;
  background-color: DodgerBlue;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}

/* Hide the items when the select box is closed: */
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}
}
</style>

<!-- select2 css -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-theme@0.1.0-beta.10/dist/select2-bootstrap.min.css" rel="stylesheet" />


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

<?php if ($publish->date_generate) { ?>
    <div class "row">
    <div class ="col-md-12">

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong><?php echo "Não gostou do Post ou Encarte? Quer ajuda para melhorar?";?></strong> 
  <a  href="<?= base_url() . "encarte/callUrlZap"; ?>">

    <img src='<?= base_url() . "images/icons/watsapp_icon.png"; ?>' style='width: 15px; heigth: 15px;'>
    Entre em contato pelo WhatsApp, atendimento Imediato!
    </a>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>
</div>
<?php } ?>
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
<!--
<div class="cabecalho">
Inclua Produtos no Encarte
</div>
-->


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

<div class="dropdown">

  <!-- <button type="button" onclick="myFunction()" class="btn btn-warning btn-lg text-dark">Incluir Produto no Encarte</button> -->
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

<br/><br/>
<table class"table">
  <tr>
    <td>

<div class="dropdown">
  <button class="btn btn-primary btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <?=lang('data');?>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="<?php echo base_url('encarte/edit/'.$idProductList);?>"><?=lang('change_text');?></a>
    <?php
    if ($publish->id_template != '') { ?>
    <a class="dropdown-item" href="<?php echo base_url('encarte/index/'.$idProductList);?>">
    <?=lang('change_template');?>
    </a>
   
                        <?php } else { ?>
                          <a class="dropdown-item" href="<?php echo base_url('encarte/index/'.$idProductList);?>"><?=lang('generate');?></a>
                           <?php }?> 

                
      </div>
</div>
                        </td>

     
                        <td>
                        <a class="btn btn-primary btn-lg" href="<?php echo base_url('uploadFile/uploadFile/'.$this->ion_auth->user()->row()->id);?>"><?=lang('adjust_logo');?> &nbsp;</a>

                       <!--  <a href="<?php echo base_url('encarte/viewFlyerImage/'.$this->ion_auth->user()->row()->id.'/'.$idProductList);?>" class="btn btn-primary btn-sm" role="button" aria-disabled="true"><i class="fa fa-file-picture-o"></i>Visualizar</a> -->

                  
                        

    </td>
    <?php if ($this->ion_auth->user()->row()->id == 1) {?>
    <td>
   
    <a href=" <?= base_url() . "encarte/viewFlyerImage/".$this->ion_auth->user()->row()->id."/".$idProductList."/0"; ?>" class="btn btn-primary btn-lg" role="button" aria-disabled="true" id="showPictureButton"><?=lang('view');?>&nbsp;&nbsp;&nbsp;&nbsp;</a>

    </td>
    <?php }?>
    <td>
    
    
      <?php 
        $improve_logo = '';
        $remove_background = '';
      $mensagemFundo = '(24hrs)';
      $mensagemLogo = '(24hrs)';

      if ($helpFundo) {
        $mensagemFundo = '';//lang('processing')
      }
    
      if ($helpLogo) {
        $mensagemLogo = '';//lang('processing')

      }
      
      ?>

                    </td>
                    </tr>
                    <tr>
        <td>

        <div class="dropdown justify-content-center">
  <button  class="btn btn-primary btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <?=lang('help');?>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item " href="<?php echo base_url('help/new/1/'.$idProductList);?>"><?=lang('generate');?> <?=$remove_background?> </a>
   
 
    <a class="dropdown-item" href="<?php echo base_url('help/new/2/'.$idProductList);?>"><?=lang('generate');?> <?=$improve_logo?></a>
                
    <a class="dropdown-item" href="<?= base_url() . "encarte/callUrlZap"; ?>">
    <img src='<?= base_url() . "images/icons/watsapp_icon.png"; ?>' style='width: 15px; heigth: 15px;'>
    <?=lang('online_support');?>
    </a>

                
      </div>
</div>


        </td>
        <td>
        <a class="btn btn-primary btn-lg" href="<?php echo base_url('product/index/0/1');?>"><?=lang('new_product');?></a>

        </td>
      </tr>
      <?php 
                     
                     if ($template->type_template == 1) { ?>
      <tr>
    <td colspan="2">
   
   <?php 
                      if ($existProductWithoutPrice == 1) { ?>
                       <a title="Visualizar" href="javascript(void)" data-toggle="modal" data-target="#user-showPictureButton" class="btn btn-warning btn-lg text-dark btn-block"><?=lang('view');?> &nbsp;&nbsp; &nbsp; &nbsp;</a> 
                        <?php } else { ?>
                          <a href=" <?= base_url() . "encarte/callUrlAws/".$idProductList."/".$this->ion_auth->user()->row()->id."/0/1"; ?>" class="btn btn-primary btn-lg btn-block" role="button" aria-disabled="true" id="showPictureButton"><?=lang('view');?>&nbsp;&nbsp;&nbsp;&nbsp;</a>
                         
                          <?php } 
                     
                          ?>


    </td>
    </tr>
    <?php }?>
    </table>
 
<br/>


<div class ="container_text_button">
<?php //if ($template->type_template == 1) { ?>
  <!--  <img  src="<?= base_url() . "images/templates/".$template->header_image ?>" width="300" height="100">  -->
  <?php // } else {?>
   <!-- <img  src="<?= base_url() . "images/templates/".$template->header_image ?>" width="150" height="100">  -->
<?php //}?>

</div>
<!-- size_combo -->
<select class="product-list form-control">
    <option></option>
</select>

<div class="card-body">
    <div class="loading text-primary" style="display:none"><b>Processando...</b></div><br>
    <div class="table-responsive">
        <table id="product-publish-list" class="table tableFit"  width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th><?=lang('product');?></th>
                    <th class="text-right"></th>
                </tr>
            </thead>
        </table>
    </div>
</div>

                        <?php          //             if ($template->type_template == 1) {?>
       <!--                 <img  src="<?= base_url() . "images/templates/".$template->footer_image ?>" width="300" height="100">  -->

                    


                    





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
                    <a class="btn btn-danger btn-sm" href=" <?= base_url() . "encarte/callUrlAws/".$idProductList."/".$this->ion_auth->user()->row()->id."/0/1"; ?>">Sim</a>
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
    
    
<script>
(function() {
    $(document).ready(function() {


        var loading = $('.loading');
        var product = $('.product-list');
        var productPublish = $('#product-publish-list');
        var urlProductList = '<?= base_url("encarte/getProductList/$idProductList") ?>';
        var idUser = '<?= $this->ion_auth->user()->row()->id ?>';
        var template = '<?= $template->type_template ?>';
        
        function formatProduct (product) {

            if (!product.id) {
                return product.text;
            }
           
            //ENDERECO_IMAGEM
           // var baseUrlImg = 'http://meusencartes.com.br/fivecart3/images/Products';

            var baseUrlImg = '<?= base_url("/images/Products") ?>';
            var $product = $(
                '<span><img src="' + baseUrlImg + '/' + product.image_link + '" class="img-flag" /> ' + product.text + '</span>'
            );
            
            return $product;
        }
        
        product.select2({
            language: 'pt-BR',
            theme: 'bootstrap',
            placeholder: 'Add Product',
            templateResult: formatProduct,
            delay: 250,
            ajax: {
                url: urlProductList,
                dataType: 'json'
            }
        });
        
        var productPublishTable = productPublish.DataTable({
            dom: 't',
            language: {
                "emptyTable": "Nenhum produto cadastrado",
                "loadingRecords": "",
                "zeroRecords": "Nenhum produto cadastrado",
            },
            ajax: '<?= base_url("encarte/getProductPublishList/$idProductList") ?>',
            paging: false,
            searching: false,
            ordering:  false,
            columns: [
                {
                    data: 'name',
                    render: function(data, type, obj) {

                      //ENDERECO_IMAGEM
                      //  var urlImg = 'http://meusencartes.com.br/fivecart3/images/Products' + obj.image_link;

                        var urlImg = '<?= base_url("/images/Products/") ?>' + obj.image_link;
                        var img = $('<img class="imgProduct">').attr('src', urlImg);
                        
                        var div = $('<div></div>');
                        var span = $('<span></span>').text(data);
                        
                        var urlEditProductPublish = '<?= base_url("/encarte/editProductPublish/") ?>' + obj.id_product_publish + '/' + obj.id_publish;
                        var aEditProductPublish = $('<a class="money price"></a>')
                            .text(obj.price)
                            .attr('href', urlEditProductPublish)
                            .addClass(obj.price == '0.00' ? 'bg-warning' : '');
                        
                        var table = $('<table><tr><td>' + aEditProductPublish[0].outerHTML + '</td></tr></table>');
                        
                        if(template == 2) {
                            var urlAws = '<?= base_url() . "encarte/callUrlAws/".$idProductList."/".$this->ion_auth->user()->row()->id."/" ?>' + obj.id_product_publish + "/1";
                            table.find('tr').append('<td><a href="' + urlAws + '" role="button" aria-disabled="true" id="showPictureButton" class="btn btn-warning btn-lg text-dark"> <?=lang('view');?> </a></td>');
                            
                            if(idUser == 1) {
                                var urlFlyerImage = '<?= base_url() . "encarte/viewFlyerImage/".$this->ion_auth->user()->row()->id."/".$idProductList."/" ?>' + obj.id_product_publish;
                                table.find('tr').append('<td><a href="' + urlFlyerImage + '" class="btn btn-primary btn-lg" role="button" aria-disabled="true" id="showPictureButton"><?=lang('view');?> v&nbsp;&nbsp;&nbsp;&nbsp;</a></td>');
                            }
                        }
                        
                        div
                            .append(img)
                            .append('<br>')
                            .append(span)
                            .append('<br>')
                            .append(table);
                        
                        return div[0].outerHTML;
                    }
                },
                {
                    data: 'id_product_publish',
                    render: function(data, type, obj) {
                        var url = '<?= base_url("encarte/deleteProduct/") ?>' + obj.id_product_publish + '/' + obj.id_publish + '/' + 'isAjax';
                        var e = $('<a class="del-product-publish btn btn-lg btn-danger"><i class="far fa-trash-alt"></i></a>')
                            .attr('href', url)
                        return e[0].outerHTML;
                    }
                },
            ],
        });
        
        product.on('select2:select', function(){
            var urlAddProduct = '<?= base_url("encarte/addProduct1/$idProductList/") ?>' + this.value;
            loading.show();
            $.get(urlAddProduct, function() {
                productPublishTable.ajax.reload();
            }).fail(function (e) {
                alert(e.responseText);
            });
            product.val(null).trigger('change');
        });
        
        productPublishTable.on('preXhr.dt', function() {
            loading.show();
        }).on('xhr.dt', function() {
            loading.hide();
        }).on('click', '.del-product-publish', function(e) {
            loading.show();
            e.preventDefault();
            $.get(this.href, function() {
                productPublishTable.ajax.reload();
            }).fail(function (e) {
                alert(e.responseText);
            });
        });
    });
})();
</script>
