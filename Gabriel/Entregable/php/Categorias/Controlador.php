<?php
include_once '../Categorias/Conexion.php';
include_once '../Categorias/Modelo.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores de los números enviados por el formulario
    
    $categoriaprincipal = $_POST["categoriaprincipal"];
    $nombrecategorias = $_POST["nombrecategorias"];


    insertarProducto($conn,$categoriaprincipal, $nombrecategorias);
}


