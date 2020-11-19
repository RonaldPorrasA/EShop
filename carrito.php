<?php session_start();

//este require es para poder desencriptar los datos de la parte visual del formulario.
require 'global/config.php';
require 'funciones.php';
require 'conexion.php';
//verifica si hay una sesion sino lo envia al index
if (!$_SESSION) {
    header("Location: index.php");
}

//verifica que se haya enviado los datos por medio del post del boton y elimina el item del carrito.
if (isset($_POST['btnEliminar'])) {
    if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
        $id = openssl_decrypt($_POST['id'], COD, KEY);
        foreach ($_SESSION['CARRITO'] as $indice => $producto) {
            if ($producto['id'] == $id) {
                unset($_SESSION['CARRITO'][$indice]);
                echo "<script>alert('Elemento borrado...')</script>";
            }
        }
    }
}
//verifica que se haya enviado los datos por medio del post del boton y agrega los items del carrito la base.
if (isset($_POST['btnPagar'])) {
    $usuario = existeEmail($_SESSION['usuario']);
    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
        $id = $_SESSION['CARRITO'][$indice]['id'];
        $cantidad = $_SESSION['CARRITO'][$indice]['cantidad'];
        $total = ($_SESSION['CARRITO'][$indice]['cantidad'] * $_SESSION['CARRITO'][$indice]['precio']);
        $sql = "INSERT INTO ventas (id_producto, id_cliente, fecha, total, cantidad) VALUES (?,?,now(),?,?)";
        $statement = conexion()->prepare($sql);
        $statement->execute([$id, $usuario['id'], $total, $cantidad]);
    }
    echo "<script>alert('Pago realizado');</script>";
    $_SESSION['CARRITO'] = array();
}
require 'views/carrito.view.php';
