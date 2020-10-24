<?php
 error_reporting(E_ALL);
//ini_set('display_errors', '1');
//echo var_dump($_POST);
include_once 'includes/funciones/bd_conexion.php';
//para comprobar que se ha conectado a la base de datos
/*if ($conn->ping()) {
    echo "Conectado";
} else {
    echo "No conectado";
}*/
session_start();
$id_usuario = $_SESSION['id_usuario'];

/*echo "<pre>";
echo var_dump($_POST) . "<br>";
echo $id_usuario;

echo "</pre>";*/




if(isset($_POST['insertar_descarga'])) { //agregar-admin es el input de tipo hidden que se envia

    //die(json_encode($_POST)); //esto es para ver q realmente se esten enviando los datos de ajax a insert-admin 
    // y die tmb hace que el codigo de abajo no se ejecute

    // Recuperamos el número de descargas de usuario por sesión
    //Hacemos un cast a date  a la fecha para eliminar las horas minutos y segundos
    try {
        $sql = "SELECT COUNT(*) as cuenta FROM descargas WHERE Cast(fecha_descarga AS date) = '2020-10-21' AND id_descarga_usuario = '1'";
        $resultado = $conn->query($sql);
        //$filas  = $resultado->num_rows;
        $partitura = $resultado->fetch_assoc();
        //echo $partitura['cuenta'];
        $num_descargas = $partitura['cuenta'];

        $resultado->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error" . $e->getLine() . "<br>";
        $error = $e->getMessage();
        echo $error;
    }
   

  if($num_descargas <= 3) {
      //echo "si descargalo" . $num_descargas;
        $respuesta = array(
            'respuesta' => 'exito'

        );
                //die(json_encode($respuesta));

       /* try {
            //aqui en insert fue tambien necesario agregar el campo editado
            $stmt = $conn->prepare("INSERT INTO descargas (id_descarga_partitura, id_descarga_usuario, fecha_descarga) VALUES (?, ?, NOW())");
            $stmt->bind_param("ii", $id_partitura, $id_usuario);
            $stmt->execute();
            //print_r($stmt);
            $id_registro = $stmt->insert_id;
            if ($id_registro > 0) {

                $respuesta = array(
                    'respuesta' => 'exito'
                    
                );
                //die(json_encode($respuesta));
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            echo "Error" . $e->getLine() . "<br>";
            echo "Error" . $e->getMessage();
        }
        die(json_encode($respuesta));*/



  } else {
         //echo "no puedes descargarlo" . $num_descargas;
       $respuesta = array(
            'respuesta' => 'exceso'
       );
        
       

}

    die(json_encode($respuesta));
    

}


