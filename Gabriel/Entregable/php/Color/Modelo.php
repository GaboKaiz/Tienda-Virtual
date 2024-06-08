<style>

.success-message {
    background-color: #dff0d8;
    border: 1px solid #d6e9c6;
    color: #3c763d;
    padding: 10px;
    margin-bottom: 20px;
    text-align: center;
}

</style>

<?php

function insertarProducto($conn,$codigocolor, $nombrecolor) {
// Consulta SQL para insertar datos
$sql = "INSERT INTO color (CODIGOCOLOR, NOMBRECOLOR) VALUES (?, ?)";

// Preparar la consulta
$stmt = $conn->prepare($sql);
$idcategorias = null;
// Vincular parámetros
$stmt->bind_param("ss" ,$codigocolor, $nombrecolor);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo '<div class="success-message">Producto ingresado correctamente.</div>';
    echo "<script>setTimeout(function(){window.location.href='http://localhost/Gabriel/Entregable/html/Principal.html#';}, 1000);</script>";

} else {
    echo "Error al insertar producto: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
}

