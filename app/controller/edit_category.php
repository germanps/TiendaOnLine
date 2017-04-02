<?php 
	require("conexion.php");
	$id = $_POST["set_idCategory"];
	$nombre_cat = $_POST["set_nameCategory"];

	$update_cat_query = "update categoria set cat_nombre='$nombre_cat' where id_categoria=$id";
	$update_cat_resul = $conexion->query($update_cat_query);
	$conexion->close();	
	header("Location: ../view/view_admin.php");
 ?>