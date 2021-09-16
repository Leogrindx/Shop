<?php $type = $param['articl'];
if($type == 'c'){
  $table = 'cloth';
}elseif($type == 's'){
  $table = 'shoes';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Shop Master</title>
  <link rel="icon" href="../../public/img/icon.png" type="image/gif">
  <link rel="stylesheet" href="../../public/css/main.css" />
  <link rel="stylesheet" href="../../public/css/media.css" />
  <link rel="stylesheet" href="../../public/css/sweetalert.css" />
</head>

<body>
  <?php require_once 'public/blocks/header.php' ?>
  <?php require_once 'public/blocks/items_panel.php' ?>

<!------------------------------FILTER--------------------------------------------------------------------------------------------------------------->
<div class="filter_items">
  <div class="close_filter" id="close_filter">
    <div class="partition_filter right_p"></div>
    <div class="partition_filter left_p"></div>
  </div>
  <div class="filtr_menu" id="filter" >
    <h1>Filtr</h1>
    <div class="filter_buttons" id="filter_buttons">
      <h1 class="h1_f">Filter</h1>
      <div class="filter_box"><button type="button" id="size_btn" class="btn_filter mr tab" value="price">Cena</button>
        <div class="check_text" id="price_text"></div>
      </div>
      <div class="filter_box"><button type="button" id="color_btn" class="btn_filter mr tab" value="color">Kolor</button>
        <div class="check_text" id="color_text"></div>
      </div>
      <div class="filter_box"><button type="button" id="brand_fil_btn" class="btn_filter mr tab" value="brand">Marka</button>
        <div class="check_text" id="brand_text"></div>
      </div>
      <div class="filter_box"><button type="button" id="material_fil_btn" class="btn_filter mr tab" value="material">Materiał</button>
        <div class="check_text" id="material_text"></div>
      </div>
    </div>
  </div>
  <form action="<?php $_SERVER['REQUEST_URI']?>" class="filter" id="form">
    <div>
      <div class="content_filter_elemnts">
        <div class="price_filter tabContent hide_filter" id="size">
          <input type="text" id="price" value="1000">
          <div class="flex_price_filter">
              <div class="flex_price_filter">
                  <div><input type="text" class="inp_price"   id="price_from" value="0" size="3"></div>
                  <p>zł</p>
              </div>
              <div class="partition_price"></div>
              <div class="flex_price_filter">
                  <div><input type="text" class="inp_price"  id="price_to" value="1000" size="3"></div>
                  <p>zł</p>
              </div>
          </div>

          <div class="middle">
              <div class="multi-range-slider">
                  <input type="range" id="input-left" min="0" max="100" value="0">
                  <input type="range" id="input-right" min="0" max="100" value="1000">

                  <div class="slider_filter">
                      <div class="track"></div>
                      <div class="range"></div>
                      <div class="thumb left"></div>
                      <div class="thumb right"></div>
                  </div>
              </div>
          </div>
          <div>
            <button type="button" class="btn_filter posr f_left f_close price_check" id="clear_price">Zamknij</button>
            <button type="button" class="btn_filter posr f_right submit price_check" id="price_val" name="price" value="1">Wybież</button>
          </div>
        </div>
      </div>
      
      <div class="content_filter_elemnts">
        <div class="drawer_filter tabContent hide_filter" id="colors">
          <div class="scroll">
            <?php foreach ($param['filter_colors_val'] as $key => $value):?>  
            <input id="<?php echo $value?>" class="checkbox_input checkbox_input_color"  type="checkbox" name="color" value="<?php echo $value?>">
            <label class="checkbox_label checkbox_label_color" for="<?php echo $value?>">
              <div class="color">           
                <div class="box <?php echo $value?>">
                </div>
                <p><?php echo $param['filter_colors_text'][$key]?></p>
              </div>
            </label>
            <?php endforeach;?>
            <input id="colorful" class="checkbox_input checkbox_input_color"  type="checkbox" name="color" value="colorful">
            <label class="checkbox_label checkbox_label_color" for="colorful">
              <div class="color">           
                  <div class="colorfb">
                    <div class="colorf y"></div>
                    <div class="colorf g"></div>
                    <div class="colorf p"></div>
                    <div class="colorf b"></div>
                  </div>
                <p>kolorowy</p>
              </div>
            </label>
          </div>
          <div class="filter_butto">
            <button type="button" class="btn_filter posr f_left f_close">Zamknij</button>
            <button type="button" class="btn_filter posr f_right submit" name="color" value="1" id="color_val">Wybież</button>
          </div>
        </div>
      </div>

      <div class="content_filter_elemnts">
        <div class="drawer_filter tabContent hide_filter" id="brand">
          <div class="search_in_brand">
            <input type="text" class="input_text" id="data_from_brands" onkeyup="filter_in_brands()" placeholder="Szukaj marke">
          </div>
          <div class="scroll">
            <?php foreach ($param['filter_brands'] as $key => $value):?>  
            <input id="<?php echo trim($value)?>" class="checkbox_input checkbox_input_brand" type="checkbox" name="brand[]" value="<?php echo trim($value)?>">
            <label class="checkbox_label checkbox_label_brand" for="<?php echo trim($value)?>" value="<?php echo trim($value)?>">
              <div class="color">
                <p><?php echo $value?></p>
              </div>
            </label>
            <?php endforeach;?>
          </div>
          <div class="filter_butto">
            <button type="button" class="btn_filter posr f_left f_close">Zamknij</button>
            <button type="submit" class="btn_filter posr f_right submit" name="brand" value="1" id="brand_val">Wybież</button>
          </div>
        </div>
      </div>

      <div class="content_filter_elemnts">
        <div class="drawer_filter tabContent hide_filter" id="material">
          <div class="scroll">
            <?php foreach ($param['filter_material_val'] as $key => $value):?>  
            <input id="<?php echo $value?>" class="checkbox_input checkbox_input_material" type="checkbox" name="material[]" value="<?php echo $value?>">
            <label class="checkbox_label checkbox_label_material" for="<?php echo $value?>" value="<?php echo $value?>">
              <div class="color">
                <p><?php echo $param['filter_material_text'][$key]?></p>
              </div>
            </label>
            <?php endforeach;?>
          </div>
          <div class="filter_butto">
            <button type="button" class="btn_filter posr f_left f_close">Zamknij</button>
            <button type="submit" class="btn_filter posr f_right submit" name="material" value="1" id="material_val">Wybież</button>
          </div>
        </div>
      </div>

    </div>
  </form>
</div>
  <!----------------------------Content----------------------------------------------------------------------------------------------------------------->
  <div class="container" id="content_fil">        
  <!---------------------------------------------------Items----------------------------------------------------------------->
    <div class="view_items" id="view_items">

      <?php foreach ($param['items'] as $key => $value) : ?>
        <div class="view_item">
          <label class="label" for="<?php echo '1' . $value['EAN'] ?>">
            <div>
              <button id="<?php echo '1' . $value['EAN'] ?>" type="submit" value="<?php echo $param['articl'] . ',' . $value['EAN'] . ',' . $value['price'] . ',' . 1 ?>" name="<?php echo $value['size']?>" class="cart basket_item"><img src="../../public/img/basket.png" alt="" /></button>
            </div>
          </label>

          <form action="/item_details" method="GET">
            <div class="item">
              <input class="d_none" id="<?php echo $value['EAN'] ?>" type="submit" name="<?php echo $param['articl'] ?>" value="<?php echo $value['EAN']  ?>" />
              <label class for="<?php echo $value['EAN'] ?>">
                <div class="pointer">
                  <div class="img">
                    <div class="articl_items">
                      <img src="../../<?php $img = explode(',', $value['img']);
                                      echo $img[0] ?>" width="280" height="360" />
                      <div class="btn_item">przejdź</div>
                    </div>
                    <div class="add_item_in_basket"></div>

                  </div>
                  <div class="item_text">
                    <div>
                      <div class="brand">
                        <p><?php echo $value['brand'] ?></p>
                      </div>
                      <div class="name_item">
                        <p><?php echo $value['name'] ?></p>
                      </div>
                    </div>
                    <div class="item_price">
                      <p><?php echo $value['price'] ?></p>
                      <p>zl</p>
                    </div>
                  </div>
                  <div class="item_size">
                    <?php
                    $sizes = explode(',', $value['size']);
                    foreach ($sizes as $key => $size) :
                    ?>
                      <p><?php echo $size ?></p>
                    <?php endforeach; ?>
                  </div>
                </div>
              </label>
            </div>
          </form>
        </div>

      <?php endforeach; ?>
    </div>
  </div>
  <div class="switch" id="switch">
    <div class="next-prev"></div>
    <div>
      <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="GET">
        <button class="btn_switch" id="btn_page" type="submit" name="p" value="
        <?php
        if (!empty($param['page'])) {
          $minus_page = $param['page'];
          --$minus_page;
          echo $minus_page;
        } else {
          echo 1;
        }
        ?>">〈</button>
      </form>
    </div>
    <p>strona</p>
    <p id="page">
      <?php if (!empty($param['page'])) echo $param['page'];
      else echo 1; ?>
    </p>
    <p>z</p>
    <p id="number">
      <?php if (!empty($param['pages'])) echo $param['pages'];
      else echo 1; ?>
    </p>
    <div>
      <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="GET">
        <button class="btn_switch" id="btn_number" type="submit" name="p" value="
        <?php
        if (!empty($param['page'])) {
          $plus_page = $param['page'];
          ++$plus_page;
          echo $plus_page;
        } else {
          echo 2;
        }
        ?>
        ">〉</button>
      </form>
    </div>
  </div>
  </div>
    <div id="size_add">
     
    </div>
  <?php require_once 'public/blocks/footer.php' ?>
  <script>
  var get = '<?php echo json_encode($_GET)?>';
  </script>
  <script src="../../public/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="../../public/js/filter.js"></script>
  <script src="../../public/js/cart.js"></script>
  <script src="../../public/js/price_range.js"></script>
</body>

</html>