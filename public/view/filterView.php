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

<!------------------------------FILTER--------------------------------------------------------------------------------------------------------------->
<div class="filter_items">
  <div class="filtr_menu" id="filter" >
    <h1>Filtr</h1>
    <div class="filter_buttons">
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
            <button type="button" class="btn_filter posr f_left f_close">Zamknij</button>
            <button type="button" class="btn_filter posr f_right submit" id="price_val" name="price" value="1">Wybież</button>
          </div>
        </div>
      </div>
      
      <div class="content_filter_elemnts">
        <div class="colors tabContent hide_filter" id="colors">
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
          <div class="filter_buttons">
            <button type="button" class="btn_filter posr f_left f_close">Zamknij</button>
            <button type="button" class="btn_filter posr f_right submit" name="color" value="1" id="color_val">Wybież</button>
          </div>
          
        </div>
      </div>

      <div class="content_filter_elemnts">
        <div class="brand_fil tabContent hide_filter" id="brand">
          <div class="search_in_brand">
            <input type="text" class="input_text" id="data_from_brands" onkeyup="filter_in_brands()" placeholder="Szukaj marke">
          </div>
          <div class="scroll">
            <?php foreach ($param['filter_brands'] as $key => $value):?>  
            <input id="<?php echo $value?>" class="checkbox_input checkbox_input_brand" type="checkbox" name="brand[]" value="<?php echo $value?>">
            <label class="checkbox_label checkbox_label_brand" for="<?php echo $value?>" value="<?php echo $value?>">
              <div class="color">
                <p><?php echo $value?></p>
              </div>
            </label>
            <?php endforeach;?>
          </div>
          <div class="filter_buttons">
            <button type="button" class="btn_filter posr f_left f_close">Zamknij</button>
            <button type="submit" class="btn_filter posr f_right submit" name="brand" value="1" id="brand_val">Wybież</button>
          </div>
        </div>
      </div>

      <div class="content_filter_elemnts">
        <div class="material tabContent hide_filter" id="material">
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
          <div class="filter_buttons">
            <button type="button" class="btn_filter posr f_left f_close">Zamknij</button>
            <button type="submit" class="btn_filter posr f_right submit" name="material" value="1" id="material_val">Wybież</button>
          </div>
        </div>
      </div>

    </div>
  </form>
</div>     

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

  <?php require_once 'public/blocks/footer.php' ?>
  <script src="../../public/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="../../public/js/filter.js"></script>
  <script src="../../public/js/cart.js"></script>
  <script src="../../public/js/price_range.js"></script>
</body>

</html>