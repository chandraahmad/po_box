window.onload = function() {
    $("#order-table").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
}

$(document).on('click', '.confirmPayment', function(){
    var id = $(this).attr('data-id');
    Swal.fire({
      title: 'Are you sure ?',
      showCancelButton: true,
      confirmButtonText: `Confirm`,
    }).then((result) => {
      if (result.value == true) {
        confirmPayment(id);
      }
    });
})

function confirmPayment(id) {
    $.ajax({
        method: 'GET',
        url: base_url+'Order/confirmPayment?id='+id
    }).done(function(data) {
        var out = jQuery.parseJSON(data);
        if (out.status == 'true') {
            SuccessMessage(out);
        } else {
            ErrorMessage(out);
        }
    });
}

function SuccessMessage(data) {
  Swal.fire({
      title: data.msg_header,
      text: data.msg,
      timer: 1000,
      showConfirmButton: false,
      icon: 'success'
    }
  ).then(result => {
    location.reload();
  })
}

function ErrorMessage(data) {
  Swal.fire({
      title: data.msg_header,
      text: data.msg,
      timer: 2000,
      showConfirmButton: false,
      icon: 'error'
    }
  )
}