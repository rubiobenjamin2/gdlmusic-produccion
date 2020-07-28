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

$nombre = $_POST['nombre_invitado'];
$apellido = $_POST['apellido_invitado'];
$biografia = $_POST['biografia_invitado'];
$id_registro = $_POST['id_registro'];

if($_POST['registro'] == 'nuevo') { //agregar-admin es el input de tipo hidden que se envia
    /*$respuesta = array(
        'post' => $_POST,
        'file' => $_FILES
    );*/
        
    //die(json_encode($respuesta)); //esto es para ver q realmente se esten enviando los datos de ajax a insert-admin 
                              // y die tmb hace que el codigo de abajo no se ejecute
    //die(json_encode($_POST));  

    //ubicacion donde se subiran las imagenes que sera en la raiz y no dentro de admin
    $directorio = "../img/invitados/";
    if(!is_dir($directorio)){
        mkdir($directorio, 0755, true);//crea la carpeta
        
    }

    //se mueve el archivo de la ubicacion temporal a la final
    if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])) {
        $imagen_url = $_FILES['archivo_imagen']['name'];
        $imagen_resultado = "Se cargó correctamente";
    } else {
        $respuesta = array(
            'respuesta' => error_get_last()
         );
    }
    
   /* $respuesta = array(
        'post' => $_POST,
        'file' => $_FILES,
        'result_imagen' => $imagen_url
    );
        
    die(json_encode($respuesta));*/
    
    //las sentecias prepare previenen inyeccion sql
    try {
        $stmt = $conn->prepare("INSERT INTO invitados (nombre_invitado, apellido_invitado, descripcion, url_imagen, editado) VALUES (?,?,?,?,NOW())");
        //$stmt = $conn->prepare(" INSERT INTO `invitados` ( `nombre_invitado`, `apellido_invitado`, `descripcion`, `url_imagen`, editado = NOW()) VALUES (?, ?, ?, ?) ");
        $stmt->bind_param("ssss", $nombre, $apellido, $biografia, $imagen_url);
        $stmt->execute();
        $id_insertado = $stmt->insert_id;
        
    if($stmt->affected_rows) {
        $respuesta = array(
            'respuesta' => 'exito',
            'id_insertado' => $id_insertado,
            'resultado_imagen' => $imagen_resultado   
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
   
   /*$respuesta = array(
        'post' => $_POST,
        'file' => $_FILES
    );*/
        
    //die(json_encode($respuesta)); //esto es para ver q realmente se esten enviando los datos de ajax a insert-admin 
                              // y die tmb hace que el codigo de abajo no se ejecute

     //ubicacion donde se subiran las imagenes que sera en la raiz y no dentro de admin
     $directorio = "../img/invitados/";
     if(!is_dir($directorio)){
         mkdir($directorio, 0755, true);//crea la carpeta
         
     }
 
     //se mueve el archivo de la ubicacion temporal a la final
     if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])) {
         $imagen_url = $_FILES['archivo_imagen']['name'];
         $imagen_resultado = "Se cargó correctamente";
     } else {
         $respuesta = array(
             'respuesta' => error_get_last()
          );
     }
     
    /* $respuesta = array(
         'post' => $_POST,
         'file' => $_FILES,
         'result_imagen' => $imagen_url
     );
         
     die(json_encode($respuesta));*/
    
    try {
        if ($_FILES['archivo_imagen']['size'] > 0) {
            //con imagen

            //se agrega el campo el campo editado xq mysql no permite actualizar los datos con los mismo datos
         //asi que con este campo y NOW() agregara la hora actual creando asi un campo unico.
         //es recomendable usar esta tecnica cuando se use update

            $stmt = $conn->prepare('UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion = ?, url_imagen = ?,  editado = NOW() WHERE invitado_id = ?');
            $stmt->bind_param("ssssi", $nombre, $apellido, $biografia, $imagen_url, $id_registro);
            
        } else {
            //sin imagen
            $stmt = $conn->prepare('UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion = ?, editado = NOW() WHERE invitado_id = ?');
            $stmt->bind_param("sssi", $nombre, $apellido, $biografia, $id_registro);
            
        }
         
        $stmt->execute();
        $registros = $stmt->affected_rows;
        if ($registros > 0) {
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
        $stmt = $conn->prepare('DELETE FROM invitados WHERE invitado_id = ? ');
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



