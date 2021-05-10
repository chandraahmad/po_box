window.onload = function() {
    $("#office-table").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $('.select-regional').select2();
}

$(document).on('submit', '#insert_office', function(e){
    var formData = new FormData($(this)[0]);

    $.ajax({
      	method: 'POST',
      	url: base_url+'Office/insert',
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

$(document).on('submit', '#update_office', function(e){
    var formData = new FormData($(this)[0]);

    $.ajax({
      	method: 'POST',
      	url: base_url+'Office/update',
      	data: formData,
      	processData: false,
      	contentType: false
    }).done(function(data) {
      	var out = jQuery.parseJSON(data);
      	if (out.status == 'true') {
            $('#officeupdate').modal('toggle');
    		SuccessMessage(out);
      	} else {
            $('#officeupdate').modal('toggle');
      		ErrorMessage(out);
      	}
    })
    e.preventDefault();    
});

$(document).on('click', '.getbyidoffice', function(){
  var id = $(this).attr('data-id');
  
  $.ajax({
      method: 'GET',
      url: base_url+'Office/getbyidoffice?id='+id
  }).done(function(data) {
    $('#officeupdate').modal();
    $('.msgoffice-body').html(data);
    getRegionalUpdate();
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
        url: base_url+'Office/delete?id='+id
    }).done(function(data) {
        var out = jQuery.parseJSON(data);
        if (out.status == 'true') {
            SuccessMessage(out);
        } else {
            ErrorMessage(out);
        }
    });
}

function getRegional(id) {
    $.ajax({
        method: 'GET',
        url: base_url+'Office/getregional?id='+id.value
    }).done(function(data) {
        $('.showregional').html(data);
    })
}

function getRegionalUpdate(id) {
    $.ajax({
        method: 'GET',
        url: base_url+'Office/getregional?id='+id.value
    }).done(function(data) {
        $('.showregional-update').html(data);
    })
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