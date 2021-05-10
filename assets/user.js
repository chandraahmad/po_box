window.onload = function() {
    $("#user-table").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $('.select-typeuser').select2();
}

$(document).on('submit', '#insert_user', function(e){
    var formData = new FormData($(this)[0]);

    $.ajax({
      	method: 'POST',
      	url: base_url+'User/insert',
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

$(document).on('submit', '#update_user', function(e){
    var formData = new FormData($(this)[0]);

    $.ajax({
      	method: 'POST',
      	url: base_url+'User/update',
      	data: formData,
      	processData: false,
      	contentType: false
    }).done(function(data) {
      	var out = jQuery.parseJSON(data);
      	if (out.status == 'true') {
          $('#userupdate').modal('toggle');
    		  SuccessMessage(out);
      	} else {
          $('#userupdate').modal('toggle');
      		ErrorMessage(out);
      	}
    })
    e.preventDefault();    
});

$(document).on('click', '.getbyiduser', function(){
  var id = $(this).attr('data-id');
  
  $.ajax({
      method: 'GET',
      url: base_url+'User/getbyiduser?id='+id
  }).done(function(data) {
    $('#userupdate').modal();
    $('.msguser-body').html(data);
    $('.select-typeuser').select2();
  })
})

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
        url: base_url+'User/delete?id='+id
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