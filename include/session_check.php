<?php
session_start();

require 'conexion.php';
if (isset($_POST['ingresar'])){

$userName = $_POST['userName'];
$pass = $_POST['pass'];

$result = mysqli_query($link, "SELECT * FROM users WHERE userName = '$userName'");
$data_user = $result->fetch_array(MYSQLI_ASSOC);

if($data_user['userName'] == $userName){
  if($data_user['pass'] == $pass){
    if($data_user['admin'] == 1){
      //Ingreso exitoso
      $_SESSION['id'] = $data_user['id'];
      $_SESSION['login'] = true;
      $_SESSION['name'] = $data_user['name'];
      $_SESSION['ingresoAdmin'] = true;
      $_SESSION['admin'] = $data_user['admin'];

      header('Location: ../admin/backend.php'); //Acceso exitoso.
    } else {
      //Su cuenta de usuario no tiene permisos para ingresar aquí
      header('Location: ../admin/index.php?alt=2');
    }
  } else {
    //La contraseña ingresada es incorrecta
    header('Location: ../admin/index.php?alt=3');
  }
} else {
  //No existe cuenta asociada a esta cuenta de Email
  header('Location: ../admin/index.php?alt=4');
}
}
?>
