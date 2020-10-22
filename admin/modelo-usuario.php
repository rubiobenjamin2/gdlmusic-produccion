<?php
 error_reporting(E_ALL);
 //ini_set('display_errors', '1');
//echo var_dump($_POST);
include_once 'funciones/funciones.php';//conecta a la bas e de datos
//para comprobar que se ha conectado a la base de datos
/*if ($conn->ping()) {
    echo "Conectado";
} else {
    echo "No conectado";
}*/
//datos mandados de ajax
$usuario = $_POST['usuario'];
$correo_usuario = $_POST['correo_usuario'];
$pagado = $_POST['pagado'];
$password = $_POST['password'];
$id_registro = $_POST['id_registro'];




if($_POST['registro'] == 'nuevo') { //agregar-admin es el input de tipo hidden que se envia

    //die(json_encode($_POST)); //esto es para ver q realmente se esten enviando los datos de ajax a insert-admin 
                              // y die tmb hace que el codigo de abajo no se ejecute
   

$opciones = array(
    'cost' => 12
);
//PASSWORD_BCRYPT encripta el password en una cadena de 60 caracteres. mientras el cost mas alto mejor 
//encriptado pero mas tardado para el servidor
$password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
//echo $password_hashed;

    try {
        //aqui en insert fue tambien necesario agregar el campo editado
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre_usuario, email_usuario, password, pagado, fecha_registro,editado) VALUES (?, ?, ?, 0, NOW(), NOW())");
    $stmt->bind_param("sss", $usuario, $correo_usuario, $password_hashed);
    $stmt->execute();
    //print_r($stmt);
    $id_registro = $stmt->insert_id;
    if($id_registro > 0) {
        
        $respuesta = array(
            'respuesta' => 'exitoso',
            'usuario' => $usuario,
            'id_admin' => $id_registro   
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
        echo "Error" . $e->getMessage();
    }
    die(json_encode($respuesta));

}

if($_POST['registro'] == 'actualizar') {
    //die(json_encode($_POST));
    
    
    
    try {
         //se agrega el campo el campo editado xq mysql no permite actualizar los datos con los mismo datos
         //asi que con este campo y NOW() agregara la hora actual creando asi un campo unico.
         //es recomendable usar esta tecnica cuando se use update
        if(empty($_POST['password'])) {
            $stmt = $conn->prepare('UPDATE usuarios SET nombre_usuario = ?, email_usuario = ?, pagado = ?, editado = NOW() WHERE id_usuario = ?');
            $stmt->bind_param("ssii", $usuario, $correo_usuario, $pagado, $id_registro); 

        } else { // si se va actualizar el password
            $opciones = array(
                'cost' => 12
            );
            //PASSWORD_BCRYPT encripta el password en una cadena de 60 caracteres. mientras el cost mas alto mejor 
            //encriptado pero mas tardado para el servidor
            $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
    
            $stmt = $conn->prepare('UPDATE usuarios SET nombre_usuario = ?, email_usuario = ?, password = ?, pagado = ?, editado = NOW() WHERE id_usuario = ? ');
            $stmt->bind_param("sssii", $usuario, $correo_usuario, $hash_password, $pagado, $id_registro);

        }

        
        $stmt->execute();
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $id_registro  
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



if($_POST['registro'] == 'eliminar') {
    //die(json_encode($_POST));
    $id_borrar = $_POST['id']; //id mandado de ajax

    try {
        $stmt = $conn->prepare('DELETE FROM usuarios WHERE id_usuario = ? ');
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