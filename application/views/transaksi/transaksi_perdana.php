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
            <h3 class="box-title">Transaksi Perdana</h3>

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
                  Transaksi Sukses!
              </div>

              <div id="alert-gagal" class="alert alert-danger alert-dismissable" style="display: none;">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  Transaksi Gagal!
              </div>

            <!-- Form transaksi -->
            <div class="form-horizontal">
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
                  <button name="submit" value="submit" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</button>
                </div>
              </div>
              <p id="hasil" style="display: none;"></p>
            </div>
            <!-- End form transaksi -->
            <br>
            <h4>Data Transaksi Perdana Sementara</h4>
            <?php if($this->session->flashdata('info')){ ?>
              <div class="alert alert-warning alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <?php echo $this->session->flashdata('info'); ?>
              </div>
            <?php } ?>

            <table id="trxsementara" class="table table-responsive table-bordered table-striped table-hover">
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
              <tbody id="tbbody">
                
              </tbody>
            </table>
            <br>
            <div class="text-right">
              <button type="button" id="selesai" class="btn btn-success">Selesai Transaksi</button>
            </div>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.col -->
    </div>

    <div class="col-md-12">
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Data Transaksi Perdana</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <?php if($this->session->flashdata('info-data')){ ?>
              <div class="alert alert-warning alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <?php echo $this->session->flashdata('info'); ?>
              </div>
            <?php } ?>
             
            <div class="table-responsive">
            <table id="list_transaksi" width="100%" class="table table-striped table-bordered table-hover" id="tabletransaksi">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Kasir</th>
                          <th>Tanggal</th>
                          <th>Action</th>
                      </tr>
                       
                  </thead>
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
  function getDataSementara(){
    var BASE_URL  = "<?php echo base_url()?>";
    var no = 1;
    $.getJSON(BASE_URL+'transaksi/getTransaksiPerdanaSementara/',null, function(data) {
      $("tr").remove(".baris");
      var url = "<?php echo base_url('transaksi/editTransaksiPerdanaSementara/')?>";
      var total = 0;

      if(!data===undefined || !data.length == 0){
        $.each(data, function() {
          $("#tbbody")
              .append(
                  '<tr class="baris">'
                    +'<td>'+no+'</td>'
                    +'<td>'+this.nama_operator+'</td>'
                    +'<td>'+this.jenis+'</td>'
                    +'<td class="text-right">Rp '+this.harga+'</td>'
                    +'<td class="text-right">'+this.qty+'</td>'
                    +'<td class="text-right">Rp '+(this.harga*this.qty)+'</td>'
                    +'<td class="text-center">'
                      +'<a href="'+url+this.nama_operator+'/'+this.jenis+'" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>&nbsp;'
                      +'<a href="javascript:void(0)" onclick="hapusDataSementara(\''+this.nama_operator+'\',\''+this.jenis+'\')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>'
                    +'</td>'
                  +'</tr>'
                );
            no++;
            total += (this.harga*this.qty);
        });

        $("#tbbody")
          .append(
            '<tr class="baris">'
              +'<td colspan="5" class="text-center">Jumlah Total</td>'
              +'<td class="text-right">Rp '+total+'</td>'
              +'<td></td>'
            +'</tr>'
          );

      } else {
        $("#tbbody")
          .append(
            '<tr class="baris">'
              +'<td colspan="7" style="text-align:center;"><i>Tidak ada data</i></td>'
            +'</tr>'
          );
      }

    });
  }

  function hapusDataSementara(nama_operator, jenis){
    var BASE_URL  = "<?php echo base_url()?>";
    var y = confirm("Apakah yakin mau dihapus?");
    if(y == true){
      $.ajax({
        url: BASE_URL+'transaksi/hapusTransaksiPerdanaSementara/'+nama_operator+'/'+jenis,
        type: 'POST'
      })
      .done(function(data){
        if(data!=0){
          getDataSementara();
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

    getDataSementara();

    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
    {
        return {
            "iStart": oSettings._iDisplayStart,
            "iEnd": oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal": oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        };
    };

    var t = $("#list_transaksi").DataTable({

        oLanguage: {
            sProcessing: "loading..."
        },
        processing: true,
        serverSide: true,
        ajax: {
          "url": BASE_URL+"transaksi/transaksiPerdanaJson", 
          "type": "POST"
        },
        columns: [
            {"data": "created_at"},
            {"data": "name"},
            {"data": "created_at"},
            {
              "data": "action",
              "orderable": false
            }
        ],
        order: [[0,'desc']],
        rowCallback: function(row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $('td:eq(0)', row).html(index);
        }
    });

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

      $.ajax({
        url:BASE_URL+'transaksi/addTransaksiPerdanaSementara',
        type:'POST',
        data: {
          operator: operatorVal,
          jenis: jenis,
          harga: hargaVal,
          qty: qtyVal
          },
        dataType: 'json'
      })
      .done(function(data){
        if(data==1){
          $("#hasil").text("Sukses!");
          $("#hasil").show();
          getDataSementara();
        } else{
          $("#hasil").text("Gagal!");
          $("#hasil").show();
        }
      })
      .fail(function(jqXHR, textStatus){
        alert("Koneksi gagal "+textStatus);
      });

      $("select[name='operator'] > option:eq(0)").prop('selected',true);
      $("#eceran").prop("checked");
      harga.val("");
      qty.val("");

    });

    /* end tambah data */

    /* selesai transaksi */
    $("#selesai").click(function(){

      $.ajax({
        url: BASE_URL+'transaksi/selesaiTransaksiPerdana/',
        type: 'POST',
      })
      .done(function(data){
        if(data==1){
          $("#alert-sukses").show();
          $("#alert-gagal").hide();
          getDataSementara();
          t.ajax.reload();
        } else if(data==0){
          $("#alert-sukses").hide();
          $("#alert-gagal").show();
        } else if(data==2){
          $("#alert-sukses").hide();
          $("#alert-gagal").hide();
          alert("Data transaksi masih kosong!");
        }
      })
      .fail(function(jqXHR, textStatus){
        alert("Koneksi Error "+textStatus);
      });

    });
    /* end selesai transaksi */

  });
</script>