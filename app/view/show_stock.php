<?php 
	session_start();
	require('../controller/conexion.php');
    include('header.html');
 ?>

        </div>
        <div class="col-sm-6 col-xs-6">
            <div class="log-user pull-right">
                <span class=""># <?php echo $_SESSION['admin_user'] ?> #</span>
                <a id="logOut" class="pull-right btn btn-sm btn-danger" href="../controller/disconnect.php">Desconectar</a>
            </div>
            
        </div>
    </div>

	<!-- ROW PRODUCTOS -->
    <div class="row">
        <div class="col-md-12">
            <h3>Productos</h3>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class='text-muted'>Item nº</th>
                            <th>ID producto</th>
                            <th>Categoria</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Cantidad</th>
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
                                         </tr>";
                                         $contador_product++;

                                }
                            }
                         ?>
                    </tbody>
                </table>
            <a href="view_admin.php" class="btn btn-success">Atrás</a>
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
