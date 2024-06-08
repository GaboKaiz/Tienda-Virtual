function mostrarContenido(seccion) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Actualizar el contenido de la sección con la respuesta obtenida
            document.getElementById("contenido").innerHTML = this.responseText;
        }
    };
    // Cargar el contenido de la sección correspondiente
    xhttp.open("GET", seccion + ".html", true);
    xhttp.send();
}

function volverAlInicio() {
    // Establecer el contenido inicial (puede ser vacío o contenido por defecto)
    document.getElementById("contenido").innerHTML = "";
}

function mostrarDatosRegistrados() {
    // Muestra el contenido de los datos registrados en el contenedor
    var contenidoRegistrado = document.getElementById("contenidoRegistrado");
    contenidoRegistrado.innerHTML = "";
}

