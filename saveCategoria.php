<?php
include("includes/head.php");
include("conexionBd.php");


if(isset($_POST['saveCategoria'])){
    $nombreMarca = $_POST['nombreCategoria'];
    if($nombreMarca == ""){
        echo '
        <script>
            $(document).ready(function(){
                Swal.fire({
                    title: "Debes llenar todos los campos del formulario",
                    icon: "warning"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "indexCategoria.php"
                    }
                });
            });
        </script>   
    ';
    }else{
        $query = "INSERT INTO categorias (nombre) VALUES ('$nombreMarca')";
        $result = mysqli_query($conexion, $query);

        if($result){
            echo '
                <script>
                        $(document).ready(function(){
                            Swal.fire({
                                title: "Categoria Guardada exitosamente",
                                icon: "success"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = "indexCategoria.php"
                                }
                            });
                        });
                </script>  
            ';

        } else {
            echo "Error al guardar la marca";
        }
    }

    
}
?>