<?php session_start();
//destruye la sesion
session_destroy();
//limpia todos los array de la sesion
$_SESSION = array();
//redirecciona
header('Location: index.php');
