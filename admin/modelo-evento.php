<?php
 error_reporting(E_ALL);
 //ini_set('display_errors', '1');
//echo var_dump($_POST);
include_once 'funciones/funciones.php';//conecta a la base de datos
//para comprobar que se ha conectado a la base de datos
/*if ($conn->ping()) {
    echo "Conectado";
} else {
    echo "No conectado";
}*/

$titulo = $_POST['titulo_evento'];
$categoria_id = $_POST['categoria_evento'];
$invitado_id = $_POST['invitado'];
$hora = $_POST['hora_evento'];
$id_registro = $_POST['id_registro'];


//obtener fecha y darle formato xq venia invertida
$fecha = $_POST['fecha_evento'];
$fecha_formateada = date('Y-m-d', strtotime($fecha));

//dar formato a la hora
$hora_formateada = date('H:i', strtotime($hora));
/*$horas = array(
    'hora' => $hora,
    'formateada' => $hora_formateada
);*/




if($_POST['registro'] == 'nuevo') { //agregar-admin es el input de tipo hidden que se envia
    /*$respuesta = array(
        'fecha' => $fecha_formateada
    );*/
        
    //die(json_encode($respuesta)); //esto es para ver q realmente se esten enviando los datos de ajax a insert-admin 
                              // y die tmb hace que el codigo de abajo no se ejecute
    //die(json_encode($_POST));                          
    
    //las sentecias prepare previenen inyeccion sql
    try {
    $stmt = $conn->prepare("INSERT INTO eventos (nombre_evento, fecha_evento, hora_evento, id_cat_evento, id_inv, clave, editado) VALUES (?, ?, ?, ?, ?, ' ', NOW())");
    $stmt->bind_param("sssii", $titulo, $fecha_formateada, $hora_formateada, $categoria_id, $invitado_id);
    $stmt->execute();
    $id_insertado = $stmt->insert_id;
    if($stmt->affected_rows) {
        $respuesta = array(
            'respuesta' => 'exito',
            'id_insertado' => $id_insertado   
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
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));

}

if($_POST['registro'] == 'actualizar') {
   
   //die(json_encode($horas));
   
    
    try {
        //se agrega el campo el campo editado xq mysql no permite actualizar los datos con los mismo datos
         //asi que con este campo y NOW() agregara la hora actual creando asi un campo unico.
         //es recomendable usar esta tecnica cuando se use update
        $stmt = $conn->prepare('UPDATE eventos SET nombre_evento = ?, fecha_evento = ?, hora_evento = ?, id_cat_evento = ?, id_inv = ?, editado = NOW() WHERE evento_id = ?');
        $stmt->bind_param("sssiii", $titulo, $fecha_formateada, $hora_formateada, $categoria_id, $invitado_id, $id_registro);
        $stmt->execute();
        //$id_insertado = $stmt->insert_id; no me regresa el id esta instruccion
        if ($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $id_registro
            );
           // die(json_encode($respuesta));
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }



       
        $stmt->close();
        $conn->close();


    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}



if($_POST['registro'] == 'eliminar') {
    //die(json_encode($_POST));
    $id_borrar = $_POST['id'];

    try {
        $stmt = $conn->prepare('DELETE FROM eventos WHERE evento_id = ? ');
        $stmt->bind_param('i', $id_borrar);
        $stmt->execute();
        if($stmt->affected_rows){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar 
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'   
            );
        }
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()   
        );
    }

    die(json_encode($respuesta));
}




?>