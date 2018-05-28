<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="../assets/images/logo-lp-122x61.jpg" type="image/x-icon">
  <title>BACKEND Los Petreles</title>
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="../assets/dropdown/css/style.css">
  <link rel="stylesheet" href="../assets/tether/tether.min.css">
  <link href="http://designers.hubspot.com/hs-fs/hub/327485/file-2054199286-css/font-awesome.css" rel="stylesheet">
  <script language="JavaScript" type="text/javascript" src="Link al archivo"></script>

</head>
<body style="background-image: url(../assets/images/logo_final.jpg); background-attachment: fixed; background-repeat: round">

<?php
  ob_start();
?>

<?php
  session_start();
  require '../include/conexion.php';

  if(isset($_GET['alt'])){
    if($_GET['alt'] == 1){
      echo '<script lenguage="javascript">alert("Comentario publicado correctamente!");</script>';
    } elseif ($_GET['alt'] == 2) {
      echo '<script lenguage="javascript">alert("Comentario borrado correctamente!");</script>';
    }
    }

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <div class="navbar-header">
      <a style="color: #000066" class="navbar-brand" href="../index.php"><button class="btn btn-primary btn-form display-4" style="margin-top: 15px; border-color: black; margin-bottom: 10px; color: #000066; background-color: aqua" type="button" class="btn btn-default navbar-btn"><strong><span class="fa fa-arrow-left"></span> Volver al Sitio Web Los Petreles</strong></button></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a style="color: #000066" href="backend.php"><button type="button" class="btn btn-primary btn-form display-4" style="margin-top: 15px; border-color: black; margin-right: 15px; margin-bottom: 10px; color: #000066; background-color: aqua" href="backend.php" class="btn btn-default navbar-btn"><strong><span class="fa fa-clipboard"></span> Selección de Comentarios</strong></button></a></li>
      <li><a style="color: #000066" href="coments_shown.php"><button type="button" class="btn btn-primary btn-form display-4" href="coments_shown.php" style="margin-top: 15px; border-color: black; color: #000066; margin-bottom: 10px; background-color: aqua" class="btn btn-default navbar-btn"><strong><span class="fa fa-cloud-upload"></span> Comentarios Publicados</strong></button></a></li>
    </ul>
  </div>
</nav>

<div class="container" style="border-radius: 10px; background-color: black; opacity: .9">
  <div class="row">
    <div class="col-md-12">
      <h1 style="color: aqua; text-align: center; padding-top: 15px">Bienvenido <em><?php echo $_SESSION['name'];?></em> al sector de administrador</h1>
      <br>
      <h2 style="font-family: arial; color: aqua; text-align: center; "><strong><u>Seleccione los comentarios que desea mostrar en el sitio web.</u></strong></h2>
      <br>
      <h3 style="font-family: arial; color: aqua; text-align: center"><em>Haga click en el boton "Empezar", luego escriba el numero de ID del comentario a publicar o borrar y presione el respectivo botón.</em></h3>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-5"></div>
    <div class="col-sm-2">
      <form name="seleccion_publicar" action="backend.php" method="post">
      <span class="input-group-btn">
        <button type="submit" name="start" style="border-color: black; margin-bottom: 25px; margin-top: 15px" class="btn btn-primary btn-form display-4" style="margin-bottom: 50px"><strong><span class="fa fa-cog fa-spin"></span> Empezar</strong></button>
      </span>
    </div>
    <div class="col-sm-5"></div>
  </div>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1" style="margin-top: 5px; margin-right: 3px; color: white"><b>Numero de ID:</b></span>
              <input type="text" class="form-control" name="idbusqueda" style="border-color: black" placeholder="Escriba N° de ID" aria-describedby="basic-addon1">
            </div>
          </div>
          <div class="col-md-4"></div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-5"></div>
          <div class="col-md-1"><button type="submit" name="publish" style="border-color: black" class="btn btn-success btn-form display-2"><strong><span class="fa fa-check-circle"></span> Publicar</strong></button></div>
          <div class="col-md-1"><button type="submit" name="delete" style="border-color: black; margin-left: 20px" class="btn btn-danger btn-form display-2"><strong><span class="fa fa-ban"></span> Borrar</strong></button></div>
          <div class="col-md-5"></div>
        </div>

  <br>
  <div class="row" style="background-color: black; opacity: 0.9; border-radius: 10px; padding-bottom: 10px; color: white">
    <div class="col-lg-12">
      <?php

        if(isset($_POST['start'])){
          $query = "SELECT * FROM coments ORDER BY id DESC";
          $result = mysqli_query($link, $query);
          ?>
          <div class="table-responsive">
                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Comentario</th>

                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <?  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {?>
                            <td><?echo $row['id'];?></td>
                            <td><?echo $row['name'];?></td>
                            <td><?echo $row['messagge'];?></td>
                        </tr>
                      </tbody>
                      <?}?>
                    </table>
                    <?}?>
                  </div>
                </div>
              </div>
              <?php

            if(isset($_POST['idbusqueda'])){
              $idbusqueda = ($_POST['idbusqueda']);
              $query1 = "SELECT * FROM coments WHERE id = '$idbusqueda'";
              $result1 = mysqli_query($link, $query1);

              while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                $id = $row1['id'];
                $name = $row1['name'];
                $messagge = $row1['messagge'];

                  if(isset($_POST['publish'])){
                    $query2 = "INSERT INTO comentshow (name, messagge) VALUES ('$name', '$messagge')";
                    $result2 = mysqli_query($link, $query2);
                    header('Location: backend.php?alt=1');
                      }
                      if(isset($_POST['delete'])){
                        $query3 = "DELETE FROM coments WHERE id = '$idbusqueda'";
                        $result3 = mysqli_query($link, $query3);
                        header('Location: backend.php?alt=2');
                      }
                    }
                  }
               ?>

               <?php
                ob_end_flush();
               ?>

            </form>
          </div>
          </div>



          <script src="assets/web/assets/jquery/jquery.min.js"></script>
          <script src="assets/tether/tether.min.js"></script>
          <script src="assets/bootstrap/js/bootstrap.min.js"></script>
          <script src="assets/dropdown/js/script.min.js"></script>
          <script src="assets/viewportchecker/jquery.viewportchecker.js"></script>
          <script src="assets/theme/js/script.js"></script>
          <script src="assets/formoid/formoid.min.js"></script>
</body>
</html>
