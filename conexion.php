<?php
//Esta funcion retonar la conexcion a la base de datos.
if (!function_exists('conexion')) {
    function conexion(){
        try{
            $conexion = new PDO("mysql:host=localhost;dbname=eshop","root","");
            return $conexion;
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
            die();
        }
    }
}