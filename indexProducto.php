<?php
include("conexionBd.php");
include("includes/header.php");
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <div class="card card-body">

                <form action="saveProducto.php" method="POST">

                    <div class="form-group p-3">
                        <input type="text" name="title" class="form-control" placeholder="nombre del producto" autofocus>
                    </div>
                    <div class="form-group p-3">
                        <input type="text" name="precio" class="form-control" placeholder="precio del producto" autofocus>
                    </div>
                    <div class="form-group p-3">
                        <input type="text" name="cantidad" class="form-control" placeholder="cantidad stock" autofocus>
                    </div>
                    <div class="form-group p-3">
                    <select class="form-select" id="marca" name="marca">
                        <option value="0">--Seleccione una Opcion</option>
                        <?php
                        include("conexionBd.php");
                        $query = "SELECT id, nombre FROM marcas";
                        $result = mysqli_query($conexion, $query);
                        while($row = mysqli_fetch_assoc($result)): ?>
                         <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                        <?php endwhile; ?>
                    </select>
                    </div>
                    <div class="form-group p-3">
                    <select class="form-select" id="categoria" name="categoria">
                        <option value="0">--Seleccione una Opcion</option>
                        <?php
                        include("conexionBd.php");
                        $query2 = "SELECT id, nombre FROM categorias";
                        $result2 = mysqli_query($conexion, $query2);

                        while($row2 = mysqli_fetch_assoc($result2)): ?>
                         <option value="<?php echo $row2['id']; ?>"><?php echo $row2['nombre']; ?></option>
                        <?php endwhile; ?>
                    </select>
                    </div>
                    <input type="submit" class="btn btn-success mt-4" style="width: 100%;" name="save_product" value="Guardar Producto">
                </form>

            </div>

        </div>
        <div class="col-md-8">

                            
            <?php
                include("conexionBd.php");
                $query3 = "SELECT * FROM productos";
                $result2 = mysqli_query($conexion, $query3);
                
                echo "<table class='table table-striped table-bordered'>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>Nombre</th>
                    <th scope='col'>Precio</th>
                    <th scope='col'>Cantidad en Stock</th>
                    <th scope='col'>Marca ID</th>
                    <th scope='col'>Categoría ID</th>
                    <th scope='col'>Acciones</th>
                </tr>";

                // este ciclo itera sobre cada uno de los elementos de la tabla en la base de datos y los va imprimiendo bro
                
                while($row = mysqli_fetch_assoc($result2)) {
                    echo "<tr>";
                    echo "<td scope = 'row'>" . $row['id'] . "</td>";
                    echo "<td scope = 'row'>" . $row['nombre'] . "</td>";
                    echo "<td scope = 'row'>" . $row['precio'] . "</td>";
                    echo "<td scope = 'row'>" . $row['cantidad_stock'] . "</td>";
                    echo "<td scope = 'row'>" . $row['marca_id'] . "</td>";
                    echo "<td scope = 'row'>" . $row['categoria_id'] . "</td>";
                    echo '<td class="d-flex p-2"><a class="btn btn-warning m-1" href="editProducto.php?id=' . $row["id"] . '"><i class="fa-solid fa-file-pen"></i></a> <a class="btn btn-danger m-1" href="deleteProducto.php?id=' . $row["id"] . '"><i class="fa-solid fa-trash"></i></a></td>';
                    echo "</tr>";
                }
                
                echo "</table>";
            ?>
                                

        </div>
    </div>
</div> 



<?php
include("includes/footer.php");
?>










