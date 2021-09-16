
//beginning & end pages
$(document).ready(function() {
    let page = $("#page").text();
    if (page == 1) {
      $("#btn_page").prop("disabled", true);
    }
    let number = $("#number").text();

    if (page == number) {
      $("#btn_number").prop("disabled", true);
    }
  });

//Filter in brands
let checkbox_label_brand = Array.from(document.getElementsByClassName('checkbox_label_brand'));

function filter_in_brands(){
    let data_from_brands = document.getElementById('data_from_brands').value;
    checkbox_label_brand.forEach(e => {
        if(e.getAttribute('for').toUpperCase().indexOf(data_from_brands.toUpperCase()) > -1){
           e.style.display = '';
        }else{
           e.style.display = 'none';
        }
    });
}

//default color block filter
$(document).ready(function() {
  if ($(".box")) {
    let box = $(".box");
    for (i = 0; i < box.length; i++) {
      let re = /box/gi;
      let class_name = String(box[i].className);
      let replace = class_name.replace(re, " ");
      let color = $.trim(replace);
      box[i].style.backgroundColor = color;
    }
  }
});


//slider_in_itemDetails
