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
    $sql = "SELECT IDPRODUCTO, NOMBREPRODUCTO, OTROSPRODUCTOS FROM producto WHERE IDPRODUCTO = ?";
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
    $nombre_producto = $_POST['nombre_producto'];
    $otros_productos = $_POST['otros_productos'];

    $sql = "UPDATE producto SET NOMBREPRODUCTO = ?, OTROSPRODUCTOS = ? WHERE IDPRODUCTO = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nombre_producto, $otros_productos, $id);
    if ($stmt->execute()) {
        echo "Producto actualizado exitosamente";
    } else {
        echo "Error actualizando el Producto: " . $conn->error;
    }
    $stmt->close();
    header("Location: /GABRIEL/Entregable/php/Producto/Prod.php"); // Redirige de nuevo a la página de categorías
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
    <title>Editar Producto</title>
</head>
<body>
    <h2>Editar Producto</h2>
    <?php if ($row): ?>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $row['IDPRODUCTO']; ?>">
        <div>
            <label>Color Principal:</label>
            <input type="text" name="nombre_producto" value="<?php echo $row['NOMBREPRODUCTO']; ?>" required>
        </div>
        <div>
            <label>Nombre del Color:</label>
            <input type="text" name="otros_productos" value="<?php echo $row['OTROSPRODUCTOS']; ?>" required>
        </div>
        <button type="submit">Guardar Cambios</button>
    </form>
    <?php else: ?>
    <p>No se encontró la categoría a editar.</p>
    <?php endif; ?>
</body>
</html>
