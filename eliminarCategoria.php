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
//verrifica que la categoria no pertenece a un producto
$sql = "SELECT * FROM productos WHERE id_categoria = '$id';";
$statement = conexion()->prepare($sql);
$statement->execute();
$verificacion = $statement->fetchAll();
//verrifica que la categoria no pertenece a un producto para luego eliminarla
if ($_SERVER["REQUEST_METHOD"] == "GET" && empty($verificacion)) {

    $sql = "DELETE FROM categorias WHERE id = $id;";
    conexion()->query($sql);
    echo "<script>
        alert('Categoria Eliminada!');
        window.location.href='categorias.php';
        </script>";
} else {
    echo "<script>
        alert('Esta Categoria contiene Productos!');
        window.location.href='categorias.php';
        </script>";
}
