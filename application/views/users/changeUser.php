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

</style>

   <?php //$this->load->view('layout/sidebar'); ?>

     
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


</div>

<div class="card-header py-3">
<form method="POST" name="form_addProduct" action ="<?php echo base_url('usuario/changeUser');?>">

<select class="form-control form-control-sm col-sm-6" name="user" >
<?php foreach ($users as $user) {?>
<option value="<?php echo $user->id;?>"><?php echo $user->id." - ".$user->first_name;?></option>

<?php }?>
</select>
<br>
                        
                            <tr>
                            <td>
                            <button type="submit" class="btn btn-sm btn-primary">Adicionar Produto</button>

                            </td>
</form>


 <!-- DataTales Example -->
 <div class="card shadow mb-4">
                        <div class="card-header py-3">

                        <a title="Cadastrar Novo Usuário" href="<?php echo base_url('usuario/add');?>" class="btn btn-success btn-sm float-right"><i class="fas fa-user-plus"></i>&nbsp;Novo</a>


                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Usuário</th>
                                            <th>Nome</th>
                                            <th>Empresa</th>
                                            <th>Data</th>
                                            <th>Prod Owner</th>
                                            <th>Prod Name</th>
                                            <th>Prod Status</th>
                                            <th>Prod Price</th>


  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($userHistorys as $user) : ?>
                                        <tr>
                                            <td><?=$user['id_user']?></td>
                                            <td><?=$user['first_name'] ?></td>
                                            <td><?=$user['comname'] ?></td>
                                            <td><?=$user['date']?></td>
                                            <td><?=$user['user_owner_first_name']?></td>
                                            <td><?=$user['prodname']?></td>
                                            <td><?=$user['price']?></td>
                                            <td><?=$user['status']?></td>

                                            


                                        </tr>


                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                        </div>
                            </div>
                        </div>




                        
                    </div>
                    
                </div>
                
            </div>

