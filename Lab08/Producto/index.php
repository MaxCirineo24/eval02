<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos - Empresa de Carros</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../style/estilos.css">
</head>

<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Empresa de Carros</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    
    <div class="container my-5">
        <div class="card">
            <div class="card-header bg-dark text-white text-center">
                Agregar Producto
            </div>
            <div class="card-body">
                <form action="Agregar_Producto.php" method="post">
                    <div class="row mb-3">
                        <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre" name="Nombre" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="descripcion" class="col-sm-2 col-form-label">Descripción</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="descripcion" name="Descripcion" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="stock" name="Stock" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="precioventa" class="col-sm-2 col-form-label">Precio de Venta</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="precioventa" name="PrecioVenta" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary">Agregar</button>
                            <button type="reset" class="btn btn-danger">Limpiar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <div class="container my-5">
        <h1 class="text-center mb-5">Lista de Productos</h1>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Precio de Venta</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                include "ConexionBD.php";

                
                $conex = Conectar();

                
                $sql = "SELECT * FROM Producto";
                $query = mysqli_query($conex, $sql);

                
                while ($fila = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?php echo $fila['Nombre'] ?></td>
                        <td><?php echo $fila['Descripcion'] ?></td>
                        <td><?php echo $fila['Stock'] ?></td>
                        <td><?php echo $fila['PrecioVenta'] ?></td>
                        <td>
                            <a href="Editar_Producto.php?id=<?php echo $fila['Producto_id'] ?>" class="btn btn-primary">Editar</a>
                            <a href="Eliminar_Producto.php?id=<?php echo $fila['Producto_id'] ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php
                }

                
                Desconectar($conex);
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-+J5zvJQzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJz" crossorigin="anonymous"></script>
</body>

</html>


