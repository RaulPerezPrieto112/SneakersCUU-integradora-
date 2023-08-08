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
                <a href="indexEN.php">
                    <img src="images/logo.png" width="60" height="50" alt="Logo" />

                </a>
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <i class="icon-menu"></i>
                </button>
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav" id="top-navigation">

                        <li><a href="index.php"><img src="images/ico/mexico.png" alt=""></a></li>
                        <li><a href="indexEN.php"><img src="images/ico/estados-unidos.png" alt=""></a></li>

                        <li><a href="indexEN.php">Home</a></li>
                        <li><a href="indexEN.php#service">About</a></li>
                        <li><a href="indexEN.php#portfolio">Products</a></li>

                        <?php if (!isset($_SESSION['id'])) {

                            echo "<li><a href='loginEN.php'>Login</a></li>";
                        } else {
                            if ($admin == 1) {
                                echo "<li><a href='productsEN.php'>Edit Products</a></li>";

                            }
                            echo "<li><a href='lista_deseosEN.php'>Wish List</a></li>";
                            echo "<li><a href='configuracion_usuariosEN.php'>Profile</a></li>";
                            echo "<li><a href='logoutEN.php'>Logout</a></li>";
                        }
                        ?>


                    </ul>
                </div>
            </div>
        </div>
    </div>

</body>

</html>