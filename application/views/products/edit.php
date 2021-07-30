

   <?php $this->load->view('layout/sidebar'); ?>

     
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

                   
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
                        <div class="card-header py-3">

                            <a title="Voltar" href="<?php echo base_url('Home')?>" class="btn btn-success btn-sm float-right"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>

                        </div>

                        <div class="card-body">
 <?php 
  $editValue = '';
 if ($this->ion_auth->user()->row()->id != $product->id_owner) {
 $editValue = "DISABLED"; }  ?>                           
<form method="POST" name="form_edit">
  <div class="form-group">
      <div class="col-md-4">
      <label >Nome do Produto</label>
    <input type="text" class="form-control" name="name" placeholder="Nome da Atividade"  value="<?php echo $product->name;?>"  maxlength="31">
    <?php echo form_error('name', '<small class = "form-text text-danger">','</small>');?>
  </div>
  
    <div class="col-md-4">
      <label >Descrição do Produto</label>
    <input type="text" class="form-control" name="description" placeholder="Descrição da Atividade" value="<?php echo $product->description;?>" maxlength="31">
    <?php echo form_error('description', '<small class = "form-text text-danger">','</small>');?>

  </div>
  <div class="col-md-4">
      <label>Responsável</label>
      <select class="form-control" name="id_responsible">
      <option value="" ></option>

        <?php foreach($usersTeam as $user) :?>

          <option value="<?=$user['id_member']?>" <?php if ($user['id_member'] == $product->id_responsible) {echo " selected";}?>><?=$user['id_member'].'-'.$user['first_name'].' '.$user['last_name']?> </option>
          <?php endforeach;?>

          </select>
    </div>


  <div class="col-md-4">
      <label>Responsável</label>
      <select class="form-control" name="tecnical_responsible">
      <option value="" ></option>

        <?php foreach($usersTeam as $user) :?>

          <option value="<?=$user['id_member']?>" <?php if ($user['id_member'] == $product->tecnical_responsible) {echo " selected";}?>><?=$user['id_member'].'-'.$user['first_name'].' '.$user['last_name']?> </option>
          <?php endforeach;?>

          </select>
    </div>
  
  
    <div class="col-md-4">
      <label >Previsão Entrega</label>
    <input type="text" class="form-control date" name="date_delivery" placeholder="Previsão de Entrega" value="<?php echo date( 'd/m/Y',  strtotime( $product->date_delivery ) ) ;?>">
    <?php echo form_error('preco', '<small class = "form-text text-danger">','</small>');?>
    </div>


    <div class="col-md-4">
      <label >Atividade Pai</label>
    <input type="text" class="form-control" name="phather_actity" placeholder="Atividade Pai" value="<?php echo $product->phather_actity;?>">
    <?php echo form_error('preco', '<small class = "form-text text-danger">','</small>');?>
    </div>


    <div class="col-md-4">
      <label >Tag1</label>
    <input type="text" class="form-control" name="tag1" placeholder="Tag 1" value="<?php echo $product->tag1;?>">
    <?php echo form_error('preco', '<small class = "form-text text-danger">','</small>');?>
    </div>


    <div class="col-md-4">
      <label >Tag2</label>
    <input type="text" class="form-control" name="tag2" placeholder="Tag 2" value="<?php echo $product->tag2;?>">
    <?php echo form_error('preco', '<small class = "form-text text-danger">','</small>');?>
    </div>


    <div class="col-md-4">
      <label >Tag3</label>
    <input type="text" class="form-control" name="tag3" placeholder="Tag 3" value="<?php echo $product->tag3;?>">
    <?php echo form_error('preco', '<small class = "form-text text-danger">','</small>');?>
    </div>

    <div class="col-md-4">
      <label >Tag4</label>
    <input type="text" class="form-control" name="tag4" placeholder="Identificador" value="<?php echo $product->tag4;?>">
    <?php echo form_error('id_activity', '<small class = "form-text text-danger">','</small>');?>
    </div>

  <div class="col-md-4">
      <label>Status</label>
      <select class="form-control" name="status_exec">
      <option value="" ></option>

        <?php foreach($status as $statu) :?>

          <option value="<?=$statu['id']?>" <?php if ($statu['id'] == $product->status_exec) {echo " selected";}?>><?=$statu['description']?> </option>
          <?php endforeach;?>

          </select>
    </div>
</div>








  <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
</form>




                        
                            </div>
                        </div>
                    </div>





                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
