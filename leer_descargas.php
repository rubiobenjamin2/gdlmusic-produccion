<?php
include_once 'includes/funciones/bd_conexion.php';
//para comprobar que se ha conectado a la base de datos
/*if ($conn->ping()) {
    echo "Conectado";
} else {
    echo "No conectado";
}*/

$buscar = $_POST['buscar'];
$buscar = "am";

try {
        $sql = "SELECT * FROM partituras WHERE nombre_partitura LIKE '%".$buscar."%' OR nombre_artista LIKE '%".$buscar."%' ";
        $resultado = $conn->query($sql);
        $filas  = $resultado->num_rows;
                            
                            
     } catch (Exception $e) {
        $error = $e->getMessage();
        echo $error;
     }
    
     //Comprueba la consulta
     while ($invitado = $resultado->fetch_assoc()) {
     echo "<pre>";
     var_dump($invitado);
     echo "</pre>";
                   } 
                    echo 'Número de total de registros: ' . $filas;


    


?>