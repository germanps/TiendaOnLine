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
                <a class="btn btn-default" href="show_stock.php">Ver stock</a>
            </div>
        </div>
    </div>
    <!-- ROW USUARIOS -->
    <div class="row">
        <div class="col-md-12">
            <h3>Usuarios</h3>
            <div class="table-toggle">
            	<button id="seeUsers" class="btn btn-warning btn-sm">Mostrar datos</button>
            	<div id="showUsers">
		            <table class="table table-striped table-hover">
		            	<thead>
		            		<tr>
		            			<th class='text-muted'>Item nº</th>
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
		            			$user_query = "select * from usuario order by id_usuario";
		            			$usu_resul = $conexion->query($user_query);
								$usu_rows = $usu_resul->num_rows;
								$contador_usuarios = 1;
								if ($usu_rows == 0) {
									echo "No se encuentras usuarios en la base de datos";
								}else{
									while ($fila = $usu_resul->fetch_array()) {
										extract($fila);
										echo "<tr>
												<td class='text-muted'>$contador_usuarios</td>
												<td>$id_usuario</td>
												<td>$nombre</td>
												<td>$password</td>
												<td>$tipo_usuario</td>
												<td><button class='edit-usu pull-right btn btn-warning btn-sm' data-toggle='modal' data-target='#edit_user_modal'>Editar</button>
                                                    <a href='drop_usu.php?item=$id_usuario' class='pull-right btn btn-danger btn-sm'>Borrar</a>
                                                </td>
											 </tr>";
											 $contador_usuarios++;
									}
								}
		            		 ?>
		            	</tbody>
		            	
		            </table>
	            </div>
			</div>
        </div>
    </div> <!-- /ROW USUARIOS -->
    <!-- ROW CATEGORIAS -->
    <div class="row">
        <div class="col-md-12">
            <h3>Categorias</h3>
            <div class="table-toggle">
                <button id="seeCat" class="btn btn-warning btn-sm">Mostrar datos</button>
                <div id="showCat">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class='text-muted'>Item nº</th>
                                <th>ID categoria</th>
                                <th>Nombre</th>
                                <th class="text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                        echo "<tr>
                                                <td class='text-muted'>$contador_cat</td>
                                                <td>$id_categoria</td>
                                                <td>$cat_nombre</td>
                                                <td><button class='edit-cat pull-right btn btn-warning btn-sm' data-toggle='modal' data-target='#edit_category_modal'>Editar</button><button class='pull-right btn btn-danger btn-sm'>Borrar</button></td>
                                             </tr>";
                                             $contador_cat++;
                                    }
                                }
                             ?>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- /ROW CATEGORIAS -->
    <!-- ROW PRODUCTOS -->
    <div class="row">
        <div class="col-md-12">
            <h3>Productos</h3>
            <div class="table-toggle">
                <button id="seeProduct" class="btn btn-warning btn-sm">Mostrar datos</button>
                <div id="showProduct">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class='text-muted'>Item nº</th>
                                <th>ID producto</th>
                                <th>Categoria</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th class="text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                //$product_query = "select * from productos";
                                $product_query = "select p.product_nombre, p.id_producto, p.descripcion, p.cantidad, c.cat_nombre FROM productos p, categoria c where c.id_categoria = p.categoria_id_categoria order by id_producto;";
                                $product_resul = $conexion->query($product_query);
                                $product_rows = $product_resul->num_rows;
                                $contador_product = 1;
                                if ($product_rows == 0) {
                                    echo "No se encuentras productos en la base de datos";
                                }else{
                                    while ($fila_product = $product_resul->fetch_array()) {
                                        extract($fila_product);

                                        echo "<tr>
                                                <td class='text-muted'>$contador_product</td>
                                                <td>$id_producto</td>
                                                <td>$cat_nombre</td>
                                                <td>$product_nombre</td>
                                                <td>$descripcion</td>
                                                <td>$cantidad</td>
                                                <td><button class='edit-product pull-right btn btn-warning btn-sm' data-toggle='modal' data-target='#edit_product_modal'>Editar</button><button class='pull-right btn btn-danger btn-sm'>Borrar</button></td>
                                             </tr>";
                                             $contador_product++;
                                    }
                                }
                             ?>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- /ROW PRODUCTOS -->
