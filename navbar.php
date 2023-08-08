<?php
include("config.php");


if (isset($_SESSION['id'])) {
    // rol del usuario 
    $id = $_SESSION["id"];
    $rol = "SELECT rol FROM usuarios WHERE id_u = $id";
    $rol = mysqli_query($conn, $rol);
    $rs = mysqli_fetch_array($rol);
    $admin = $rs['rol'];
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a href="index.php">
                    <img src="images/logo.png" width="60" height="50" alt="Logo" />

                </a>
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <i class="icon-menu"></i>
                </button>
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav" id="top-navigation">

                        <li><a href="index.php"><img src="images/ico/mexico.png" alt=""></a></li>
                        <li><a href="indexEN.php"><img src="images/ico/estados-unidos.png" alt=""></a></li>

                        <li><a href="index.php">pruevba</a></li>
                        <li><a href="index.php#service">Nosotros</a></li>
                        <li><a href="index.php#portfolio">Productos</a></li>

                        <?php if (!isset($_SESSION['id'])) {

                            echo "<li><a href='login.php'>Iniciar sesión</a></li>";
                        } else {
                            if ($admin == 1) {
                                echo "<li><a href='products.php'>Editar Productos</a></li>";

                            }
                            echo "<li><a href='lista_deseos.php'>Lista de deseos</a></li>";
                            echo "<li><a href='configuracion_usuarios.php'>Cuenta</a></li>";
                            echo "<li><a href='logout.php'>Cerrar sesión</a></li>";
                        }
                        ?>


                    </ul>
                </div>
            </div>
        </div>
    </div>

</body>

</html>