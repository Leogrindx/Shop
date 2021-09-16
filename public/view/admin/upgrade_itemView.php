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

      <div class="container_colum">
        <div class="search_item">
          <h2>Wpisz EAN żeby znalieszć artykuł</h2>
            <label for="EAN" class="lb">EAN</label>
            <input class="Admin_inpText" id="EAN" placeholder="EAN" required />
            <button id="submit" class="btn_filter">Szukaj</button>
        </div>
        <div id="results_ug_ad">
        
        </div>
    </div>
    <script src="../../public/js/jquery-3.4.1.min.js"></script>
    <script src="../../public/js/admin.js"></script>
    <script src="../../public/js/upgrade_item_admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  </body>

  </html>