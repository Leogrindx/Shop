<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="icon" href="../../public/img/icon.png" type="image/gif">
  <link rel="stylesheet" href="../../public/css/main.css" />
  <link rel="stylesheet" href="../../public/css/media.css" />
  <title>Register</title>
  <script src="../../public/js/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="../../public/js/register.js"></script>
</head>

<body>
  <div class="register">
    <div class="logo">
      <a href="/"><img src="../../public/img/logo.png" alt="logo" width="250" /></a>
    </div>
    <form action="/account/register_ajax" method="POST">
      <h1>ZAŁÓŻ KONTO W SHOP MASTER</h1>
      <br />
      <label for="text">
        <p>Imię</p>
      </label>
      <input id="text" type="text" name="first_name" placeholder="Imię" required />
      <br />
      <label for="last_name">
        <p>Nazwisko</p>
      </label>
      <input id="last" type="text" name="last_name" placeholder="Nazwisko" required />
      <br />
      <label for="email">
        <p>Aders e-mail</p>
      </label>
      <input id="email" type="email" name="email" placeholder="Aders e-mail" required />
      <br />
      <label for="password">
        <p>Hasło</p>
      </label>
      <input id="password" type="password" name="password" placeholder="Hasło" required />
      <p class="conditions_password">Proszę wpisać co najmniej 6 znaków.</p>
      <div class="gender_register">
        <h4>Wybierz płeć</h4>
        <p>Podając tę informację, pomagasz nam ulepszać nasze usługi.</p>
        <input type="radio" name="gender" value="man" id="man" required />
        <label for="man">mężczyzna</label>
        <input type="radio" name="gender" value="woman" id="woman" required />
        <label for="woman">kobieta</label>
      </div>
      <div class="check">
        <input type="checkbox" name="" value="true" id="check" required />
        <label for="check">
          Tak, chcę otrzymywać newsletter o trendach, ofertach specjalnych
          oraz otrzymać kupon rabatowy w wysokości 10% na zakupy powyżej 200
          zł. Rezygnacja jest możliwa w każdej chwili. (opcjonalnie)
        </label>
      </div>
      <input class="d_none" type="checkbox" checked name="doGO_register" value="true" />

      <button type="submit">Zarejestruj się</button>
    </form>
  </div>
    <div id="check_email" class="d_none">
      <div id="content" aria-labelledby="swal2-title" aria-describedby="swal2-content" 
        class="swal2-popup swal2-modal swal2-icon-error swal2-show" tabindex="-1" role="dialog" 
        aria-live="assertive" aria-modal="true" style="display: none;" >

          <div class="check_email">
            <div class="logo">
              <a href="/"
                ><img src="../../public/img/logo.png" alt="logo" width="250"
              /></a>
            </div>
            <form action="/account/register_ajax" method="POST">
              <h1>WPISZ KOD Z E-MAILA</h1>
              <br />
              <input type="text" name="kod" placeholder="Kod" />
              <br />
              <input class="d_none" type="checkbox" checked name="doGO_check" value="true" />
              <button type="submit">Zakoncz Rejestracje</button>
            </form>
          </div>
      </div>
    </div>
  </div>
</body>

</html>