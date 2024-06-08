<?php
include_once '../Categorias/Conexion.php';
include_once '../Color/Modelo.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores de los números enviados por el formulario
    $codigocolor = $_POST["codigocolor"];
    $nombrecolor = $_POST["nombrecolor"];


    insertarProducto($conn,$codigocolor, $nombrecolor);
}

