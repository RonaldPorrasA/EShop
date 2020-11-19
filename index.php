<?php session_start();

require "funciones.php";
$errores = "";
//verifica que lo datos se hayan enviado por le metodo post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_STRING);
    $contra = filter_var(trim($_POST["pass"]), FILTER_SANITIZE_STRING);
    $contra = hash('sha512', $contra);

    //verifica si existe el usuario ingresado
    if (existeUsuario($email, $contra) === false) {
        $errores .= "<li>El Usuario no existe o la información es Incorrecta!</li>";
    } elseif (esAdmin($email)['tipo'] == 0) {//verifica si es administrador o cliente para redireccionarlo
        $_SESSION["usuario"] = $email;
        $_SESSION["tipo"] = 0;
        header("Location: admin.php");
    } else {
        $_SESSION["usuario"] = $email;
        $_SESSION["tipo"] = 1;
        header("Location: cliente.php");
    }
}

require "views/index.view.php";
