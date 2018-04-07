<?php
//Conectar con la base de datos de Vinos.

	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'los_petreles';

	$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Ocurrio un error al conectarse al servidor mysql');
	mysqli_select_db($link, $dbname);

?>
