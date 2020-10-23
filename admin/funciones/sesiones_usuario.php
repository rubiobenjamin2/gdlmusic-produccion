<?php

//Una función que llama a otra
//Si no exite la Sesión redirecciona a la página del login 
function usuario_autenticado() {
    if(!revisar_usuario()) {
        header('Location:admin/login-usuario.php');
        exit();
    }
}

//Esta función revisa que la Sesión tenga información osea que se haya abierto sesión de forma efectiva
function revisar_usuario() {
    return isset($_SESSION['nombre_usuario']);
    
}

session_start();
usuario_autenticado();
