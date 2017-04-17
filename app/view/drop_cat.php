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
	        			<th>ID Categoria</th>
	        			<th>Nombre Categoria</th>
	        			<th class="text-right">Acciones</th>
	        		</tr>
	        	</thead>
        		<tbody>
				<?php
				$cat_delete = $_GET['item'];
				echo "<h3 class='text-warning'>Borrar Categoria</h3>";

				$cat_query = "select * from categoria where id_categoria=$cat_delete";
				$cat_resul = $conexion->query($cat_query);
			    $cat_rows = $cat_resul->num_rows;
			    if ($cat_rows == 0) {
			        echo "No se encuentran la categoria";
			    }else{
			        while ($fila_cat = $cat_resul->fetch_array()) {
			            extract($fila_cat);

			            echo "<tr>
			                    <td>$id_categoria</td>
			                    <td>$cat_nombre</td>
			                    <td><a href='../controller/delete_cat.php?item=$id_categoria' class='pull-right btn btn-danger btn-sm'>Borrar</a>
			                 </tr>";
			        }
			    }
				?>
				</tbody>
			</table>
		</div>
		<?php echo "<p class='text-info'>Nota: si existe algún producto asociado a esta categoria no podrá borrarse</p>"; ?>
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