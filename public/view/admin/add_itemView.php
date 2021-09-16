<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="ISO-8859-2" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>ADMIN</title>
  <link rel="icon" href="../../public/img/icon.png" type="image/gif" />
  <link rel="stylesheet" href="../../public/css/fonts.css" />
  <link href="https://fonts.googleapis.com/css?family=Lemonada&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../public/css/main.css" />
  <link rel="stylesheet" href="../../public/css/media.css" />

</head>

<body>
  <?php require_once 'public/blocks/admin/header.php' ?>
  <div class="container_admin">
    <div class="instruments_panel">
      <div class="instrument">
        <a href="/admin_panel/add_item">
          <p><span>+</span> add item</p>
        </a>
      </div>
      <div class="instrument">
        <a href="/admin_panel/upgrade_item">
          <p><span>⟳</span> upgrade item</p>
        </a>
      </div>
      <div class="instrument">
        <a href="/admin_panel/upgrade_item">
          <p><span>X</span> delete item</p>
        </a>
      </div>
    </div>

    <div class="content_instrument">
      <div class="form_add">
        <h1>Dodaj nowy towar</h1>
        <form action="/ajax_add_item" id="form" method="POST" enctype="multipart/form-data">
          <label class="label" for="name">Imię</label>
          <input class="Admin_inpText" type="text" name="name" id="name" placeholder="Imię" required />
          <label class="label" for="EAN">EAN</label>
          <input class="Admin_inpText" type="text" name="EAN" id="EAN" placeholder="EAN" required />
          <label class="label" for="price">Cena</label>
          <input class="Admin_inpText" type="text" name="price" placeholder="Cena" required></input>
          
          <div class='admin_detail'>
            <h3>Szczegóły</h3>
            <label class="label" for="name">Rodzaj Szczegóły</label>
            <input class="Admin_inpText" type="text" id="details_type">
            <label class="label" for="name">Szczegóły</label>
            <input class="Admin_inpText" type="text" id="details">
            <div class="button btn_adm" id="details_btn">dodaj</div>
            <div class="accept_details">
            </div>
          </div>
          

          <h3>Płec</h3>

          <select class="select" name="gender">
            <option class="option" value="man">mężczyzną</option>
            <option class="option" value="woman">kobieta</option>
          </select>
          
          <input class="hide_filter" type="checkbox" name="type" value="<?php echo $param['table']?>" checked>

          <h3>Marka</h3>

          <div class="admin_add_item_scroll" id="brand">
              <div class="search_in_brand">
                <input type="text" class="input_text" id="data_from_brands" onkeyup="filter_in_brands()" placeholder="Szukaj marke">
              </div>
              <div class="scroll">
                <?php foreach ($param['brand'] as $key => $value):?>  
                <input id="<?php echo $value?>" class="checkbox_input checkbox_input_brand" type="radio" name="brand" value="<?php echo $value?>">
                <label class="checkbox_label checkbox_label_brand" for="<?php echo $value?>" value="<?php echo $value?>">
                  <div class="color">
                    <p><?php echo $value?></p>
                  </div>
                </label>
                <?php endforeach;?>
              </div>
          </div>

          <h3>Rozmiar</h3>
          <select class="select" name="size[]" id="Rozmiar" multiple required>
            <?php foreach ($param['size'] as $key => $value) : ?>
              <option class="option" value="<?php echo $value ?>"><?php echo $value ?></option>
            <?php endforeach; ?>
          </select>

          <h3>Materiał</h3>

          <div class="admin_add_item_scroll" id="material">
            <div class="scroll">
              <?php foreach ($param['material']['material_val'] as $key => $value):?>  
              <input id="<?php echo $value?>" class="checkbox_input checkbox_input_material" type="radio" name="material" value="<?php echo $value?>">
              <label class="checkbox_label checkbox_label_material" for="<?php echo $value?>" value="<?php echo $value?>">
                <div class="color">
                  <p><?php echo $param['material']['material_text'][$key]?></p>
                </div>
              </label>
              <?php endforeach;?>
            </div>
          </div>
          
          <h3>Kolor</h3>

          <div class="admin_add_item_scroll" id="colors">
            <div class="scroll">
              <?php foreach ($param['color']['color_val'] as $key => $value):?>  
              <input id="<?php echo $value?>" class="checkbox_input checkbox_input_color"  type="radio" name="color" value="<?php echo $value?>">
              <label class="checkbox_label checkbox_label_color" for="<?php echo $value?>">
                <div class="color">           
                  <div class="box <?php echo $value?>">
                  </div>
                  <p><?php echo $param['color']['color_text'][$key]?></p>
                </div>
              </label>
              <?php endforeach;?>
              <input id="colorful" class="checkbox_input checkbox_input_color"  type="radio" name="color" value="colorful">
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
          </div>
            <h3>Rodzaj</h3>
          <div>
            <select class="select" name="under_type" id="type">
              <?php foreach ($param['type']['type_text'] as $key => $value) : ?>

                <option class="option" value="<?php echo $param['type']['type_value'][$key] ?>"><?php echo $value?></option>

              <?php endforeach; ?>
            </select>
          </div>

          <h3>Zdjęcia</h3>
          <input class="file" type="file" name="img[]" id="img" multiple required />
          <button id="btn" type="submit" name="doGO_AddItem" value="true">Dodaj</button>
        </form>
      </div>
    </div>
  </div>
  <script src="../../public/js/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="../../public/js/admin.js"></script>
  <script src="../../public/js/form.js"></script>
</body>

</html>