<?php 
	session_start();
	require('../controller/conexion.php');

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Tienda Online - Usuario</title>
	<link rel="stylesheet" href="../src/css/bootstrap.min.css">
	<link rel="stylesheet" href="../src/css/main.css">
	<!-- <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> -->
</head>
<body>

<!-- Content Section -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-warning">Compra final</h2>
        </div>
    </div>

	<!-- ROW PRODUCTOS -->
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-info">Tu compra es la siguente</h3>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

							for($i = 0; $i < count($_SESSION['articulos_final']); $i++){
							    echo "<tr>";
								echo "<td>".$_SESSION['articulos_final'][$i]."</td>";

								for ($j = 0; $j < count($_SESSION['cantidad_final']); $j++) { 
									echo "<td>".$_SESSION['cantidad_final'][$i]."<t/d>";
									break;
								}

								echo "</tr>";
							}
                            
                         ?>
                    </tbody>
                </table>
            <a href="../controller/disconnect.php" class="btn btn-success">Finalizar</a>
        </div>
    </div> <!-- /ROW PRODUCTOS -->
</div>

<!-- Jquery JS file -->
<script type="text/javascript" src="../src/js/vendor/jquery-3.1.1.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript" src="../src/js/vendor/bootstrap.min.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="../src/js/main.js"></script>

</body>
</html>
