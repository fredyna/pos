$(document).ready(function() {
    $('#table').DataTable({
        responsive: true
    });
});

function functionDelete(url){
    swal({
      title: 'Apakah Anda Yakin?',
      text: "Anda akan menghapus data yang dipilih!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!',
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      buttonsStyling: false
    }).then(function () {
        swal("Terhapus!", "Data berhasil dihapus!", "success");
        window.location = url;

    }, function (dismiss) {
      // dismiss can be 'cancel', 'overlay',
      // 'close', and 'timer'
      if (dismiss === 'cancel') {
        swal("Cancelled", "Data gagal dihapus!", "error")
      }

    });
}