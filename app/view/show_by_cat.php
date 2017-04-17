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
        			<!-- <th>Stock</th> -->
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
		                    
		                    <td><button class='compra-pro pull-right btn btn-warning btn-sm' data-toggle='modal' data-target='#buy_product_modal'>Comprar</button>
		                 </tr>";
		                 $contador_product++;
		        }
		    }
			?>
			</tbody>
		</table>
		<div class="row">
			<div class="col-lg-6">
				<a href="view_usu.php" class="btn btn-info">Volver</a>
			</div>
		</div>
		</div>
	</div>
</div> <!-- //container -->

<!-- Modal buy-->
<div class="modal fade" id="buy_product_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method='post' action='../controller/buy_product.php' role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Comprar producto</h4>
                </div>
                <div class="modal-body">

                	 <div class="form-group">
                        <label for="idProducto">Id Producto</label>
                        <input name="buy_product" type="number" id="idProducto"  class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="amountBuyId">Cantidad</label>
                        <input name="amountBuy" type="number" id="amountBuyId" placeholder="Cantidad" class="form-control"/>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Comprar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- // Modal Category-->

<!-- Jquery JS file -->
<script type="text/javascript" src="../src/js/vendor/jquery-3.1.1.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript" src="../src/js/vendor/bootstrap.min.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="../src/js/main.js"></script>

</body>
</html>