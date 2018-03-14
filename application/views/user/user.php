<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kelola Member
      <small>Kelola Member</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('user');?>"><i class="fa fa-users"></i> Kelola User</a></li>
      <!--<li class="active">Here</li>-->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Data User</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
             <?php if($this->session->flashdata('info')){ ?>
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('info'); ?>
                </div>
            <?php } ?>

            <a href="<?php echo base_url('user/addUser');?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</a> 
            <br /><br />

            <div class="table-responsive">
            <?php if($member!=null){?>
              <table width="100%" class="table table-striped table-bordered table-hover" id="table">
            <?php } else { ?>
              <table width="100%" class="table table-striped table-bordered table-hover">
            <?php } ?>
              
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Username</th>
                          <th>Nama</th>
                          <th>Created At</th>
                          <th>Last Login</th>
                          <th>Action</th>
                      </tr>
                       
                  </thead>
                  <tbody>
                  <?php 
                  $no = 1;
                  if($member!=null){
                    foreach($member as $m){
                    if($m->id!=$user->id && $m->id!=1){                  
                  ?>
                  <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $m->username; ?></td>
                      <td><?php echo $m->first_name; ?></td>
                      <td>
                        <?php 
                          $tgl = date('d-m-Y H:i:s', $m->created_on);
                          echo $tgl; 
                        ?>
                      </td>
                      <td>
                        <?php 
                          if($m->last_login != null){
                            $tgl2 = date('d-m-Y H:i:s', $m->last_login);
                            echo $tgl2; 
                          } else{
                            echo '<center>-</center>';
                          }
                        ?>
                      </td>
                      <td style="text-align: center;">
                          <?php 
                            if($m->active==0){ ?>
                              <button id="<?php echo 'activate'.$m->id;?>" onclick="activate(<?php echo $m->id;?>)" class="btn btn-success btn-xs">Activate</button>
                              <button id="<?php echo 'deactivate'.$m->id;?>" onclick="activate(<?php echo $m->id;?>)" class="btn btn-danger btn-xs" style="display: none;">Deactivate</button>
                          <?php  } else { ?>
                              <button id="<?php echo 'activate'.$m->id;?>" onclick="activate(<?php echo $m->id;?>)" class="btn btn-success btn-xs" style="display: none;">Activate</button>
                              <button id="<?php echo 'deactivate'.$m->id;?>" onclick="activate(<?php echo $m->id;?>)" class="btn btn-danger btn-xs">Deactivate</button>
                          <?php } ?>
                          <a class='btn btn-info btn-xs' href="<?php echo base_url('user/editUser/'.$m->id); ?>"><i class="glyphicon glyphicon-edit"></i> </a>
                          <a class='btn btn-danger btn-xs' href="#" onclick="functionDelete('<?php echo base_url('user/deleteUser/'.$m->id); ?>')"><i class="glyphicon glyphicon-trash"></i> </a>
            
                      </td>
                  </tr>
                  <?php } } 
                    } else { ?>
                    <tr>
                      <td class="text-center" colspan="6"><i>Tidak Ada Data</i></td>
                    </tr>
                  <?php } ?>
                  </tbody>
              </table>
            </div>             
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.col -->
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
  function activate(iduser){
      var y = confirm("Are you sure?");
      if(y == true){
        var BASE_URL = "<?php echo base_url();?>";
        $.ajax({
          type: "POST",
          url: BASE_URL+"user/activate", 
          data: {id: iduser },
          dataType: "json",
          success:function(response)
          {
            if(response==1){
              $("#deactivate"+iduser).show();
              $("#activate"+iduser).hide();
            } else if(response==0){
              $("#deactivate"+iduser).hide();
              $("#activate"+iduser).show();
            } else{
              alert("Gagal Aktivasi User!");
            }
          }
        });
      }
      
  }
</script>