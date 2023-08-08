<?php
include('config.php');

$id = $_GET['id'];

$records = $conn->prepare("DELETE from productos WHERE id_p = $id");
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);
header("Location:products.php");



?>