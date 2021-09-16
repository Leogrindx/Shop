$('#submit').click(function (){
    let ean = $('#EAN').val();
    $.ajax({
        method: "POST",
        url: "/admin_panel/upgrade_itemSearch",
        data: {ean: ean },
        beforeSend: function () {
          $('body').prepend('<div class="loading" id="loading"><div class="loadingio-spinner-spin-6u5i4j4uqje"><div class="ldio-xa7szrfnu6"><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div></div></div></div>');
        },
        success: function (result) {
          if(result == '{"title":"Niema takiego artykla","text":" ","status":"error"}'){
            var json = jQuery.parseJSON(result);
            Swal.fire(json.title, json.text, json.status);
          }else{
            $('#results_ug_ad').html(result);
          }
        },
      }).done(function () {
        $('#loading').remove();
      });
});



// $(document).ready(function() {
//     $("form").submit(function(event) {
//         event.preventDefault();
//         $.ajax({
//             type: 'POST',
//             url: '/admin_panel/upgrade_item_ajax',
//             data: new FormData(this),
//             contentType: false,
//             cache: false,
//             processData: false,
//             success: function(result) {
//                 console.log(result);
//                 var json = jQuery.parseJSON(result);
//                 Swal.fire(json.title, json.text, json.status);
//             }
//         });
//     });
// });
