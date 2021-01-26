$(document).ready(function () {
//Animaciones para los nùmeros (parallax)
    //console.log("jhkhkjhkjhkj");
    $.getJSON('info-visitas.php', function (data) { //recibo los datos actualizados de info-visitas.php
        //console.log("si estoy");
        //console.log(data);
        //var campo_registro = [];
        var valor_registro = [];

        for (var i = 0; i < data.length; i++) {
            //campo_registro[i] = data[i].campo;
            valor_registro[i] = data[i].valor;
        }

    //console.log(valor_registro[2]);
  
var resumenLista = jQuery('.resumen-evento');
/*var varContador = document.getElementById('var-contador').value;
var varUsuarios = document.getElementById('var-usuarios').value;
var varPartituras = document.getElementById('var-partituras').value;
var varDescargas = document.getElementById('var-descargas').value;*/
var varContador = valor_registro[0];
var varUsuarios = valor_registro[1];
var varPartituras = valor_registro[2];
var varDescargas = valor_registro[3];

//console.log(varContador);
if (resumenLista.length > 0) {
    $('.resumen-evento').waypoint(function () {
        $('.resumen-evento li:nth-child(1) p').animateNumber({ number: varContador}, 1200);
        $('.resumen-evento li:nth-child(2) p').animateNumber({ number: varUsuarios}, 1200);
        $('.resumen-evento li:nth-child(3) p').animateNumber({ number: varPartituras}, 1200);
        $('.resumen-evento li:nth-child(4) p').animateNumber({ number: varDescargas}, 1500);

    }, {
        offset: '60%'
    });
}
    })

}) 