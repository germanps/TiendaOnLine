<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Tienda Online - Login</title>
	<link rel="stylesheet" href="src/css/bootstrap.min.css">
	<link rel="stylesheet" href="src/css/main.css">
	<!-- <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> -->
</head>
<body>
	<div class="sq-container">
		<div class="sq-form-wrapper">
			<form class="form-horizontal" method="post" action="controller/access.php">
			  <fieldset>
			    <legend>Log In</legend>
			    <div class="form-group">
			      <label for="inputUsuario" class="col-lg-2 control-label">Usuario</label>
			      <div class="col-lg-10">
			        <input type="text" class="form-control" id="inputUsuario" placeholder="Usuario" name="usuario">
			      </div>
			    </div>

			    <div class="form-group">
			      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
			      <div class="col-lg-10">
			        <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
			        <div class="checkbox">
			          <label>
			            <input type="checkbox"> Recordar
			          </label>
			        </div>
			      </div>
			    </div>
			    <div class="form-group">
			      <div class="col-lg-10 col-lg-offset-2">
			        <button type="reset" class="btn btn-default">Cancel</button>
			        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
			      </div>
			    </div>
			  </fieldset>
			</form>
		</div>


		<!-- MODAL -->
		<div class="modal fade" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Modal title</h4>
		      </div>
		      <div class="modal-body">
		        <p>One fine body&hellip;</p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary">Save changes</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->


	</div>
</body>
</html>