function refresh() {
  location.reload(true);
}

$(document).ready(function() {
  $("form").submit(function(event) {
    event.preventDefault();
    $.ajax({
      type: $(this).attr("method"),
      url: $(this).attr("action"),
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        $('body').prepend('<div class="loading" id="loading"><div class="loadingio-spinner-spin-6u5i4j4uqje"><div class="ldio-xa7szrfnu6"><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div></div></div></div>');
      },
      success: function(result) {
        var json = jQuery.parseJSON(result);
        Swal.fire(json.title, json.text, json.status);
        setTimeout(refresh, 1400);
      }
      
    }).done(function () {
      $('#loading').remove();
    });
  });
});
