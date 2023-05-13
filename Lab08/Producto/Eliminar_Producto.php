<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "Eval02";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}


$id = $_REQUEST['id'];


$query = "DELETE FROM Producto WHERE Producto_id='$id'";
if (mysqli_query($conn, $query)) {

    header("location: index.php");
} else {
    echo "Error al eliminar el producto: " . mysqli_error($conn);
}


mysqli_close($conn);
?>
