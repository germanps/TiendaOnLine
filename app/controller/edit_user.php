<?php 
	session_start();
	require("conexion.php");
	$id = $_POST["set_idUser"];
	$nombre = $_POST["set_nameUser"];
	$password = $_POST["set_passwordUser"];
	$tipo = $_POST["set_tipoUser"];
	$update_user_query = "update usuario set nombre='$nombre', password='$password', tipo_usuario=$tipo WHERE id_usuario=$id";
	$update_user_resul = $conexion->query($update_user_query);
	
	$conexion->close();	
	header("Location: ../view/view_admin.php");

 ?>