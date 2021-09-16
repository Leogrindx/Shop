$('.size_select').on('change', function(event) {
  let size = $(this).val();
  let value = $('#cart').val();
  let new_value = value + ',' + size;
  $('#cart').val(new_value);
  console.log(new_value);
});

$('.number_select').on('change', function(event) {
  let number = $(this).val();
  let value = $('#cart').val();
  let arr = value.split(',');
  arr[3] = number;
  
});
  
  $(".cart").click(function(event) {
    $(document).ready(function() {
      let post = ean;
      $.ajax({
        method: "POST",
        url: "/add_item_to_cart",
        data: { ean: post },
        success: function(result) {
          console.log(result);
          var json = jQuery.parseJSON(result);
          Swal.fire(
            json.title,
            "ilość w koszyku " +
              json.text +
              "<br>" +
              " cena całkowita: <b>" +
              json.total_price +
              " zł</b>",
            json.status
          );
          $("#number_item_cart").text(json.text);
        }
      });
    });
  });