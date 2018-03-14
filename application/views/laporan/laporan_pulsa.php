<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Laporan
      <small>Laporan Transaksi Pulsa</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('laporan');?>"><i class="fa fa-file"></i> Laporan</a></li>
      <li class="active">Laporan Transaksi Pulsa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="row">
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
    </div>

    <div class="row">

      <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">TELKOMSEL</h3>

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
                    <td width="10%">:</td>
                    <td width="50%"><?php echo date('d-m-Y', strtotime($date));?></td>
                  </tr>
                  <tr>
                    <td width="40%">Waktu</td>
                    <td width="10%">:</td>
                    <td width="50%"><?php echo $waktu;?></td>
                  </tr>
                  <tr>
                    <td width="40%">Jumlah Transaksi</td>
                    <td width="10%">:</td>
                    <td width="50%"><?php echo $total_telkomsel->jumlah;?></td>
                  </tr>
                  <tr>
                    <td width="40%">Total Transaksi (berdasarkan harga)</td>
                    <td width="10%">:</td>
                    <td width="50%"><?php echo $total_telkomsel->total==null ? "Rp 0" : "Rp ".$total_telkomsel->total;?></td>
                  </tr>
              </table> 
              <br>
              <h4>Table Transaksi</h4>

              <div class="table-responsive">
                <?php if($telkomsel!=null){?>
                  <table width="100%" class="table table-striped table-hover table-dt">
                <?php } else { ?>
                  <table width="100%" class="table table-striped table-hover">
                <?php } ?>

                <thead>
                  <tr style="background-color: #3c8dbc;color:#f1f1f1;">
                    <th>No</th>
                    <th>No. HP</th>
                    <th>Pulsa</th>
                    <th class="text-center">Harga</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 1;
                    if($telkomsel!=null){ 
                      foreach($telkomsel as $d){ ?>
                      <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $d->no_hp;?></td>
                        <td><?php echo $d->pulsa;?></td>
                        <td class="text-right"><?php echo "Rp ".$d->harga;?></td>

                      </tr>
                  <?php  }
                    } else { ?>
                    <tr>
                      <td colspan="4" class="text-center"><i>Tidak ada data</i></td>
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

      <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">INDOSAT</h3>

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
                    <td width="10%">:</td>
                    <td width="50%"><?php echo date('d-m-Y', strtotime($date));?></td>
                  </tr>
                  <tr>
                    <td width="40%">Waktu</td>
                    <td width="10%">:</td>
                    <td width="50%"><?php echo $waktu;?></td>
                  </tr>
                  <tr>
                    <td width="40%">Jumlah Transaksi</td>
                    <td width="10%">:</td>
                    <td width="50%"><?php echo $total_indosat->jumlah;?></td>
                  </tr>
                  <tr>
                    <td width="40%">Total Transaksi (berdasarkan harga)</td>
                    <td width="10%">:</td>
                    <td width="50%"><?php echo $total_indosat->total==null ? "Rp 0" : "Rp ".$total_indosat->total;?></td>
                  </tr>
              </table> 
              <br>
              <h4>Table Transaksi</h4>

              <div class="table-responsive">
                <?php if($indosat!=null){?>
                  <table width="100%" class="table table-striped table-hover table-dt">
                <?php } else { ?>
                  <table width="100%" class="table table-striped table-hover">
                <?php } ?>

                <thead>
                  <tr style="background-color: #3c8dbc;color:#f1f1f1;">
                    <th>No</th>
                    <th>No. HP</th>
                    <th>Pulsa</th>
                    <th class="text-center">Harga</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 1;
                    if($indosat!=null){ 
                      foreach($indosat as $d){ ?>
                      <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $d->no_hp;?></td>
                        <td><?php echo $d->pulsa;?></td>
                        <td class="text-right"><?php echo "Rp ".$d->harga;?></td>

                      </tr>
                  <?php  }
                    } else { ?>
                    <tr>
                      <td colspan="4" class="text-center"><i>Tidak ada data</i></td>
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

    </div> <!-- div row -->

      
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">XL</h3>

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
                    <td width="10%">:</td>
                    <td width="50%"><?php echo date('d-m-Y', strtotime($date));?></td>
                  </tr>
                  <tr>
                    <td width="40%">Waktu</td>
                    <td width="10%">:</td>
                    <td width="50%"><?php echo $waktu;?></td>
                  </tr>
                  <tr>
                    <td width="40%">Jumlah Transaksi</td>
                    <td width="10%">:</td>
                    <td width="50%"><?php echo $total_xl->jumlah;?></td>
                  </tr>
                  <tr>
                    <td width="40%">Total Transaksi (berdasarkan harga)</td>
                    <td width="10%">:</td>
                    <td width="50%"><?php echo $total_xl->total==null ? "Rp 0" : "Rp ".$total_xl->total;?></td>
                  </tr>
              </table> 
              <br>
              <h4>Table Transaksi</h4>

              <div class="table-responsive">
                <?php if($xl!=null){?>
                  <table width="100%" class="table table-striped table-hover table-dt">
                <?php } else { ?>
                  <table width="100%" class="table table-striped table-hover">
                <?php } ?>

                <thead>
                  <tr style="background-color: #3c8dbc;color:#f1f1f1;">
                    <th>No</th>
                    <th>No. HP</th>
                    <th>Pulsa</th>
                    <th class="text-center">Harga</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 1;
                    if($xl!=null){ 
                      foreach($xl as $d){ ?>
                      <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $d->no_hp;?></td>
                        <td><?php echo $d->pulsa;?></td>
                        <td class="text-right"><?php echo "Rp ".$d->harga;?></td>

                      </tr>
                  <?php  }
                    } else { ?>
                    <tr>
                      <td colspan="4" class="text-center"><i>Tidak ada data</i></td>
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

      <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">AXIS</h3>

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
                    <td width="10%">:</td>
                    <td width="50%"><?php echo date('d-m-Y', strtotime($date));?></td>
                  </tr>
                  <tr>
                    <td width="40%">Waktu</td>
                    <td width="10%">:</td>
                    <td width="50%"><?php echo $waktu;?></td>
                  </tr>
                  <tr>
                    <td width="40%">Jumlah Transaksi</td>
                    <td width="10%">:</td>
                    <td width="50%"><?php echo $total_axis->jumlah;?></td>
                  </tr>
                  <tr>
                    <td width="40%">Total Transaksi (berdasarkan harga)</td>
                    <td width="10%">:</td>
                    <td width="50%"><?php echo $total_axis->total==null ? "Rp 0" : "Rp ".$total_axis->total;?></td>
                  </tr>
              </table> 
              <br>
              <h4>Table Transaksi</h4>

              <div class="table-responsive">
                <?php if($axis!=null){?>
                  <table width="100%" class="table table-striped table-hover table-dt">
                <?php } else { ?>
                  <table width="100%" class="table table-striped table-hover">
                <?php } ?>

                <thead>
                  <tr style="background-color: #3c8dbc;color:#f1f1f1;">
                    <th>No</th>
                    <th>No. HP</th>
                    <th>Pulsa</th>
                    <th class="text-center">Harga</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 1;
                    if($axis!=null){ 
                      foreach($axis as $d){ ?>
                      <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $d->no_hp;?></td>
                        <td><?php echo $d->pulsa;?></td>
                        <td class="text-right"><?php echo "Rp ".$d->harga;?></td>

                      </tr>
                  <?php  }
                    } else { ?>
                    <tr>
                      <td colspan="4" class="text-center"><i>Tidak ada data</i></td>
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

    </div> <!-- div row -->

    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">3</h3>

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
                    <td width="10%">:</td>
                    <td width="50%"><?php echo date('d-m-Y', strtotime($date));?></td>
                  </tr>
                  <tr>
                    <td width="40%">Waktu</td>
                    <td width="10%">:</td>
                    <td width="50%"><?php echo $waktu;?></td>
                  </tr>
                  <tr>
                    <td width="40%">Jumlah Transaksi</td>
                    <td width="10%">:</td>
                    <td width="50%"><?php echo $total_tri->jumlah;?></td>
                  </tr>
                  <tr>
                    <td width="40%">Total Transaksi (berdasarkan harga)</td>
                    <td width="10%">:</td>
                    <td width="50%"><?php echo $total_tri->total==null ? "Rp 0" : "Rp ".$total_tri->total;?></td>
                  </tr>
              </table> 
              <br>
              <h4>Table Transaksi</h4>

              <div class="table-responsive">
                <?php if($tri!=null){?>
                  <table width="100%" class="table table-striped table-hover table-dt">
                <?php } else { ?>
                  <table width="100%" class="table table-striped table-hover">
                <?php } ?>

                <thead>
                  <tr style="background-color: #3c8dbc;color:#f1f1f1;">
                    <th>No</th>
                    <th>No. HP</th>
                    <th>Pulsa</th>
                    <th class="text-center">Harga</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 1;
                    if($tri!=null){ 
                      foreach($tri as $d){ ?>
                      <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $d->no_hp;?></td>
                        <td><?php echo $d->pulsa;?></td>
                        <td class="text-right"><?php echo "Rp ".$d->harga;?></td>

                      </tr>
                  <?php  }
                    } else { ?>
                    <tr>
                      <td colspan="4" class="text-center"><i>Tidak ada data</i></td>
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

      <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">SMARTFREN</h3>

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
                    <td width="10%">:</td>
                    <td width="50%"><?php echo date('d-m-Y', strtotime($date));?></td>
                  </tr>
                  <tr>
                    <td width="40%">Waktu</td>
                    <td width="10%">:</td>
                    <td width="50%"><?php echo $waktu;?></td>
                  </tr>
                  <tr>
                    <td width="40%">Jumlah Transaksi</td>
                    <td width="10%">:</td>
                    <td width="50%"><?php echo $total_smartfren->jumlah;?></td>
                  </tr>
                  <tr>
                    <td width="40%">Total Transaksi (berdasarkan harga)</td>
                    <td width="10%">:</td>
                    <td width="50%"><?php echo $total_smartfren->total==null ? "Rp 0" : "Rp ".$total_smartfren->total;?></td>
                  </tr>
              </table> 
              <br>
              <h4>Table Transaksi</h4>

              <div class="table-responsive">
                <?php if($smartfren!=null){?>
                  <table width="100%" class="table table-striped table-hover table-dt">
                <?php } else { ?>
                  <table width="100%" class="table table-striped table-hover">
                <?php } ?>

                <thead>
                  <tr style="background-color: #3c8dbc;color:#f1f1f1;">
                    <th>No</th>
                    <th>No. HP</th>
                    <th>Pulsa</th>
                    <th class="text-center">Harga</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 1;
                    if($smartfren!=null){ 
                      foreach($smartfren as $d){ ?>
                      <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $d->no_hp;?></td>
                        <td><?php echo $d->pulsa;?></td>
                        <td class="text-right"><?php echo "Rp ".$d->harga;?></td>

                      </tr>
                  <?php  }
                    } else { ?>
                    <tr>
                      <td colspan="4" class="text-center"><i>Tidak ada data</i></td>
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

    </div> <!-- div row -->
      
      
    <div class="row">

      <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">BOLT</h3>

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
                    <td width="10%">:</td>
                    <td width="50%"><?php echo date('d-m-Y', strtotime($date));?></td>
                  </tr>
                  <tr>
                    <td width="40%">Waktu</td>
                    <td width="10%">:</td>
                    <td width="50%"><?php echo $waktu;?></td>
                  </tr>
                  <tr>
                    <td width="40%">Jumlah Transaksi</td>
                    <td width="10%">:</td>
                    <td width="50%"><?php echo $total_bolt->jumlah;?></td>
                  </tr>
                  <tr>
                    <td width="40%">Total Transaksi (berdasarkan harga)</td>
                    <td width="10%">:</td>
                    <td width="50%"><?php echo $total_bolt->total==null ? "Rp 0" : "Rp ".$total_bolt->total;?></td>
                  </tr>
              </table> 
              <br>
              <h4>Table Transaksi</h4>

              <div class="table-responsive">
                <?php if($bolt!=null){?>
                  <table width="100%" class="table table-striped table-hover table-dt">
                <?php } else { ?>
                  <table width="100%" class="table table-striped table-hover">
                <?php } ?>

                <thead>
                  <tr style="background-color: #3c8dbc;color:#f1f1f1;">
                    <th>No</th>
                    <th>No. HP</th>
                    <th>Pulsa</th>
                    <th class="text-center">Harga</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 1;
                    if($bolt!=null){ 
                      foreach($bolt as $d){ ?>
                      <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $d->no_hp;?></td>
                        <td><?php echo $d->pulsa;?></td>
                        <td class="text-right"><?php echo "Rp ".$d->harga;?></td>

                      </tr>
                  <?php  }
                    } else { ?>
                    <tr>
                      <td colspan="4" class="text-center"><i>Tidak ada data</i></td>
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

    </div> <!-- div row -->
      

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
      window.location.href = BASE_URL+"laporan/pulsa/"+tanggal+"/"+waktu;
    });
  });
</script>