window.onload = function() {
    $("#pobox-table").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $('.select-office').select2();
}

$(document).on('submit', '#insert_pobox', function(e){
    var formData = new FormData($(this)[0]);

    $.ajax({
      	method: 'POST',
      	url: base_url+'PoBox/insert',
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

$(document).on('submit', '#update_pobox', function(e){
    var formData = new FormData($(this)[0]);

    $.ajax({
      	method: 'POST',
      	url: base_url+'PoBox/update',
      	data: formData,
      	processData: false,
      	contentType: false
    }).done(function(data) {
      	var out = jQuery.parseJSON(data);
      	if (out.status == 'true') {
          $('#poboxupdate').modal('toggle');
    		  SuccessMessage(out);
      	} else {
          $('#poboxupdate').modal('toggle');
      		ErrorMessage(out);
      	}
    })
    e.preventDefault();    
});

$(document).on('click', '.getbyidpobox', function(){
  var id = $(this).attr('data-id');
  
  $.ajax({
      method: 'GET',
      url: base_url+'PoBox/getbyidpobox?id='+id
  }).done(function(data) {
    $('#poboxupdate').modal();
    $('.msgpobox-body').html(data);
    $('.select-office').select2();
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
        url: base_url+'PoBox/delete?id='+id
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