<?php $_SESSION['gender'] = $param['gender']; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo ucfirst($param['gender']) ?></title>
  <link rel="icon" href="../../public/img/icon.png" type="image/gif">
  <link rel="stylesheet" href="../../public/css/main.css" />
  <link rel="stylesheet" href="../../public/css/media.css" />

</head>

<body>
  <?php require_once 'public/blocks/header.php' ?>
  <div class="container_home">
    <a href="<? echo $param['gender'] ?>/cloth">
      <div class="articl">
        <div class="img_home">
          <img src="../../public/img/<? echo $param['gender'] ?>/home/clothing_<? echo $param['gender'] ?>.jpg" alt="Buty" width="100%" />
          <button>przejdź</button>
        </div>
      </div>
    </a>

    <a href="<? echo $param['gender'] ?>/shoes">
      <div class="articl">
        <div class="img_home">
          <img class="<?php if ($param['gender'] == 'man') echo 'but_man';
                      else echo 'but' ?>" src="../../public/img/<? echo $param['gender'] ?>/home/shoes_<? echo $param['gender'] ?>.jpg" alt="Odziesz" width="100%" />
          <button>przejdź</button>
        </div>

      </div>
    </a>
  </div>
  <?php require_once 'public/blocks/footer.php' ?>
</body>

</html>