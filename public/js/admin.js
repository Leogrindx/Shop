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

//admin_panel_addItem_details
let delete_id = 0;
$('#details_btn').click((e) =>{
  let details = $('#details').val()
  let details_type = $('#details_type').val()
  let elemnts = $(`.${details_type}_${details}`)
  if(details && details_type){
    if(elemnts.length != 1){

      $('#details').val('')
      $('#details_type').val('')
      delete_id++;
      $('.accept_details').append(`<div class="acp_datail id_${delete_id}"><p>${details_type}: ${details}</p><div class="delete_adm" onclick="deleted_detail('${delete_id}')">╳</div><input class="d_none" type="checkbox" name="info[]" value="${details_type}/${details}" checked/></div>`)
    }else{
      Swal.fire(
        'Oops..',
        'Takie szczególy już jest!',
        'error'
      )
    }
  }else{
    Swal.fire(
      'Warnning!',
      'wpisz coś',
      'warning'
    )
  }
  
});

function deleted_detail(delete_id){
  $(`.id_${delete_id}`).remove()
}