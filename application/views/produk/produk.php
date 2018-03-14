<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kelola Produk
      <small>Kelola Produk</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('produk');?>"><i class="fa fa-produk-hunt"></i> Kelola Produk</a></li>
      <!--<li class="active">Here</li>-->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Data Produk</h3>

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

            <a href="<?php echo base_url('produk/addProduk');?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</a> 
            <br /><br />

            <div class="table-responsive">
            <?php if($produk!=null){?>
              <table width="100%" class="table table-striped table-bordered table-hover" id="table">
            <?php } else { ?>
              <table width="100%" class="table table-striped table-bordered table-hover">
            <?php } ?>
              
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Harga Beli</th>
                          <th>Harga Jual</th>
                          <th>Qty</th>
                          <th>Updated At</th>
                          <th>Action</th>
                      </tr>
                       
                  </thead>
                  <tbody>
                  <?php 
                  $no = 1;
                  if($produk!=null){
                    foreach($produk as $p){                  
                  ?>
                  <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $p->nama; ?></td>
                      <td><?php echo $p->harga_beli; ?></td>
                      <td><?php echo $p->harga_jual; ?></td>
                      <td><?php echo $p->qty; ?></td>
                      <td>
                        <?php 
                          $tgl2 = date('d-m-Y H:i:s', strtotime($p->updated_at));
                          echo $tgl2; 
                        ?>
                      </td>
                      <td style="text-align: center;">
                          <?php 
                            if($p->status==0){ ?>
                              <button id="<?php echo 'activate'.$p->id;?>" onclick="activate(<?php echo $p->id;?>)" class="btn btn-success btn-xs">Aktifkan</button>
                              <button id="<?php echo 'deactivate'.$p->id;?>" onclick="activate(<?php echo $p->id;?>)" class="btn btn-danger btn-xs" style="display: none;">Nonaktifkan</button>
                          <?php  } else { ?>
                              <button id="<?php echo 'activate'.$p->id;?>" onclick="activate(<?php echo $p->id;?>)" class="btn btn-success btn-xs" style="display: none;">Aktifkan</button>
                              <button id="<?php echo 'deactivate'.$p->id;?>" onclick="activate(<?php echo $p->id;?>)" class="btn btn-danger btn-xs">Nonaktifkan</button>
                          <?php } ?>
                          <a class='btn btn-info btn-xs' href="<?php echo base_url('produk/editProduk/'.$p->id); ?>"><i class="glyphicon glyphicon-edit"></i> </a>
            
                      </td>
                  </tr>
                  <?php } 
                    } else { ?>
                    <tr>
                      <td class="text-center" colspan="7"><i>Tidak Ada Data</i></td>
                    </tr>
                  <?php } ?>
                  </tbody>
              </table>
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
  function activate(idproduk){
      var y = confirm("Are you sure?");
      if(y == true){
        var BASE_URL = "<?php echo base_url();?>";
        $.ajax({
          type: "POST",
          url: BASE_URL+"produk/activate", 
          data: {id: idproduk },
          dataType: "json",
          success:function(response)
          {
            if(response==1){
              $("#deactivate"+idproduk).show();
              $("#activate"+idproduk).hide();
            } else if(response==0){
              $("#deactivate"+idproduk).hide();
              $("#activate"+idproduk).show();
            } else{
              alert("Gagal Mengaktifkan!");
            }
          }
        });
      }
      
  }
</script>