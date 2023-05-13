<?php
include('ConexionBD.php');

$Nombre = $_POST['Nombre'];
$Descripcion = $_POST['Descripcion'];
$Stock = $_POST['Stock'];
$PrecioVenta = $_POST['PrecioVenta'];

$conexion = Conectar();

$query = $conexion->prepare("INSERT INTO Producto (Nombre, Descripcion, Stock, PrecioVenta) VALUES (?, ?, ?, ?)");
$query->bind_param('sssd', $Nombre, $Descripcion, $Stock, $PrecioVenta);

$msg = '';
if ($query->execute()) {
    header("location: index.php");
    $msg = 'Producto registrado exitosamente';
} else {
    $msg = 'No se pudo registrar el Producto';
}

Desconectar($conexion);

echo "<div class='container my-5'>";
echo "<h2 class='text-center'>$msg</h2>";
echo "</div>";
?>
