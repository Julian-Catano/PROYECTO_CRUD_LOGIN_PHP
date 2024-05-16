<!DOCTYPE html>
<html lang="en">
<?php
    include("includes/head.php");
?>
<body>
    <?php
            session_start();

            if(!isset($_SESSION['correo'])){
                header("Location: Phlogin/inicio.php");
                exit();
            }
    ?>
    <header class="navbar navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand" href="index.php">TIENDA J</a>
            <div>
                <a class="navbar-brand" href="indexProducto.php">PRODUCTOS |</a>
                <a class="navbar-brand" href="indexMarca.php">MARCAS |</a>
                <a class="navbar-brand" href="indexCategoria.php">CATEGORIA |</a>
                <a class="navbar-brand" href="Phlogin/logout.php">CERRAR SESIÓN</a>
            </div>

        </div>

    </header>