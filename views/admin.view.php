<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Administrador</title>
</head>

<body class="bg-secondary">
    <header>
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
            <a class="navbar-brand" href="admin.php">Administrador</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            </div>
            <ul class="nav navbar-nav navbar-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Opciones
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="admin.php">Inicio</a>
                        <a class="dropdown-item" href="productos.php">Productos</a>
                        <a class="dropdown-item" href="categorias.php">Categorias</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="cerrarSesion.php">Logout</a>
                    </div>
                </div>
            </ul>
        </nav>
    </header>
    <div class="container">
        <br>
        <div class="container-xl">
            <!-- Editable table -->
            <div class="card">
                <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Estadisticas</h3>
                <div class="card-body">
                    <div id="table" class="table-editable">
                        <table class="table table-bordered table-responsive-md table-striped text-center table-dark"
                            id="example">
                            <thead>
                                <tr>
                                    <th class="text-center">Cantidad de Clientes Registrados</th>
                                    <th class="text-center">Cantidad de productos unicos vendidos</th>
                                    <th class="text-center">Cantidad de productos totales vendidos</th>
                                    <th class="text-center">Monto total de ventas</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="pt-3-half"><?php echo cantidadUsuarios()['cantidad'] ?></td>
                                    <td class="pt-3-half"><?php echo cantidadProductosVendidosUnicos()['cantidad'] ?></td>
                                    <td class="pt-3-half"><?php echo cantidadProductosVendidosTotal()['cantidad'] ?></td>
                                    <td class="pt-3-half"><?php echo totalVentas()['total'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>