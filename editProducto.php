<?php
    include("conexionBd.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM productos WHERE id = $id";
        $result = mysqli_query($conexion, $query);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $nombre = $row['nombre']; 
            $precio = $row['precio']; 
            $cantidad = $row['cantidad_stock'];
        }
    }


    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];

        $query = "UPDATE productos set nombre = '$nombre', precio = '$precio', cantidad_stock = '$cantidad' WhERE id = '$id'";
        mysqli_query($conexion, $query);

        echo '
        <script>
            alert("Producto actualizado exitosamente");
            window.location = "indexProducto.php"
        </script>
    ';
    }
?>


<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form method="POST" action="editProducto.php?id=<?php echo $_GET['id']; ?>" class="p-3">
                    <div class="form-group m-2">
                        <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Actualiza el Nombre del producto">
                    </div>
                    <div class="form-group m-2">
                        <input type="text" name="precio" value="<?php echo $precio; ?>" class="form-control" placeholder="Actualiza el precio del producto">
                    </div>
                    <div class="form-group m-2">
                        <input type="text" name="cantidad" value="<?php echo $cantidad; ?>" class="form-control" placeholder="Actualiza la cantidad del producto">
                    </div>
                    <button style="width:100%;"class="btn btn-success mt-2" type="submit" name="update">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php")?>