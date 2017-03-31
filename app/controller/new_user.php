<?php 
	require("conexion.php");
	$nombre = $_POST["nameUser"];
	$password = $_POST["passwordUser"];
	$tipo = $_POST["tipoUser"];

	//header("Location: ../index.php");

	$insert_user_query = "insert into usuario(id_usuario, nombre, password, tipo_usuario) values('null','$nombre','$password','$tipo')";
	$insert_user_resul = $conexion->query($insert_user_query);
	$conexion->close();	
	header("Location: ../view/view_admin.php");
 ?>