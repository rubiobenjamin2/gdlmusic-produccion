$(document).ready(function () {
//Animaciones para los nùmeros (parallax)
var resumenLista = jQuery('.resumen-evento');
var varContador = document.getElementById('var-contador').value;
var varUsuarios = document.getElementById('var-usuarios').value;
var varPartituras = document.getElementById('var-partituras').value;
var varDescargas = document.getElementById('var-descargas').value;
//console.log(varContador);
if (resumenLista.length > 0) {
    $('.resumen-evento').waypoint(function () {
        $('.resumen-evento li:nth-child(1) p').animateNumber({ number: varContador }, 1200);
        $('.resumen-evento li:nth-child(2) p').animateNumber({ number: varUsuarios }, 1200);
        $('.resumen-evento li:nth-child(3) p').animateNumber({ number: varPartituras }, 1200);
        $('.resumen-evento li:nth-child(4) p').animateNumber({ number: varDescargas }, 1500);

    }, {
        offset: '60%'
    });
}
}) 