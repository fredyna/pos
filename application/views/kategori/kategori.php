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
            <h3 class="box-title">Form Tambah Kategori</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <div class="form-horizontal">
              <div class="form-group">
                <label for="nama" class="col-sm-3 control-label">Nama Kategori</label>
                <div class="col-sm-9">
                  <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Kategori">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-4">
                  <button type="submit" id="tambah" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button>
                </div>
              </div>

            </div> <!-- end div form --> 
            <p id="hasil" style="display: none;"></p>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.col -->
    </div>

    <div class="col-md-12">
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Data Kategori</h3>

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

            <div class="table-responsive">
            <?php if($kategori!=null){?>
              <table width="100%" class="table table-striped table-bordered table-hover" id="table">
            <?php } else { ?>
              <table width="100%" class="table table-striped table-bordered table-hover">
            <?php } ?>
              
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama Kategori</th>
                          <th>Action</th>
                      </tr>
                       
                  </thead>
                  <tbody>
                  <?php 
                  $no = 1;
                  if($kategori!=null){
                    foreach($kategori as $d){                  
                  ?>
                  <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d->nama; ?></td>
                      <td style="text-align: center;">
                          <?php 
                            if($d->status==0){ ?>
                              <button id="<?php echo 'activate'.$d->id;?>" onclick="activate(<?php echo $d->id;?>)" class="btn btn-success btn-xs">Aktifkan</button>
                              <button id="<?php echo 'deactivate'.$d->id;?>" onclick="activate(<?php echo $d->id;?>)" class="btn btn-danger btn-xs" style="display: none;">Nonaktifkan</button>
                          <?php  } else { ?>
                              <button id="<?php echo 'activate'.$d->id;?>" onclick="activate(<?php echo $d->id;?>)" class="btn btn-success btn-xs" style="display: none;">Aktifkan</button>
                              <button id="<?php echo 'deactivate'.$d->id;?>" onclick="activate(<?php echo $d->id;?>)" class="btn btn-danger btn-xs">Nonaktifkan</button>
                          <?php } ?>
                          <a class='btn btn-info btn-xs' href="<?php echo base_url('kategori/editKategori/'.$d->id); ?>"><i class="glyphicon glyphicon-edit"></i> </a>
            
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
  function activate(idkategori){
      var y = confirm("Are you sure?");
      if(y == true){
        var BASE_URL = "<?php echo base_url();?>";
        $.ajax({
          type: "POST",
          url: BASE_URL+"kategori/activate", 
          data: {id: idkategori },
          dataType: "json",
          success:function(response)
          {
            if(response==1){
              $("#deactivate"+idkategori).show();
              $("#activate"+idkategori).hide();
            } else if(response==0){
              $("#deactivate"+idkategori).hide();
              $("#activate"+idkategori).show();
            } else{
              alert("Gagal Mengaktifkan!");
            }
          }
        });
      }
      
  }

  $(document).ready(function(){
    var nama = $("#nama");
    var btn = $("#tambah");
    var BASE_URL = '<?php echo base_url();?>';

    btn.click(function(){
      if(nama.val()==''){
        alert("Masukan nama kategori!");
      } else{

        var kategori = nama.val();
        $.ajax({
          url:BASE_URL+'kategori/addKategori',
          type: 'POST',
          data: {
            nama: kategori
          },
          dataType: 'json' 
        })
        .done(function(data){
          if(data==1){
            $("#hasil").text("Sukses Tambah Kategori!");
            $("#hasil").show();
            window.location.reload(true);
          } else{
            $("#hasil").text("Gagal!");
            $("#hasil").show();
          }
        })
        .fail(function(jqXHR, textStatus){
          alert("Koneksi gagal "+textStatus);
          $("#hasil").text("");
        });

      }
    });
  });
</script>