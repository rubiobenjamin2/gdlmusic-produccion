<?php

include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';//conecta a la base de datos

//$sql = "SELECT fecha_registro, COUNT(*) AS resultado FROM registrados GROUP BY fecha_registro ORDER BY fecha_registro " ;
//usuarios x años
//$sql = "SELECT YEAR(fecha_registro) AS anio, COUNT(*) AS usuarios FROM registrados WHERE YEAR(fecha_registro) >= '2016' && YEAR(fecha_registro) <= '2019'  GROUP BY YEAR(fecha_registro) " ;
//usuarios x meses y años
$sql = "SELECT YEAR(fecha_registro) AS anio, MonthName(fecha_registro) AS mes, COUNT(*) AS usuarios FROM registrados WHERE YEAR(fecha_registro) > '2016' && YEAR(fecha_registro) < '2019'  GROUP BY MonthName(fecha_registro), YEAR(fecha_registro) " ;
$resultado = $conn->query($sql);

$arreglo_registros = array();
while ($registro_dia = $resultado->fetch_assoc()) {
    /*echo "<pre>";
    var_dump(json_encode($registro_dia));
    echo "</pre>";*/
    //$fecha = $registro_dia['fecha_registro'];
    //$registro['fecha'] = date('Y-m-d', strtotime($fecha)); //Eliminamos la hora minutos y segundos. Esta array $registro nose declara fuera xq se reescribe en cada iteración
    
    //$registro['cantidad'] = $registro_dia['resultado'];
    
    $registro['anios'] = $registro_dia['anio'];
    $registro['cantidad'] = $registro_dia['usuarios'];

    $arreglo_registros[] = $registro;
}

   /*echo "<pre>";
    var_dump(json_encode($arreglo_registros));
    echo "</pre>";*/
   
    echo json_encode($arreglo_registros);


?>