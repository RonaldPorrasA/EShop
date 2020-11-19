<?php

require 'conexion.php';

//vamos a la base y verificamos si el stock es menor al numero indicado
$sql = "SELECT * FROM productos WHERE stock <= :stock;";
$statement = conexion()->prepare($sql);
$statement->execute(array(':stock' => $argv[1]));
$productos = $statement->fetchAll();

//indicamos para quien es el correo y el asunto del correo
$para = "anthonycabezasramirez@gmail.com";
$asunto = "Productos con bajo stock";

$mensaje = "Los productos bajos en stock son: \r\n";

//recorremos los datos que fueron retornados por la consulta
foreach ($productos as $producto) {
    $mensaje .= "SKU: ".$producto["sku"] . " Nombre: " .  $producto["nombre"] . " Stock: " .  $producto["stock"] . "\r\n";
}

$de = "From: xampp@gmail.com";

//aca armamos el correo y se envia
mail($para, $asunto, $mensaje, $de);
