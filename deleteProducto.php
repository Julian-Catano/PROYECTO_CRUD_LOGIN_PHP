<?php
    include("includes/head.php");
    include("conexionBd.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query ="DELETE FROM productos WHERE id = $id";
        $resultado = mysqli_query($conexion, $query);
        if(!$resultado){
            echo '
            <script>
                alert("Error no se pudo eliminar");
                window.location = "indexProducto.php"
            </script>
        ';
        }
        echo '
            <script>
            $(document).ready(function(){
                Swal.fire({
                    title: "Producto Eliminado exitosamente",
                    icon: "success"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "indexProducto.php"
                    }
                  });
            });
            </script>   
        ';
    }

?>