
    <div class="view_items">
      <?php foreach ($param['items'] as $key => $value) : ?>
        <div class="view_item">
          <label class="label" for="<?php echo '1' . $value['EAN'] ?>">
            <div>
              <button onclick="cart('<?php echo $param['articl'] . ',' . $value['EAN'] . ',' . $value['price'] . ',' . 1 . ';' .$value['size']?>')"  type="submit" value="<?php echo $param['articl'] . ',' . $value['EAN'] . ',' . $value['price'] . ',' . 1 ?>" name="<?php echo $value['size']?>" class="basket_item"><img src="../../public/img/basket.png" alt="" /></button>
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