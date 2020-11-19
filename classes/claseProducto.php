<?php
require "conexion.php";

class Producto
{
    public $sku;
    public $nombre;
    public $descripcion;
    public $imagen;
    public $categoria;
    public $stock;
    public $precio;

    function __construct($sku, $nombre, $descripcion, $imagen, $categoria, $stock, $precio)
    {
        $this->sku = $sku;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
        $this->categoria = $categoria;
        $this->stock = $stock;
        $this->precio = $precio;
    }

    //funcion para hacer el insert de los productos en la base de datos
    function insert()
    {
        $sql = "INSERT INTO productos VALUES(null,'$this->sku', '$this->nombre', '$this->descripcion', '$this->imagen', '$this->categoria','$this->stock','$this->precio')";
        conexion()->query($sql);
    }

    //funcion para hacer la actualizacion de los productos en la base de datos
    function update($id)
    {
        $sql = "UPDATE productos SET sku = '$this->sku', nombre = '$this->nombre', descripcion = '$this->descripcion', imagen = '$this->imagen', id_categoria = '$this->categoria', stock = '$this->stock', precio = '$this->precio' WHERE id = '$id';";
        conexion()->query($sql);
    }
}
