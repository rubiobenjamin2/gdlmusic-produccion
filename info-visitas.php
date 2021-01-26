<?php
 include_once 'includes/funciones/bd_conexion.php';
//para comprobar que se ha conectado a la base de datos
/*if ($conn->ping()) {
    echo "Conectado";
} else {
    echo "No conectado";
}*/
//Almacenamos los datos de esta seccion en un arreglo para usarlos en la página de estadísticas

//Almacenamos los datos de esta seccion en un arreglo para usarlos en la página de estadísticas
$arreglo_datos = array();
//$datos['campo'];
//$datos['valor'];



// Contador de visitas 



$fp = fopen("contador.txt", "r+");
$counter = fgets($fp, 7);
//echo $counter;
$counter++;
rewind($fp);
fputs($fp, $counter);
fclose($fp);

//Guardamos valores 
$datos['campo'] = "Visitas";
$datos['valor'] = $counter;
$arreglo_datos[] = $datos;


//No. de  usuarios 

try {
    $sql = "SELECT COUNT(*) AS registrados FROM usuarios";
    $resultado = $conn->query($sql);
    $registrados = $resultado->fetch_assoc();
    /*echo "<pre>";
var_dump($registrados);
echo "</pre>";*/

    //Guardamos valores 
    $datos['campo'] = "Usuarios";
    $datos['valor'] = $registrados['registrados'];
    $arreglo_datos[] = $datos;
} catch (Exception $e) {
    $error = $e->getMessage();
    echo $error;
}

// No. de  partituras

try {
    $sql = "SELECT COUNT(*) AS partituras FROM partituras";
    $resultado = $conn->query($sql);
    $registrados = $resultado->fetch_assoc();
    /*echo "<pre>";
var_dump($registrados);
echo "</pre>";*/

    //Guardamos valores 
    $datos['campo'] = "Partituras";
    $datos['valor'] = $registrados['partituras'];
    $arreglo_datos[] = $datos;
} catch (Exception $e) {
    $error = $e->getMessage();
    echo $error;
}

// No. de  descargas 

try {
    $sql = "SELECT COUNT(*) AS descargas FROM descargas";
    $resultado = $conn->query($sql);
    $registrados = $resultado->fetch_assoc();
    /*echo "<pre>";
var_dump($registrados);
echo "</pre>";*/

    //Guardamos valores 
    $datos['campo'] = "Descargas";
    $datos['valor'] = $registrados['descargas'];
    $arreglo_datos[] = $datos;
} catch (Exception $e) {
    $error = $e->getMessage();
    echo $error;
}
$conn->close(); //Cerramos la conexión a la BBDD
//$arreglo_datos[] = $datos;
 /*echo "<pre>";
 var_dump(json_encode($arreglo_datos));
 echo "</pre>";*/
echo json_encode($arreglo_datos);
?>
