var arr_obj;
var json_GET = JSON.parse(get);
let boxes = Array.from(document.getElementsByClassName('submit'));
//ajax
function html(obj){
    let width = document.documentElement.clientWidth;
    //Show filter_responsive
    if(width <= 1150){
        $('#filter_buttons').css('display', 'none');
        $('#close_filter').css('display', 'none');
        hideTabsContent(0);
    }else{
        hideTabsContent(0);
    }
    $.ajax({
        method: "GET",
        url: "/items_ajax",
        data: obj,
        beforeSend: function () {
            $('body').prepend('<div class="loading" id="loading"><div class="loadingio-spinner-spin-6u5i4j4uqje"><div class="ldio-xa7szrfnu6"><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div></div></div></div>');
            },
        success: function(result) {
            $('#content_fil').html(result);
            $('#loading').remove();
        }
    });
}
//history
boxes.forEach(b =>{
        let id = b.id;
    b.addEventListener('click', function(e){
            e.preventDefault();
            let href = window.location.href;
            let obj = {},url = 1;
            let price = document.getElementById('price_val').value;
            let color = document.getElementById('color_val').value;
            let brand = document.getElementById('brand_val').value;
            let material = document.getElementById('material_val').value;
            if(href.indexOf('man') + 1) {
                obj['gender'] = 'man';
            }
    
            if(href.indexOf('woman') + 1) {
                obj['gender'] = 'woman';
            }
    
            if(href.indexOf('shoes') + 1) {
                obj['articl'] = 'shoes'; 
            }
    
            if(href.indexOf('cloth') + 1) {
                obj['articl'] = 'cloth'; 
            }
    
            let sp = href.split("/");
            let categories_item = sp.splice(3, 3);
            if(categories_item.length == 3){
                let type = categories_item[2].split("?"); 
                if(type.length >= 2){
                    obj['type'] = type[0];
                }else{
                    obj['type'] = categories_item[2];
                }
            }
    
            
            if(url != 1){
                url = 1;
            }   
    
            if(color != 1){
                obj['color'] = color;
                if(url == 1){
                    url = `?color=${color}`;
                }else{
                    url += `&color=${color}`;
                }
            }
    
            if(price != 1){
                let price_from = document.getElementById("price_from").value;
                let price_to = document.getElementById("price_to").value;
                let total_price = `${price_from},${price_to}`;
                obj['price'] = total_price;
                
                if(url == 1){
                    url = `?price=${total_price}`;
                }else{
                    url += `&price=${total_price}`;
                }
            }
    
            if(brand != 1){
                obj['brand'] = brand;
                if(url == 1){
                    url = `?brand=${brand}`;
                }else{
                    url += `&brand=${brand}`;
                }
            }
    
            if(material != 1){
                obj['material'] = material;
                if(url == 1){
                    url = `?material=${material}`;
                }else{
                    url += `&material=${material}`;
                }
            }
    
            if(url == true){
                let sp = href.split("/");
                if(categories_item.length == 3){
                    let categories2_item = categories_item[2];
                    let sp_res = categories2_item.split("?");
                    url = sp_res[0];
                    obj['type'] = sp_res[0];
                }else{
                    let categories2_item = sp.splice(3, 2);
                    let last_arr = categories2_item[categories2_item.length - 1];
                    let sp_res = last_arr.split("?");
                    url = sp_res[0];
                }
                
            }
            arr_obj = obj;
            history.pushState(obj, `Selected: ${id}`, `${url}`);
            memory();
            html(obj);
        });
});


window.addEventListener('popstate', e => {
    if(e.state != null){
        html(e.state);
        memory();
    }else{
        let obj = {};
        let href = window.location.href;
        let sp = href.split("/");
        let categories_item = sp.splice(3, 3);
        if(href.indexOf('man') + 1) {
            obj['gender'] = 'man';
        }

        if(href.indexOf('woman') + 1) {
            obj['gender'] = 'woman';
        }

        if(href.indexOf('shoes') + 1) {
            obj['articl'] = 'shoes'; 
        }

        if(href.indexOf('cloth') + 1) {
            obj['articl'] = 'cloth'; 
        }
        if(categories_item.length == 3){
            obj['type'] = categories_item[2];
        }
        memory();
        html(obj);
    }
});

