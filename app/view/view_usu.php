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
        <div class="col-md-6">
        	<form method="post" action="show_by_cat.php">
                <div class="form-group">
			      <div class="col-lg-10">
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
</div>



<!-- Jquery JS file -->
<script type="text/javascript" src="../src/js/vendor/jquery-3.1.1.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript" src="../src/js/vendor/bootstrap.min.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="../src/js/main.js"></script>

</body>
</html>