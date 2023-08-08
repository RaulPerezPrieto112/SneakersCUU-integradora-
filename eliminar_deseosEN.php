<?php

include('config.php');
// Initialize the session
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: loginEN.php");
    exit;
}

$id_p = $_GET['id'];
$id_u = $_SESSION['id'];

$sql = "DELETE FROM deseos WHERE id_u= $id_u AND id_p = $id_p";
if ($conn->query($sql) === TRUE) {
    echo "El producto se quitó con éxito";
    header("Location:lista_deseosEN.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();




?>