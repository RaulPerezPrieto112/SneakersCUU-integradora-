<?php

include("config.php");
session_start();

if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $id_p = $_POST['id'];
    $marca = $_POST['marca'];
    $talla = $_POST['talla'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $id_m = "";
    $archivo = $_FILES['imagen']['name'];
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
                $sql = "UPDATE productos SET img = '$img'
                           WHERE id_p='$id_p'";
                $result = mysqli_query($conn, $sql) or die(mysqli_error());


            } else {
                //Si no se ha podido subir la imagen, mostramos un mensaje de error
                echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';

            }
        }
    }
    $sql = "UPDATE productos SET  nombre='$nombre', marca_id='$id_m',
                           talla='$talla', descripcion='$descripcion', precio='$precio', stock='$stock'
                           WHERE id_p='$id_p'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error());

    // COndicional para verificar la subida del fichero
    if ($result) {
        echo "Producto registrado exitosamente";
        header("location: products.php");
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }


}


?>