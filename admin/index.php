<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="../assets/images/logo-lp-122x61.jpg" type="image/x-icon">
  <title>BACKEND - Ingreso</title>
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="../assets/dropdown/css/style.css">
  <link rel="stylesheet" href="../assets/tether/tether.min.css">

</head>
<body>

  <?php

  require '../include/conexion.php';

  if(isset($_GET['alt'])){
    if($_GET['alt'] == 2){
      echo '<script lenguage="javascript">alert("No dispone de permisos para ingresar aquí.");</script>';
    } elseif($_GET['alt'] == 3){
      echo '<script lenguage="javascript">alert("Contraseña incorrecta..");</script>';
    } elseif($_GET['alt'] == 4){
      echo '<script lenguage="javascript">alert("No existe cuenta asociada a este usuario.");</script>';
    }
  }

  ?>

  <div class="container" style="background-color: black; opacity: 0.9; border-radius: 50px; padding-bottom: 10px">
  <form name="ingresar" action="../include/session_check.php" method="post">

      <div class="row">
        <div class="col-md-12">
          <h3 style="text-align: center; padding-top: 10px; color: white; font-family: arial sans-serif"><em>Ingrese con su <strong>cuenta de administrador</strong></em></h3>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-4">
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1" style="color: white; margin-top: 5px"><b>Usuario</b></span>
            <input type="text" id="userName" name="userName" class="form-control" style="margin-left: 5px" placeholder="Escriba aquí su usuario" aria-describedby="basic-addon1">
          </div>
        </div>
        <div class="col-md-4">
          <div class="input-group">
            <span class="input-group-addon" style="color: white; margin-top: 5px"><b>Contraseña</b></span>
            <input type="password" name="pass" class="form-control" style="margin-left: 5px" placeholder="Escriba aquí su contraseña">
            <span id="show-hide-passwd" action="hide" class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span></span>
          </div>
        </div>
        <div class="col-md-2"></div>
      </div>
      <br>
      <br>
      <div class="row">

        <div class="col-md-5"></div>

        <div class="col-md-2">
          <button type="submit" name="ingresar" style="color: black"><span class="glyphicon glyphicon-log-in"> Ingresar</span></button>
          <!--<span class="input-group-addon"><span class="glyphicon glyphicon-log-in"></span><button type="submit" value="Ingresar" name="ingresar"></button></span>-->
        </div>
        <br>
        <div class="col-md-5"></div>

      </div>

  </form>
  </div>
  </div>







</body>
</html>
