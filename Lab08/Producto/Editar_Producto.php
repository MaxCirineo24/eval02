<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "Eval02";

$conn = mysqli_connect($host, $username, $password, $database);


if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}


$id = $_GET['id'];


$query = "SELECT * FROM Producto WHERE Producto_id = $id";
$resultado = mysqli_query($conn, $query);
$Producto = mysqli_fetch_assoc($resultado);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $Nombre = $_POST['Nombre'];
    $Descripcion = $_POST['Descripcion'];
    $Stock = $_POST['Stock'];
    $PrecioVenta = $_POST['PrecioVenta'];

    
    $query = "UPDATE Producto SET Nombre = '$Nombre', Descripcion = '$Descripcion', Stock = $Stock, PrecioVenta = $PrecioVenta WHERE Producto_id = $id";
    if (mysqli_query($conn, $query)) {
        
        header("location: index.php");
    } else {
        echo "Error al actualizar el producto: " . mysqli_error($conn);
    }
}


mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>
    <form method="POST">
        <label for="Nombre">Nombre:</label>
        <input type="text" name="Nombre" value="<?php echo $Producto['Nombre']; ?>"><br><br>
        
        <label for="Descripcion">Descripción:</label>
        <input type="text" name="Descripcion" value="<?php echo $Producto['Descripcion']; ?>"><br><br>
        
        <label for="Stock">Stock:</label>
        <input type="number" name="Stock" value="<?php echo $Producto['Stock']; ?>"><br><br>
        
        <label for="PrecioVenta">Precio de Venta:</label>
        <input type="number" step="0.01" name="PrecioVenta" value="<?php echo $Producto['PrecioVenta']; ?>"><br><br>
        
        <button type="submit">Guardar cambios</button>
    </form>
</body>
</html>


