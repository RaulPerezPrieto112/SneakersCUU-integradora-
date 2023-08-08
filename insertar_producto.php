<?php
include("config.php");
// Initialize the session
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {




    $nombre = $_POST["nombre"];
    $marca = $_POST["marca"];
    $id_m = "";
    $talla = $_POST["talla"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];
    $descripcion = $_POST["descripcion"];

    do {
        $sql = "SELECT id_m FROM marcas WHERE nombre = '$marca'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if (mysqli_num_rows($result) == 1) {
            $sql = "SELECT id_m FROM marcas WHERE nombre = '$marca'";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $fila = mysqli_fetch_assoc($result);
            $id_m = $fila['id_m'];
        } else {
            $sql = "INSERT INTO marcas(nombre) VALUES ('$marca')";
            $conn->query($sql);
        }
    } while (empty($id_m));

    if (isset($_POST['submit'])) {
        $archivo = $_FILES['imagen']['name'];
        if (isset($archivo) && $archivo != "") {
            $tipo = $_FILES['imagen']['type'];
            $tamano = $_FILES['imagen']['size'];
            $temp = $_FILES['imagen']['tmp_name'];
            //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
            if (!(strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png"))) {
                echo '<div><b>Error. La extensión o de los archivos no es correcta.<br/>
             - Se permiten archivos .gif, .jpg, .png.</b></div>';
            } else {
                //Si la imagen es correcta en tamaño y tipo
                //Se intenta subir al servidor
                $img = uniqid() . $archivo;
                if (move_uploaded_file($temp, 'images/uploads/' . $img)) {
                    //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                    chmod('images/uploads/' . $img, 0777);
                    //Mostramos el mensaje de que se ha subido co éxito
                } else {
                    //Si no se ha podido subir la imagen, mostramos un mensaje de error
                    echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                }
            }
        }




        //Insertar imagen en la base de datos
        $sql = "INSERT INTO productos(nombre, marca_id, talla, descripcion, precio, stock, img) VALUES ('$nombre', '$id_m', $talla, '$descripcion', $precio, $stock, '$img')";
        // COndicional para verificar la subida del fichero
        if ($conn->query($sql) === TRUE) {
            echo "Producto registrado exitosamente";
            header("location: products.php");
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<!--
 * A Design by GraphBerry
 * Author: GraphBerry
 * Author URL: http://graphberry.com
 * License: http://graphberry.com/pages/license
-->
<html lang="en">

<head>
    <meta charset=utf-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar producto</title>
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
    <link rel="shortcut icon" href="images/logo.png"></head>

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
                        <li><a href="javascript: history.go(-1)">Regresar</a></li>
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
                <h1>Agregar productos</h1>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <form id="formAccountSettings" method="POST"
                        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                        <div class="row2">
                            <div class="mb-3 col-md-6">
                                <label for="nombre" class="form-label">Nombre del producto</label>
                                <input class="form-control" type="text" id="" name="nombre" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="marca" class="form-label">Marca</label>
                                <input class="form-control" type="text" name="marca" id="" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="talla" class="form-label">Talla</label>
                                <input class="form-control" type="text" name="talla" id="" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="precio" class="form-label">Precio</label>
                                <input class="form-control" type="text" name="precio" id="" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="stock" class="form-label">Número de existencias</label>
                                <input class="form-control" type="text" name="stock" id="" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="imagen" class="form-label">Seleccione una imagen</label>
                                <input class="form-control" type="file" name="imagen" id="imagen" />
                            </div>

                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" name="descripcion" id=""></textarea>
                            </div>

                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2" name="submit">Agregar producto</button>
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