<?php
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

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM producto WHERE IDPRODUCTO = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "Producto eliminado exitosamente";
        } else {
            echo "Error eliminando el Producto: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparando la declaración: " . $conn->error;
    }
}
$conn->close();
header("Location: /GABRIEL/Entregable/php/Producto/Prod.php"); // Redirige de nuevo a la página de categorías
exit;