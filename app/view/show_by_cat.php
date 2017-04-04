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
        			<th class='text-muted'>Item nº</th>
        			<th>ID Producto</th>
        			<th>Nombre Producto</th>
        			<th>Descripcion</th>
        			<th>Categoria</th>
        			<th>Id Categoria</th>
        			<th>Stock</th>
        			<th class="text-right">Acciones</th>
        		</tr>
        	</thead>
        	<tbody>
			<?php

			$cat_chosen = $_POST['categories'];
			echo "<h3 class='text-success'>$cat_chosen</h3>";
			$product_query = "select p.id_producto, p.product_nombre, p.descripcion, p.cantidad, c.cat_nombre, c.id_categoria FROM productos p INNER JOIN categoria c ON p.categoria_id_categoria=c.id_categoria WHERE c.cat_nombre = '$cat_chosen'";
			$product_resul = $conexion->query($product_query);
		    $product_rows = $product_resul->num_rows;
		    $contador_product = 1;
		    if ($product_rows == 0) {
		        echo "No se encuentras productos de <span class='text-info'>$cat_chosen</span> en la base de datos";
		    }else{
		        while ($fila_product = $product_resul->fetch_array()) {
		            extract($fila_product);

		            echo "<tr>
		                    <td class='text-muted'>$contador_product</td>
		                    <td>$id_producto</td>
		                    <td>$product_nombre</td>
		                    <td>$descripcion</td>
		                    <td>$cat_nombre</td>
		                    <td>$id_categoria</td>
		                    <td>$cantidad</td>
		                    <td><button class='pull-right btn btn-warning btn-sm' data-toggle='modal' data-target='#edit_product_modal'>Comprar</button>
		                 </tr>";
		                 $contador_product++;
		        }
		    }
			?>
			</tbody>
		</table>
		<div class="row">
			<div class="col-lg-6">
				<a href="view_usu.php" class="btn btn-succes">Volver</a>
			</div>
		</div>
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