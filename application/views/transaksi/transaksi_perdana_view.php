<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Transaksi
      <small>View Transaksi Perdana</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('transaksi');?>"><i class="fa fa-handshake-o"></i> Transaksi</a></li>
      <li class="active">View Transaksi Perdana</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">View Transaksi Perdana</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div id="alert-sukses" class="alert alert-success alert-dismissable" style="display: none;">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  Tambah Data Sukses!
              </div>

              <div id="alert-gagal" class="alert alert-danger alert-dismissable" style="display: none;">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  Tambah Data Gagal!
              </div>

            <?php
              $name = array(
                  'name'=>'editData',
                  'class'=>'form-horizontal'
                  );  
              echo form_open('transaksi/addItemsTransaksiPerdana/'.$id_trx,$name);
            ?>
              <div class="form-group">
                <label for="operator" class="col-sm-3 control-label">Nama Operator</label>
                <div class="col-sm-9">
                  <select name="operator" class="form-control">
                    <option value="" style="display: none;">-- Pilih Operator --</option>
                    <option value="TELKOMSEL">TELKOMSEL</option>
                    <option value="INDOSAT">INDOSAT</option>
                    <option value="XL">XL</option>
                    <option value="AXIS">AXIS</option>
                    <option value="3">3</option>
                    <option value="SMARTFREN">SMARTFREN</option>
                    <option value="BOLT">BOLT</option>
                  </select>
                  <?php echo form_error('operator');?>
                </div>
              </div>

              <div class="form-group">
                <label for="jenis" class="col-sm-3 control-label">Jenis</label>
                <div class="col-sm-9">
                  <input type="radio" name="jenis" id="eceran" value="Eceran" checked>Eceran&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="jenis" id="grosir" value="Grosir"> Grosir
                  <?php echo form_error('jenis');?>
                </div>
              </div>

              <div class="form-group">
                <label for="harga" class="col-sm-3 control-label">Harga</label>
                <div class="col-sm-9">
                  <input type="number" name="harga" value="<?php echo set_value('harga');?>" class="form-control" placeholder="Rp 0">
                  <?php echo form_error('harga');?>
                </div>
                
              </div>

              <div class="form-group">
                <label for="qty" class="col-sm-3 control-label">Qty</label>
                <div class="col-sm-9">
                  <input type="number" name="qty" value="<?php echo set_value('qty');?>" class="form-control" placeholder="0">
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
            <h4>Data Item Transaksi Perdana</h4>
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
                  <td>Nama Operator</td>
                  <td>Jenis</td>
                  <td>Harga</td>
                  <td>Qty</td>
                  <td>Total</td>
                  <td class="text-center">Action</td>
                </tr>
              </thead>
              <tbody>
                <?php if($items!=null){
                      $total = 0;
                      $no = 1;
                      foreach($items as $i){ ?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $i->nama_operator;?></td>
                      <td><?php echo $i->jenis;?></td>
                      <td class="text-right"><?php echo 'Rp '.$i->harga;?></td>
                      <td class="text-right"><?php echo $i->qty;?></td>
                      <td class="text-right"><?php echo 'Rp '.$i->harga*$i->qty;?></td>
                      <td class="text-center">
                        <a href="<?php echo base_url('transaksi/editItemsTransaksiPerdana/'.$i->id.'/'.$i->nama_operator.'/'.$i->jenis);?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>&nbsp;
                        <a href="javascript:void(0)" onclick="hapusData('<?php echo $i->id;?>','<?php echo $i->nama_operator;?>','<?php echo $i->jenis;?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                <?php 
                      $total += ($i->harga*$i->qty);
                      } 
                  }
                ?>
                    <tr>
                      <td colspan="5" class="text-center">Jumlah Total</td>
                      <td class="text-right">Rp <?php echo $total;?></td>
                      <td></td>
                    </tr>
              </tbody>
            </table>
            <br>
            <div>
              <a href="<?php echo base_url('transaksi/perdana');?>" class="btn btn-info"><i class="fa fa-arrow-left"></i> Kembali</a>
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

  function hapusData(id_trx, nama_operator, jenis){
    var BASE_URL  = "<?php echo base_url()?>";
    var y = confirm("Apakah yakin mau dihapus?");
    if(y == true){
      $.ajax({
        url: BASE_URL+'transaksi/hapusItemTransaksiPerdana/'+id_trx+'/'+nama_operator+'/'+jenis,
        type: 'POST'
      })
      .done(function(data){
        if(data!=0){
          $("#itemtrx").load(BASE_URL+"transaksi/viewTransaksiPerdana/"+id_trx+" #itemtrx");
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
    var operator  = $("select[name='operator']");
    var harga     = $("input[name='harga']");
    var qty       = $("input[name='qty']");
    

    btnSubmit.click(function(){

      var operatorVal  = operator.val();
      var jenis        = $("input[name='jenis']:checked").val();
      var hargaVal     = harga.val();
      var qtyVal       = qty.val();

      if(operatorVal==''){
        alert("Nama operator belum dipilih");
        return false;
      } else if(jenis==''){
        alert("Jenis transaksi belum dipilih");
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

  });
</script>