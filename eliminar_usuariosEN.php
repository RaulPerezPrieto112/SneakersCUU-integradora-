<?php
include("config.php");
// Initialize the session
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: loginEN.php");
    exit;
}

$id = $_SESSION["id"];
$sql = "CALL eliminar_u ($id)";
$result = mysqli_query($conn, $sql) or die(mysqli_error());
session_destroy();
header("location: registerEN.php");
exit();
?>