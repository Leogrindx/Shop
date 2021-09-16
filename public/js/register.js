function switch_preview() {
  location.assign('/');
}

function show_check_email(){
  $("#check_email").addClass("swal2-container swal2-center swal2-backdrop-show");
  $("#content").css('display' , 'flex');
}
  
  $(document).ready(function () {
    $("form").submit(function (event) {
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
        success: function (result) {
          console.log(result);
          var json = jQuery.parseJSON(result);
          let status = String(json.status);
          let send_email = String(json.title);
          let on_show_check_email = String(json.text);
            if (status == "success") {
              if(send_email == "send_email"){
                show_check_email();
              }else{
                Swal.fire(json.title, " ", json.status);
                setTimeout(switch_preview, 1400);
              }
            }else{
              if(on_show_check_email == "yes"){
                $("#check_email").removeClass("swal2-container swal2-center swal2-backdrop-show");
                $("#content").css('display' , 'none');
                Swal.fire({
                  position: 'center',
                  icon: json.status,
                  title: json.title,
                  showConfirmButton: false,
                  timer: 1400
                });
                  setTimeout(show_check_email, 1420);
              }else{
                Swal.fire({
                  position: 'center',
                  icon: json.status,
                  title: json.title,
                  showConfirmButton: false,
                  timer: 1400
                });
              }
            }
        },
      }).done(function () {
        $('#loading').remove();
      });
    });
  });

  
//swal2-container swal2-center