<?php
require "conexion.php";

class Usuario
{
    public $nombre;
    public $apellidos;
    public $email;
    public $telefono;
    public $direccion;
    public $contra;
    private $tipo;

    function __construct($nombre, $apellidos, $email, $telefono, $direccion, $contra)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->contra = $contra;
        $this->tipo = 1;
    }

    //insert de los usuarios en la base de datos.
    function insert()
    {
        $sql = "INSERT INTO usuarios VALUES (null,'$this->nombre', '$this->apellidos', '$this->email', '$this->telefono', '$this->direccion', '$this->contra', '$this->tipo')";
        conexion()->query($sql);
    }
}
