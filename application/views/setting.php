<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Setting
      <small>Setting</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('setting');?>"><i class="fa fa-cogs"></i> Setting</a></li>
      <!--<li class="active">Here</li>-->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="row">
    <div class="col-lg-12">
      <div class="box box-primary">
          <div class="panel-heading">Change Password</div>
          <div class="panel-body">
            <div class="row">
              <div class="col-xs-12 col-md-8 col-md-offset-2">
                <?php if($this->session->flashdata('info-password')): ?>
                  <div class="alert alert-warning">
                  <?php echo $this->session->flashdata('info-password'); ?>
                </div>
              <?php endif; ?>
                <?php
            $name = array(
              'name'=>'change-password',
              'class'=>'form-horizontal'
              ); 
            echo form_open('setting/changePassword/',$name);
            ?>
              <div class="form-group">
                <label for="password" class="col-sm-4 control-label">New Password</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" name="password" placeholder="Panjang Minimal 5 Karakter">
                    <?php echo form_error('password');?>
                </div>
              </div>
              <div class="form-group">
                <label for="r_password" class="col-sm-4 control-label">Repeat Password</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="r_password" name="r_password" placeholder="Repeat Password">
                <?php echo form_error('r_password');?>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                  <button type="submit" class="btn btn-success btn-sm">Change</button>
                </div>
              </div>
            </form>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <div class="box box-primary">
          <div class="panel-heading">Change Data</div>
          <div class="panel-body">
            <div class="row">
              <div class="col-xs-12 col-md-8 col-md-offset-2">
                  <?php if($this->session->flashdata('info-data')): ?>
                  <div class="alert alert-warning">
                <?php echo $this->session->flashdata('info-data'); ?>
              </div>
              <?php endif; ?>
                <?php
            $name = array(
              'name'=>'change-username',
              'class'=>'form-horizontal'
              ); 
            echo form_open('setting/updateData/',$name);
            ?>
              <div class="form-group">
                <label for="username" class="col-sm-4 control-label">Username</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="username" name="username" value="<?php echo $user->username;?>">
                  <?php echo form_error('username');?>
                </div>                  
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-4 control-label">Nama</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="nama" value="<?php echo $user->first_name;?>">
                  <?php echo form_error('nama');?>
                </div>
              </div>
                
              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                  <button type="submit" name="submit" class="btn btn-success btn-sm">Change</button>
                </div>
              </div>
            </form>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div><!--/.row-->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->