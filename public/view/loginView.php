<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="icon" href="../../public/img/icon.png" type="image/gif" />
  <link rel="stylesheet" href="../../public/css/main.css" />
  <link rel="stylesheet" href="../../public/css/media.css" />
  <title>login</title>
</head>

<body>
  <div class="register">
    <div class="logo">
      <a href="/"><img src="../../public/img/logo.png" alt="logo" width="250" /></a>
    </div>
    <form action="/account/login_ajax" method="POST">
      <h1>Zaloguj się</h1>
      <br />
      <label for="email_login">
        <p>E-mail</p>
      </label>
      <input id="email_login" type="email" name="email" placeholder="Aders e-mail" required />
      <br />
      <label for="password_login">
        <p>Hasło</p>
      </label>
      <input id="password_login" type="password" name="password" placeholder="Hasło" required />
      <button type="submit" name="doGO_login">Zaloguj się</button>
    </form>
    <p><a class='black' href="/account/forgot_password">Zapomniałeś hasła?</a></p>
    <br>
    <br>
    <h3>Pierwszy raz na naszej stronie?</h3>
    <button><a href="/account/register" style="color: #fff;">Zarejestruj się</a></button>
  </div>
  <script src="../../public/js/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="../../public/js/form_accounts.js"></script>
</body>

</html>