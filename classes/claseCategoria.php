<?php

require "conexion.php";

class Categoria
{
    public $nombre;
    public $padre;

    function __construct($nombre, $padre)
    {
        $this->nombre = $nombre;
        $this->padre = $padre;
    }

    //aca veifico si el atributo $padre esta vacio para ejeuctar un sql u otro y insertarlo en la base de datos.
    function insert()
    {
        if (empty($this->padre)) {
            $sql = "INSERT INTO categorias (id, nombre) VALUES (null, '$this->nombre')";
        } else {
            $sql = "INSERT INTO categorias VALUES (null,'$this->nombre', '$this->padre')";
        }
        conexion()->query($sql);
    }

    //funcion para actualizar categorias.
    function update($id)
    {

        if (empty($this->padre)) {
            $sql = "UPDATE categorias SET nombre = '$this->nombre' WHERE id = '$id';";
        } else {
            $sql = "UPDATE categorias SET nombre = '$this->nombre', padre = '$this->padre' WHERE id = '$id';";
        }
        conexion()->query($sql);
    }
}
