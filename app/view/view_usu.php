<?php 
	session_start();
	require('../controller/conexion.php');
    if (!isset($_SESSION['usu_user'])) {
        //echo "No existe el usuario...";
        header('Location:../index.php');
    }
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
        <div class="col-sm-6 col-xs-6">
            <h2 class="text-left text-warning">Tienda OnLine <span class="text-danger">#SqüaløBcN#</span></h2>
            <p class="text-info">Usuario - <?php echo $_SESSION['usu_user'] ?></p>
        </div>
        <div class="col-sm-6 col-xs-6">
            <div class="log-user pull-right">
                <span class=""> # <?php echo $_SESSION['usu_user'] ?> #</span>
                <a id="logOut" class="btn btn-danger btn-sm" href="../controller/disconnect.php">Desconectar</a>
            </div>
        </div>
    </div>
    <div class="row margin-top">
        <div class="col-md-6 no-padding">
        	<form method="post" action="show_by_cat.php">
                <div class="form-group clearfix">
			      <div class="col-lg-10">
                  <h3 class="text-warning">Comprar Articulo</h3>
			      <label for="select" class="col-lg-12 control-label">Elige Categoria</label>
			      <select name="categories" class="form-control" id="selectCategory">
			      	<!-- <option value="Elige Categoria" selected></option> -->
			      	<?php 
			      		$cat_query = "select * from categoria order by id_categoria";
                        $cat_resul = $conexion->query($cat_query);
                        $cat_rows = $cat_resul->num_rows;
                        $contador_cat = 1;
                        if ($cat_rows == 0) {
                        	echo "No se encuentras categorias en la base de datos";
                        }else{
                        	while ($fila_cat = $cat_resul->fetch_array()) {
                        		extract($fila_cat);
                        		echo "<option value='$cat_nombre'>$cat_nombre</option>";
                        	}
                        }

			      	?>
			        </select>
			        <input type="submit" name="usu_cat_select" value="Elegir" class="btn btn-success">
			      </div>
			    </div>
		    </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="shopping-cart">
           
            <?php 
                if (!isset($_SESSION['articulo'])) {
                    echo "";
                }else{
                    $id_article = $_SESSION['articulo'];
                    $amount_product = $_SESSION['cantidad'];
                    //$product_query = "select * from productos";
                    $product_query = "select p.product_nombre, p.id_producto, p.cantidad, c.cat_nombre FROM productos p, categoria c where p.id_producto = $id_article order by id_producto;";
                    $product_resul = $conexion->query($product_query);
                    $product_rows = $product_resul->num_rows;
                    $fila_product = $product_resul->fetch_array();
                    extract($fila_product);
                    $pro_name = $product_nombre;
                    
                    
                    echo "<h4 class='text-success'>Articulo comprado...</h4>";
                    echo "<p class='article-cart text-info'>Nombre articulo: <span class='text-danger'>" .  $pro_name . "</span></p>";
                    echo "<p class='amount-cart text-info'>Cantidad comprada: <span class='text-danger'>" . $amount_product . "</span></p><a href='view_shopping_end.php' class='btn btn-info'>Finalizar compra y salir</a><br>";
                    $conexion->close();
                    //print_r($_SESSION['articulos_final']);
                    //echo "<br>";
                    //print_r($_SESSION['cantidad_final']);
                }


             ?>
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