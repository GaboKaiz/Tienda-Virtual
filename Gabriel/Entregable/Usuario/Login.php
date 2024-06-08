

<?php
$servername = "localhost";
$username = "root";
$password = "ellanoteama";
$database = "gaboian";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar los datos del formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Consulta SQL para verificar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Usuario autenticado correctamente, redirigir a una página de inicio de sesión exitosa
        header("Location: http://localhost/Gabriel/Entregable/html/Principal.html#");
        exit();
    } else {
        // Credenciales incorrectas, mostrar un mensaje de error o redirigir a una página de inicio de sesión fallida
        echo "Credenciales incorrectas";
        echo "<script>setTimeout(function(){window.location.href='http://localhost/Gabriel/Entregable/html/Usuario.html#';}, 1000);</script>";

    }
}

$conn->close();

