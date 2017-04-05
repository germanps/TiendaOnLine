<?php 

	require('conexion.php');
	$usuDelete = $_GET['item'];
	echo $usuDelete;
	$delete_query = "delete from usuario where id_usuario = $usuDelete";
	$conexion->query($delete_query);
	$conexion->close();
	echo "Borrando usuario...";
	header('Refresh: 3; url="../view/view_admin.php"');

 ?>