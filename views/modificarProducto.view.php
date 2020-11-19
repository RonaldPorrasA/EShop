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
    <title>Modificar</title>

    <script type="text/javascript">
    $(window).on('load', function() {
        $('#modal').modal('show');
    });
    </script>

</head>

<body>
    <pre>
        <?php ?>
    </pre>
    <div class="modal" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Modificar Categoria</h5>
                    <a href="productos.php"><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button></a>
                </div>
                <div class="modal-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" id="id" name="id" required
                                value="<?php echo $producto['id']?>">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Sku</label>
                            <input type="text" class="form-control" id="sku" name="sku" placeholder="SKU" required
                                value="<?php echo $producto['sku']?>">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"
                                required value="<?php echo $producto['nombre']?>">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion"
                                placeholder="Descripcion" required value="<?php echo $producto['descripcion']?>">
                        </div>

                        <input type="hidden" id="ant_img" name="ant_img" value="<?php echo $producto['imagen']?>">
                        <div class="form-group">
                            <label for="img">Imagen</label>
                            <input type="file" class="form-control" id="img" name="img">
                        </div>
                        <div class="form-group">
                            <label for="cate">Categoria en este momento</label>
                            <input type="text" class="form-control" id="cate" name="cate" disabled
                                value="<?php echo $producto['categoria']?>">
                            <input type="hidden" name="ant_categoria" id="ant_categoria"
                                value="<?php echo $producto['id_categoria'];?>">
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categorias</label>
                            <select class="form-control" id="categoria" name="categoria">
                                <option value="" disabled selected>Seleccione una Categoria</option>
                                <?php foreach($categorias as $categoria): ?>
                                <?php echo "<option value=" . $categoria['id'] . ">" . $categoria['nombre'] . "</option> ";?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stok</label>
                            <input type="text" class="form-control" id="stock" name="stock" placeholder="Stock" required
                                value="<?php echo $producto['stock']?>">
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="text" class="form-control" id="precio" name="precio" placeholder="Descripcion"
                                required value="<?php echo $producto['precio']?>">
                        </div>
                        <div class="modal-footer center">
                            <button type="submit" class="btn btn-info" name="modificar">Modificar Producto</button>
                            <a href="productos.php" class="badge badge-danger" style="width: 100px; height:40px; text-align:center; font-size: 14px; text-justify: center;">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>