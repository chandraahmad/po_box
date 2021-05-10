window.onload = function() {
	// GetLocation();
	$('#show_camera').hide();
	$('#show_results_camera').hide();
}

$(document).ready(function() {
    $('#datatable').DataTable();
});

function effect_msg(data) {
	$('.msg-header').html('<h3>'+data.msg_header+'</h3>');
	$('.msg').html('<h6 style="text-align: center;">'+data.msg+'</h6>');
	$('#myModal').modal();
	// $('.msg').show(1000);
	// setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
}

$(document).on('click', '#reload', function(e){
  $('#myModal').modal('toggle');
});

$(document).on('click', '#reload2', function(e){
  location.reload();
});

$(document).on('click', '.take_picture', function(){
	$('#show_camera').show();
	Webcam.set({
	    width: 300,
	    height: 300,
	    image_format: 'jpeg',
	    jpeg_quality: 90
	});
	Webcam.attach( '#my_camera' );
});

$(document).on('click', '.take_snapshot', function(){
	var nmfile = $('#guest_number').val();
	Webcam.snap( function(data_uri) {
        Webcam.upload( data_uri, 'http://localhost/coba/Home/image_upload?nmfile='+nmfile, function(code, data) {
        	var out = jQuery.parseJSON(data);
        	effect_msg(out);
          	$('.msg-footer').html('<button id="reload" class="btn btn-primary">Ok</button>');

            document.getElementById('show_results_camera').innerHTML = 
            '<img src="'+out.url+'"/>'+'<input type="hidden" name="guest_pct" value='+out.url+'>';
        });    
    });
    Webcam.reset();
    $('#show_camera').hide();
    $('#show_results_camera').show();
});

$(document).on('submit', '#insert_guest', function(e){
	console.log('disini');
    var formData = new FormData($(this)[0]);

    $.ajax({
      	method: 'POST',
      	url: 'Home/insert',
      	data: formData,
      	processData: false,
      	contentType: false
    }).done(function(data) {
      	var out = jQuery.parseJSON(data);

      	if (out.status == 'true') {
      		effect_msg(out);
      		$('.msg-footer').html('<button id="reload2" class="btn btn-primary">Ok</button>');
      	} else {
      		effect_msg(out);
      		$('.msg-footer').html('<button id="reload2" class="btn btn-primary">Ok</button>');
      	}
    })
    e.preventDefault();    
});

// function initMap(lat, long) {
// 	var pin = lat+', '+long;
// 	var map = new google.maps.Map(document.getElementById("map"), {
// 	    center: { lat: lat, lng: long },
// 	    zoom: 12
// 	});
// 	var marker1 = new google.maps.Marker({
// 		position: {lat: lat, lng: long}, 
// 		map: map
// 	});
// 	var marker2 = new google.maps.Marker({
// 		position: {lat: -6.8977162, lng: 107.6037886}, 
// 		map: map
// 	});
// }
// function GetLocation() {
// 	if (navigator.geolocation) {
// 		navigator.geolocation.getCurrentPosition(ShowPosition);
// 	}else{
// 		alert('Geolocation is not supported by this browser.');
// 	}
// }
// function ShowPosition(position) {
// 	var lat = position.coords.latitude;
// 	var long = position.coords.longitude;
// 	initMap(lat, long);
// }