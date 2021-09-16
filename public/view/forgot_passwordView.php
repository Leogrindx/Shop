<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" href="../../public/img/icon.png" type="image/gif">
    <link rel="stylesheet" href="../../public/css/main.css" />
  <link rel="stylesheet" href="../../public/css/media.css" />

    <title>Forgit Password</title>
  </head>
  <body>
    <div class="register">
      <div class="logo">
        <a href="/"
          ><img src="../../public/img/logo.png" alt="logo" width="250"
        /></a>
      </div>
      <form action="/account/forgot_password_edit" method="POST">
        <h3>WPISZ SWÓJEGO E-MAILA</h3>
        <br />
        <input type="email" name="email" placeholder="E-Mail" required/>
        <br />
        <button type="submit">ZMIEŃ HASŁO</button>
      </form>
    </div>
    <script src="../../public/js/jquery-3.4.1.min.js"></script>
    <script src="../../public/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="../../public/js/form.js"></script>
  </body>
</html>
