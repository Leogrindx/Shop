let control_panel_search = document.getElementById('control_panel_search');
let search_close = document.getElementById('search_close');
document.getElementById('search').onclick = function(){
    search_close.style.display = "block";
}

document.getElementById('close').onclick = function(){
    search_close.style.display = "none";
}


$(document).ready(function() {
    $("#send").click(function() {
        let search = $('#search').val();
        if(search != false){
            $.ajax({
                method: "POST",
                url: "/search_ajax",
                data: { dat: search },
                success: function(result) {
                    $('#items_search').html(result);
                }
            });
        }   
    });
});