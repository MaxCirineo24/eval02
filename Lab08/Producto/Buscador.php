<?php

$conn = mysqli_connect("localhost", "root", "", "Eval02");


if (!$conn) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}


if (isset($_GET['busqueda'])) {
    $busqueda = $_GET['busqueda'];


    $query = "SELECT * FROM Producto WHERE nombre LIKE '%$busqueda%' OR Descripcion LIKE '%$busqueda%'";
    $result = mysqli_query($conn, $query);


    if (mysqli_num_rows($result) > 0) {
        echo "<div class='container my-5'>";
        echo "<h2 class='text-center mb-5'>Resultados de la búsqueda:</h2>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='card mb-3'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . $row['Nombre'] . "</h5>";
            echo "<p class='card-text'>" . $row['Descripcion'] . "</p>";
            echo "<ul class='list-group list-group-flush'>";
            echo "<li class='list-group-item'>Stock: " . $row['Stock'] . "</li>";
            echo "<li class='list-group-item'>Precio de venta: " . $row['PrecioVenta'] . "</li>";
            echo "</ul>";
            echo "</div>";
            echo "</div>";
        }

        echo "</div>";
    } else {
        echo "<div class='container my-5'>";
        echo "<h2 class='text-center mb-5'>Resultados de la búsqueda:</h2>";
        echo "<p class='text-center'>No se encontraron resultados.</p>";
        echo "</div>";
    }
}

mysqli_close($conn);
?>


<div class="container my-5">
    <div class="card">
        <div class="card-header bg-dark text-white text-center">
            Buscar Productos
        </div>
        <div class="card-body">
            <form action="" method="GET">
                <div class="row mb-3">
                    <div class="col-sm-12">
                        <label for="busqueda" class="form-label">Ingrese el nombre o descripción del producto:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="busqueda" name="busqueda" required>
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
