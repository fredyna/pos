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
            <h3 class="box-title">Transaksi General</h3>

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
                  <button name="submit" value="submit" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</button>
                </div>
              </div>
              <p id="hasil" style="display: none;"></p>
            </div>
            <!-- End form transaksi -->
            <br>
            <h4>Data Transaksi Sementara</h4>
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
                  <td>Nama Produk</td>
                  <td>Harga</td>
                  <td>Qty</td>
                  <td>Total</td>
                  <td class="text-center">Action</td>
                </tr>
              </thead>
              <tbody id="tbbody">
                
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="4" class="text-center">Sub Total</td>
                  <td class="text-right" id="subtotal">Rp 0</td>
                  <input type="hidden" id="hidden_subtotal">
                  <td></td>
                </tr>
                <tr>
                  <td colspan="4" class="text-center">Diskon (%)</td>
                  <td class="text-right"><input type="number" id="diskon" placeholder="0" max="100" min="0" class="text-right" style="width:100px;"></td>
                  <td></td>
                </tr>
                <tr>
                  <td colspan="4" class="text-center">Jumlah Total</td>
                  <td class="text-right" id="total">Rp 0</td>
                  <td></td>
                </tr>
              </tfoot>
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
                          <th>Diskon</th>
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
    $.getJSON(BASE_URL+'transaksi/getItemsTransaksiSementara/',null, function(data) {
      $("tr").remove(".baris");
      var url = "<?php echo base_url('transaksi/editItemTransaksiSementara/')?>";
      var subtotal = 0;

      if(!data===undefined || !data.length == 0){
        $.each(data, function() {
          $("#tbbody")
              .append(
                  '<tr class="baris">'
                    +'<td>'+no+'</td>'
                    +'<td>'+this.nama_produk+'</td>'
                    +'<td class="text-right">Rp '+this.harga+'</td>'
                    +'<td class="text-right">'+this.qty+'</td>'
                    +'<td class="text-right">Rp '+(this.harga*this.qty)+'</td>'
                    +'<td class="text-center">'
                      +'<a href="'+url+this.id_produk+'" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>&nbsp;'
                      +'<a href="javascript:void(0)" onclick="hapusDataSementara(\''+this.id_produk+'\')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>'
                    +'</td>'
                  +'</tr>'
                );
            no++;
            subtotal += (this.harga*this.qty);
        });

      } else {
        subtotal = 0;
        $("#tbbody")
          .append(
            '<tr class="baris">'
              +'<td colspan="6" style="text-align:center;"><i>Tidak ada data</i></td>'
            +'</tr>'
          );
      }

      var diskon   = ( $("#diskon").val() / 100 ) * subtotal;
      var total    = subtotal - diskon;

      $("#subtotal").text("Rp "+subtotal);
      $("#hidden_subtotal").val(subtotal);
      $("#total").text("Rp "+total);

    });
  }

  function hapusDataSementara(id_produk){
    var BASE_URL  = "<?php echo base_url()?>";
    var y = confirm("Apakah yakin mau dihapus?");
    if(y == true){
      $.ajax({
        url: BASE_URL+'transaksi/hapusTransaksiSementara/'+id_produk,
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
          "url": BASE_URL+"transaksi/transaksiJson", 
          "type": "POST"
        },
        columns: [
            {"data": "created_at"},
            {"data": "name"},
            {"data": "diskon"},
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

      $.ajax({
        url:BASE_URL+'transaksi/addTransaksiSementara',
        type:'POST',
        data: {
          produk: produkVal,
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
        $("#hasil").text("");
      });

      $("#produk > option:eq(0)").prop('selected',true);
      $("#produk").selectpicker("refresh");
      $("#produk").change();
      harga.val("");
      qty.val("");
      $("#saranharga").text("");
      $("#stok").text("");

    });

    /* end tambah data */

    /* diskon */

    $("#diskon").change(function(){
      var hidden_subtotal = $("#hidden_subtotal").val();
      var diskon = ( $("#diskon").val() / 100 ) * hidden_subtotal;
      var total = hidden_subtotal - diskon;
      $("#total").text("Rp "+total);
    });

    /* end diskon */

    /* selesai transaksi */
    $("#selesai").click(function(){
      var diskon = $("#diskon").val();

      $.ajax({
        url: BASE_URL+'transaksi/selesaiTransaksi/',
        type: 'POST',
        data: {
          diskon: diskon
        },
        dataType: 'json'
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