<?php 
	require("conexion.php");
	$nombre_cat = $_POST["nameCategory"];

	$insert_cat_query = "insert into categoria(id_categoria, cat_nombre) values('null','$nombre_cat')";
	$insert_cat_resul = $conexion->query($insert_cat_query);
	$conexion->close();	
	header("Location: ../view/view_admin.php");
 ?>