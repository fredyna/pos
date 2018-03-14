<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kelola User
      <small>Edit User</small>
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
            <h3 class="box-title">Perbarui Data</h3>

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

            <?php
                $name = array(
                    'name'=>'editData',
                    'class'=>'form-horizontal'
                    );  
                echo form_open('user/updateUser/'.$member->id,$name);
            ?>
              
              <div class="form-group">
                <label for="username" class="col-sm-3 control-label">Username</label>
                <div class="col-sm-9">
                  <input type="text" name="username" value="<?php echo $member->username;?>" class="form-control" placeholder="Username">
                  <?php echo form_error('username');?>
                </div>
              </div>

              <div class="form-group">
                <label for="nama" class="col-sm-3 control-label">Nama</label>
                <div class="col-sm-9">
                  <input type="text" name="nama" value="<?php echo $member->first_name;?>" class="form-control" placeholder="Nama Lengkap">
                  <?php echo form_error('nama');?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-4">
                  <a href="<?php echo base_url('user')?>" class="btn btn-info"><i class="fa fa-arrow-left"></i> Kembali</a>
                  <button type="submit" name="submit" value="submit" class="btn btn-success">Perbarui</button>
                </div>
              </div>
            </form>

          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.col -->
    </div>

    <div class="col-md-12">
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Ganti Password</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
             <?php if($this->session->flashdata('info-password')){ ?>
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('info-password'); ?>
                </div>
            <?php } ?>

            <?php
                $name = array(
                    'name'=>'editData',
                    'class'=>'form-horizontal'
                    );  
                echo form_open('user/updatePassword/'.$member->id,$name);
            ?>

              <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9">
                  <input type="password" name="password" value="<?php echo set_value('password');?>" class="form-control" placeholder="Password">
                  <?php echo form_error('password');?>
                </div>
              </div>

              <div class="form-group">
                <label for="r_password" class="col-sm-3 control-label">Repeat Password</label>
                <div class="col-sm-9">
                  <input type="password" name="r_password" value="<?php echo set_value('r_password');?>" class="form-control" placeholder="Repeat Password">
                  <?php echo form_error('r_password');?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-4">
                  <a href="<?php echo base_url('user')?>" class="btn btn-info"><i class="fa fa-arrow-left"></i> Kembali</a>
                  <button type="submit" name="submit" value="submit" class="btn btn-success"> Ganti</button>
                </div>
              </div>
            </form>

          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.col -->
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->