

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
                        <div class="card-header py-3">

                        <a title="Cadastrar Novo Produto" href="<?php echo base_url('activity/add');?>" class="btn btn-success btn-sm float-right"><i class="fas fa-box-open"></i>&nbsp;New</a>


                        </div>
                        

                        <div class="card-body">


<form name="templateSelect" method="POST" action="<?php echo base_url('/activity/index/'); ?>"  >
<form class="needs-validation" novalidate>
  <div class="form-row">
    
<div class="col-md-3">
      <label>Responsible</label>
      <select class="form-control" name="id_responsible">
      <option value="" ></option>

        <?php foreach($usersTeam as $user) :?>

          <option value="<?=$user['id_member']?>"><?=$user['id_member'].'-'.$user['first_name'].' '.$user['last_name']?> </option>
          <?php endforeach;?>

          </select>
    </div>
    <div class="col-md-3">
      <label>Tecnical Responsible</label>
      <select class="form-control" name="tecnical_responsible">
      <option value="" ></option>

        <?php foreach($usersTeam as $user) :?>

          <option value="<?=$user['id_member']?>"><?=$user['id_member'].'-'.$user['first_name'].' '.$user['last_name']?> </option>
          <?php endforeach;?>

          </select>
    </div>
    
    <div class="col-md-3 mb-3">
      <label>TAG 1</label>
      <select class="form-control" name="tag1">
      <option value="" ></option>

        <?php foreach($tags1 as $user) :?>

            <option value="<?=$user['tag']?>"><?=$user['tag']?> </option>
          <?php endforeach;?>

          </select>
    </div>
    <div class="col-md-3 mb-3">
      <label>TAG 2</label>
      <select class="form-control" name="tag2">
      <option value="" ></option>

        <?php foreach($tags2 as $user) :?>

            <option value="<?=$user['tag']?>"><?=$user['tag']?> </option>
          <?php endforeach;?>

          </select>
    </div>
  </div>
  <div class="form-row">
  <div class="col-md-3 mb-3">
      <label>TAG 3</label>
      <select class="form-control" name="tag3">
      <option value="" ></option>

        <?php foreach($tags3 as $user) :?>

          <option value="<?=$user['tag']?>"><?=$user['tag']?> </option>
          <?php endforeach;?>

          </select>
    </div>
    <div class="col-md-3 mb-3">
      <label>TAG 4</label>
      <select class="form-control" name="tag4">
      <option value="" ></option>

        <?php foreach($tags4 as $user) :?>

            <option value="<?=$user['tag']?>"><?=$user['tag']?> </option>
          <?php endforeach;?>

          </select>
    </div>
    <div class="col-md-3 mb-3">
      <label>Status</label>
      <select class="form-control" name="tag4">
      <option value="" ></option>

        <?php foreach($status as $stat) :?>

            <option value="<?=$stat['id']?>"><?=$stat['description']?> </option>
          <?php endforeach;?>

          </select>
    </div>
    
  </div>
        
    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
</form>
<BR>







                            <div class="table-responsive">
                                <table class="table table-bordered table-striped dataTable " width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tag1</th>
                                            <th>Tag2</th>

                                            <th>Name</th>
                                            <th>Tag3</th>
                                            <th>Tag4</th>

                                            <th>Responsible</th>
                                            <th>Delivery Date</th>
                                            <th>Last Report</th>
                                            <th>Report Date</th>
                                            <th class="text-right no-sort">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($products as $product) : ?>
                                        <?php 
                                            
                                          $last_report =  $this->core_model->get_last_report($product['id']);
                                         // print_r($last_report);
                                          
                                            ?>
                                        <tr>

                                            <td><?=$product['id']?></td>
                                            <td><?=$product['tag1']?></td>

                                            <td><?=$product['tag2']?></td>

                                          <!-- 
                                            <td> <a  href="<?php echo base_url('/upload/index/'.$product['id']); ?>"> <?=$product['name'] ?></a> 
                                          -->
                                            <td> <a  href="<?php echo base_url('/activity/edit/'.$product['id']); ?>"> <?=$product['name'] ?></a> 
</td>
                                            <td><?=$product['tag3'] ?></td>
                                            <td><?=$product['tag4'] ?></td>

                                            <td><?=$product['first_name'] ?></td>
                                            <td><?=$product['date_delivery'] ?></td>
                                            <td><?php if ($last_report) { ?>
                                                
                                                <a  href="<?php echo base_url('/report/index/'.$product['id']); ?>"> <?=$last_report->description?></a> 

                                            <?php 
                                            } else {?>  
                                            
                                            <a  href="<?php echo base_url('/report/index/'.$product['id']); ?>"> Informar Report</a> 

                                            <?php } ?></td>
                                            <td><?php if ($last_report) {echo $last_report->data;}?></td>
                                            <td class="text-right">


                    
                                                <?php if ($product['id_owner'] == $this->ion_auth->user()->row()->id) {?>

                                                <a title="Excluir" href="javascript(void)" data-toggle="modal" data-target="#user-<?php echo $product['id']; ?>" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a> 
                                                <?php }?>

                                            </td>

                                        </tr>

<?php //print_r($product); die();?>
<!-- Logout Modal-->
<div class="modal fade" id="user-<?php echo $product['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <a class="btn btn-danger btn-sm" href="<?php echo base_url('product/delete/'.$product['id']);?>">Sim</a>
                
                
                
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
