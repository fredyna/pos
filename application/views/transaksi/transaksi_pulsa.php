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
                <div id="alert-sukses" class="alert alert-success alert-dismissable" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Sukses!
                </div>

                <div id="alert-gagal" class="alert alert-danger alert-dismissable" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Gagal!
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
              <label for="pulsa" class="col-sm-3 control-label">Pulsa</label>
              <div class="col-sm-9">
                <select name="pulsa" class="form-control">
                  <option value="" style="display: none;">--Nominal Pulsa--</option>
                </select>
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
              <label for="no_hp" class="col-sm-3 control-label">No HP</label>
              <div class="col-sm-9">
                <input type="text" name="no_hp" value="<?php echo set_value('no_hp');?>" class="form-control" value="0" placeholder="0">
                <?php echo form_error('no_hp');?>
              </div>
              
            </div>

            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-4">
                <button name="submit" value="submit" class="btn btn-success"> Simpan</button>
              </div>
            </div>
          </div>
          <!-- End form transaksi -->

          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.col -->
    </div>

    <div class="col-md-12">
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Data Transaksi Pulsa</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
             
            <div class="table-responsive">
            <table id="list_transaksi" width="100%" class="table table-striped table-bordered table-hover" id="tabletransaksi">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Kasir</th>
                          <th>Nama Operator</th>
                          <th>Pulsa</th>
                          <th>Harga</th>
                          <th>No HP</th>
                          <th>Tanggal</th>
                          <th>Action</th>
                      </tr>
                       
                  </thead>
              </table>
            </div>             
          </div>
          <!-- /.box-body -->

          <!-- Modal -->
          <div class="modal fade" id="viewModal" role="View Data">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">View Data Transaksi Pulsa</h4>
                </div>
                <div class="modal-body">
                  <div class="container">
                    <table id="tableView">
                      
                    </table>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
              
            </div>
          </div>
      </div>
      <!-- /.col -->
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
  $(document).ready(function(){

    var BASE_URL  = "<?php echo base_url()?>";

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
          "url": BASE_URL+"transaksi/transaksiPulsaJson", 
          "type": "POST"
        },
        columns: [
            {"data": "created_at"},
            {"data": "name"},
            {"data": "nama_operator"},
            {"data": "pulsa"},
            {"data": "harga"},
            {"data": "no_hp"},
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

    var btnSubmit = $("button[name='submit']");
    var operator  = $("select[name='operator']");
    var pulsa     = $("select[name='pulsa']");
    var harga     = $("input[name='harga']");
    var noHp      = $("input[name='no_hp']");

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

    btnSubmit.click(function(){

      var operatorVal = operator.val();
      var pulsaVal    = pulsa.val();
      var hargaVal    = harga.val();
      var noHpVal     = noHp.val();

      if(operatorVal==''){
        alert("Nama operator belum dipilih");
        return false;
      } else if(pulsaVal==''){
        alert("Nominal pulsa belum dipilih");
        return false;
      } else if(hargaVal==''){
        alert("Kolom harga masih kosong");
        return false;
      } else if(noHpVal==''){
        alert("Kolom No HP masih kosong");
        return false;
      }

      $.ajax({
        url:BASE_URL+'transaksi/addTransaksiPulsa',
        type:'POST',
        data: {
          operator: operatorVal,
          pulsa: pulsaVal,
          harga: hargaVal,
          noHp: noHpVal
          },
        dataType: 'json'
      })
      .done(function(data){
        if(data==1){
          $("#alert-sukses").show();
          $("#alert-gagal").hide();
          t.ajax.reload();
        } else{
          $("#alert-sukses").hide();
          $("#alert-gagal").show();
        }
      })
      .fail(function(jqXHR, textStatus){
        alert("Koneksi gagal "+textStatus);
      });

      $("select[name='operator'] > option:eq(0)").prop('selected',true);
      $("select[name='pulsa']").children('option:not(:first)').remove();
      harga.val("");
      noHp.val("");

    });

  });

  function viewData(id){
    var BASE_URL  = "<?php echo base_url()?>";
    $.getJSON(BASE_URL+'transaksi/viewTransaksiPulsa/'+id,null, function(data) {
      $("tr").remove(".baris");
      $("#tableView").append(
        '<tr class="baris">'
          +'<td class="col-xs-5">Kasir</td>'
          +'<td class="col-xs-1">:</td>'
          +'<td class="col-xs-6">'+data.name+'</td>'
        +'</tr>'
        +'<tr class="baris">'
          +'<td class="col-xs-5">Nama Operator</td>'
          +'<td class="col-xs-1">:</td>'
          +'<td class="col-xs-6">'+data.nama_operator+'</td>'
        +'</tr>'
        +'<tr class="baris">'
          +'<td class="col-xs-5">Pulsa</td>'
          +'<td class="col-xs-1">:</td>'
          +'<td class="col-xs-6">'+data.pulsa+'</td>'
        +'</tr>'
        +'<tr class="baris">'
          +'<td class="col-xs-5">Harga</td>'
          +'<td class="col-xs-1">:</td>'
          +'<td class="col-xs-6">Rp '+data.harga+'</td>'
        +'</tr>'
        +'<tr class="baris">'
          +'<td class="col-xs-5">No HP</td>'
          +'<td class="col-xs-1">:</td>'
          +'<td class="col-xs-6">'+data.no_hp+'</td>'
        +'</tr>'
        +'<tr class="baris">'
          +'<td class="col-xs-5">Tanggal</td>'
          +'<td class="col-xs-1">:</td>'
          +'<td class="col-xs-6">'+data.created_at+'</td>'
        +'</tr>'
      );

      $('#viewModal').modal('show'); 
    });
  }
</script>