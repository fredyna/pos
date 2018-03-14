<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Produk
      <small>Edit Produk</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('produk');?>"><i class="fa fa-produk-hunt"></i> Produk</a></li>
      <li class="active">Edit Produk</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Produk</h3>

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
                echo form_open('produk/editProduk/'.$produk->id,$name);
            ?>

              <div class="form-group">
                <label for="nama" class="col-sm-3 control-label">Nama Produk</label>
                <div class="col-sm-9">
                  <input type="text" name="nama" value="<?php echo $produk->nama;?>" class="form-control" placeholder="Nama Produk">
                  <?php echo form_error('nama');?>
                </div>
              </div>

              <div class="form-group">
                <label for="harga_beli" class="col-sm-3 control-label">Harga Beli</label>
                <div class="col-sm-9">
                  <input type="number" name="harga_beli" value="<?php echo $produk->harga_beli;?>" class="form-control" placeholder="Rp 0">
                  <?php echo form_error('harga_beli');?>
                </div>
                
              </div>

              <div class="form-group">
                <label for="harga_jual" class="col-sm-3 control-label">Harga Jual</label>
                <div class="col-sm-9">
                  <input type="number" name="harga_jual" value="<?php echo $produk->harga_jual;?>" class="form-control" placeholder="Rp 0">
                  <?php echo form_error('harga_jual');?>
                </div>
                
              </div>

              <div class="form-group">
                <label for="qty" class="col-sm-3 control-label">Qty</label>
                <div class="col-sm-9">
                  <input type="number" name="qty" value="<?php echo $produk->qty;?>" class="form-control" value="0" placeholder="0">
                  <?php echo form_error('qty');?>
                </div>
                
              </div>

              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-4">
                  <a href="<?php echo base_url('produk')?>" class="btn btn-info"><i class="fa fa-arrow-left"></i> Kembali</a>
                  <button type="submit" name="submit" value="submit" class="btn btn-success"> Simpan</button>
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