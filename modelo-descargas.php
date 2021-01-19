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

/* Este modelo es para los que están registrados e iniciaron sesión */

//////En el modelo no dejar ni un echo solo en el catch porque nos marca error///////////7

session_start();
$id_usuario = $_SESSION['id_usuario'];
$id_partitura = $_POST['id-partitura'];


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
        $sql = "SELECT COUNT(*) as cuenta FROM descargas WHERE Cast(fecha_descarga AS date) = CURRENT_DATE AND id_descarga_usuario = $id_usuario";
        $resultado = $conn->query($sql);
        //$filas  = $resultado->num_rows;
        $partitura = $resultado->fetch_assoc();
        //echo $partitura['cuenta'];
        $num_descargas = $partitura['cuenta'];
        $resultado->close();

        // $num_descargas inicia desde 0 !!ojo
        if ($num_descargas < 3) { //límite de descargas por día. 
           // echo "si descargalo" . $num_descargas; //marca error si lo descomentamos para comprobar. No manda los mensaje sweetalert
            $respuesta = array(
                'respuesta' => 'exito'

            );
            //die(json_encode($respuesta));

            try {


//Insertamos en tabla descargas id de partituras y usuarios para tener un control de descargas
            $stmt = $conn->prepare("INSERT INTO descargas (id_descarga_partitura, id_descarga_usuario, fecha_descarga) VALUES (?, ?, NOW())");
            $stmt->bind_param("ii", $id_partitura, $id_usuario);
            $stmt->execute();
            //print_r($stmt);
            $id_registro = $stmt->insert_id;

                //Insertamos el no_descargas en la tabla de partituras
                //Obtenemos el no_descargas y le vamos sumando 1
               $sql2 = "SELECT no_descargas FROM partituras WHERE id_partitura = $id_partitura";
                $resultado2 = $conn->query($sql2);
                //$filas  = $resultado->num_rows;
                $partitura2 = $resultado2->fetch_assoc();
                //echo $partitura['cuenta'];
                $numero_descargas = ($partitura2['no_descargas'] + 1); 

                $stmt2 = $conn->prepare('UPDATE partituras SET no_descargas = ?, editado = NOW() WHERE id_partitura = ?');
                $stmt2->bind_param("ii", $numero_descargas, $id_partitura);
                $stmt2->execute();
                //print_r($stmt);
                //$id_registro2 = $stmt2->insert_id;

                //$resultado->close();
                //$resultado2->close();

               
            if ($id_registro > 0 && !empty($stmt2->affected_rows)) {

                $respuesta = array(
                    'respuesta' => 'exito',
                    'id' => $id_registro
                    
                );
                //die(json_encode($respuesta));
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
         

              } catch (Exception $e) {
            echo "Error" . $e->getLine() . "<br>";
            echo "Error" . $e->getMessage();
        }
            //die(json_encode($respuesta));
        } else {
            //echo "no puedes descargarlo" . $num_descargas;
            $respuesta = array(
                'respuesta' => 'exceso'
            );
            //die(json_encode($respuesta));
        }
           // $stmt->close();
              $conn->close(); // la variable $conn se cierra hasta el final del código y por esto me marcaba error
         
    } catch (Exception $e) {
        echo "Error" . $e->getLine() . "<br>";
        $error = $e->getMessage();
        
    }
    
    die(json_encode($respuesta));
    
 
}


