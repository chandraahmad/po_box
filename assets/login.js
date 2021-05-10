window.onload = function() {}

$(document).on('submit', '#insert_login', function(e){
    var formData = new FormData($(this)[0]);
    $.ajax({
      	method: 'POST',
      	url: base_url+'Login/login',
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

function SuccessMessage(data) {
  Swal.fire({
      title: data.msg_header,
      text: data.msg,
      timer: 1000,
      showConfirmButton: false,
      icon: 'success'
    }
  ).then(result => {
    window.location.href = data.url;
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