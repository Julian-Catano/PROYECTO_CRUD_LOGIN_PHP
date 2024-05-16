<?php include("includes/header.php")?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <div class="card card-body">

                <form action="saveCategoria.php" method="POST" class="form-group">
                    <div class="form-group p-3">
                    <input type="text" class="form-control " name="nombreCategoria" placeholder="Categoria" autofocus>
                    </div>
                    <button type="submit" class="btn btn-success" style="width:100%;" name="saveCategoria">Guardar Categoria</button>
                </form>

            </div>

        </div>
        <div class="col-md-8">

                            
            <?php
                include("conexionBd.php");
                $query3 = "SELECT * FROM categorias";
                $result2 = mysqli_query($conexion, $query3);
                
                echo "<table class='table table-striped table-bordered'>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>Nombre</th>
                    <th scope='col'>Acciones</th>
                </tr>";

                // este ciclo itera sobre cada uno de los elementos de la tabla en la base de datos y los va imprimiendo bro
                
                while($row = mysqli_fetch_assoc($result2)) {
                    echo "<tr>";
                    echo "<td scope = 'row'>" . $row['id'] . "</td>";
                    echo "<td scope = 'row'>" . $row['nombre'] . "</td>";
                    echo '<td class="d-flex p-2 "><a class="btn btn-warning m-1" href="editCategoria.php?id=' . $row["id"] . '"><i class="fa-solid fa-file-pen"></i></a> <a class="btn btn-danger m-1" href="deleteCategoria.php?id=' . $row["id"] . '"><i class="fa-solid fa-trash"></i></a></td>';
                    echo "</tr>";
                }
                
                echo "</table>";
            ?>
                                

        </div>
    </div>
</div>
