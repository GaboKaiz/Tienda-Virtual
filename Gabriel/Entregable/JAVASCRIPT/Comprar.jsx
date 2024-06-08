let currentIndex = 0;

function showNextItem() {
    const carousel = document.querySelector('.carousel');
    const items = document.querySelectorAll('.item');
    currentIndex = (currentIndex + 1) % items.length;
    carousel.style.transition = 'transform 0.5s ease';
    carousel.style.transform = `translateX(-${currentIndex * 20}%)`;

    // Si es el último elemento, reiniciar al principio
    if (currentIndex === items.length - 1) {
        setTimeout(() => {
            carousel.style.transition = 'none';
            carousel.style.transform = 'translateX(0)';
            currentIndex = -1; // Esto hace que la siguiente iteración comience desde el primer elemento
        }, 500);
    }
}

function comprar(productId) {
    alert('Has comprado el producto ' + productId);
    // Aquí puedes añadir la lógica para manejar la compra
}

function agregarCarrito(productId) {
    alert('Has agregado el producto ' + productId + ' al carrito');
    // Aquí puedes añadir la lógica para agregar al carrito
}

// Cambiar de imagen cada 3 segundos
setInterval(showNextItem, 3000);
