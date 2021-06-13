window.onload = function() {
    $('#from_date').datetimepicker({
        format: 'DD-MM-YYYY'
    });
    $('#until_date').datetimepicker({
        format: 'DD-MM-YYYY'
    });
    $('#datemask').inputmask('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' });
    $('[data-mask]').inputmask();
    bsCustomFileInput.init();
}

$(document).on('submit', '#insert_transaction', function(e){
    var formData = new FormData($(this)[0]);

    $.ajax({
        method: 'POST',
        url: base_url+'Transaction/insert',
        data: formData,
        processData: false,
        contentType: false
    }).done(function(data) {
        var out = jQuery.parseJSON(data);
        if (out.status == 'true') {
            Swal.fire({
                title: out.msg_header,
                text: out.msg,
                timer: 1000,
                showConfirmButton: false,
                icon: 'success'
            }).then(result => {
                window.location.replace(out.url);
            })          
        } else {
          ErrorMessage(out);
        }
    })
    e.preventDefault();    
});

$(document).on('submit', '#upload_transaction', function(e){
    var formData = new FormData($(this)[0]);

    $.ajax({
        method: 'POST',
        url: base_url+'Transaction/upload_transaction',
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


function countTotalPrice() {
    var month = $('#transaction_month').val();
    var pobox_id = $('#pobox_id').val();
    $.ajax({
        method: 'GET',
        url: base_url+'Transaction/countPrice?month='+month+'&pobox_id='+pobox_id
    }).done(function(data) {
        var out = jQuery.parseJSON(data);
        if (out.status == 'true') {
            $("#transaction_total_price").html('Rp.'+out.data+'<input type="hidden" name="transaction_total_price" value="'+out.data+'" readonly>');
        }else{
            ErrorMessage(out.msg);  
        }
    })
}

$(document).on('change', '#checkAll', function(){
    $('table tbody tr').each(function() {
        var $tr = $(this);
        if ($tr.find('.testaja').is(':checked')) {
            $tr.find('.testaja').prop('checked', false);
        }else{
            $tr.find('.testaja').prop('checked', true);
        }
    });
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