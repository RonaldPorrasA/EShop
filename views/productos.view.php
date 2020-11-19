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

    <title>Productos</title>
</head>

<body class="bg-secondary">
    <header>
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
            <a class="navbar-brand" href="productos.php">Productos</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class=" nav navbar-nav mr-auto navbar-left">
                </ul>
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
    <div class="container-xl">
        <!-- Editable table -->
        <div class="card">
            <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Productos</h3>
            <div class="card-body">
                <div id="table" class="table-editable">
                    <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success" data-toggle="modal"
                            data-target="#crearProducto">
                            <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-plus-circle"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z" />
                                <path fill-rule="evenodd"
                                    d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z" />
                                <path fill-rule="evenodd"
                                    d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            </svg>
                        </a></span>
                        <?php if(!empty($mensaje)) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $mensaje; ?>
                        </div>
                        <?php endif; ?>
                    <table class="table table-bordered table-responsive-md table-striped text-center table-dark">
                        <thead>
                            <tr>
                                <th class="text-center">SKU</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Descripcion</th>
                                <th class="text-center">Imagen</th>
                                <th class="text-center">Categoria</th>
                                <th class="text-center">Stock</th>
                                <th class="text-center">Precio</th>
                                <th class="text-center">Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($productos as $producto) : ?>
                            <tr>
                                <td class="pt-3-half"><?php echo $producto['sku'] ?></td>
                                <td class="pt-3-half"><?php echo $producto['nombre'] ?></td>
                                <td class="pt-3-half"><?php echo $producto['descripcion'] ?></td>
                                <td class="pt-3-half"><img src="imagenes_productos/<?php echo $producto['imagen'] ?>" alt="" height="80px" width="80px"></td>
                                <td class="pt-3-half"><?php echo $producto['categoria'] ?></td>
                                <td class="pt-3-half"><?php echo $producto['stock'] ?></td>
                                <td class="pt-3-half"><?php echo $producto['precio'] ?></td>
                                <td>
                                    <span class="table-remove">
                                        <button type="button" class="btn btn-primary btn-rounded btn-sm my-0 btnedit">

                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil"
                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" />
                                                <path fill-rule="evenodd"
                                                    d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z" />
                                            </svg>
                                            <a href="modificarProducto.php?id=<?php echo $producto['id'];?>"
                                                style="color: white; text-decoration: none;">Editar</a>
                                        </button></span>
                                    <span class="table-remove">
                                        <button type="button" class="btn btn-danger btn-rounded btn-sm my-0"
                                            name="eliminar">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash"
                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd"
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg>
                                            <a href="eliminarProducto.php?id=<?php echo $producto['id'];?>"
                                                style="color: white; text-decoration: none;">Eliminar</a>
                                        </button></span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Inicio modal crear producto -->
        <div class="modal" id="crearProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">Nuevo Producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- form para agregar productos -->
                        <form action="" enctype="multipart/form-data" method="POST">
                            <div class="form-group">
                                <label for="codigo">SKU</label>
                                <input type="text" class="form-control" id="codigo" name="codigo" placeholder="SKU"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion"
                                    placeholder="Descripcion" required>
                            </div>
                            <div class="form-group">
                                <label for="img">Subir Imagen</label>
                                <input type="file" class="form-control" id="img" name="img" required>
                            </div>
                            <div class="form-group">
                                <label for="categoria">Categorias</label>
                                <select class="form-control" id="categoria" name="categoria" required>
                                    <option value="" disabled selected>Seleccione una Categoria</option>
                                    <?php foreach($categorias as $categoria): ?>
                                    <?php echo "<option value=" . $categoria['id'] . ">" . $categoria['nombre'] . "</option> ";?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="number" class="form-control" id="stock" placeholder="Stock" name="stock"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input type="number" class="form-control" id="precio" placeholder="Precio" name="precio"
                                    required>
                            </div>
                            <div class="modal-footer center">
                                <button type="submit" class="btn btn-info" name="insert" >Crear</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            </div>
                            <?php if(!empty($mensaje)) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $mensjae ?>
                            </div>
                            <?php endif; ?>
                        </form>
                    </div>

                </div>
            </div>
        </div>
</body>

</html>