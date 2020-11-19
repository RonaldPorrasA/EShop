<?php session_start();

require 'conexion.php';
require "classes/claseProducto.php";
//verifica si hay una sesion sino lo envia al index
if (!$_SESSION) {
    header("Location: index.php");
}
//verifica el usuario es admin sino destruye la sesion
if ($_SESSION["tipo"] != 0) {
    header("Location: cerrarSesion.php");
}

//toma el id que se envia del lado del forom
$id = $_GET["id"];

//trae todos los datos de productos
$sql = "SELECT p.*, ca.nombre AS categoria FROM productos AS p INNER JOIN categorias AS ca ON ca.id=p.id_categoria AND p.id = '$id';";
$statement = conexion()->prepare($sql);
$statement->execute();
$producto = $statement->fetch();

//trae todas las categorias
$sql = "SELECT * FROM categorias";
$statement = conexion()->prepare($sql);
$statement->execute();
$categorias = $statement->fetchAll();
//verifica si los datos se enviaron por medio del post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $ant_imagen = $_POST["ant_img"];
    $imagen = $_FILES["img"];
    $sku = filter_var(trim($_POST["sku"]), FILTER_SANITIZE_STRING);
    $nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_STRING);
    $descripcion = filter_var($_POST["descripcion"], FILTER_SANITIZE_STRING);
    $precio = filter_var(trim($_POST["precio"]), FILTER_SANITIZE_NUMBER_INT);
    $stock = filter_var(trim($_POST["stock"]), FILTER_SANITIZE_NUMBER_INT);
    $ant_categoria = $_POST["ant_categoria"];
    $categoria = $_POST["categoria"];

    if (empty($imagen) || $imagen == null) {//verifica si se realizo un cambio en la imagen o no
        $imagen = $ant_imagen;
    } else {
        $carpeta_destino = 'imagenes_productos/';
        $archivo_subido = $carpeta_destino . $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], $archivo_subido);
        $imagen = $_FILES["img"]["name"];
    }
    if ($categoria == null || empty($categoria)) {//verifica si se cambio la categoria
        $categoria = $ant_categoria;
    }

    $producto = new Producto($sku, $nombre, $descripcion, $imagen, $categoria, $stock, $precio);
    $producto->update($id);
    header("Location: productos.php");
}



require 'views/modificarProducto.view.php';
