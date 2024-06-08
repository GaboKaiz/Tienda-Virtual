const carousel = document.querySelector('.carousel');
const items = document.querySelectorAll('.item');

// Clonar los elementos del carrusel
items.forEach(item => {
  const clone = item.cloneNode(true);
  carousel.appendChild(clone);
});

// Configurar la transición continua
let counter = 0;
const interval = setInterval(() => {
  counter++;
  carousel.style.transform = `translateX(${-counter * 100}%)`;
}, 3000); // Cambiar la imagen cada 3 segundos
