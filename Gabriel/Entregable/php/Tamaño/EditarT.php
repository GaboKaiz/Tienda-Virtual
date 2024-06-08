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

$row = null;
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT IDTAMAÑO, CODIGOTAMAÑO, CLASIFICACIONTAMAÑO FROM tamaño WHERE IDTAMAÑO = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Producto no encontrada";
        exit;
    }
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $codigo_tamaño = $_POST['codigo_tamaño'];
    $clasificacion_tamaño = $_POST['clasificacion_tamaño'];

    $sql = "UPDATE tamaño SET CODIGOTAMAÑO = ?, CLASIFICACIONTAMAÑO = ? WHERE IDTAMAÑO = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $codigo_tamaño, $clasificacion_tamaño, $id);
    if ($stmt->execute()) {
        echo "Producto actualizado exitosamente";
    } else {
        echo "Error actualizando el Producto: " . $conn->error;
    }
    $stmt->close();
    header("Location: /GABRIEL/Entregable/php/Tamaño/Tam.php"); // Redirige de nuevo a la página de categorías
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/GABRIEL/Entregable/css/Editar.css">
    <title>Editar Tamaño</title>
</head>
<body>
    <h2>Editar Tamaño</h2>
    <?php if ($row): ?>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $row['IDTAMAÑO']; ?>">
        <div>
            <label>Código Tamaño:</label>
            <input type="text" name="codigo_tamaño" value="<?php echo $row['CODIGOTAMAÑO']; ?>" required>
        </div>
        <div>
            <label>Clasificación Tamaño:</label>
            <input type="text" name="clasificacion_tamaño" value="<?php echo $row['CLASIFICACIONTAMAÑO']; ?>" required>
        </div>
        <button type="submit">Guardar Cambios</button>
    </form>
    <?php else: ?>
    <p>No se encontró el Tamaño a editar.</p>
    <?php endif; ?>
</body>
</html>
