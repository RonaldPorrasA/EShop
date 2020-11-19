<?php
session_start();
require 'global/config.php';
require 'conexion.php';
require 'funciones.php';
//verfica que haya una sesion iniciada
if (!$_SESSION) {
    header("Location: index.php");
}
//trae el usuario de la base
$usuario = existeEmail($_SESSION['usuario']);
//trae todos los productos de la base de datos.
$sql = "SELECT * FROM productos";
$statement = conexion()->prepare($sql);
$statement->execute();
$productos = $statement->fetchAll();

//revisa que se haya enviado los datos por medio del boton
if (isset($_POST['btnAgregar'])) {
    switch ($_POST['btnAgregar']) {
        case 'agregar':

            if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                $id = openssl_decrypt($_POST['id'], COD, KEY);
            } else {
                $mensaje .= "Upss ... ID incorrecto" . $id;
            }
            if (is_string(openssl_decrypt($_POST['nombre'], COD, KEY))) {
                $nombre = openssl_decrypt($_POST['nombre'], COD, KEY);
            } else {
                $mensaje .= "Upss ... algo pasa con el nombre";
            }
            if (is_string(openssl_decrypt($_POST['precio'], COD, KEY))) {
                $precio = openssl_decrypt($_POST['precio'], COD, KEY);
            } else {
                $mensaje .= "Upss ... algo pasa con el precio ";
            }
            if (is_numeric(openssl_decrypt($_POST['cantidad'], COD, KEY))) {
                $cantidad = openssl_decrypt($_POST['cantidad'], COD, KEY);
            } else {
                $mensaje .= "Upss ... algo pasa con la cantidad";
            }
            //verifica si el carrito esta vacio para agregar el item al carrito
            if (!isset($_SESSION['CARRITO'])) {
                $producto = array(
                    'id' => $id,
                    'nombre' => $nombre,
                    'cantidad' => $cantidad,
                    'precio' => $precio,
                );
                $_SESSION['CARRITO'][0] = $producto;

                $mensaje = "Producto agregado al carrito";
            } else {
                $idProducto = array_column($_SESSION['CARRITO'], 'id');
                //si el item que se agrega al carro ya existe en el array verifica y los busca y solo aumenta la cantidad de dicho item
                if (in_array($id, $idProducto)) {
                    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                        if ($producto['id'] == $id) {
                            $_SESSION['CARRITO'][$indice]['cantidad'] += $cantidad;
                        }
                    }
                } else { //sino esta en el array lo agrega al final
                    $numeroProductos = count($_SESSION['CARRITO']);
                    $producto = array(
                        'id' => $id,
                        'nombre' => $nombre,
                        'cantidad' => $cantidad,
                        'precio' => $precio,
                    );
                    $_SESSION['CARRITO'][$numeroProductos] = $producto;
                    $mensaje = print_r($_SESSION['CARRITO'], true);
                }
            }
            break;
        default:
            break;
    }
}
//total de compras del cliente
function datosCliente()
{
    $usuario = existeEmail($_SESSION['usuario'])['id'];
    $sql = "SELECT SUM(total) AS total FROM ventas AS v WHERE v.id_cliente = '$usuario'";
    $statement = conexion()->query($sql);
    $statement->execute();
    $resultado = $statement->fetch();
    return $resultado;
}


require "views/cliente.view.php";