//gathering info

var arr;
var inp;

document.getElementById('filter').onclick = function(e) {
    let target = e.target;
    arr = Array.from(document.getElementsByClassName(`checkbox_input_${target.value}`));
    inp = target.value;
}

$(document).ready(function(){
    $(`.checkbox_input`).click(function(){
        let val = 1;
        arr.forEach(e => {
            if(e.checked == true){
                if(val == 1){
                    val = String(e.value);
                }else{
                    val += `,${e.value}`;
                }
            }
        });
        $(`#${inp}_val`).val(val);
    });
});





function memory() {

    let href = window.location.href;
    let chek_fil = "1 ";
    if(href.indexOf('price') >= 1){
        if(chek_fil == "1 "){
            chek_fil = 'price_text';
        }else{
            chek_fil += ',price_text';
        }
    }

    if(href.indexOf('color') >= 1){
        if(chek_fil == "1 "){
            chek_fil = 'color_text';
        }else{
            chek_fil += ',color_text';
        }
    }

    if(href.indexOf('brand') >= 1){
        if(chek_fil == "1 "){
            chek_fil = 'brand_text';
        }else{
            chek_fil += ',brand_text';
        }
    }

    if(href.indexOf('material') >= 1){
        if(chek_fil == "1 "){
            chek_fil = 'material_text';
        }else{
            chek_fil += ',material_text';
        }
    }
    let sp = chek_fil.split(',');
    let check_text = document.getElementsByClassName('check_text');
    for (i = 0; i < check_text.length; i++) {
        let close = document.createElement('div');
        let text = document.createTextNode('oczyść');
        close.appendChild(text);
        close.classList = 'child';
        if(chek_fil.indexOf(check_text[i].id) > -1){
            if(check_text[i].childNodes.length <= 0){
                check_text[i].appendChild(close);
                close.setAttribute('onclick', `cleaning('${check_text[i].id}')`);
            }
        }else{
            var element = check_text[i];
            while (element.firstChild) {
                element.removeChild(element.firstChild);
            }
        }
    }
}

memory();

