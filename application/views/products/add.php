
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
                            
<form method="POST" name="form_add">
  <div class="form-group">
      <div class="col-md-4">
      <label >Atividade</label>
    <input type="text" class="form-control" name="name" placeholder="Nome da Atividade" value="" maxlength="100">
    <?php echo form_error('name', '<small class = "form-text text-danger">','</small>');?>
  </div>
  
    <div class="col-md-4">
      <label >Descrição</label>
    <input type="text" class="form-control" name="description" placeholder="Descrição da Atividade" value="" maxlength="300">
    <?php echo form_error('description', '<small class = "form-text text-danger">','</small>');?>

  </div>
    <div class="col-md-4">
      <label>Manager</label>
      <select class="form-control" name="id_responsible">
        <?php foreach($usersTeam as $user) :?>
          <option value="<?=$user['id']?>"><?=$user['first_name'].' '.$user['last_name']?></option>
          <?php endforeach;?>

          </select>
    </div>
    <div class="col-md-4">
      <label>Tecnical Responsible</label>
      <select class="form-control" name="tecnical_responsible">
        <?php foreach($usersTeam as $user) :?>
          <option value="<?=$user['id']?>"><?=$user['first_name'].' '.$user['last_name']?></option>
          <?php endforeach;?>

          </select>
    </div>
  
    <div class="col-md-4">
      <label >Previsão Entrega</label>
    <input type="text" class="form-control date" name="date_delivery" placeholder="Previsão de Entrega" value="">
    <?php echo form_error('preco', '<small class = "form-text text-danger">','</small>');?>
    </div>
    

    <div class="col-md-4">
      <label >Atividade Pai</label>
    <input type="text" class="form-control" name="phather_actity" placeholder="Atividade Pai" value="">
    <?php echo form_error('preco', '<small class = "form-text text-danger">','</small>');?>
    </div>

    <div class="col-md-4">
      <label >Tag1</label>
    <input type="text" class="form-control" name="tag1" placeholder="Tag 1" value="">
    <?php echo form_error('preco', '<small class = "form-text text-danger">','</small>');?>
    </div>


    <div class="col-md-4">
      <label >Tag2</label>
    <input type="text" class="form-control" name="tag1" placeholder="Tag 2" value="">
    <?php echo form_error('preco', '<small class = "form-text text-danger">','</small>');?>
    </div>


    <div class="col-md-4">
      <label >Tag3</label>
    <input type="text" class="form-control" name="tag1" placeholder="Tag 3" value="">
    <?php echo form_error('preco', '<small class = "form-text text-danger">','</small>');?>
    </div>
    <div class="col-md-4">
      <label >Tag4</label>
    <input type="text" class="form-control" name="tag4" placeholder="Identificador" value="">
    <?php echo form_error('preco', '<small class = "form-text text-danger">','</small>');?>
    </div>
    <div class="col-md-4">
      <label>Status</label>
      <select class="form-control" name="status_exec">
        <?php foreach($status as $statu) :?>
          <option value="<?=$statu['id']?>"><?=$statu['description']?></option>
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
