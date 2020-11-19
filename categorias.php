<?php session_start();

require 'conexion.php';
require 'funciones.php';
require 'classes/claseCategoria.php';

$errores = "";
//verifica si hay una sesion sino lo envia al index
if (!$_SESSION) {
    header("Location: index.php");
}
//verifica el usuario es admin sino destruye la sesion
if ($_SESSION["tipo"] != 0) {
    header("Location: cerrarSesion.php");
}
//verifica que el boton insert se haya enviado los datos
if (isset($_POST['insert'])) {

    $nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_STRING);
    $padre = $_POST["categoria"];
    //se llama la funcion apra verificar que la categoria no existe en la base de datos
    if (existeCategoria($categoria) !== false) {
        $errores .= "<li>El nombre de esa categoria ya existe!</li>";
    } else {
        $categoria = new Categoria($nombre, $padre);
        $categoria->insert();
        header("Location: categorias.php");
    }
}

// se utiliza para mostrar toda la info en el tabla de la parte visual
$sql = "SELECT * FROM categorias";
$statement = conexion()->query($sql);
$statement->execute();
$categorias = $statement->fetchAll();
//funcion para traer unicamente categorias que son padre.
function categoriasPadre()
{
    $sql = "SELECT * FROM categorias WHERE padre IS NULL";
    $statement = conexion()->query($sql);
    $statement->execute();
    $categorias = $statement->fetchAll();
    return $categorias;
}
//funcion para que cuando el padre es nulo muestr un mensaje diferente en la tabla(visual) de los datos.
function padreNULL($padre)
{
    if ($padre == NULL) {
        return "No hereda";
    } else {
        $sql = "SELECT nombre FROM categorias WHERE id = $padre";
        $statement = conexion()->query($sql);
        $statement->execute();
        $nombre = $statement->fetch();
        return $nombre['nombre'];
    }
}


require 'views/categorias.view.php';
