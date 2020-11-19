<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <title>Tienda</title>
</head>

<body class="bg-secondary">
    <header>
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
            <a class="navbar-brand" href="cliente.php">E-Shop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class=" nav navbar-nav mr-auto navbar-left">
                </ul>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="carrito.php">
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-cart4" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                        </svg>
                        Carrito(<?php echo empty($_SESSION['CARRITO']) ? 0 : count($_SESSION['CARRITO']); ?>)
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Estadisticas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cerrarSesion.php">Salir</a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <br>
        <h3>Lista del Carrito</h3>
        
        <?php if (!empty($_SESSION['CARRITO'])) { ?>
        <table class="table table-dark table-bordered text-center">
            <tbody>
                <tr>
                    <th with="40%">Descripcion</th>
                    <th with="40%">Cantidad</th>
                    <th with="40%">Precio</th>
                    <th with="40%">Total</th>
                    <th with="5%">--</th>
                </tr>
                <?php $total=0; ?>
                <?php foreach($_SESSION['CARRITO'] as $indice=>$producto) : ?>
                <tr>
                    <td with="40%"><?php echo $producto['nombre']; ?></td>
                    <td with="40%"><?php echo $producto['cantidad']; ?></td>
                    <td with="40%"><?php echo $producto['precio']; ?></td>
                    <td with="40%"><?php echo number_format($producto['precio'] * $producto['cantidad'] , 0) ?></td>

                    <td with="5%">
                        <form action="" method="post">
                            <input type="hidden" name="id" id="id"
                                value="<?php echo openssl_encrypt($producto['id'],COD,KEY); ?>">
                            <button class="btn btn-danger" type="submit" name="btnEliminar"
                                value="eliminar">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php $total = $total + ($producto['precio'] * $producto['cantidad']); ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3" align="right">
                        <h3>Total</h3>
                    </td>
                    <td align="center">
                        <h3>$<?php echo number_format($total, 0) ?></h3>
                    </td>
                    <td><form action="" method="post">
                            <button class="btn btn-success" type="submit" name="btnPagar"
                                value="pagar">Pagar</button>
                        </form></td>
                </tr>
            </tbody>
        </table>
        <?php }else{ ?>
        <div class="alert alert-success" role="alert">
            No hay productos en el carrito
        </div>
        <?php } ?>

    </div>
    <div class="col-12 text-center">E-Shop 2020</div>
</body>

</html>