function cleaning(e){
    let clear_text = e.split('_');
    $(document).ready(function (){
        $(`#${clear_text[0]}_val`).val('1');
    });

            let href = window.location.href;
            let obj = {},url = 1;
            let price = document.getElementById('price_val').value;
            let color = document.getElementById('color_val').value;
            let brand = document.getElementById('brand_val').value;
            let material = document.getElementById('material_val').value;

            
            if(href.indexOf('price') + 1){
                if(price == 1){
                    price = json_GET.price;
                }
            }

            if(href.indexOf('color') + 1){
                if(color == 1){
                    color = json_GET.color;
                }
            }

            if(href.indexOf('brand') + 1){
                if(brand == 1){
                    brand = json_GET.brand;
                }
                
            }

            if(href.indexOf('material') + 1){
                if(material == 1){
                    material = json_GET.material;
                }
            }

            if(clear_text[0] == 'color'){
                    color = 1;
                    $(`.checkbox_input_color`).prop('checked', false);
            }

            if(clear_text[0] == 'price'){
                price = 1;
                let price_to = document.getElementById("price_to");
                let price_from = document.getElementById("price_from");
                let input_left = document.getElementById("input-left");
                let input_right = document.getElementById("input-right");
                input_right.value = 1000;
                input_left.value = 0;
                price_to.value = 1000;
                price_from.value = 0;
                $(".left").css('left', '0%');
                $(".right").css('right', '0%');
                $(".range").css('right', '0%');
                $(".range").css('left', '0%');
            }

            if(clear_text[0] == 'brand'){
                brand = 1;
                checkbox_label_brand.forEach(e => {
                    e.style.display = '';
                });
                $(`#data_from_brands`).prop('value', '');
                $(`.checkbox_input_brand`).prop('checked', false);
                $(`.checkbox_input_brand`).css('display', 'block');
            }

            if(clear_text[0] == 'material'){
                material = 1;
                $(`.checkbox_input_material`).prop('checked', false);
            }

            if(href.indexOf('man') + 1) {
                obj['gender'] = 'man';
            }
    
            if(href.indexOf('woman') + 1) {
                obj['gender'] = 'woman';
            }
    
            if(href.indexOf('shoes') + 1) {
                obj['articl'] = 'shoes'; 
            }
    
            if(href.indexOf('cloth') + 1) {
                obj['articl'] = 'cloth'; 
            }
    
            let sp = href.split("/");
            let categories_item = sp.splice(3, 3);
            if(categories_item.length == 3){
                let type = categories_item[2].split("?"); 
                if(type.length >= 2){
                    obj['type'] = type[0];
                }else{
                    obj['type'] = categories_item[2];
                }
            }
    
            
            if(url != 1){
                url = 1;
            }   
    
            if(color != 1){
                obj['color'] = color;
                if(url == 1){
                    url = `?color=${color}`;
                }else{
                    url += `&color=${color}`;
                }
            }
    
            if(price != 1){
                let price_from = document.getElementById("price_from").value;
                let price_to = document.getElementById("price_to").value;
                let total_price = `${price_from},${price_to}`;
                obj['price'] = total_price;
                
                if(url == 1){
                    url = `?price=${total_price}`;
                }else{
                    url += `&price=${total_price}`;
                }
            }
    
            if(brand != 1){
                obj['brand'] = brand;
                if(url == 1){
                    url = `?brand=${brand}`;
                }else{
                    url += `&brand=${brand}`;
                }
            }
    
            if(material != 1){
                obj['material'] = material;
                if(url == 1){
                    url = `?material=${material}`;
                }else{
                    url += `&material=${material}`;
                }
            }

            
            if(url == true){
                let sp = href.split("/");
                if(categories_item.length == 3){
                    let categories2_item = categories_item[2];
                    let sp_res = categories2_item.split("?");
                    url = sp_res[0];
                    obj['type'] = sp_res[0];
                }else{
                    let categories2_item = sp.splice(3, 2);
                    let last_arr = categories2_item[categories2_item.length - 1];
                    let sp_res = last_arr.split("?");
                    url = sp_res[0];
                }
                
            }
            arr_obj = obj;
            history.pushState(obj, `Selected: lol`, `${url}`);
            memory();
        html(obj);
}

//SHOW - HIDE Filter Block
var tab;
var tabContent;
window.onload = function(){
    tab = document.getElementsByClassName("tab");
    tabContent = document.getElementsByClassName("tabContent");
}

window.onclick = function(event){
  let target = event.target;
  let filter = document.getElementById("filter");
  let form = document.getElementById("form");
  if(target.className.includes("tab") || target.className.includes("tabContent")){

  }else{
    if(filter.contains(target) || form.contains(target)){
      if(target.className.includes("content_filter_elemnts")){
        hideTabsContent(0);
      }
    }else{
      hideTabsContent(0);
    }
  }
}


$('#filter').click(function (event){
  
  let target = event.target;
  if(target.className.includes("tab")){
      for(i = 0; i < tab.length; i++){
          if(target == tab[i]){
              showContent(i);
              break;
          }
          
      }
  }
  if(target.id == "size_btn"){
    $('.inp_price').attr('name','price[]');
  }else if($('#price_from').val() == 0 && $('#price_to').val() == 1000){
    $('.inp_price').removeAttr('name');
  }
  let width = document.documentElement.clientWidth;
  //Show filter_responsive
  if(width <= 1150){
    $('#filter_buttons').css('display', 'flex');
    $('#close_filter').css('display', 'flex');
  }

});
//hide filter_responsive
$('#close_filter').click(function(){
    $('#filter_buttons').css('display', 'none');
    $('#close_filter').css('display', 'none');
});

function showContent(b){
  let classes = String(tabContent[b].classList);
  if(classes.includes("hide")){
        hideTabsContent(0);
        tabContent[b].classList.remove("hide_filter");
        tabContent[b].classList.add("show_filter");
        tab[b].classList.add("show_checked");
    }
}

function hideTabsContent(a){
  for(i = a; i < tabContent.length; i++){
      tabContent[i].classList.add("hide_filter");
      tabContent[i].classList.remove("show_filter");
      tab[i].classList.remove("show_checked");
  }
}

$(".f_close").click(function(){
  hideTabsContent(0);
});





