<?php session_start();

require 'classes/claseProducto.php';
require 'conexion.php';


$mensaje = "";

//verifica si hay una sesion sino lo envia al index
if (!$_SESSION) {
    header("Location: index.php");
}
//verifica el usuario es admin sino destruye la sesion
if ($_SESSION["tipo"] != 0) {
    header("Location: cerrarSesion.php");
}

//verifica que se hayan enviado los datos
if (isset($_POST['insert'])) {
    $sku = $_POST["codigo"];
    $imagen = @getimagesize($_FILES["img"]["tmp_name"]);
    $nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_STRING);
    $descripcion = filter_var($_POST["descripcion"], FILTER_SANITIZE_STRING);
    $precio = filter_var(trim($_POST["precio"]), FILTER_SANITIZE_NUMBER_INT);
    $stock = filter_var(trim($_POST["stock"]), FILTER_SANITIZE_NUMBER_INT);
    $categoria = $_POST["categoria"];

    if ($imagen != false) {//verifica que la imagen no sea otro tipo de archivo
        $carpeta_destino = 'imagenes_productos/';
        $archivo_subido = $carpeta_destino . $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], $archivo_subido);

        //consulta que ese sku no se haya registrado antes
        $sql = "SELECT * FROM productos WHERE sku = '$sku';";
        $statement = conexion()->prepare($sql);
        $statement->execute();
        $resultado = $statement->fetch();

        if ($resultado !== false) {//verifica si existe ese sku en la base de datos
            $mensaje .= 'El producto ya existe en la base';
        } else {
            $producto = new Producto($sku, $nombre, $descripcion, $_FILES['img']['name'], $categoria, $stock, $precio);
            $producto->insert();

            header('Location: productos.php');
        }
    } else {
        $mensaje .= 'La imagen tiene problemas';
        header('Location: productos.php');
    }
}
//consulta que trae todas las categorias
$sql = "SELECT * FROM categorias";
$statement = conexion()->prepare($sql);
$statement->execute();
$categorias = $statement->fetchAll();

//consulta que trae todos los datos de los productos y hace un innner a la tabla categoria para traer el nombre
$sql = "SELECT p.*, ca.nombre AS categoria FROM productos AS p INNER JOIN categorias AS ca ON ca.id=p.id_categoria";
$statement = conexion()->prepare($sql);
$statement->execute();
$productos = $statement->fetchAll();

require 'views/productos.view.php';
