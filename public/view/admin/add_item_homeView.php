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
      <div class="instruments_panel all_height">
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
        <div class="home">
          <h1>Wybież textilya czy buty</h1>
          <div class="container_home">

            <a href="/admin_panel/add_item/cloth">
              <div class="articl">
                <div class="img_home">
                  <img src="../../public/img/man/home/clothing_man.jpg" alt="Odziesz" width="100%" />
                  <button>przejdź</button>
                </div>

              </div>
            </a>

            <a href="/admin_panel/add_item/shoes">
              <div class="articl">
                <div class="img_home">
                  <img class="but" src="../../public/img/woman/home/shoes_woman.jpg" alt="Buty" width="100%" />
                  <button>przejdź</button>
                </div>

              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <script src="../../public/js/jquery-3.4.1.min.js"></script>
    <script src="../../public/js/admin.js"></script>
  </body>

  </html>