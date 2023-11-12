import "flowbite";
import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
    var precios = document.querySelectorAll('.precio');

    precios.forEach(function (precioElement) {
        var precio = parseFloat(precioElement.textContent);
        var decimales = (precio % 1 !== 0) ? precio.toString().split('.')[1].length : 0;

        precioElement.textContent = precio.toLocaleString('es-CO', {
            style: 'currency',
            currency: 'COP',
            minimumFractionDigits: decimales
        });
    });
});
