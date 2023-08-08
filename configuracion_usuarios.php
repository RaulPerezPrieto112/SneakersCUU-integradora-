<?php
include("config.php");
// Initialize the session
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: login.php");
  exit;
}

$id = $_SESSION["id"];
$sql = "SELECT usuario, id_u FROM usuarios WHERE id_u = $id";
$resultado = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$fila = mysqli_fetch_assoc($resultado);

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
  <title>Configuración de la cuenta</title>
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
  <script>
    function validateForm() {
      var x = document.forms["eliminar"]["accountActivation"].value;
      if (x == null || x == "") {
        alert("Name must be filled out");
        return false;
      }
    }
  </script>
</head>

<body>

  <?php include('navbar.php'); ?>

  <div class="section secondary-section " id="portfolio">
    <div class="triangle"></div>
    <div class="container">
      <div class=" title">
        <h1>Configuración de cuenta</h1>
      </div>
      <div class="card mb-4">
        <div class="card-body">
          <form id="formAccountSettings" method="POST" action="actualizar_usuarios.php">
            <div class="row2">


              <input class="form-control" type="hidden" id="" name="id" value="<?php echo $fila['id_u']; ?>" />

              <div class="mb-3 col-md-6">
                <label for="usuario" class="form-label">Usuario</label>
                <input class="form-control" type="text" id="" name="username" value="<?php echo $fila['usuario']; ?>"
                  disabled />
              </div>

              <div class="mb-3 col-md-6">

                <label for="password" class="form-label">Nueva contraseña</label>
                <input class="form-control" type="password" name="new_password" id="" placeholder="Contraseña" />
              </div>
              <div class="mb-3 col-md-6">
                <label for="cpassword" class="form-label">Confirme su nueva contraseña</label>
                <input class="form-control" type="password" name="confirm_password" id="" placeholder="Contraseña" />
              </div>
            </div>
            <div class="mt-2">
              <button type="submit" class="btn btn-primary me-2">Guardar cambios</button>
              <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
            </div>
          </form>
        </div>
        <!-- /Account -->
      </div>
      <div class="card">
        <h4 class="card-header">Eliminar cuenta</h4>
        <div class="card-body">
          <form name="eliminar" id="formAccountDeactivation" action="eliminar_usuarios.php"
            onsubmit="return validateForm()">
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation"
                required />
              <label class="form-check-label" for="accountActivation">Confirmo que quiero eliminar mi cuenta</label>
            </div>
            <button type="submit" class="btn btn-danger">Eliminar cuenta</button>
          </form>
        </div>
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