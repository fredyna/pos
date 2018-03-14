<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Home
      <small>Home</small>
    </h1>
    <ol class="breadcrumb">
      <?php 
        switch($group){
          case 1: ?>
            <li><a href="<?php echo base_url('superAdmin');?>"><i class="fa fa-home"></i> Home</a></li>
        <?php break;
          case 2: ?>
            <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-home"></i> Home</a></li>
        <?php break;
          default: ?>
            <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-home"></i> Home</a></li>
        <?php break;
        }
      ?>
      <!--<li class="active">Here</li>-->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Welcome</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
             <p>Selamat Datang di Point of Sales (POS).</p>             
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.col -->
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->