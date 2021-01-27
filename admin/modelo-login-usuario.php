<?php

if (isset($_POST['login-usuario'])) {
    // die(json_encode($_POST));
    //htmlentities convierte cualquier simbolo en html. addslashes escapa cualquier caracter extraño como barras y comillas y no tomarlas en cuenta. 
    //Con el objetivo de evitar un poco mas la inyecciónsql
    $usuario = htmlentities(addslashes($_POST['usuario']));

    $password = htmlentities(addslashes($_POST['password']));


    try {
        include_once 'funciones/funciones.php'; //conecta a la base de datos
        //para comprobar que se ha conectado a la base de datos
        /*if ($conn->ping()) {
            echo "Conectado";
        } else {
            echo "No conectado";
        }*/

        $stmt = $conn->prepare("SELECT id_usuario, nombre_usuario, password FROM usuarios WHERE nombre_usuario = ?;");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->bind_result($id_usuario, $usuario, $password_usuario);
        if ($stmt->affected_rows) {
            $existe = $stmt->fetch();

            if ($existe) {
                if (password_verify($password, $password_usuario)) {
                    session_start(); //Para abrir una sesión
                    $_SESSION['nombre_usuario'] = $usuario;
                    
                    //date_default_timezone_set("America/Mexico_City");
                    //$_SESSION['fecha_sesion'] = date('Y-m-d');

                    $_SESSION['password_usuario'] = $password_usuario;
                   
                    $_SESSION['id_usuario'] = $id_usuario;
                    $respuesta = array(
                        'respuesta' => 'exitoso',
                       'usuario' => $usuario
                       
                    );
                } else {
                    $respuesta = array(
                        'respuesta' => 'password_incorrecto'

                    );
                }
            } else {
                $respuesta = array(
                    'respuesta' => 'no_existe'
                );
            }
        }
        
      // !!!!!! Haceer esto en los demás modelos y archivos que conecten a base de datos
        $stmt->close();
        $conn->close();
    } catch (\Throwable $th) {
        echo "Error" . $e->getMessage();
    }
    die(json_encode($respuesta));
}
