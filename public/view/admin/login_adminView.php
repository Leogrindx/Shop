<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" href="../../public/img/icon.png" type="image/gif" />
    <link rel="stylesheet" href="../../public/css/main.css" />
    <title>ADMIN</title>
  </head>
  <body>
    <div class="register">
      <div class="logo">
        <a href="/"
          ><img src="../../public/img/logo.png" alt="logo" width="250"
        /></a>
      </div>
      <form action="/admin_login" method="POST">
        <h3>ADMIN PANEL</h3>
        <label for="emailAdmin">
          <p>E-mail</p>
        </label>
        <input type="email" name="emailAdmin" id="emailAdmin" placeholder="Aders e-mail" />
        <br />
        <label for="passwordAdmin">
          <p>Password</p>
        </label>
        <input type="password" name="passwordAdmin" id="passwordAdmin" placeholder="Hasło" />
        <button type="submit" name="doGO_loginAdmin">Zaloguj się</button>
      </form>
      <br>
    </div>
  </body>
</html>
