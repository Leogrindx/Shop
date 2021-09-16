<!DOCTYPE html>
<html lang="en">
<?php $type = $param['items']['type'];
if($type == 'cloth'){
  $table = 'c';
}elseif($type == 'shoes'){
  $table = 's';
}
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Details</title>
  <link rel="icon" href="../../public/img/icon.png" type="image/gif">
  <link rel="stylesheet" href="../../public/css/main.css" />
  <link rel="stylesheet" href="../../public/css/media.css" />
</head>

<body>
  <?php require_once 'public/blocks/header.php' ?>
  <?php require_once 'public/blocks/items_panel.php' ?>
  <div class="container centr_column item_details fl-wrap">
    <div class="top_details">
      <div class="image_block">
        <div class="slider">
        <?php foreach ($param['image'] as $key => $value):?>
          <img class="image_button_slider" src="<?php echo $value?>" onclick="slider(<?php echo $key?>)">
        <?php endforeach;?>
        </div> 
        <div class="image" id="image">
          <img id="image_itemDetails" src="../../<?php echo $param['image'][0] ?>" alt="">
        </div>
      </div>
      
      <div class="name_item_details">
        <h1><?php echo $param['items']['brand'] ?></h1>
        <br>
        <h3><?php echo $param['items']['name'] ?></h3>
        <br>
          <div class="selects">
            <div class="flex">
              <div class="size_details">
                <p>Rozmiar</p>
                <select class="size_select" name="size" id="size_select">
                  <?php $size = explode(',', $param['items']['size']);
                  foreach ($size as $key => $value) : ?>
                    <option class="up" value="<?php echo $value ?>"><?php echo $value ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              
            </div>
            <h1 class="price_details"><?php echo $param['items']['price'] ?> zl</h1>
          </div>
          <br>
          <div class="color_details flex">
            <p>color: <span><?php echo $param['items']['color'] ?></span> </p>
          </div>
          <div class="color_details flex">
            <p>material: <span><?php echo $param['items']['material']?></span></p>
          </div>
          <button id="<?php echo $param['items']['EAN'] ?>" type="submit" value="<?php echo $table . ',' . $param['items']['EAN'] . ',' . $param['items']['price'] . ',' . 1 ?>" name="<?php echo $param['items']['size']?>" class="cart ">dodaj do kosza</button>
          <div class="info_from_item">
            <h3>Szczegóły:</h3>
            <?php foreach ($param['info'] as $key => $v):?>
              <p><strong><?php echo $v[0]?></strong>: <?php echo $v[1]?></p>
            <?php endforeach;?>
          </div>
      </div>
    </div>
  </div>
  <?php require_once 'public/blocks/footer.php' ?>
  <script> 
  let image = <?php echo json_encode($param['image'])?>;
  </script>
  <script src="../../public/js/jquery-3.4.1.min.js"></script>
  <script src="../../public/js/main.js"></script>
  <script src="../../public/js/itemDetails.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="../../public/js/cart.js"></script>
</body>

</html>