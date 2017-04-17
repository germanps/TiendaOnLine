<?php 
	session_start();
	include('../view/header.html');
	echo "Cerrando sesion...";
	session_destroy();
	header('Refresh: 3; url="../index.php"');
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