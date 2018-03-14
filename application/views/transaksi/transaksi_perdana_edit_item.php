<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Transaksi
      <small>Transaksi Perdana</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('transaksi');?>"><i class="fa fa-handshake-o"></i> Transaksi</a></li>
      <li class="active">Transaksi Perdana</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Item Transaksi Perdana</h3>

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
                echo form_open('transaksi/editItemsTransaksiPerdana/'.$trx->id_transaksi.'/'.$trx->nama_operator.'/'.$trx->jenis,$name);
            ?>
              <div class="form-group">
                <label for="operator" class="col-sm-3 control-label">Nama Operator</label>
                <div class="col-sm-9">
                  <select name="operator" class="form-control">
                    <option value="" style="display: none;">-- Pilih Operator --</option>
                    <option value="TELKOMSEL" <?php echo $trx->nama_operator=='TELKOMSEL'?'selected':'';?>>TELKOMSEL</option>
                    <option value="INDOSAT" <?php echo $trx->nama_operator=='INDOSAT'?'selected':'';?>>INDOSAT</option>
                    <option value="XL" <?php echo $trx->nama_operator=='XL'?'selected':'';?>>XL</option>
                    <option value="AXIS" <?php echo $trx->nama_operator=='AXIS'?'selected':'';?>>AXIS</option>
                    <option value="3" <?php echo $trx->nama_operator=='3'?'selected':'';?>>3</option>
                    <option value="SMARTFREN" <?php echo $trx->nama_operator=='SMARTFREN'?'selected':'';?>>SMARTFREN</option>
                    <option value="BOLT" <?php echo $trx->nama_operator=='BOLT'?'selected':'';?>>BOLT</option>
                  </select>
                  <?php echo form_error('operator');?>
                </div>
              </div>

              <div class="form-group">
                <label for="jenis" class="col-sm-3 control-label">Jenis</label>
                <div class="col-sm-9">
                  <input type="radio" name="jenis" id="eceran" value="Eceran" <?php echo $trx->jenis=='Eceran'?'checked':'';?>>Eceran&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="jenis" id="grosir" value="Grosir" <?php echo $trx->jenis=='Grosir'?'checked':'';?>> Grosir
                  <?php echo form_error('jenis');?>
                </div>
              </div>

              <div class="form-group">
                <label for="harga" class="col-sm-3 control-label">Harga</label>
                <div class="col-sm-9">
                  <input type="number" name="harga" value="<?php echo $trx->harga;?>" class="form-control" placeholder="Rp 0">
                  <?php echo form_error('harga');?>
                </div>
                
              </div>

              <div class="form-group">
                <label for="qty" class="col-sm-3 control-label">Qty</label>
                <div class="col-sm-9">
                  <input type="number" name="qty" value="<?php echo $trx->qty;?>" class="form-control" placeholder="0">
                  <?php echo form_error('qty');?>
                </div>
                
              </div>

              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-4">
                  <a href="<?php echo base_url('transaksi/viewTransaksiPerdana/'.$trx->id_transaksi);?>" class="btn btn-info btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                  <button name="submit" value="submit" class="btn btn-success btn-sm"> Simpan</button>
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