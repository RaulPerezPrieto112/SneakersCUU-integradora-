<?php
include('config.php');
// Initialize the session
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

$id_p = $_GET['id'];
$id_u = $_SESSION['id'];

$sql = "INSERT INTO deseos (id_u,id_p) VALUES ($id_u,$id_p)";
if ($conn->query($sql) === TRUE) {
    echo "El producto se agregó con éxito";
    header("Location:index.php#portfolio");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>