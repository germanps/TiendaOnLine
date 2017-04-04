<?php 
	require("conexion.php");
	$nombre_pro = $_POST["nameProduct"];
	$descripcion_pro = $_POST["descProduct"];
	$cantidad_pro = $_POST["amountProduct"];
	$categoria_pro = $_POST["idCatProduct"];

	$insert_pro_query = "insert into productos(id_producto, product_nombre, descripcion, cantidad, categoria_id_categoria) values('null','$nombre_pro','$descripcion_pro',".$cantidad_pro.",". $categoria_pro.")";
	$insert_pro_resul = $conexion->query($insert_pro_query);
	$conexion->close();	
	header("Location: ../view/view_admin.php");
 ?>