<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="../assets/images/logo-lp-122x61.jpg" type="image/x-icon">
  <title>Comentarios Publicados</title>
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="../assets/dropdown/css/style.css">
  <link rel="stylesheet" href="../assets/tether/tether.min.css">
  <link href="http://designers.hubspot.com/hs-fs/hub/327485/file-2054199286-css/font-awesome.css" rel="stylesheet">

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
      <a style="color: #ffffff" class="navbar-brand" href="../index.php"><button style="margin-top: 15px; color: #000066; margin-bottom: 10px; background-color: aqua; border-color: black" type="button" class="btn btn-default navbar-btn"><strong><span class="fa fa-arrow-left"></span> Volver al Sitio Web Los Petreles</strong></button></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a style="color: #ffffff" href="backend.php"><button class="btn btn-primary btn-form display-4" style="margin-right: 15px; margin-top: 15px; margin-bottom: 10px; color: #000066; background-color: aqua; border-color: black" type="button" href="backend.php" class="btn btn-default navbar-btn"><strong><span class="fa fa-clipboard"></span> Selección de Comentarios</strong></button></a></li>
      <li class="active"><a style="color: #ffffff" href="coments_shown.php"><button class="btn btn-primary btn-form display-4" style="margin-top: 15px; color: #000066; margin-bottom: 10px; background-color: aqua; border-color: black" type="button" href="coments_shown.php" style="margin-top: 10px" class="btn btn-default navbar-btn"><strong><span class="fa fa-cloud-upload"></span> Comentarios Publicados</strong></button></a></li>
    </ul>
  </div>
</nav>

<div class="container" style="border-radius: 10px; background-color: black; opacity: .9">
  <div class="row">
    <div class="col-md-12">
      <h1 style="color: aqua; text-align: center; padding-top: 15px">Bienvenido <em><?php echo $_SESSION['name'];?></em> al sector de administrador</h1>
      <br>
      <h2 style="font-family: arial; color: aqua; text-align: center"><strong><u>Comentarios publicados en el sitio web.</u></strong></h2>
      <br>
      <h3 style="font-family: arial; color: aqua; text-align: center; border-radius: 10px; background-color: black; opacity: .9"><em>Haga click en el boton "Empezar" para mostrar los comentarios publicados.<br> Luego escriba el numero de ID del comentario que desee borrar y presione el botón "Borrar".</em></h3>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-5"></div>
    <div class="col-sm-2">
      <form name="seleccion_publicar" action="coments_shown.php" method="post">
      <span class="input-group-btn">
        <button type="submit" name="start" style="border-color: black; margin-top: 15px; margin-bottom: 25px" class="btn btn-primary btn-form display-4"><strong><span class="fa fa-cog fa-spin"></span> Empezar</strong></button>
      </span>
    </div>
    <div class="col-sm-5"></div>
  </div>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1" style="margin-top: 5px; margin-right: 3px; color: white"><b>Numero de ID:</b></span>
              <input type="text" class="form-control" style="border-color: black" name="idbusqueda" placeholder="Escriba N° de ID" aria-describedby="basic-addon1">
            </div>
          </div>
          <div class="col-md-4"></div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-5"></div>
          <div class="col-md-2"><button type="submit" style="border-color: black" name="delete" class="btn btn-danger btn-form display-2"><strong><span class="fa fa-ban"></span> Borrar</strong></button></div>
          <div class="col-md-5"></div>
        </div>

  <br>
  <div class="row" style="background-color: black; opacity: 0.9; border-radius: 10px; padding-bottom: 10px; color: white">
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
                $query1 = "SELECT * FROM comentshow WHERE id = '$idbusqueda'";
                $result1 = mysqli_query($link, $query1);


              if(isset($_POST['delete'])){
                $query3 = "DELETE FROM comentshow WHERE id = '$idbusqueda'";
                $result3 = mysqli_query($link, $query3);
                header('Location:coments_shown.php?alt=2');
                }
              }
            mysqli_close($link);

        ?>
        <?php
        ob_end_flush();
        ?>



            </form>
          </div>
          </div>



          <script src="assets/web/assets/jquery/jquery.min.js"></script>
          <script src="assets/popper/popper.min.js"></script>
          <script src="assets/tether/tether.min.js"></script>
          <script src="assets/bootstrap/js/bootstrap.min.js"></script>
          <script src="assets/smoothscroll/smooth-scroll.js"></script>
          <script src="assets/dropdown/js/script.min.js"></script>
          <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
          <script src="assets/ytplayer/jquery.mb.ytplayer.min.js"></script>
          <script src="assets/viewportchecker/jquery.viewportchecker.js"></script>
          <script src="assets/bootstrapcarouselswipe/bootstrap-carousel-swipe.js"></script>
          <script src="assets/parallax/jarallax.min.js"></script>
          <script src="assets/masonry/masonry.pkgd.min.js"></script>
          <script src="assets/imagesloaded/imagesloaded.pkgd.min.js"></script>
          <script src="assets/vimeoplayer/jquery.mb.vimeo_player.js"></script>
          <script src="assets/theme/js/script.js"></script>
          <script src="assets/gallery/player.min.js"></script>
          <script src="assets/gallery/script.js"></script>
          <script src="assets/slidervideo/script.js"></script>
          <script src="assets/formoid/formoid.min.js"></script>
</body>
</html>
