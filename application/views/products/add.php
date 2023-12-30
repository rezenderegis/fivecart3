
   <?php //$this->load->view('layout/sidebar'); ?>

     
            <!-- Main Content -->
            <div id="content">

               <?php $this->load->view('layout/navbar');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

<div class="cabecalho">
<?php echo $titulo; ?>
</div>
     
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
                        <div class="card-header py-3">


                        <?php if (strcmp($_SESSION['type_product'] , 'first') == 0) { ?>
                          <a title="Voltar" href="<?php echo base_url('encarte/allCarts')?>" class="btn btn-primary btn-lg float-left"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>

                          <?php } else {?>
                            <a title="Voltar" href="<?php echo base_url('product')?>" class="btn btn-primary btn-lg float-left"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
<?php }?>

                        </div>

                        <div class="card-body">
                            
<form method="POST" name="form_add">
  <div class="form-group">
      <div class="col-md-lg">
      <label >Nome do Produto</label>
    <input type="text" class="form-control" name="name" placeholder="Nome do Produto" value="<?=set_value('name');?>" maxlength="55">
    <?php echo form_error('name', '<small class = "form-text text-danger">','</small>');?>
  </div>
  
    <div class="col-md-lg">
      <label >Descrição do Produto</label>
    <input type="text" class="form-control" name="description" placeholder="Descrição do Produto" value="<?=set_value('description');?>" maxlength="31">
    <?php echo form_error('description', '<small class = "form-text text-danger">','</small>');?>

  </div>
  
	<div class="form-group col-md-lg">
    <label >País</label>

                                <select class="form-control " name="country">
                                <option value=""></option>
                               
<option value="1">Brasil</option>
<option value="2">Estados Unidos</option>
<option value="8">Colômbia</option>
<option value="99">Outros</option>

                                </select>
                                <?php echo form_error('country', '<small class = "form-text text-danger">','</small>');?>

                            </div>	

    <div class="form-group col-md-lg">
    <label >Tipo de Empresa</label>

                                <select class="form-control " name="shop_type">
                                <option value=""></option>
                                <option value="1">Supermercado</option>
                                <option value="2">Açougue</option>
                                <option value="3">Verdurão</option>
                                <option value="4">Cosméticos</option>
                                <option value="5">Hamburgeria</option>
                                <option value="6">Restaurante</option>
                                <option value="7">Distribuidora de Bebidas</option>
																<option value="8">Papelaria</option>
																<option value="9">Bar</option>

                                <option value="99">Outros</option>

                                </select>
                                <?php echo form_error('shop_type', '<small class = "form-text text-danger">','</small>');?>

                            </div>
							
		
														<div class="form-group col-md-lg">
    <label >Categoria</label>

                                <select class="form-control " name="id_cathegory">
                                <option value=""></option>
<option value="6">Carnes e miudezas, comestíveis</option>
<option value="7">Cervejas, chopes, refrigerantes, águas e outras bebidas</option>
<option value="8">Crustáceos, moluscos e outros invertebrados aquáticos, preparados ou em conservas</option>
<option value="9">Grãos - Feijão</option>
<option value="10">Leite e lacticínios; ovos de aves; mel natural; productss comestíveis de origem animal</option>
<option value="11">Materiais de limpeza</option>
<option value="12">Mel</option>
<option value="13">productss alimentícios - cozidos em água ou vapor, congelados</option>
<option value="14">productss alimentícios - Massas alimentícias</option>
<option value="15">productss alimentícios - Massas alimentícias do tipo comum</option>
<option value="16">productss alimentícios - Massas alimentícias recheadas</option>
<option value="17">productss alimentícios - Massas tipo instantânea</option>
<option value="18">productss alimentícios - Outros productss hortícolas preparados ou conservados</option>
<option value="19">productss alimentícios - Tomates preparados ou conservados</option>
<option value="20">Molhos</option>
<option value="21">Peixes e crustáceos, moluscos e outros invertebrados aquáticos</option>
<option value="22">Cosméticos</option>
<option value="23">Higiene</option>
<option value="25">Hortaliças</option>
<option value="26">Ferragens</option>
<option value="29">Congelados</option>
<option value="30">Ferramentas, artigos de cutelaria e talheres, e suas partes, de metais comuns</option>
<option value="50">Papelaria</option>
<option value="32">Eletrodomésticos</option>
<option value="33">Facas</option>
<option value="34">Panelas</option>
<option value="35">Mercearia</option>
<option value="36">Hamburgeria</option>
<option value="37">Restaurante</option>
<option value="38">Papelaria</option>
<option value="39">Diversos</option>

                                </select>
                                <?php echo form_error('id_cathegory', '<small class = "form-text text-danger">','</small>');?>

                            </div>												

    <div class="col-md-4">
      <label >Preço</label>
    <input type="text" class="form-control form-control-user-date money" name="price" placeholder="Preço" value="<?=set_value('price');?>">
    <?php echo form_error('preco', '<small class = "form-text text-danger">','</small>');?>
    </div>
</div>


  <button type="submit" class="btn btn-primary btn-lg">Salvar</button>
</form>




                        
                            </div>
                        </div>
                    </div>





                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
