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

//Cantidad de Clientes Registrados
function cantidadUsuarios()
{
    $sql = "SELECT count(*) AS cantidad FROM usuarios WHERE tipo != 0;";
    $statement = conexion()->prepare($sql);
    $statement->execute();
    $resultado = $statement->fetch();
    return $resultado;
}

//Cantidad de productos unicos vendidos
function cantidadProductosVendidosUnicos()
{
    $sql = "SELECT count(*) AS cantidad FROM ventas;";
    $statement = conexion()->prepare($sql);
    $statement->execute();
    $resultado = $statement->fetch();
    return $resultado;
}
//Cantidad de productos total vendidos
function cantidadProductosVendidosTotal()
{
    $sql = "SELECT SUM(cantidad) AS cantidad FROM ventas;";
    $statement = conexion()->prepare($sql);
    $statement->execute();
    $resultado = $statement->fetch();
    return $resultado;
}
//Monto total de ventas
function totalVentas()
{
    $sql = "SELECT SUM(total) AS total FROM ventas;";
    $statement = conexion()->prepare($sql);
    $statement->execute();
    $resultado = $statement->fetch();
    return $resultado;
}
require 'views/admin.view.php';
