var inputLeft = document.getElementById("input-left");
var inputRight = document.getElementById("input-right");

var thumbLeft = document.querySelector(".slider_filter > .thumb.left");
var thumbRight = document.querySelector(".slider_filter > .thumb.right");
var range = document.querySelector(".slider_filter > .range");
var price_val = document.getElementById('price_val');

var price_to_global, price_from_global;

function setLeftValue(){
    var _this = inputLeft,
        min = parseInt(_this.min),
        max = parseInt(_this.max);

    _this.value = Math.min(parseInt(_this.value), parseInt(inputRight.value) - 1);
    let percent = ((_this.value - min ) / (max - min)) * 100;
    thumbLeft.style.left = percent + "%";
    range.style.left = percent + "%";
    let price = document.getElementById("price");
    let price_from = document.getElementById("price_from");
    let price_percent_from = price.value / 100 * _this.value;
    price_val.value = price_percent_from;
    price_from.value = price_percent_from;
    price_from_global = price_percent_from;
}


function setRightValue(){
    var _this = inputRight,
        min = parseInt(_this.min),
        max = parseInt(_this.max);


    _this.value = Math.max(parseInt(_this.value), parseInt(inputLeft.value) - 1);
    let percent = ((_this.value - min ) / (max - min)) * 100;
    thumbRight.style.right = (100 - percent) + "%";
    range.style.right = (100 - percent) + "%";
    let price = document.getElementById("price");
    let price_to = document.getElementById("price_to");
    let price_percent_to = price.value / 100 * _this.value;
    if(price_from_global >= price_to_global){
        price_percent_to += 10;
    }
    price_val.value = price_percent_to;
    price_to.value = price_percent_to;
    price_to_global = price_percent_to;
}

inputLeft.addEventListener("input", setLeftValue);
inputRight.addEventListener("input", setRightValue);

inputRight.addEventListener("mouseover", function(){
    thumbRight.classList.add("hover");
});

inputRight.addEventListener("mouseout", function(){
    thumbRight.classList.remove("hover");
});

inputRight.addEventListener("mousedown", function(){
    thumbRight.classList.add("active");
});

inputRight.addEventListener("mouseup", function(){
    thumbRight.classList.remove("active");
});



inputLeft.addEventListener("mouseover", function(){
    thumbLeft.classList.add("hover");
});

inputLeft.addEventListener("mouseout", function(){
    thumbLeft.classList.remove("hover");
});


inputLeft.addEventListener("mousedown", function(){
    thumbLeft.classList.add("active");
});

inputLeft.addEventListener("mouseup", function(){
    thumbLeft.classList.remove("active");
});



