<?php 
	session_start();
	require('conexion.php');
	include('../view/header.html');
	$productDelete = $_GET['item'];
	$delete_query = "delete from productos where id_producto = $productDelete";
	$conexion->query($delete_query);
	$conexion->close();
	echo "Borrando producto...";
	header('Refresh: 3; url="../view/view_admin.php"');

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