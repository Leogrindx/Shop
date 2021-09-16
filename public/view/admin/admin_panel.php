<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Shop master</title>
  <link rel="icon" href="../../public/img/icon.png" type="image/gif" />
  <link rel="stylesheet" href="../../public/css/fonts.css" />
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
        <a href="/admin_panel/delete_item">
          <p><span>X</span> delete item</p>
        </a>
      </div>
    </div>
    <div class="admin_preview">
      <h1>WELCOME TO ADMIN PANEL</h1>
    </div>
  </div>
  <script src="../../public/js/jquery-3.4.1.min.js"></script>
  <script src="../../public/admin.js"></script>
</body>

</html>