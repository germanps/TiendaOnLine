<?php 
	session_start();
	require('conexion.php');
	$usu = $_POST['usuario'];
	$pwd = $_POST['password'];

	$usu_resul = $conexion->query($user_query);
	$usu_rows = $usu_resul->num_rows;
	if (!empty($usu) && !empty($pwd)) {
		while($fila = $usu_resul->fetch_array()){
			extract($fila);
			if ($nombre == $usu && $password == $pwd) {
				//echo "coincide usuario<br>";
				if ($tipo_usuario == 0) {
					$_SESSION['admin_user'] = $usu;
					header('Location:../view/view_admin.php');
				}else{
					$_SESSION['usu_user'] = $usu;
					header('Location:../view/view_usu.php');
				}
				
			}
			
		}
	}
	echo "<p>Error de login<p>";
	echo "<p>Redireccionando...</p>";
	header("Refresh: 1; url=".$_SERVER['HTTP_REFERER']);//volvemos atrás
?>