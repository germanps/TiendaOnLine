<?php 
	session_start();
	require("conexion.php");
	$id_pro = $_POST["set_idProduct"];
	$nombre_product = $_POST["set_nameProduct"];
	//$cat_product = $_POST["set_nameCatProduct"];
	$desc_product = $_POST["set_descProduct"];
	$amount_product = $_POST["set_amountProduct"];

	$update_product_query = "update productos set product_nombre = '$nombre_product', descripcion = '$desc_product', cantidad = $amount_product where id_producto = $id_pro";
	$update_product_resul = $conexion->query($update_product_query);
	$conexion->close();	
	header("Location: ../view/view_admin.php");
 ?>