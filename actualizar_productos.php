<?php
include('config.php');

session_start();

$id = $_GET['id'];

$sql = "SELECT * FROM productos WHERE id_p= $id";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($result);
$marca_id = $row['marca_id'];

$query = "SELECT nombre FROM marcas WHERE id_m =$marca_id";
$resultado = mysqli_query($conn, $query) or die(mysqli_error($conn));
$fila = mysqli_fetch_assoc($resultado);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset=utf-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar producto</title>
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
    <link rel="stylesheet" type="text/css" href="css/conf.css" />

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
    <link rel="shortcut icon" href="images/logo.png">
</head>

<body>

    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a href="#">
                    <img src="images/logo.png" width="60" height="50" alt="Logo" />
                    <!-- This is website logo -->
                </a>
                <!-- Navigation button, visible on small resolution -->
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <i class="icon-menu"></i>
                </button>
                <!-- Main navigation -->
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav" id="top-navigation">
                        <li><a href="products.php">Regresar</a></li>
                    </ul>
                </div>
                <!-- End main navigation -->
            </div>
        </div>
    </div>

    <div class="section secondary-section " id="portfolio">
        <div class="triangle"></div>
        <div class="container">
            <div class=" title">
                <h1>Editar producto</h1>
            </div>
            <div class="card mb-4">


                <div class="card-body">
                    <form id="formAccountSettings" method="POST" action="editar_producto.php"
                        enctype="multipart/form-data">
                        <div class="row2">

                            <input class="form-control" type="hidden" id="" name="id"
                                value="<?php echo $row['id_p'] ?>" />
                            <div class="mb-3 col-md-6">
                                <label for="nombre" class="form-label">Nombre del producto</label>
                                <input class="form-control" type="text" id="" name="nombre"
                                    value="<?php echo $row['nombre'] ?>" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="marca" class="form-label">Marca</label>
                                <input class="form-control" type="text" name="marca" id=""
                                    value="<?php echo ucwords(strtolower($fila['nombre'])) ?>" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="talla" class="form-label">Talla</label>
                                <input class="form-control" type="text" name="talla" id=""
                                    value="<?php echo $row['talla'] ?>" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="precio" class="form-label">Precio</label>
                                <input class="form-control" type="text" name="precio" id=""
                                    value="<?php echo $row['precio'] ?>" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="stock" class="form-label">Número de existencias</label>
                                <input class="form-control" type="text" name="stock" id=""
                                    value="<?php echo $row['stock'] ?>" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="imagen" class="form-label">Seleccione una imagen</label>
                                <input class="form-control" type="file" name="imagen" id="imagen" />
                            </div>

                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" name="descripcion"
                                    id=""><?php echo $row['descripcion'] ?></textarea>
                            </div>

                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2" name="submit">Actualizar
                                producto</button>
                            <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>

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