<?php
    include("../../includes/head.php");
    include '../../conexionBd.php';
    

    $correo_inicio = $_POST['correo_inicio'];
    $contrasena_inicio = $_POST['contrasena_inicio'];
    $query2 = "SELECT * FROM tblusuarios WHERE correo = '$correo_inicio' AND contrasena = '$contrasena_inicio'";
    
    $resultado = mysqli_query($conexion, $query2);
      
        if (mysqli_num_rows($resultado) > 0) {
            echo '
                <script>
                    //alert("sesion iniciada correctamente");
                    window.location = "../../index.php"
                </script>   
            ';
            session_start();
                $_SESSION['correo'] = $correo_inicio;
        }else{
            echo '
                <script>
                $(document).ready(function(){
                    Swal.fire({
                        title: "correo o contraseña incorrectos, vuelve a intentarlo",
                        icon: "warning"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "../inicio.php"
                        }
                      });
                });
                </script>   
            ';
        }


        mysqli_close($conexion);
      


?>