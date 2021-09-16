<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" href="../../public/img/icon.png" type="image/gif">
    <link rel="stylesheet" href="../../public/css/main.css" />
    <title>Audit email</title>
  </head>
  <body>
    <div class="register">
      <div class="logo">
        <a href="/"
          ><img src="../../public/img/logo.png" alt="logo" width="250"
        /></a>
      </div>
      <form action="/account/register" method="POST">
        <h3>WPISZ KOD Z E-MAILA</h3>
        <br />
        <input type="text" name="kod" placeholder="Kod" />
        <br />
        <button type="submit" name="doGO_check" value="true">Zakoncz Rejestracje</button>
      </form>
    </div>
  </body>
</html>
