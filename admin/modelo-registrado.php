<?php
include_once 'funciones/funciones.php';
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
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];

//Boletos
$boletos_adquiridos = $_POST['boletos'];
// camisas y etiquetas
$camisas = $_POST['pedido_extra']['camisas']['cantidad']; 
$etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];
$pedido = productos_json($boletos_adquiridos, $camisas, $etiquetas);
$total = $_POST['total_pedido'];
$regalo = $_POST['regalo'];
$eventos = $_POST['registro_evento'];
$registro_eventos = eventos_json($eventos);

$fecha_registro = $_POST['fecha_registro'];
$id_registro = $_POST['id_registro'];

if($_POST['registro'] == 'nuevo') { //agregar-admin es el input de tipo hidden que se envia
    /*$respuesta = array(
        'fecha' => $fecha_formateada
    );*/
    /*$respuesta = array(
        'boletos' => $pedido
    );*/
        
    //die(json_encode($_POST)); //esto es para ver q realmente se esten enviando los datos de ajax a insert-admin 
                              // y die tmb hace que el codigo de abajo no se ejecute
    //die(json_encode($_POST));                          
    
    //las sentecias prepare previenen inyeccion sql
    try {
        $stmt = $conn->prepare('INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrado, regalo, total_pagado, pagado) VALUES (?, ?, ?, NOW(), ?,?,?,?, 1) ');
        $stmt->bind_param("sssssis", $nombre, $apellido, $email, $pedido, $registro_eventos, $regalo, $total);
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
   
   //die(json_encode($_POST));
    
    try {
        //se agrega el campo el campo editado xq mysql no permite actualizar los datos con los mismo datos
         //asi que con este campo y NOW() agregara la hora actual creando asi un campo unico.
         //es recomendable usar esta tecnica cuando se use update
        $stmt = $conn->prepare('UPDATE registrados SET nombre_registrado = ?, apellido_registrado = ?, email_registrado = ?, fecha_registro = ?, pases_articulos = ?, talleres_registrado = ?, regalo = ?, total_pagado = ?, pagado = 1  WHERE ID_Registrado = ?');
        $stmt->bind_param("ssssssisi", $nombre, $apellido, $email, $fecha_registro, $pedido, $registro_eventos, $regalo, $total, $id_registro);
        $stmt->execute();
        $id_insertado = $stmt->insert_id;
        if ($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $id_insertado
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
        $stmt = $conn->prepare('DELETE FROM registrados WHERE ID_Registrado = ? ');
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