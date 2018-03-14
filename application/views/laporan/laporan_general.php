<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Laporan
      <small>Laporan General</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('laporan');?>"><i class="fa fa-file"></i> Laporan</a></li>
      <li class="active">Laporan General</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Laporan Berdasarkan Waktu</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="col-sm-10 col-sm-offset-1">
              <div class="col-sm-5">
                <div class="col-sm-4">
                  <label>Tanggal</label>
                </div>
                <div class="col-sm-8">
                  <input type="date" id="tanggal" class="form-control" placeholder="mm/dd/yyyy">
                </div>
              </div>
              <div class="col-sm-5">
                <div class="col-sm-3">
                  <label>Waktu</label>
                </div>
                <div class="col-sm-8">
                  <select name="waktu" id="waktu" class="form-control">
                    <option value="1" <?php echo $waktu == 'Pagi' ? 'selected':'';?>>Pagi</option>
                    <option value="2" <?php echo $waktu == 'Sore' ? 'selected':'';?>>Sore</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-2">
                <button type="button" id="cari" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
              </div>
              
            </div>            
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.col -->
    </div>


    <div class="col-md-12">
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Data Laporan Transaksi Per Item</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-striped table-hover" style="width:100%;">
              <tr>
                <td width="40%">Date</td>
                <td width="5%">:</td>
                <td width="55%"><?php echo date('d-m-Y', strtotime($date));?></td>
              </tr>
              <tr>
                <td width="40%">Waktu</td>
                <td width="5%">:</td>
                <td width="55%"><?php echo $waktu;?></td>
              </tr>
              <tr>
                <td width="40%">Total Laba Untung</td>
                <td width="5%">:</td>
                <td width="55%"><?php echo "Rp " . $laba_untung;?></td>
              </tr>
              <tr>
                <td width="40%">Total Laba Rugi</td>
                <td width="5%">:</td>
                <td width="55%"><?php echo "Rp " . $laba_rugi;?></td>
              </tr>
          </table> 
          <br>
          <h4>Table Data Transaksi Per Item</h4>
          <div class="table-responsive">
            <?php if($transaksi!=null){?>
              <table width="100%" class="table table-striped table-hover" id="table">
            <?php } else { ?>
              <table width="100%" class="table table-striped table-hover">
            <?php } ?>

              <thead>
                <tr style="background-color: #3c8dbc;color:#f1f1f1;">
                  <th>No</th>
                  <th class="text-center">Nama Produk</th>
                  <th class="text-center">Jumlah Terjual</th>
                  <th class="text-center">Laba Untung</th>
                  <th class="text-center">Laba Rugi</th>
                  <th class="text-center">Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $no = 1;
                  if($transaksi!=null){ 
                    foreach($transaksi as $d){ ?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $d->nama_produk;?></td>
                      <td class="text-center"><?php echo $d->qty;?></td>
                      <td class="text-right">
                        <?php
                          echo $d->laba > 0 ? "Rp " . $d->laba : " - ";
                        ?>  
                      </td>
                      <td class="text-right">
                        <?php
                          echo $d->laba <= 0 ? "Rp " . $d->laba : " - ";
                        ?>  
                      </td>
                      <td class="text-center">
                        <?php
                          if($d->laba > 0){
                            echo "Untung";
                          } else{
                            echo "Rugi";
                          }
                        ?>                          
                      </td>
                    </tr>
                <?php  }
                  } else { ?>
                  <tr>
                    <td colspan="5" class="text-center"><i>Tidak ada data</i></td>
                  </tr>
                <?  } ?>
              </tbody>
            </table>
          </div> <!--table responsive-->
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
    var BASE_URL = '<?php echo base_url();?>';
    $("#cari").click(function(){
      var tanggal = $("#tanggal").val();
      var waktu = $("#waktu").val();
      if(tanggal==''){
        tanggal = "<?php echo date('Y-m-d');?>";
      }
      window.location.href = BASE_URL+"laporan/general/"+tanggal+"/"+waktu;
    });
  });
</script>