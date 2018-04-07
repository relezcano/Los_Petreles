<?php
session_start();

require 'conexion.php';

if(isset($_POST['comentar'])) {
  if($_POST['name'] == '' or $_POST['messagge'] == '') {
    echo 'Por favor complete todos los campos para poder continuar.';//Si los campos están vacíos muestra un mensaje, caso contrario sigue el siguiente codigo.
  }else {

    $name = $_POST['name'];
    $messagge = $_POST['messagge'];

    $query = "INSERT INTO coments (name, messagge) VALUES ('$name', '$messagge')";//Se insertan los datos a la base de datos.
    if(mysqli_query($link, $query)){
        header('Location: ../index.php?alt=1'); //envia al user al index y le muestra un alerta de success.
    } else {
        header('Location: ../index.php?alt=2'); //envia al user al index y le muestra un alerta de error.
      }
  }
}

mysqli_close($link);

?>
