<?php 
	include('variables.php');
	$conexion = new mysqli($host, $user, $pass, $db_name) or die("Error de conexión con la base de datos");
	$user_query = "select * from usuario";
 ?>