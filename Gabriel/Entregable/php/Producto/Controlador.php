<?php
include_once '../Categorias/Conexion.php';
include_once '../Producto/Modelo.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores de los números enviados por el formulario
    $nombreproducto = $_POST["nombreproducto"];
    $otrosproductos = $_POST["otrosproductos"];


    insertarProducto($conn,$nombreproducto, $otrosproductos);
}

