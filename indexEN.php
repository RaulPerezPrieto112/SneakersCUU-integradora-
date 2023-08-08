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
    <title>Home</title>
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
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
    <link rel="shortcut icon" href="images/logo.png">
</head>

<body>

    <?php include('navbarEN.php'); ?>

    <!-- Start home section -->
    <div id="home">
        <!-- Start cSlider -->
        <div id="da-slider" class="da-slider">
            <div class="triangle"></div>
            <!-- mask elemet use for masking background image -->
            <div class="mask"></div>
            <!-- All slides centred in container element -->
            <div class="container">
                <!-- Start first slide -->
                <div class="da-slide">
                    <h2 class="fittext2">Welcome to SneakersCUU</h2>
                    <h4>Get to know us</h4>
                    <div class="da-img">
                        <img src="images/sneakerRojo.png" alt="image01" width="320">
                    </div>
                </div>
                <!-- End first slide -->
                <!-- Start second slide -->


                <div class="da-slide rota-horizontal">
                    <h2>We have everything you need</h2>
                    <h4>and you may need</h4>
                    <div class="da-img">
                        <img src="images/converse.png" width="320" alt="image02">
                    </div>
                </div>
                <!-- End second slide -->
                <!-- Start third slide -->
                <div class="da-slide">
                    <h2>Prices that fit your wallet</h2>
                    <h4>you won’t regret it</h4>
                    <div class="da-img">
                        <img src="images/sneakersNike.png" width="320" alt="image03">
                    </div>
                </div>
                <!-- Start third slide -->
                <!-- Start cSlide navigation arrows -->
                <div class="da-arrows">
                    <span class="da-arrows-prev"></span>
                    <span class="da-arrows-next"></span>
                </div>
                <!-- End cSlide navigation arrows -->
            </div>
        </div>
    </div>
    <!-- End home section -->
    <!-- Service section start -->
    <div class="section primary-section" id="service">
        <div class="container">
            <!-- Start title section -->
            <div class="title">
                <h1>About us</h1>
                <!-- Section's title goes here -->
                <p>We are a company selling sneakers, here you can view our online catalog and get to know us</p>
                <!--Simple description for section goes here. -->
            </div>
            <div class="row-fluid">
                <div class="span4">
                    <div class="centered service">
                        <div class="circle-border zoom-in">
                            <img class="img-circle" src="images/ico/mision.png" alt="service 1">
                        </div>
                        <h3>Mission</h3>
                        <p>To position ourselves as a well-known company that sells sneakers.</p>
                    </div>
                </div>
                <div class="span4">
                    <div class="centered service">
                        <div class="circle-border zoom-in">
                            <img class="img-circle" src="images/ico/vision.png" alt="service 2" />
                        </div>
                        <h3>Vision</h3>
                        <p>To advertise our products, so we can get known as a company.</p>
                    </div>
                </div>
                <div class="span4">
                    <div class="centered service">
                        <div class="circle-border zoom-in">
                            <img class="img-circle" src="images/ico/objetivo.png" alt="service 3">
                        </div>
                        <h3>Objective </h3>
                        <p>To expand our sneakers’ sales by reaching more people.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section secondary-section " id="portfolio">
        <div class="triangle"></div>
        <div class="container">
            <div class=" title">
                <h1>Our catalog</h1>
                <p>Discover our items in stock</p>
            </div>
            <ul class="nav nav-pills">
                <li class="filter" data-filter="all">
                    <a href="#noAction">All</a>
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


                // <!-- Start details for portfolio project 1 -->
                

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
                                    <span>Brand: </span>" . ucwords(strtolower($fila['marca'])) . "
                                </div>
                                <div>
                                    <span>Size: </span>" . $fila['talla'] . "
                                </div>
                                <div>
                                    <span>Price: </span>$" . $fila['precio'] . "
                                </div>
                                <div>
                                    <span>Stock: </span>" . $fila['stock'] . "
                                </div>
                            </div>
                            <p>" . $fila['descripcion'] . "</p>";
                        if (isset($_SESSION['id'])) {
                            echo "<a class='btn btn-warning me-2 pull-right' href='agregar_deseosEN.php?id=" . $fila['id_p'] . "'>Add to wish list</a>";
                        }
                        echo "<br>
                        </div>
                    </div>
                </div>";
                    }
                }
                echo "<ul id='portfolio-grid' class='thumbnails row'>";


                // <!-- End details for portfolio project 1 -->
                
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