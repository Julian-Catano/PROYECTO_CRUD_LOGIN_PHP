<?php
    include("includes/head.php");
    include("conexionBd.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query ="DELETE FROM marcas WHERE id = $id";

        $resultado = mysqli_query($conexion, $query);
        if($resultado){
            echo '
                <script>
                    $(document).ready(function(){
                        Swal.fire({
                            title: "Marca eliminado Exitsamente",
                            icon: "success"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = "indexMarca.php"
                            }
                        });
                    });
                </script>   
            ';
        }else{
            echo '
                <script>
                    $(document).ready(function(){
                        Swal.fire({
                            title: "No se pudo eliminar, intentelo nuevamente",
                            icon: "success"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = "indexMarca.php"
                            }
                        });
                    });
                </script>   
            ';
        }
    };
    

?>