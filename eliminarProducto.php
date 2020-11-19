<?php session_start();

require 'conexion.php';

//verifica si hay una sesion sino lo envia al index
if (!$_SESSION) {
    header("Location: index.php");
}
//verifica el usuario es admin sino destruye la sesion
if ($_SESSION["tipo"] != 0) {
    header("Location: cerrarSesion.php");
}
//toma el id que envia desde el el boton eliminar del form
$id = $_GET["id"];

//verifica que el se hayan enviado datos y elimina el producto
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $sql = "DELETE FROM productos WHERE id = $id;";
    conexion()->query($sql);
    echo "<script>
        alert('Producto Eliminado!');
        window.location.href='productos.php';
        </script>";
} else {
    echo "<script>
        alert('Se ha producido un error!');
        window.location.href='productos.php';
        </script>";
}