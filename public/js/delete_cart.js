function refresh() {
  location.reload(true);
}

$(".delete").click(function (event) {
  let val = $(this).val();
  console.log(val);
  Swal.fire({
    title: "Jesteś pewny?",
    text: "Nie będzie można tego przywrócić!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Tak, usuń to!",
    cancelButtonText: "Nie",
  }).then((result) => {
    if (result.value) {
      event.preventDefault();
      $.ajax({
        method: "POST",
        url: "/delete_item_to_cart",
        data: { del: val },
        success: function (result) {
          console.log(result);
          var json = jQuery.parseJSON(result);
          Swal.fire(json.title, " ", json.status);
          let item = "#c_" + json.text;
          $(item).remove();
          console.log(json.num_items);
          $("#number_item_cart").text(json.num_items);
          $("#total_price").text(json.price + " zł");
          if (json.refresh) {
            let ref = String(json.refresh);
            if (ref == "true") {
              setTimeout(refresh, 900);
            }
          }
        },
      });
    }
  });
});
