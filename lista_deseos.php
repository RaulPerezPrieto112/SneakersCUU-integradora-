<?php
include("config.php");
// Initialize the session
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

$id_u = $_SESSION['id'];
$query = "SELECT DISTINCT id_p FROM deseos WHERE id_u = $id_u";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Lista de deseos</title>
    <!-- Load Roboto font -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet'
        type='text/css'>
    <!-- Load css styles -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/pluton.css" />
    <!--[if IE 7]>
                    <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
                <![endif]-->
    <link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
    <link rel="stylesheet" type="text/css" href="css/animate.css" />
    <link rel="stylesheet" type="text/css" href="css/styleshop.css" />
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
    <link rel="shortcut icon" href="images/logo.png">
</head>

<body>

    <?php include('navbar.php'); ?>

    <!-- Section-->
    <section class="section secondary-section " id="portfolio">
        <div class="triangle"></div>
        <div class="container">
            <div class=" title">
                <h1>Lista de deseos</h1>
            </div>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id_p = $row['id_p'];
                        $sql = "SELECT nombre, precio, id_p, img FROM productos WHERE id_p = $id_p";
                        $resultado = $conn->query($sql);
                        $fila = mysqli_fetch_assoc($resultado);
                        echo "<div class='col mb-5'>";
                        echo "<div class='card h-100'>";
                        echo "<img class='card-img-top' src='images/uploads/" . $fila['img'] . "' alt='Imagen no encontrada' />";

                        echo "<div class='card-body p-4'>";
                        echo "<div class='text-center'>";
                        echo "<h5 class='fw-bolder'>" . $fila['nombre'] . "</h5>";
                        echo "$" . $fila['precio'];
                        echo "</div>";
                        echo "</div>";
                        echo "<div
                            class='mt-2 card-footer p-4 pt-0 border-top-0 bg-transparent text-center row-cols-auto row-cols-md-auto row-cols-xl-auto'>";
                        echo "<a class='btn btn-primary me-2' href='eliminar_deseos.php?id=" . $fila['id_p'] . "'>Eliminar</a>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                ?>

            </div>
        </div>
    </section>
    <div class="scrollup">
        <a href="#">
            <i class="icon-up-open"></i>
        </a>
    </div>

    <?php include('footer.php'); ?>

    <!-- ScrollUp button end -->
    <!-- Include javascript -->
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.mixitup.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/modernizr.custom.js"></script>
    <script type="text/javascript" src="js/jquery.bxslider.js"></script>
    <script type="text/javascript" src="js/jquery.cslider.js"></script>
    <script type="text/javascript" src="js/jquery.placeholder.js"></script>
    <script type="text/javascript" src="js/jquery.inview.js"></script>
    <!-- Load google maps api and call initializeMap function defined in app.js -->
    <script async="" defer="" type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=initializeMap"></script>
    <!-- css3-mediaqueries.js for IE8 or older -->
    <!--[if lt IE 9]>
            <script src="js/respond.min.js"></script>
        <![endif]-->
    <script type="text/javascript" src="js/app.js"></script>
</body>

</html>