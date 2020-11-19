<?php

require 'conexion.php';
//verifica que si el email que ingresa existe
function existeEmail($email)
{
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $statement = conexion()->prepare($sql);
    $statement->execute(array(':email' => $email));
    $resultado = $statement->fetch();
    return $resultado;
}
//verifica que el usuario existe
function existeUsuario($email, $contra)
{
    $sql = "SELECT * FROM usuarios WHERE email = :email AND contra = :contra;";
    $statement = conexion()->prepare($sql);
    $statement->execute(array(':email' => $email, ':contra' => $contra));
    $resultado = $statement->fetch();
    return $resultado;
}
//verifica si la persona que esta ingresando es administradors
function esAdmin($email)
{
    $sql = "SELECT tipo FROM usuarios WHERE email = :email";
    $statement = conexion()->prepare($sql);
    $statement->execute(array(':email' => $email));
    $resultado = $statement->fetch();
    return $resultado;
}
//verifica que si la categoria existe
function existeCategoria($categoria)
{
    $sql = "SELECT nombre FROM categorias WHERE nombre = '$categoria';";
    $statement = conexion()->prepare($sql);
    $statement->execute();
    $resultado = $statement->fetch();
    return $resultado;
}
