<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Transaksi
      <small>View Transaksi General</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('transaksi');?>"><i class="fa fa-handshake-o"></i> Transaksi</a></li>
      <li class="active">View Transaksi General</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">View Transaksi General</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <?php
              $name = array(
                  'name'=>'editData',
                  'class'=>'form-horizontal'
                  );  
              echo form_open('transaksi/addItemsTransaksi/'.$id_trx,$name);
            ?>
              <div class="form-group">
                <label for="produk" class="col-sm-3 control-label">Produk</label>
                <div class="col-sm-9">
                  <select id="produk" name="produk" class="form-control selectpicker" data-live-search="true" data-show-subtext="true">
                    <option value="" style="display: none;">-- Pilih Produk--</option>
                    <?php if($produk!=null){
                      foreach($produk as $p){ ?>
                      <option value="<?php echo $p->id;?>"><?php echo $p->nama?></option>
                    <?php }
                    } ?>
                  </select>
                  <?php echo form_error('produk');?>
                </div>
              </div>

              <div class="form-group">
                <label for="harga" class="col-sm-3 control-label">Harga</label>
                <div class="col-sm-9">
                  <input type="number" name="harga" value="<?php echo set_value('harga');?>" class="form-control" placeholder="Rp 0">
                  <span id="saranharga"></span>
                  <?php echo form_error('harga');?>
                </div>
                
              </div>

              <div class="form-group">
                <label for="qty" class="col-sm-3 control-label">Qty</label>
                <div class="col-sm-9">
                  <input type="number" name="qty" value="<?php echo set_value('qty');?>" class="form-control" placeholder="0">
                  <span id="stok"></span>
                  <?php echo form_error('qty');?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-4">
                  <button type="submit" name="submit" value="submit" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</button>
                </div>
              </div>
            </form>

            <br>
            <h4>Data Transaksi Sementara</h4>
            <?php if($this->session->flashdata('info')){ ?>
              <div class="alert alert-warning alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <?php echo $this->session->flashdata('info'); ?>
              </div>
            <?php } ?>

            <table id="itemtrx" class="table table-responsive table-bordered table-striped table-hover">
              <thead>
                <tr style="background-color: #3c8dbc;color:#fff;">
                  <td>No</td>
                  <td>Nama Produk</td>
                  <td>Harga</td>
                  <td>Qty</td>
                  <td>Total</td>
                  <td class="text-center">Action</td>
                </tr>
              </thead>
              <tbody>
                <?php if($items!=null){
                      $subtotal = 0;
                      $total = 0;
                      $no = 1;
                      foreach($items as $i){ ?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $i->nama_produk;?></td>
                      <td class="text-right"><?php echo 'Rp '.$i->harga;?></td>
                      <td class="text-right"><?php echo $i->qty;?></td>
                      <td class="text-right"><?php echo 'Rp '.$i->harga*$i->qty;?></td>
                      <td class="text-center">
                        <a href="<?php echo base_url('transaksi/editItemsTransaksi/'.$i->id.'/'.$i->id_produk);?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>&nbsp;
                        <a href="javascript:void(0)" onclick="hapusData('<?php echo $i->id;?>','<?php echo $i->id_produk;?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                <?php 
                      $subtotal += ($i->harga*$i->qty);
                      $diskon = $i->diskon;
                      } 
                  }
                ?>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="4" class="text-center">Sub Total</td>
                  <td class="text-right" id="subtotal"><?php echo 'Rp '.$subtotal;?></td>
                  <input type="hidden" id="hidden_subtotal" value="<?php echo $subtotal;?>">
                  <td></td>
                </tr>
                <tr>
                  <td colspan="4" class="text-center">Diskon (%)</td>
                  <td class="text-right"><input type="number" id="diskon" placeholder="0" max="100" min="0" value="<?php echo $diskon;?>" class="text-right" style="width:100px;"></td>
                  <td><button id="savediskon" type="button" class="btn btn-xs btn-success">save</button></td>
                </tr>
                <tr>
                  <td colspan="4" class="text-center">Jumlah Total</td>
                  <td class="text-right" id="total">
                    <?php 
                      $total = $subtotal - ( ( $diskon / 100 )  * $subtotal );
                      echo 'Rp '.$total;
                    ?>
                  </td>
                  <td></td>
                </tr>
              </tfoot>
            </table>

            <br>
            <div>
              <a href="<?php echo base_url('transaksi/general');?>" class="btn btn-info"><i class="fa fa-arrow-left"></i> Kembali</a>&nbsp;&nbsp;<span id="hasildiskon"></span>
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

  function hapusData(id_trx, id_produk){
    var BASE_URL  = "<?php echo base_url()?>";
    var y = confirm("Apakah yakin mau dihapus?");
    if(y == true){
      $.ajax({
        url: BASE_URL+'transaksi/hapusItemTransaksi/'+id_trx+'/'+id_produk,
        type: 'POST'
      })
      .done(function(data){
        if(data!=0){
          window.location.reload(true);
        } else{
          alert("Gagal menghapus, silahkan coba lagi!");
        }
      })
      .fail(function(jqXHR, textStatus){
        alert("Koneksi gagal "+textStatus);
      });
    }
  }

  $(document).ready(function(){

    var BASE_URL  = "<?php echo base_url()?>";

    /* tambah data */

    var btnSubmit = $("button[name='submit']");
    var produk    = $("#produk");
    var harga     = $("input[name='harga']");
    var qty       = $("input[name='qty']");

    produk.change(function(){
      var id_produk = produk.val();
      $.getJSON(BASE_URL+'produk/produkById/'+id_produk,null, function(data){
        harga.val(data.harga_jual);
        $("#saranharga").text("Saran harga : Rp "+data.harga_jual);
        $("#stok").text("Stok tersedia : "+data.qty);
      });
    });

    produk.click(function(){
      produk.change();
    });
    

    btnSubmit.click(function(){

      var produkVal  = produk.val();
      var hargaVal     = harga.val();
      var qtyVal       = qty.val();

      if(produkVal==''){
        alert("Produk belum dipilih");
        return false;
      } else if(hargaVal==''){
        alert("Kolom harga masih kosong");
        return false;
      } else if(qtyVal==''){
        alert("Kolom Qty masih kosong");
        return false;
      }

    });

    /* end tambah data */

    /* diskon */

    $("#diskon").change(function(){
      var hidden_subtotal = $("#hidden_subtotal").val();
      var diskon = ( $("#diskon").val() / 100 ) * hidden_subtotal;
      var total = hidden_subtotal - diskon;
      $("#total").text("Rp "+total);
    });

    $("#diskon").click(function(){
      $("#diskon").change();
    });

    $("#savediskon").click(function(){
      var id = <?php echo $id_trx?>;
      var diskon = $("#diskon").val();

      $.ajax({
        url: BASE_URL+'transaksi/editTransaksi/'+id,
        type: 'POST',
        data: {
          diskon: diskon
        },
        dataType: 'json'
      })
      .done(function(data){
        if(data==1){
          $("#hasildiskon").text("Sukses!");
          window.location.reload(true);
        } else {
          $("#hasildiskon").text("Gagal!");
          window.location.reload(true);
        }
      })
      .fail(function(jqXHR, textStatus){
        alert("Koneksi Error "+textStatus);
      });
    });

    /* end diskon */

  });
</script>