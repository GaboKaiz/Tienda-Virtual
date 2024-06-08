<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tamaño + KLK</title>
    <link rel="stylesheet" href="/Gabriel/ENTREGABLE/css/Registradocss/Cate.css">
    <link rel="stylesheet" href="/Gabriel/ENTREGABLE/css/Botones.css">
</head>

<body>
    <div class="arriba">
        <div class="nombre">
            <div class="logo">
                <img src="/Gabriel/ENTREGABLE/imagenes/coronasdas.png" alt="" width="200px" />
            </div>
            <h1>Marvel</h1>
            <div class="abajo">
                <p>Shopp</p>
            </div>
        </div>

    </div>
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-two-thirds">
                <a href="http://localhost/Gabriel/Entregable/html/Principal.html" class="styled-button">Regresar</a>
                    <h2 class="title">Datos Guardados - Tamaños</h2>
                    <div class="table-container"> <!-- Agrega una clase contenedora para la tabla -->
                        <?php
                        // Tu código PHP para mostrar los datos de la base de datos aquí
                        ?>
                        <table class="table is-striped is-bordered"> <!-- Agrega clases de tabla Bulma -->
                            <thead>
                                <tr>
                                    <th>ID-TAMAÑO</th>
                                    <th>CÓDIGO DEL TAMAÑO</th>
                                    <th>CLASIFICACIÓN DEL TAMAÑO</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                } else {
                                    //echo"Conexión exitosa:";
                                }

                                // Comprobar si la conexión fue exitosa
                                if ($conn->connect_error) {
                                    die("Conexión fallida: " . $conn->connect_error);
                                }

                                $sql = "SELECT IDTAMAÑO, CODIGOTAMAÑO, CLASIFICACIONTAMAÑO FROM tamaño";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["IDTAMAÑO"] . "</td>";
                                        echo "<td>" . $row["CODIGOTAMAÑO"] . "</td>";
                                        echo "<td>" . $row["CLASIFICACIONTAMAÑO"] . "</td>";
                                        echo "<td>";
                                        echo "<a href='http://localhost/Gabriel/ENTREGABLE/php/Tamaño/EditarT.php?id=" . $row["IDTAMAÑO"] . "' class='button is-small is-info'>Editar</a> ";
                                        echo "<a href='#' class='button is-small is-danger' onclick='showConfirmationModal(" . $row["IDTAMAÑO"] . ");'>Eliminar</a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>No se encontraron resultados</td></tr>";
                                }

                                $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function showConfirmationModal(id) {
            document.getElementById('confirmationModal').style.display = "block";
            document.getElementById('deleteButton').setAttribute('href', 'EliminarT.php?id=' + id);
        }

        function closeConfirmationModal() {
            document.getElementById('confirmationModal').style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == document.getElementById('confirmationModal')) {
                closeConfirmationModal();
            }
        }

    </script>
    <!-- Modal de confirmación -->
    <div id="confirmationModal" class="confirmation-modal">
        <div class="confirmation-modal-content">
            <p>¿Estás seguro de que deseas eliminar esta categoría?</p>
            <div class="confirmation-modal-buttons">
                <a id="deleteButton" class="btn-danger">Eliminar</a>
                <button class="btn-cancel" onclick="closeConfirmationModal()">Cancelar</button>
            </div>
        </div>
    </div>
</body>

</html>