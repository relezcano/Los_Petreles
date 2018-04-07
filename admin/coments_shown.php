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

</head>
<body>

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

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Los Petreles - Administrador</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="backend.php">Selección de Comentarios</a></li>
      <li class="active"><a href="coments_shown.php">Comentarios Publicados</a></li>
    </ul>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>Bienvenido <?php echo $_SESSION['name'];?> al sector de administrador</h1>
      <h2>Seleccione los comentarios que desea mostrar en el sitio web.</h2>
      <br>
      <h3>Haga click en el boton "Empezar"<br> Luego escriba el numero de ID del comentario a publicar o borrar y presione el respectivo botón.</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-5"></div>
    <div class="col-sm-2">
      <form name="seleccion_publicar" action="coments_shown.php" method="post">
      <span class="input-group-btn">
        <button type="submit" name="start" class="btn btn-primary btn-form display-4" style="margin-bottom: 50px">Empezar</button>
      </span>
    </div>
    <div class="col-sm-5"></div>
  </div>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1" style="margin-top: 5px; margin-right: 3px"><b>Numero de ID:</b></span>
              <input type="text" class="form-control" name="idbusqueda" placeholder="Escriba N° de ID" aria-describedby="basic-addon1">
            </div>
          </div>
          <div class="col-md-4"></div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-5"></div>
          <div class="col-md-2"><button type="submit" name="delete" class="btn btn-danger btn-form display-2">Borrar</button></div>
          <div class="col-md-5"></div>
        </div>

  <br>
  <div class="row">
    <div class="col-lg-12">
      <?php

        if(isset($_POST['start'])){
          $query = "SELECT * FROM comentshow ORDER BY id DESC";
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
              $query1 = "SELECT * FROM comentshow WHERE id = $idbusqueda";
              $result1 = mysqli_query($link, $query1);


              if(isset($_POST['delete'])){
                $query3 = "DELETE FROM comentshow WHERE id = $idbusqueda";
                $result3 = mysqli_query($link, $query3);
                header('Location: coments_shown.php?alt=2');
              }
            }
            mysqli_close($link);

        ?>



            </form>
          </div>
          </div>




</body>
</html>
