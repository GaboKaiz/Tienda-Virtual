<?php
// Conexión a la base de datos (reemplaza con tus propios datos de conexión)
$servername = "localhost";
$username = "root";
$password = "ellanoteama";
$database = "gaboian";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
else
{
       //echo"Conexión exitosa Mi estimado Gabo";
}

