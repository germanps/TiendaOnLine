<?php 
	session_start();
	require('conexion.php');
	include('../view/header.html');
	$product = $_POST['buy_product'];
	$amount = $_POST['amountBuy'];

	//echo "$product - $amount";

	$amount_query = "select * from productos where id_producto=$product";
	$amount_result = $conexion->query($amount_query);
	$amount_rows = $amount_result->num_rows;
	while ($fila = $amount_result->fetch_array()) {
		extract($fila);
		if ($amount > $cantidad) {
			echo "<p class='text-danger'>Lo sentimos pero no disponemos de esta cantidad<p>";
			$conexion->close();
			header('Refresh: 3; url="../view/view_usu.php"');
		}else{
			$new_amount = $cantidad-$amount;
			$buy_query = "update productos set cantidad = $new_amount where id_producto = $product";
			$conexion->query($buy_query);
			
			$_SESSION['articulo'] = $id_producto;
			$_SESSION['cantidad'] = $amount;
			array_push($_SESSION['cantidad_final'], $_SESSION['cantidad']);

			$product_query = "select p.product_nombre, p.id_producto, p.cantidad, c.cat_nombre FROM productos p, categoria c where p.id_producto = $product order by id_producto;";
			$product_resul = $conexion->query($product_query);
            $product_rows = $product_resul->num_rows;
            $fila_product = $product_resul->fetch_array();
            extract($fila_product);
            $pro_name = $product_nombre;

			array_push($_SESSION['articulos_final'], $pro_name);
			

			$conexion->close();
			echo "<h3 class='text-success'>Articulo comprado correctamente!<h3>";
			header('Refresh: 3; url="../view/view_usu.php"');
		}
	}

 ?>
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