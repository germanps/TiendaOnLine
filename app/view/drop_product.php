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
	        			<th>ID producto</th>
	        			<th>Nombre producto</th>
	        			<th>Descripción</th>
	        			<th>Cantidad</th>
	        			<th class="text-right">Acciones</th>
	        		</tr>
	        	</thead>
	        	<tbody>
				<?php
				$product_delete = $_GET['item'];
				echo "<h3 class='text-warning'>Borrar Producto</h3>";
				$product_query = "select * from productos where id_producto=$product_delete";
				$product_resul = $conexion->query($product_query);
			    $product_rows = $product_resul->num_rows;
			    if ($product_rows == 0) {
			        echo "No se encuentra el producto";
			    }else{
			        while ($fila_product = $product_resul->fetch_array()) {
			            extract($fila_product);

			            echo "<tr>
			                    <td>$id_producto</td>
			                    <td>$product_nombre</td>
			                    <td>$descripcion</td>
			                    <td>$cantidad</td>
			                    <td><a href='../controller/delete_product.php?item=$id_producto' class='pull-right btn btn-danger btn-sm'>Borrar</a>
			                 </tr>";
			        }
			    }
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