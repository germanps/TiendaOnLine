<?php 
	session_start();
	require('../controller/conexion.php');
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Tienda Online - Administrador</title>
	<link rel="stylesheet" href="../src/css/bootstrap.min.css">
	<link rel="stylesheet" href="../src/css/main.css">
	<!-- <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> -->
</head>
<body>

<!-- Content Section -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Usuario</h2>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    	 	<table class="table table-striped table-hover">
	    	 	<thead>
	        		<tr>
	        			<th>ID Usuario</th>
	        			<th>Nombre Usuario</th>
	        			<th>Tipo</th>
	        			<th class="text-right">Acciones</th>
	        		</tr>
	        	</thead>
	        	<tbody>
				<?php
				$usu_delete = $_GET['item'];
				echo "<h3 class='text-warning'>Borrar Usuario</h3>";
				$usu_query = "select * from usuario where id_usuario=$usu_delete";
				$usu_resul = $conexion->query($usu_query);
			    $usu_rows = $usu_resul->num_rows;
			    if ($usu_rows == 0) {
			        echo "No se encuentran el usuario";
			    }else{
			        while ($fila_usu = $usu_resul->fetch_array()) {
			            extract($fila_usu);

			            echo "<tr>
			                    <td>$id_usuario</td>
			                    <td>$nombre</td>
			                    <td>$tipo_usuario</td>
			                    <td><a href='../controller/delete_usu.php?item=$id_usuario' class='pull-right btn btn-danger btn-sm'>Borrar</a>
			                 </tr>";
			        }
			    }
			    $conexion->close();
				?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<a href="view_admin.php" class="btn btn-succes">Volver</a>
		</div>
	</div>
		
</div>

<!-- Jquery JS file -->
<script type="text/javascript" src="../src/js/vendor/jquery-3.1.1.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript" src="../src/js/vendor/bootstrap.min.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="../src/js/main.js"></script>

</body>
</html>