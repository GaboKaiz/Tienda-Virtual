<?php
include_once '../Categorias/Conexion.php';
include_once '../Tamaño/Modelo.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores de los números enviados por el formulario
    $codigotamaño = $_POST["codigotamaño"];
    $clasificaciontamaño = $_POST["clasificaciontamaño"];


    insertarProducto($conn,$codigotamaño, $clasificaciontamaño);
}

