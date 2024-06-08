        function cargarContenido1(archivo) {
            fetch(archivo)
                .then(response => response.text())
                .then(data => {
                    document.getElementById("contenido2").innerHTML = data;
                })
                .catch(error => console.error('Error al cargar el contenido:', error));
        }