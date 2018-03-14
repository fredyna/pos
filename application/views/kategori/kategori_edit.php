<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kelola Kategori
      <small>Kategori</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('kategori');?>"><i class="fa fa-tags"></i> Kelola Kategori</a></li>
      <!--<li class="active">Here</li>-->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Form Edit Kategori</h3>

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
                    'name'=>'addData',
                    'class'=>'form-horizontal'
                    );  
                echo form_open('kategori/editKategori/'.$kategori->id,$name);
            ?>

              <div class="form-group">
                <label for="nama" class="col-sm-3 control-label">Nama Kategori</label>
                <div class="col-sm-9">
                  <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Kategori" value="<?php echo $kategori->nama?>">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-4">
                  <a href="<?php echo base_url('kategori')?>" class="btn btn-info"><i class="fa fa-arrow-left"></i> Kembali</a>
                  <button type="submit" name="submit" value="submit" class="btn btn-success"> Simpan</button>
                </div>
              </div>

            </form> <!-- end div form -->
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.col -->
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->