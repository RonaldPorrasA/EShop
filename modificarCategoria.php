<?php session_start();

require 'conexion.php';
require "classes/claseCategoria.php";

//tomamos el id que enviado desde la parte visual
$id = $_GET["id"];

//verifico que la persona que quiere ingresar sea de tipo de administrador
if ($_SESSION['tipo'] != 0) {
    header("Location: cerrarSesion.php");
}

//tomo la categoria por medio del id y la cargo en el form para modificarla
$sql = "SELECT * FROM categorias WHERE id = '$id';";
$statement = conexion()->prepare($sql);
$statement->execute();
$categoria = $statement->fetch();

//se verifica que el post no este vacio
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $padre = $_POST["padre"];
    $categoria = $_POST["categoria"];

    //verifico si cambiaron la categoria para saber que la modificaron
    if(!empty($categoria)){
        $padre = $categoria;
    }
    //se invoca a clase categoria para luego modificarla en base
    $categoria = new Categoria($nombre, $padre);
    $categoria->update($id);
    header("Location: categorias.php");
}

//recorro todas las categorias que sean padre para mostrarlas en el select
function categoriasPadre()
{
    $sql = "SELECT * FROM categorias WHERE padre IS NULL";
    $statement = conexion()->query($sql);
    $statement->execute();
    $categorias = $statement->fetchAll();
    return $categorias;
}

require 'views/modificarCategoria.view.php';
