<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Transaksi
      <small>Transaksi Pulsa</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('transaksi');?>"><i class="fa fa-handshake-o"></i> Transaksi</a></li>
      <li class="active">Transaksi Pulsa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Transaksi Pulsa</h3>

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
                echo form_open('transaksi/editTransaksiPulsa/'.$trx->id,$name);
            ?>
            <div class="form-group">
              <label for="operator" class="col-sm-3 control-label">Nama Operator</label>
              <div class="col-sm-9">
                <select name="operator" class="form-control">
                  <option value="" style="display: none;">-- Pilih Operator --</option>
                  <option value="TELKOMSEL" <?php echo $trx->nama_operator=='TELKOMSEL'? 'selected':'';?>>TELKOMSEL</option>
                  <option value="INDOSAT" <?php echo $trx->nama_operator=='INDOSAT'? 'selected':'';?>>INDOSAT</option>
                  <option value="XL" <?php echo $trx->nama_operator=='XL'? 'selected':'';?>>XL</option>
                  <option value="AXIS" <?php echo $trx->nama_operator=='AXIS'? 'selected':'';?>>AXIS</option>
                  <option value="3" <?php echo $trx->nama_operator=='3'? 'selected':'';?>>3</option>
                  <option value="SMARTFREN" <?php echo $trx->nama_operator=='SMARTFREN'? 'selected':'';?>>SMARTFREN</option>
                  <option value="BOLT" <?php echo $trx->nama_operator=='BOLT'? 'selected':'';?>>BOLT</option>
                </select>
                <?php echo form_error('operator');?>
              </div>
            </div>

            <div class="form-group">
              <label for="pulsa" class="col-sm-3 control-label">Pulsa</label>
              <div class="col-sm-9">
                <select name="pulsa" class="form-control">
                  <option value="<?php echo $trx->pulsa;?>" selected><?php echo $trx->pulsa; ?></option>
                </select>
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
              <label for="no_hp" class="col-sm-3 control-label">No HP</label>
              <div class="col-sm-9">
                <input type="text" name="no_hp" value="<?php echo $trx->no_hp;?>" class="form-control" value="0" placeholder="0">
                <?php echo form_error('no_hp');?>
              </div>
              
            </div>

            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-4">
                <a href="<?php echo base_url('transaksi/pulsa');?>" class="btn btn-info btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                <button name="submit" value="submit" class="btn btn-success"> Simpan</button>
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
  $(document).ready(function(){
    var operator  = $("select[name='operator']");
    var pulsa     = $("select[name='pulsa']");
    var harga     = $("input[name='harga']");
    var noHp      = $("input[name='no_hp']");

    operator.ready(function(){
      operator.change();
    });

    operator.click(function(){
      operator.change();
    });

    operator.change(function(){

      var nama = operator.find(":selected").val();
      var pulsa = {};

      if(nama=="TELKOMSEL"){
        
        pulsa = {};
        pulsa = {5000:"5.000", 10000:"10.000", 20000:"20.000", 25000:"25.000", 40000:"40.0000", 50000:"50.000", 100000:"100.000", 150000:"150.000", 200000:"200.000", 300000:"300.000", 500000:"500.000", 1000000:"1.000.000"};

      } else if(nama=="INDOSAT"){
        
        pulsa = {};
        pulsa = {5000:"5.000", 10000:"10.000", 25000:"25.000", 50000:"50.000", 100000:"100.000", 150000:"150.000", 200000:"200.000", 250000:"250.000", 500000:"500.000", 1000000:"1.000.000"};

      } else if(nama=="SMARTFREN"){

        pulsa = {};
        pulsa = {5000:"5.000", 10000:"10.000", 20000:"20.000", 50000:"50.000", 100000:"100.000", 150000:"150.000", 200000:"200.000", 300000:"300.000", 500000:"500.000", 1000000:"1.000.000"};

      } else if(nama=="BOLT"){

        pulsa = {};
        pulsa = {50000:"50.000", 100000:"100.000", 200000:"200.000"};

      } else if(nama=="AXIS"){

        pulsa = {};
        pulsa = {5000:"5.000", 10000:"10.000", 15000:"15.000", 25000:"25.000", 50000:"50.000", 100000:"100.000", 200000:"200.000"};

      } else if(nama=="XL"){

        pulsa = {};
        pulsa = {5000:"5.000", 10000:"10.000", 15000:"15.000", 25000:"25.000", 50000:"50.000", 100000:"100.000", 200000:"200.000", 300000:"300.000", 500000:"500.000", 1000000:"1.000.000"};

      } else if(nama="3"){

        pulsa = {};
        pulsa = {5000:"5.000", 10000:"10.000", 15000:"15.000", 20000:"20.000", 25000:"25.000", 30000:"30.000", 50000:"50.000", 100000:"100.000", 300000:"300.000", 500000:"500.000"};

      }

      $("select[name='pulsa']").children('option:not(:first)').remove();
      $.each(pulsa, function(key, value) {
          $("select[name='pulsa']")
              .append($("<option></option>")
              .attr("value",key)
              .text(value));
        });

    });

    pulsa.change(function(){
      harga.val("");
    });

    noHp.keypress(function(data){

      if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57))
      {
          alert('Isikan angka 0 - 9');
          return false;
      }

    });
  });
</script>
