<?php
$gender;
if (isset($param['items'][0]['gender'])) {
  $kategories = require_once 'application/config/kategories_items_' . $param['items'][0]['gender'] . '.php';
  $gender = $param['items'][0]['gender'];
} elseif (isset($param['gender'])) {
  $gender = $param['gender'];
  $kategories = require_once 'application/config/kategories_items_' . $param['gender'] . '.php';
} elseif (isset($_SESSION['gender'])) {
    $gender = $_SESSION['gender'];
    $kategories = require_once 'application/config/kategories_items_' . $_SESSION['gender'] . '.php';
}

?>
<div class="items">
  <div class="container_item">

    <!----------shoes----------->
    <div class="show">
      <h3>buty</h3>
      <div class="show_item">
        <h4>kategorie</h4>
        <?php
        $shoes = explode(',', $kategories['shoes']);
        $shoes_value = explode(',', $kategories['value_shoes']);
        foreach ($shoes as $key => $value_shoes) : ?>
          <div>
            <div class="block_partition_cloth">
              <a href="<?php $trim_shoes = '/' . trim($shoes_value[$key]);
                        $link_shoes = str_replace(" ", "_", $trim_shoes);
                        echo '/' . $gender . '/shoes' . $link_shoes ?>"> <?php $tr_shoes = trim($value_shoes);
                                                                          echo ucfirst($tr_shoes) ?></a>
              <div class="partition"></div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <!----------cloth----------->
    <div class="show">
      <h3>odzież</h3>
      <div class="show_item">
        <h4>kategorie</h4>
        <?php
        $cloth = explode(',', $kategories['cloth']);
        $cloth_value = explode(',', $kategories['value_cloth']);
        foreach ($cloth as $key => $value_cloth) : ?>
          <div>
            <div class="block_partition_cloth">
              <a href="<?php $trim_cloth = '/' . trim($cloth_value[$key]);
                        $link_cloth = str_replace(" ", "_", $trim_cloth);
                        echo '/' . $gender . '/cloth' . $link_cloth ?>"><?php $tr_cloth = trim($value_cloth);
                                                                        echo ucfirst($tr_cloth) ?></a>
              <div class="partition"></div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>