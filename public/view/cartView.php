<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Shop Master</title>
  <link rel="icon" href="../../public/img/icon.png" type="image/gif">
  <link rel="stylesheet" href="../../public/css/main.css" />
  <link rel="stylesheet" href="../../public/css/sweetalert.css">
  <link rel="stylesheet" href="../../public/css/media.css" />

</head>

<body>
  
  <?php require_once 'public/blocks/header.php' ?>
  <?php
  if (!empty($_SESSION['gender'])) {
    if ($_SESSION['gender'] == "woman" || $_SESSION['gender'] == "man") {
      require_once 'public/blocks/items_panel.php';
    }
  }
  ?>
  <!----------------------------Content----------------------------------------------------------------------------------------------------------------->

  <div class="container center fl-wrap">
    <?php if ($param == false) : ?>
      <div class="container column empty_cart">
        <h1>Kosz Pusty</h1>
        <h3>Wybież coś</h3>
        <div class="row">
          <div class="man container_content">
            <a href="/man_home">
              <div class="img_preview">
                <img src="../../public/img/man_preview.jpg" width="100%" />

              </div>
            </a>
          </div>

          <div class="woman container_content">
            <a href="/woman_home">
              <div class="img_preview">
                <img class="woman" src="../../public/img/women_preview.jpg" width="100%" />
              </div>
            </a>
          </div>
        </div>
      </div>

    <?php else : ?>
      <div class="cart_items">
        <?php if ($param != false) foreach ($param['param'] as $key => $item) : ?>
          <form action="/item_details" method="GET">
        <input class=" d_none" id="<?php echo $item[1]?>" type="submit" name="<?php echo $param['table'][$key] ?>" value="<?php echo $item[1]  ?>" />
          </form>

          <div class=" cart_item flex" id="<?php echo 'c_' . $item[1] . '_' . $param['size'][$key-1]?>">
            <label class="cursor_pointer d_flex" for="<?php echo $item[1] ?>">
              <div class="block_cart1 flex">
                <div class="img_cart"><img src="<?php echo $item[12] ?>" alt="" width="50"></div>
                <div class="brand">
                  <p><?php echo $item[2] ?></p>
                </div>
                <div class="name_cart">
                  <p><?php echo $item[3] ?></p>
                </div>
              </div>
            </label>

            <div class="block_cart2 flex">
            <label class="cursor_pointer d_flex" for="<?php echo $item[1] ?>">
              <div class="size_item">
                <p><span class="span">roz:</span><?php echo $param['size'][$key-1]; ?></p>
              </div>
              <div class="price_cart">
                <p><?php echo $item[9] ?> zł</p>
              </div>
            </label>
              <div class="number_cart">
                <select name="<?php echo $item[1] . ',' . $item[9] . ',' . $param['size'][$key-1] ?>" class="select_cart">
                  <?php for ($i = 1; $i < 100; $i++) : ?>
                    <option <?php
                            if ($param['number'][$key - 1] == $i) {
                              echo 'selected';
                            }
                            ?> value="<?php echo $i ?>"><?php echo $i ?></option>
                  <?php endfor; ?>
                </select>
              </div>
              
              <div class="delete_cart">
                <button id="<?php echo $item[1] . '_d' . $param['size'][$key-1] ?>" class="d_none delete" name="delete" value="<?php echo $item[1] . ',' . $item[9] . ',' . $param['size'][$key-1] ?>"></button>
                <label for="<?php echo $item[1] . '_d' . $param['size'][$key-1] ?>"><img src="../../public/img/quit.png" alt="delete"></label>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="sale">
        <div class="discount">
          <div class="enabled" id="enabled">
            <p id="text">Masz kod promocyjny?</p>
            <img id="arrow" src="../../public/img/black-left-arrow.png" alt="">
          </div>
          <div class="disabled" id="disabled">
            <input type="text" name="discount" id="" placeholder="Wpisz" size="10">
            <button class="btn_cart">Aktywuj</button>
          </div>
        </div>
        <div class="total_price">
          <p>cena całkowita:</p>
          <h1 id="total_price">

            <?php if (isset($_SESSION['login']['total_price'])) {
              echo $_SESSION['login']['total_price'];
            } ?>

            zł</h1>
        </div>
        <div class="purchass flex"><button class="btn_cart big">kupuj i plac</button></div>
      </div>
    <?php endif; ?>
  </div>
  <?php require_once 'public/blocks/footer.php' ?>
  <script src="../../public/js/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="../../public/js/delete_cart.js"></script>
  <script src="../../public/js/show_hide_sale.js"></script>
  <script src="../../public/js/number_item.js"></script>
</body>

</html>