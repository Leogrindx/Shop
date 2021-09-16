function refresh() {
  location.reload(true);
}

function cart(data){
$( document ).ready(function() {
    let arr_data = data.split(';');
    let size = arr_data[1];
    let ean = arr_data[0];
    let arr = size.split(',');
    var html;
  
  
    for(i = 0; i < arr.length; i++){
      if (typeof html !== 'undefined') {
        html += '<button style="text-transform: uppercase;border-radius: 4px;margin: 10px;font-size: 16px;font-weight: bold;padding: 5px;" onclick="size_add(\''+ ean + ',' + arr[i] + '\')"">' + arr[i] + '</button>';
      }else{
        html = '<button style="text-transform: uppercase;border-radius: 4px;margin: 10px;font-size: 16px;font-weight: bold;padding: 5px;" onclick="size_add(\''+ ean + ',' + arr[i] + '\')"">' + arr[i] + '</button>';
      }
    }
    Swal.fire({
      title: '<strong>Wybież Rozmiar</strong>',
      icon: false,
      html:
        html,
      showCloseButton: true,
      showCancelButton: false,
      focusConfirm: false,
      showConfirmButton: false
    })
  });
}

$(".cart").click(function () {
  let size_select = $('#size_select').val();
  if(size_select){
    let size = $('#size_select').val();
    let ean = $(this).val();
    size_add(ean + "," + size);
  }else{
    let size = $(this).attr('name');
    let ean = $(this).val();
    let arr = size.split(',');
    var html;
  
  
    for(i = 0; i < arr.length; i++){
      if (typeof html !== 'undefined') {
        html += '<button style="text-transform: uppercase;border-radius: 4px;margin: 10px;font-size: 16px;font-weight: bold;padding: 5px;" onclick="size_add(\''+ ean + ',' + arr[i] + '\')"">' + arr[i] + '</button>';
      }else{
        html = '<button style="text-transform: uppercase;border-radius: 4px;margin: 10px;font-size: 16px;font-weight: bold;padding: 5px;" onclick="size_add(\''+ ean + ',' + arr[i] + '\')"">' + arr[i] + '</button>';
      }
    }
    Swal.fire({
      title: '<strong>Wybież Rozmiar</strong>',
      icon: false,
      html:
        html,
      showCloseButton: true,
      showCancelButton: false,
      focusConfirm: false,
      showConfirmButton: false
    });
  }
  
});

function size_add(ean){
  $(document).ready(function() {
    let post = ean;
    $.ajax({
      method: "POST",
      url: "/add_item_to_cart",
      data: { ean: post },
      success: function(result) {
        console.log(result);
        var json = jQuery.parseJSON(result);
        if(json.status == "warning"){
          Swal.fire(
            json.title,
            'żeby dodać do kosza',
            json.status
          );
        }else{
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
      }
    });
  });
  
}

