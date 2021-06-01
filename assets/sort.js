window.onload = function() {
    $("#sort-table").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
}

$(document).on('submit', '#insert_sort', function(e){
    var formData = new FormData($(this)[0]);

    $.ajax({
      	method: 'POST',
      	url: base_url+'Sort/insert',
      	data: formData,
      	processData: false,
      	contentType: false
    }).done(function(data) {
      	var out = jQuery.parseJSON(data);
        if (out.status == 'true') {
          SuccessMessage(out);
        } else {
          ErrorMessage(out);
        }
    })
    e.preventDefault();    
});

$(document).on('click', '.confirm', function(){
    var id = $(this).attr('data-id');
    Swal.fire({
      title: 'Are you sure ?',
      showCancelButton: true,
      confirmButtonText: `Delete`,
    }).then((result) => {
      if (result.value == true) {
        deletedata(id);
      }
    });
})

function deletedata(id) {
    $.ajax({
        method: 'GET',
        url: base_url+'Sort/delete?id='+id
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