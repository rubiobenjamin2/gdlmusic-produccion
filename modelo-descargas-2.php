<?php

/* Este modelo es para los que no están registrados */
if(isset($_POST['descarga-pdf5'])) {

    /*echo "<pre>";
echo var_dump($_POST) . "<br>";
echo $id_usuario;

echo "</pre>";*/
 $respuesta = array(
                    'respuesta' => 'exito'
                    
                );
                
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
            die(json_encode($respuesta));

?>