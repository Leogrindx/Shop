function slider(n){
    let image_itemDetails = document.getElementById('image_itemDetails');
    image_itemDetails.src = image[n];
  }
  
  document.getElementById('image').onmousemove = function(e){
    let x = e.screenX - 800;
    let y = e.clientY - 400;
    let image_itemDetails = document.getElementById('image_itemDetails');
    image_itemDetails.setAttribute("style", `transform: scale(3, 3) translate(${-x}px, ${-y}px);`);
  }
  
  document.getElementById('image').onmouseout = function(e){
    let image_itemDetails = document.getElementById('image_itemDetails');
    image_itemDetails.setAttribute("style", `transform: scale(1, 1) translate(0px, 0%);`);
  }