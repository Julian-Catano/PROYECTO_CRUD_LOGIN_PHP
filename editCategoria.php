<?php
    include("includes/head.php");
    include("conexionBd.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM categorias WHERE id = $id";
        $result = mysqli_query($conexion, $query);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $nombre = $row['nombre']; 
        }
    }


    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        if($nombre == ""){
            echo '
                <script>
                    $(document).ready(function(){
                        Swal.fire({
                            title: "Debes Llenar todos los campos del formulario",
                            icon: "warning"
                        });
                    });
                </script>   
            ';
        }else{
            $query = "UPDATE categorias set nombre = '$nombre' WhERE id = '$id'";
            mysqli_query($conexion, $query);

            echo '
            
            <script>
                $(document).ready(function(){
                    Swal.fire({
                        title: "Categoria actualizada correctamente",
                        icon: "success"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "indexCategoria.php"
                        }
                    });
                });
            </script>
            
            ';
            
        }

        
    
    }
?>


<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form method="POST" action="editCategoria.php?id=<?php echo $_GET['id']; ?>" class="p-3">
                    <div class="form-group m-2">
                        <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Actualiza el Nombre de la categoria">
                    </div>
                    <button style="width:100%;"class="btn btn-success mt-2" type="submit" name="update">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php")?>