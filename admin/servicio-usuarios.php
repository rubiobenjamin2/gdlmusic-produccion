<?php

include_once 'funciones/funciones.php'; //conecta a la base de datos

//$sql = "SELECT DATE(fecha_registro) AS fecha,COUNT(*) AS resultado FROM registrados GROUP BY DATE(fecha_registro) ORDER BY DATE(fecha_registro)" ;
//usuarios x años
//$sql = "SELECT YEAR(fecha_registro) AS anio, COUNT(*) AS usuarios FROM registrados WHERE YEAR(fecha_registro) >= '2016' && YEAR(fecha_registro) <= '2019'  GROUP BY YEAR(fecha_registro) " ;
//usuarios x meses y años
//$sql = "SELECT YEAR(fecha_registro) AS anio, MonthName(fecha_registro) AS mes, COUNT(*) AS usuarios FROM registrados WHERE YEAR(fecha_registro) > '2016' && YEAR(fecha_registro) < '2019'  GROUP BY MonthName(fecha_registro), YEAR(fecha_registro) " ;
//$sql = "SELECT YEAR(fecha_registro) AS anio, MonthName(fecha_registro) AS mes, COUNT(*) AS usuarios FROM usuarios WHERE YEAR(fecha_registro) >= '2021' GROUP BY YEAR(fecha_registro), MonthName(fecha_registro)";
$sql = "SELECT DATE(fecha_registro) AS fecha, COUNT(*) AS resultado FROM usuarios WHERE YEAR(fecha_registro) >= '2020' && YEAR(fecha_registro) <= '2021' GROUP BY DATE(fecha_registro) ORDER BY DATE(fecha_registro)";
$resultado = $conn->query($sql);
$arreglo_registros = array();
while ($registro_dia = $resultado->fetch_assoc()) {
    /*echo "<pre>";
    var_dump($registro_dia);
    echo "</pre>";*/
    $fecha = $registro_dia['fecha'];
    //Quitamos el dia en la fecha para que nos grafique mejor en la parte responsiva
    $registro['fecha'] = date('Y-m', strtotime($fecha)); //Eliminamos la hora minutos y segundos. Esta array $registro nose declara fuera xq se reescribe en cada iteración
    $registro['cantidad'] = $registro_dia['resultado'];
    
    //$registro['anios'] = $registro_dia['anio'];
    //$registro['cantidad'] = $registro_dia['usuarios'];

    $arreglo_registros[] = $registro;
}

    /*echo "<pre>";
    var_dump (json_encode($arreglo_registros));
    echo "</pre>";*/
   
    echo json_encode($arreglo_registros);
