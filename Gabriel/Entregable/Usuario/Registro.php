
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

// Procesar los datos del formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Insertar los datos del nuevo usuario en la base de datos
    $sql = "INSERT INTO usuarios (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Registro exitoso, mostrar mensaje
        echo '<div class="success-message">Registro Exitoso.</div>';
        
        // Esperar unos segundos y luego redirigir a la página de inicio
        echo "<script>setTimeout(function(){window.location.href='http://localhost/Gabriel/Entregable/html/Usuario.html#';}, 1000);</script>";
    } else {
        // Error al registrar, mostrar mensaje de error
        echo "Error: " . $sql . "<br>" . $conn->error;
        
    }
}

$conn->close();
