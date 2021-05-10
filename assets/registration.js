window.onload = function() {
}

$(document).on('submit', '#insert_registration', function(e){
    var formData = new FormData($(this)[0]);

    $.ajax({
      	method: 'POST',
      	url: base_url+'Registration/insert_registration',
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