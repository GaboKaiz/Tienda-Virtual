document.addEventListener("DOMContentLoaded", function() {
    var images = [
        "url(../imagenes/roks.jpg)",
        "url(../imagenes/cambiante.png)",
        "url(../imagenes/mamasita.png)"
    ]; // Lista de URLs de imágenes
    var currentIndex = 0; // Índice de la imagen actual
    
    function changeBackground() {
        // Cambia la imagen de fondo
        document.querySelector(".primero").style.backgroundImage = images[currentIndex];
        // Actualiza el índice para la siguiente imagen
        currentIndex = (currentIndex + 1) % images.length;
    }

    // Cambia automáticamente la imagen de fondo cada 10 segundos
    setInterval(changeBackground, 10000);
});
;