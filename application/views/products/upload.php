<?php //$this->load->view('layout/sidebar'); ?>
        
   <?php $this->load->view('/layout/watsapp');?>


<!-- Main Content -->
            <div id="content">

               <?php $this->load->view('layout/navbar');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="cabecalho">
                Insira uma foto para o produto
</div>
 <!-- DataTales Example encarte/allCarts -->
 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <?php 
                            if (strcmp($_SESSION['type_product'] , 'first') == 0) { ?>
                              <a title="Criar Encarte" href="<?php echo base_url('encarte/allCarts')?>" class="btn btn-success btn-sm float-left"><i class="fas fa-arrow-left"></i>&nbsp;Criar Encarte</a>
                              
                            <?php             

                             } 
                             
                             //else { 
                               ?>
                            
                            
                           <!-- <a title="Voltar" href="<?php echo base_url('product/index/'.$idProduct)?>" class="btn btn-success btn-sm float-left"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>-->
                            <?php //} ?>

                        </div>
        
                        <div class="card-body">  
                       
                        <a class="btn btn-primary btn-sm float-left"  href="<?php echo base_url('product')
                        ?>">
   Concluir
  </a>
  &nbsp;&nbsp;
  <a class="btn btn-primary btn-sm " data-toggle="collapse" href="#collapseExample"  role="button" aria-expanded="false" aria-controls="collapseExample">
    Regras/Dicas do Upload Imagens
  </a>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
  <ul>
    <li>Remova o fundo das imagens pelo site <a href="https://removal.ai/upload/" target="_blank">Removal.AI</a> </li>
  <li> o arquivo deve ter no máximo 1M</li>
  <li> o arquivo deve ter estar no formato .PNG</li>
  <li>Largura (Width): 13cm </li>
  <li>Altura (Height): 24,44cm (Proporcionalmente)</li>
  <li> Resolução (Resolution): 72pixels</li>
  <li> CASO TENHA DIFICULDADE EM AJUSTAR A IMAGEM, ENTRE EM CONTATO PELO WATSAPP.</li>

</ul>
  </div>
</div>



  <?php echo form_open_multipart('upload/do_upload/'.$idProduct);?>
  <div class="form-group">
  
      <div class="col-md-6">
      <label >Arquivo</label>
      <div class="alert alert-warning" role="alert">
     <b> Atenção: Para melhor qualidade da imagem, antes de efetuar o UPLOAD, remova o fundo através do site <a href="https://removal.ai/upload/" target="_blank">Removal.AI</a> 
</b> 
    </div>
      
<div class="input-group">

<input type="file" class="form-control" id="userfile" name="userfile" aria-describedby="inputGroupFileAddon04" aria-label="Upload">

<input type="hidden" name="productId" value="<?php echo $idProduct; ?>">
<button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Inserir</button>
</div> 

</form>
 

<br/>
     <?php 
     
     if ($error == '0') { ?>
      <div >

     <?php 
     if ($productData->image_link) {?>




<div>
    <a title="Voltar" href="<?php echo base_url('encarte/testImage/'.$idProduct.'/'.$this->ion_auth->user()->row()->id)?>" class="btn btn-primary btn-sm float-left" role="button" aria-expanded="false" aria-controls="collapseExample" ></i>&nbsp;Ajustar Imagem</a>
     
 
    </div>
    <br/></br>
     <?php }?>


    <img class="img-fluid img-thumbnail" src="<?= base_url() . "images/Products/".$productData->image_link; ?>" alt="Snow" width="200" height="250">
     
     <?php 
     } else { ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Erro!</strong> <?=$error ?>
  </div>
<?php 
     }
  //   }

     ?>
                            </div>

                        </div>


                    </div>





                </div>
                <!-- /.container-fluid -->

            </div>



            <!-- End of Main Content -->
