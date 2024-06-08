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
    $sql = "SELECT IDCATEGORIAS, CATEGORIAPRINCIPAL, NOMBRECATEGORIA FROM categorias WHERE IDCATEGORIAS = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Categoría no encontrada";
        exit;
    }
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $categoria_principal = $_POST['categoria_principal'];
    $nombre_categoria = $_POST['nombre_categoria'];

    $sql = "UPDATE categorias SET CATEGORIAPRINCIPAL = ?, NOMBRECATEGORIA = ? WHERE IDCATEGORIAS = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $categoria_principal, $nombre_categoria, $id);
    if ($stmt->execute()) {
        echo "Categoría actualizada exitosamente";
    } else {
        echo "Error actualizando la categoría: " . $conn->error;
    }
    $stmt->close();
    header("Location: /GABRIEL/Entregable/php/Categorias/Cate.php"); // Redirige de nuevo a la página de categorías
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
    <title>Editar Categoría</title>
</head>
<body>
    <h2>Editar Categoría</h2>
    <?php if ($row): ?>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $row['IDCATEGORIAS']; ?>">
        <div>
            <label>Categoría Principal:</label>
            <input type="text" name="categoria_principal" value="<?php echo $row['CATEGORIAPRINCIPAL']; ?>" required>
        </div>
        <div>
            <label>Nombre de la Categoría:</label>
            <input type="text" name="nombre_categoria" value="<?php echo $row['NOMBRECATEGORIA']; ?>" required>
        </div>
        <button type="submit">Guardar Cambios</button>
    </form>
    <?php else: ?>
    <p>No se encontró la categoría a editar.</p>
    <?php endif; ?>
</body>
</html>
