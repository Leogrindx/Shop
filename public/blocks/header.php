<header class="container header_user">
  <div class="logo">
    <a href="/"><img src="../../public/img/logo.png" width="200" /></a>
  </div>
  <div class="menu">
    <div class="sex">
      <div class="block_partition">
        <a href="/man_home">mężczyźni</a>
          <?php if (isset($_SESSION['gender'])) : ?>
            <?php if ($_SESSION['gender'] == 'man') : ?>
              <div class="partition_show"></div>
            <?php endif; ?>
          <?php endif; ?>

      </div>
      <div class="block_partition">
        <a href="/woman_home">kobiety</a>
          <?php if (isset($_SESSION['gender'])) : ?>
            <?php if ($_SESSION['gender'] == 'woman') : ?>
              <div class="partition_show"></div>
            <?php endif; ?>
          <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="search_block">
    <div id="control_panel_search">
      <input type="text" class="searhc_inpText" id="search">
      <button class="button bottom_search" id="send"><img src="../../public/img/search.png" width="20"></button>
    </div>
    <div class="search_panel" id="search_close">
      <div class="items_from_search" id="items_search">
        <h1>Szukaj towar</h1>
      </div>
      <div class="close_search">
        <button class="button" id="close">Zamknij</button>
      </div>
    </div>
  </div>

  <div class="block_user">
    <?php if (!empty($_SESSION['login'])) : ?>
      <div class="login">
        <img src="../../public/img/login.png" class="img_login" />
        <div class="buttons">
          <br>
          <h3>Witamy <?php echo ucfirst($_SESSION['login']['first_name']) . '  ' . ucfirst($_SESSION['login']['last_name']) ?></h3>
          <br>
          <div>
            <div class="partition_user"></div>
            <a href="/account/edit_password">
              <p class="black">zmien hasło</p>
            </a>
            <div class="partition_user"></div>
          </div>
          <br>
          <a href="/account/out"><button>wyjście</button></a>
        </div>
      </div>
    <?php else : ?>
      <div class="login">
        <img src="../../public/img/login.png" class="img_login" />
        <div class="buttons">
          <a href="/account/login"><button class="sign_in">zaloguj się</button></a>
          <div class="block_partition_login">
            <div class="partition_login"></div>
            <h5>albo</h5>
            <div class="partition_login"></div>
          </div>
          <a href="/account/register"><button>Zarejestruj się</button></a>
        </div>
      </div>
    <?php endif; ?>

    <div class="basket">
      <a href="/cart">
        <?php if (isset($_SESSION['login'])) : ?>
          <div class="number_item_cart" id="number_item_cart">
            <p><?php echo $_SESSION['login']['number_item_cart'] ?></p>
          </div>
          <img class="basket_img_login" src="../../public/img/basket.png" />
        <?php else : ?>
          <img class="basket_img" src="../../public/img/basket.png" />
        <?php endif; ?>
      </a>
    </div>
  </div>

  <script src="../../public/js/jquery-3.4.1.min.js"></script>
    <script src="../../public/js/search_ajax.js"></script>
</header>