
<?php
include("includes/head.php");
include("conexionBd.php");
    if(isset($_POST['save_product'])){
        $nombre_producto = $_POST['title'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $marca = $_POST['marca'];
        $categoria = $_POST['categoria'];

        if($nombre_producto == "" || $precio == "" || $cantidad == "" || $marca == 0 || $categoria == 0 ){
            echo '
            <script>
            $(document).ready(function(){
                Swal.fire({
                    title: "Debe llenar todos los campos del formulario",
                    icon: "warning"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "indexProducto.php"
                    }
                });
            });
            </script>   
        ';
        }
        else {
            $query = "INSERT INTO productos(nombre, precio, cantidad_stock, marca_id, categoria_id) VALUES ('$nombre_producto', '$precio', '$cantidad', '$marca', '$categoria' )";
        
            $result = mysqli_query($conexion, $query);

            if(!$result){
                die("query failed");
            }else{
                echo '
                <script>
                $(document).ready(function(){
                    Swal.fire({
                        title: "Producto guardado exitosamente",
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
        }


        
    }

?>