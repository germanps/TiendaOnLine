<?php 
	session_start();
	require('../controller/conexion.php');

	function insert_usuario($conexion){
		$nombre = 'Cira';
		$pwd = '1234';
		$insert_query="insert into usuario (nombre, password, tipo_usuario) values ('$nombre','$pwd', 1)";
		$conexion->query($insert_query);
	}
	//insert_usuario($conexion);
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
            <h2>Admin</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-left">
                <button class="btn btn-info" data-toggle="modal" data-target="#add_new_user_modal">Nuevo usuario</button>
                <button class="btn btn-info" data-toggle="modal" data-target="#add_new_category_modal">Agregar categoria</button>
                <button class="btn btn-info" data-toggle="modal" data-target="#add_new_product_modal">Agregar producto</button>
                <button class="btn btn-default" data-toggle="modal" data-target="#view_stock_modal">Ver stock</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Usuarios</h3>
            <div class="table-toggle">
            	<button id="seeUsers" class="btn btn-warning btn-sm">Mostrar datos</button>
            	<div id="showUsers">
		            <table class="table table-striped table-hover">
		            	<thead>
		            		<tr>
		            			<th>#</th>
		            			<th>ID usuario</th>
		            			<th>Nombre</th>
		            			<th>Password</th>
		            			<th>Tipo usuario</th>
		            			<th class="text-right">Acciones</th>

		            		</tr>
		            	</thead>
		            	<tbody>
		            		<?php 
		            			//require("../controller/conexion.php");
		            			$user_query = "select * from usuario";
		            			$usu_resul = $conexion->query($user_query);
								$usu_rows = $usu_resul->num_rows;
								$contador = 1;
								if ($usu_rows == 0) {
									echo "No se encuentras usuarios en la base de datos";
								}else{
									while ($fila = $usu_resul->fetch_array()) {
										extract($fila);
										echo "<tr>
												<td>$contador</td>
												<td>$id_usuario</td>
												<td>$nombre</td>
												<td>$password</td>
												<td>$tipo_usuario</td>
												<td><button class='pull-right btn btn-warning btn-sm'>Editar</button><button class='pull-right btn btn-danger btn-sm'>Borrar</button></td>
											 </tr>";
											 $contador++;
									}
									
								}
		            		 ?>
		            	</tbody>
		            	
		            </table>
	            </div>
			</div>
            <div class="records_content"></div>
        </div>
    </div>
</div>
<!-- /Content Section -->


<!-- Modal add user-->
<div class="modal fade" id="add_new_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method='post' action='../controller/new_user.php' role="form" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Agregar usuario</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="nameUserId">Nombre</label>
                        <input name="nameUser" type="text" id="nameUserId" placeholder="Nombre" class="form-control" required/>
                    </div>

                    <div class="form-group">
                        <label for="passwordUserId">Password</label>
                        <input name="passwordUser" type="text" id="passwordUserId" placeholder="Password" class="form-control" required/>
                    </div>

                    <div class="form-group">
                        <label for="tipoUserId">Tipo usuario => (0:admin # 1:normal)</label>
                        <input name="tipoUser" type="text" id="tipoUserId" placeholder="Tipo usuario" class="form-control" required/>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary"">Añadir usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- // Modal User-->
<!-- Modal add category-->
<div class="modal fade" id="add_new_category_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar categoria</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="nameCategoryId">Nombre</label>
                    <input type="text" id="nameCategoryId" placeholder="Nombre" class="form-control"/>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addUsuario()">Añadir categoria</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal Category-->

<!-- Modal add product-->
<div class="modal fade" id="add_new_product_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar producto</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="nameProductId">Nombre</label>
                    <input type="text" id="nameProductId" placeholder="Nombre" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="descriptionProductId">Descripción corta</label>
                    <input type="text" id="descriptionProductId" placeholder="Descripcion" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="amountId">Cantidad</label>
                    <input type="text" id="amountId" placeholder="Cantidad" class="form-control"/>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addUsuario()">Añadir usuario</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal Product-->


























<!-- Modal - Update User details -->
<!-- <div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="update_first_name">First Name</label>
                    <input type="text" id="update_first_name" placeholder="First Name" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_last_name">Last Name</label>
                    <input type="text" id="update_last_name" placeholder="Last Name" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_email">Email Address</label>
                    <input type="text" id="update_email" placeholder="Email Address" class="form-control"/>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Save Changes</button>
                <input type="hidden" id="hidden_user_id">
            </div>
        </div>
    </div>
</div> -->
<!-- // Modal -->

<!-- Jquery JS file -->
<script type="text/javascript" src="../src/js/vendor/jquery-3.1.1.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript" src="../src/js/vendor/bootstrap.min.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="../src/js/main.js"></script>

</body>
</html>
