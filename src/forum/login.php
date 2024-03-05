<?php
require './db.php';

if (isset($_POST["login"])) {
  $user = $_POST["user"];
  $password = $_POST["password"];
  
  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user'");
  $row = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) > 0) {
    if (password_verify($password, $row["password"])) {
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["id_user"];
        if (!empty($_SESSION["id"])) { 
            $user_id = $_SESSION["id"];
            $result = mysqli_query($conn, "SELECT * FROM user WHERE id_user=$user_id");
            $row = mysqli_fetch_assoc($result);
       }
        echo '<script language="javascript">window.location="./index.php";</script>';


    } 
}
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tilt+Warp&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="css/style_login.css">
  <link rel="shortcut icon" href="./assets/logo2.webP">

  <title> Cine-Hub </title>
</head>

<body class="bg-dark">
  <section>
    <div class="row g-0 max-login">
      <div class="col-lg-7 img-login">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active img-1">
              <div class="carousel-caption d-none d-md-block text-left">
                <h5 class="izquierda">Inicia sesión ahora</h5>
                <p class="izquierda spartan big-2">El mejor sitio web para tus peliculas favoritas</p>
              </div>
            </div>
            <div class="carousel-item img-2">
              <div class="carousel-caption d-none d-md-block">
                <h5 class="izquierda">Inicia sesión ahora</h5>
                <p class="izquierda spartan big-2">Descubre los mejores estrenos y clásicos en Cine-hub</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <div class="col-lg-5 d-flex flex-column align-items-end min-vh-80 complete-login">
        <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4 w-100 mb-auto">
          <a href="index.php" class="navbar-brand img-fluid big-text txt-login-cinehub"><span class="text-primary img-fluid big-text">CINE</span>-HUB</a></button>
        </div>

        <div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center recuadro-login">
          <h1 class="font-weight-bold mb-5 spartan">¡Bienvenido/a!</h1>

          <form method="POST" autocomplete="off" class="mb-3">
            <div class="mb-4">
              <label for="user" name="user" class="form-label font-weight-bold spartan text-primary">Usuario</label>
              <input type="text" name="user" pattern="[a-zA-ZáéíóúÁÉÍÓÚ0-9 ]{1,30}" id="user" place="" class="form-control bg-light-x border-0 font-weight-bold" placeholder="Ingresa tu nombre de usuario" aria-describedby="emailHelp">
            </div>

            <div class="mb-4">

              <label for="password" class="form-label font-weight-bold spartan">Contraseña</label>
              <div class="input-group pb-3">
                <input type="password" name="password" id="txtPassword" pattern="[a-zA-ZáéíóúÁÉÍÓÚ0-9 ]{1,30}" place="" class="form-control" placeholder="Ingresa tu contraseña">
                <div class="input-group-append">
                  <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                </div>
              </div>

              <div class="form-group">

                <a href="contrasenia/recuperar_cuenta.php" class="text-left text-primary text-decoration-none" style="margin-right: 44px">¿Perdiste tu contraseña?</a>

                <a href="registro.php" class="text-right text-light text-decoration-none registro">¿No estás registrado/a?</a>

              </div>

            </div>
            <button type="sumbit" name="login" class="btn w-100 btn-neon pb-4">
              <span id="span1"></span>
              <span id="span2"></span>
              <span id="span3"></span>
              <span id="span4"></span>
              Iniciar sesión
            </button>

            <button type="sumbit" name="cinehub" class="btn w-100 btn-neon">
              <span id="span1"></span>
              <span id="span2"></span>
              <span id="span3"></span>
              <span id="span4"></span>
              Ingresa como invitado
            </button>
          </form>

        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
<script type="text/javascript">
  function mostrarPassword() {
    var cambio = document.getElementById("txtPassword");
    if (cambio.type == "password") {
      cambio.type = "text";
      $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    } else {
      cambio.type = "password";
      $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
  }
</script>