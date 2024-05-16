<?php
    include("includes/head.php");
    include("conexionBd.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query ="DELETE FROM categorias WHERE id = $id";

        $resultado = mysqli_query($conexion, $query);
        if($resultado){
            echo '
                <script>
                    $(document).ready(function(){
                        Swal.fire({
                            title: "Categoria eliminada exitosamente",
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
        else{
            echo '
                <script>
                    $(document).ready(function(){
                        Swal.fire({
                            title: "No se pudo eliminar, intentelo nuevamente",
                            icon: "error"
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