</div>
<!-- /Container Section -->


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
                    <button type="submit" class="btn btn-primary">Añadir usuario</button>
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
            <form method='post' action='../controller/new_category.php' role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Agregar categoria</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="nameCategoryId">Nombre</label>
                        <input name="nameCategory" type="text" id="nameCategoryId" placeholder="Nombre" class="form-control"/>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Añadir categoria</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- // Modal Category-->

<!-- Modal add product-->
<div class="modal fade" id="add_new_product_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method='post' action='../controller/new_product.php' role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Agregar producto</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="nameProductId">Nombre</label>
                        <input name="nameProduct" type="text" id="nameProductId" placeholder="Nombre" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="nameCatProduct">ID Categoria</label>
                        <input name="idCatProduct" type="number" id="nameCatProduct" placeholder="ID Categoria" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="descriptionProductId">Descripción corta</label>
                        <textarea name="descProduct" type="text" id="descriptionProductId" placeholder="Descripcion" class="form-control"/></textarea>
                    </div>

                    <div class="form-group">
                        <label for="amountId">Cantidad</label>
                        <input name="amountProduct" type="text" id="amountId" placeholder="Cantidad" class="form-control"/>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Añadir producto</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- // Modal Product-->

<!-- Modal EDIT user-->
<div class="modal fade" id="edit_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method='post' action='../controller/edit_user.php' role="form" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Editar usuario</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="set_idUserId">ID usuario</label>
                        <input name="set_idUser" type="number" id="set_idUserId" placeholder="ID Usuario" class="form-control" required/>
                    </div>

                    <div class="form-group">
                        <label for="set_nameUserId">Nombre</label>
                        <input name="set_nameUser" type="text" id="set_nameUserId" placeholder="Nombre" class="form-control" required/>
                    </div>

                    <div class="form-group">
                        <label for="set_passwordUserId">Password</label>
                        <input name="set_passwordUser" type="text" id="set_passwordUserId" placeholder="Password" class="form-control" required/>
                    </div>

                    <div class="form-group">
                        <label for="set_tipoUserId">Tipo usuario => (0:admin # 1:normal)</label>
                        <input name="set_tipoUser" type="text" id="set_tipoUserId" placeholder="Tipo usuario" class="form-control" required/>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Modificar usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- // Modal edit User-->
<!-- Modal edit category-->
<div class="modal fade" id="edit_category_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method='post' action='../controller/edit_category.php' role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Editar categoria</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="set_idCategoryId">ID Categoria</label>
                        <input name="set_idCategory" type="number" id="set_idCategoryId" placeholder="ID Categoria" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="set_nameCategoryId">Nombre</label>
                        <input name="set_nameCategory" type="text" id="set_nameCategoryId" placeholder="Nombre" class="form-control"/>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Editar categoria</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- // Modal edit Category-->
<!-- Modal edit product-->
<div class="modal fade" id="edit_product_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method='post' action='../controller/edit_product.php' role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Editar producto</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="set_idProductId">ID Producto</label>
                        <input name="set_idProduct" type="number" id="set_idProductId" placeholder="ID Producto" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="set_nameProductId">Nombre</label>
                        <input name="set_nameProduct" type="text" id="set_nameProductId" placeholder="Nombre" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="set_nameCatProductId">ID Categoria</label>
                        <input name="set_nameCatProduct" type="number" id="set_nameCatProductId" placeholder="ID Categoria" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="set_descriptionProductId">Descripción corta</label>
                        <textarea name="set_descProduct" type="text" id="set_descriptionProductId" placeholder="Descripcion" class="form-control"/></textarea>
                    </div>

                    <div class="form-group">
                        <label for="set_amountId">Cantidad</label>
                        <input name="set_amountProduct" type="text" id="set_amountId" placeholder="Cantidad" class="form-control"/>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Editar producto</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- // Modal edit Product-->


<!-- Jquery JS file -->
<script type="text/javascript" src="../src/js/vendor/jquery-3.1.1.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript" src="../src/js/vendor/bootstrap.min.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="../src/js/main.js"></script>

</body>
</html>
