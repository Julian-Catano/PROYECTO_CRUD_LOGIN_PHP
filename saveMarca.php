<?php
include("includes/head.php");
include("conexionBd.php");


if(isset($_POST['saveMarca'])){
    $nombreMarca = $_POST['nombreMarca'];
    if($nombreMarca == ""){
        echo '
        <script>
        $(document).ready(function(){
            Swal.fire({
                title: "Debe llenar todos los campos del formulario",
                icon: "warning"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "indexMarca.php"
                }
            });
        });
        </script>   
    ';
    }else{
        $query = "INSERT INTO marcas (nombre) VALUES ('$nombreMarca')";
        $result = mysqli_query($conexion, $query);
    
        if($result){
            echo '
            <script>
                $(document).ready(function(){
                    Swal.fire({
                        title: "Marca Guardada Exitosamente",
                        icon: "success"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "indexMarca.php"
                        }
                    });
                });
            </script>   
        ';
    
        } else {
            echo '
                <script>
                    $(document).ready(function(){
                        Swal.fire({
                            title: "no se pudo guardar correctamente",
                            icon: "error"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = "indexMarca.php"
                            }
                        });
                    });
                </script>   
            ';
        }
    }

}
?>