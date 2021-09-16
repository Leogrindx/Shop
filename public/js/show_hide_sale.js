

//show-hide sale

var bool_cart = true;

$("#enabled").click(function() {
  if (bool_cart === true) {
    $("#disabled").css("max-height", "75px");
    $("#arrow").css("transform", "rotate(90deg)");
    bool_cart = false;
  } else {
    $("#disabled").css("max-height", "0px");
    $("#arrow").css("transform", "rotate(270deg)");
    bool_cart = true;
  }
});