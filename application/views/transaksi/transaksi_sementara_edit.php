<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Transaksi
      <small>Transaksi General</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('transaksi');?>"><i class="fa fa-handshake-o"></i> Transaksi</a></li>
      <li class="active">Transaksi General</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Transaksi Sementara</h3>

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
                echo form_open('transaksi/editItemTransaksiSementara/'.$trx->id_produk,$name);
            ?>
              <div class="form-group">
                <label for="produk" class="col-sm-3 control-label">Produk</label>
                <div class="col-sm-9">
                  <select id="produk" name="produk" class="form-control selectpicker" data-live-search="true" data-show-subtext="true">
                    <option value="" style="display: none;">-- Pilih Produk--</option>
                    <?php if($produk!=null){
                      foreach($produk as $p){ ?>
                      <option value="<?php echo $p->id;?>" <?php echo $trx->id_produk==$p->id ? 'selected':'';?>><?php echo $p->nama?></option>
                    <?php }
                    } ?>
                  </select>
                  <?php echo form_error('produk');?>
                </div>
              </div>

              <div class="form-group">
                <label for="harga" class="col-sm-3 control-label">Harga</label>
                <div class="col-sm-9">
                  <input type="number" name="harga" value="<?php echo $trx->harga;?>" class="form-control" placeholder="Rp 0">
                  <span id="saranharga"></span>
                  <?php echo form_error('harga');?>
                </div>
                
              </div>

              <div class="form-group">
                <label for="qty" class="col-sm-3 control-label">Qty</label>
                <div class="col-sm-9">
                  <input type="number" name="qty" value="<?php echo $trx->qty;?>" class="form-control" placeholder="0">
                  <span id="stok"></span>
                  <?php echo form_error('qty');?>
                </div>
                
              </div>

              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-4">
                  <a href="<?php echo base_url('transaksi/general');?>" class="btn btn-info btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
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
<script>

  var BASE_URL  = "<?php echo base_url()?>";

  function produkChange(){
    var id_produk = $("#produk").val();
    var harga     = $("input[name='harga']");
      $.getJSON(BASE_URL+'produk/produkById/'+id_produk,null, function(data){
        harga.val(data.harga_jual);
        $("#saranharga").text("Saran harga : Rp "+data.harga_jual);
        $("#stok").text("Stok tersedia : "+data.qty);
      });
  }

  $(document).ready(function(){

    var btnSubmit = $("button[name='submit']");
    var produk    = $("#produk");
    var harga     = $("input[name='harga']");
    var qty       = $("input[name='qty']");

    produkChange();
    produk.change(function(){
      produkChange();
    })

    produk.click(function(){
      produkChange();
    });
  });
</script>