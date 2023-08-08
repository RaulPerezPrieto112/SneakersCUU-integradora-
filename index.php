<?php
include("config.php");
session_start();
$sql = "SELECT P.*, M.nombre AS marca FROM productos AS P LEFT JOIN marcas AS M ON M.id_m = P.marca_id";
$resultado = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset=utf-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet'
        type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/pluton.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
    <link rel="stylesheet" type="text/css" href="css/animate.css" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
    <link rel="shortcut icon" href="images/logo.png">
</head>
<body>
    <?php include('navbar.php'); ?>
    <div id="home">
        <div id="da-slider" class="da-slider mb-5">
            <div class="triangle"></div>
            <div class="mask"></div>
            <div class="container">
                <div class="da-slide">
                    <h2 class="">Bienvenido a SneakersCUU</h2>
                    <h4>Conócenos</h4>
                    <div class="da-img">
                        <img src="images/sneakerRojo.png" alt="image01" width="320">
                    </div>
                </div>
                <div class="da-slide rota-horizontal">
                    <h2>Tenemos todo lo que necesitas</h2>
                    <h4>y podrías necesitar</h4>
                    <div class="da-img">
                        <img src="images/converse.png" width="320" alt="image02">
                    </div>
                </div>
                <div class="da-slide">
                    <h2>Precios que se ajustan a tu bolsillo</h2>
                    <h4>no te arrepentirás</h4>
                    <div class="da-img">
                        <img src="images/sneakersNike.png" width="320" alt="image03">
                    </div>
                </div>
                <div class="da-arrows">
                    <span class="da-arrows-prev"></span>
                    <span class="da-arrows-next"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="section primary-section" id="service">
        <div class="container">
            <div class="title">
                <h1>Sobre nosotros</h1>
                <p>Somos una empresa de venta de sneakers, aquí puede ver nuestro catálogo online y saber un poco sobre
                    nosotros.</p>
            </div>
            <div class="row-fluid">
                <div class="span4">
                    <div class="centered service">
                        <div class="circle-border zoom-in">
                            <img class="img-circle" src="images/ico/mision.png" alt="service 1">
                        </div>
                        <h3>Misión</h3>
                        <p>Situarnos como una empresa reconocida en la venta de sneakers.</p>
                    </div>
                </div>
                <div class="span4">
                    <div class="centered service">
                        <div class="circle-border zoom-in">
                            <img class="img-circle" src="images/ico/vision.png" alt="service 2" />
                        </div>
                        <h3>Visión</h3>
                        <p>Publicitar los productos para poder ser conocidos como empresa.</p>
                    </div>
                </div>
                <div class="span4">
                    <div class="centered service">
                        <div class="circle-border zoom-in">
                            <img class="img-circle" src="images/ico/objetivo.png" alt="service 3">
                        </div>
                        <h3>Objetivo</h3>
                        <p>Expandir la venta de los sneakers llegando a más personas.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section secondary-section " id="portfolio">
        <div class="triangle"></div>
        <div class="container">
            <div class=" title">
                <h1>Nuestro catálogo</h1>
                <p>Conoce nuestros productos en existencia</p>
            </div>
            <ul class="nav nav-pills">
                <li class="filter" data-filter="all">
                    <a href="#noAction">Todo</a>
                </li>
                <?php
                $select = "SELECT DISTINCT P.marca_id, M.nombre AS marca FROM productos AS P INNER JOIN marcas AS M ON M.id_m = P.marca_id";
                $result = $conn->query($select);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li class='filter' data-filter='" . $row['marca_id'] . "'>
                        <a href='#noAction'>" . ucwords(strtolower($row['marca'])) . "</a>";
                        echo "</li>";
                    }
                }
                echo "</ul>";
                echo "<div id='single-project'>";
                $resultado = $conn->query($sql);

                if ($resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<div id='slidingDiv" . $fila['id_p'] . "' class='toggleDiv row-fluid single-project'>
                <div class='span6'>
                        <img src='images/uploads/" . $fila['img'] . "' alt='Imagen no encontrada' />
                    </div>
                    <div class='span6'>
                        <div class='project-description'>
                            <div class='project-title clearfix'>
                                <h3>" . $fila['nombre'] . "</h3>
                                <span class='show_hide close'>
                                    <i class='icon-cancel'></i>
                                </span>
                            </div>
                            <div class='project-info'>
                                <div>
                                    <span>Marca: </span>" . ucwords(strtolower($fila['marca'])) . "
                                </div>
                                <div>
                                    <span>Talla: </span>" . $fila['talla'] . "
                                </div>
                                <div>
                                    <span>Precio: </span>$" . $fila['precio'] . "
                                </div>
                                <div>
                                    <span>No. de existencias: </span>" . $fila['stock'] . "
                                </div>
                            </div>
                            <p>" . $fila['descripcion'] . "</p>";
                        if (isset($_SESSION['id'])) {
                            echo "<a class='btn btn-warning me-2 pull-right' href='agregar_deseos.php?id=" . $fila['id_p'] . "'>Agregar a la lista de deseos</a>";
                        }
                        echo "<br>
                        </div>
                    </div>
                </div>";
                    }
                }
                echo "<ul id='portfolio-grid' class='thumbnails row'>";
                $resultado = $conn->query($sql);
                if ($resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<li class='span4 mix " . $fila['marca_id'] . "'>
                        <div class='thumbnail'>
                            <img src='images/uploads/" . $fila['img'] . "' alt='Producto " . $fila['id_p'] . "'/>
                            <a href='#single-project' class='more show_hide' rel='#slidingDiv" . $fila['id_p'] . "'>
                                <i class='icon-plus'></i></a>
                            <h3>" . $fila['nombre'] . "</h3>
                            <p>$" . $fila['precio'] . "</p>
                            <div class='mask'></div>
                        </div>
                    </li>";
                    }
                }
                ?>

            </ul>
        </div>
    </div>
    </div>

    <div class="scrollup">
        <a href="#">
            <i class="icon-up-open"></i>
        </a>
    </div>


    <?php include('footer.php') ?>
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.mixitup.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/modernizr.custom.js"></script>
    <script type="text/javascript" src="js/jquery.bxslider.js"></script>
    <script type="text/javascript" src="js/jquery.cslider.js"></script>
    <script type="text/javascript" src="js/jquery.placeholder.js"></script>
    <script type="text/javascript" src="js/jquery.inview.js"></script>
    <script async="" defer="" type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=initializeMap"></script>
    <script type="text/javascript" src="js/app.js"></script>
</body>

</html>