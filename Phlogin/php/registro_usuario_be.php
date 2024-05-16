<?php
    include("../../includes/head.php");
    include '../../conexionBd.php';

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    if($nombre_completo == "" || $correo == "" || $usuario == "" || $contrasena == "" ){

        echo '
            <script>
            $(document).ready(function(){
                Swal.fire({
                    title: "Debe llenar todos los campos del formulario",
                    icon: "warning"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "../inicio.php"
                    }
                });
            });
            </script>   
        ';

    }else{

    $query = "INSERT INTO tblusuarios(nombre_completo, correo, usuario, contrasena) VALUES('$nombre_completo','$correo','$usuario','$contrasena')";
    
    //verificar que el correo no se repita en la base de datos

    
    
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM tblusuarios where correo ='$correo' ");
    if(mysqli_num_rows($verificar_correo) > 0){

        echo '
            <script>
            $(document).ready(function(){
                Swal.fire({
                    title: "el correo ya esta en uso, intentalo con uno diferente",
                    icon: "warning"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "../inicio.php"
                    }
                });
            });
            </script>  
        ';
        
        exit();

    }
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM tblusuarios where usuario ='$usuario' ");
    if(mysqli_num_rows($verificar_usuario) > 0){

        echo '
            <script>
            $(document).ready(function(){
                Swal.fire({
                    title: "el usuario ya esta en uso, intentalo con uno diferente",
                    icon: "warning"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "../inicio.php"
                    }
                });
            });
            </script>  
        ';
        
        exit();

    }
    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
            $(document).ready(function(){
                Swal.fire({
                    title: "te has Registrado exitosamente",
                    icon: "success"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "../inicio.php"
                    }
                });
            });
            </script>  
        ';
        
    }else{
        echo '
            <script>
                alert("intentalo de nuevo, hubo un error");
                window.location = "../inicio.php";
            </script>
        ';
    }

    mysqli_close($conexion);

    }

    
    