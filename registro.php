<?php

require 'classes/usuarioClase.php';
require 'funciones.php';

$errores = "";

//verifica que los datos se pasen de la manera correcta
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $apellido = filter_var(trim($_POST['lastname']), FILTER_SANITIZE_STRING);
    $telefono = filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING);
    $direccion = filter_var(trim($_POST['address']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $contra = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
    $contra2 = filter_var(trim($_POST['pass2']), FILTER_SANITIZE_STRING);

    if (existeEmail($email) !== false) {//verifica por medio de una funcion si el email ingresado no existe en la base de datos
        $errores .= "<li>El usuario ya existe!</li>";
    }

    if ($contra !== $contra2) {//verifica que ambas contraseñas esten iguales
        $errores .= "<li>Las contraseñas no Coinciden!</li>";
    } else {
        echo $nombre . $apellido . $email . $telefono . $direccion . $contra;
        $contra = hash('sha512', $contra);
        $usuario = new Usuario($nombre, $apellido, $email, $telefono, $direccion, $contra);
        $usuario->insert();
        header("Location: index.php");
    }
}


require "views/registro.view.php";
