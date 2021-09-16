$(document).ready(function () {
  $(".select_cart").on("change", function () {
    var number = $(this).val();
    var ean = $(this).attr("name");
    $.ajax({
      method: "POST",
      url: "/upgrade_number_item_cart",
      data: { number_cart: number, ean: ean },
      beforeSend: function () {
        $('body').prepend('<div class="loading" id="loading"><div class="loadingio-spinner-spin-6u5i4j4uqje"><div class="ldio-xa7szrfnu6"><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div></div></div></div>');
      },
      success: function (result) {
        console.log(result);
        var json = jQuery.parseJSON(result);
        $("#total_price").text(json.total_price + " zł");
        $("#number_item_cart").text(json.number_item_cart);
      },
    }).done(function () {
      $('#loading').remove();
    });
  });
});
