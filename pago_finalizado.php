<?php include_once 'includes/templates/header.php';

use PayPal\Rest\ApiContext;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Payment;

require 'includes/paypal.php';


?>
<section class="seccion contenedor">
    <h2>Resumen Registro</h2>

    <?php
    //$_resultado = $_GET['exito'];	
    $paymentId = $_GET['paymentId']; //paymentId se inyecta automaticamente en la url	
    $id_pago = (int) $_GET['id_pago'];
    /*echo "<pre>";	
            var_dump($_resultado);	
            echo "</pre>";*/

    // Peticion a REST API	
    $pago = Payment::get($paymentId, $apiContext);
    $execution = new PaymentExecution();
    $execution->setPayerId($_GET['PayerID']); //PayerID se inyecta automaticamente en la url	

    // resultado tiene la informacion de la transaccion 	
    $resultado = $pago->execute($execution, $apiContext);
    /*echo "<pre>";	
            var_dump($resultado);	
            echo "</pre>";*/

    $respuesta = $resultado->transactions[0]->related_resources[0]->sale->state;
    //var_dump($respuesta);	

    //return; // detiene la ejecucion del codigo siguiente 	






    if ($respuesta == "completed") {

        echo "<div class='resultado correcto'>";
        echo "El pago se realizó correctamente <br/>";
        echo "el ID es {$paymentId}";
        echo "</div>";


        require_once('includes/funciones/bd_conexion.php');
        $stmt = $conn->prepare('UPDATE registrados SET pagado = ? WHERE ID_Registrado = ?');
        $pagado = 1;
        $stmt->bind_param('ii', $pagado, $id_pago);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    } else {
        echo "<div class='resultado error'>";
        echo "El pago no se realizó";
        echo "</div>";
    }



    ?>


</section>
<?php include_once 'includes/templates/footer.php'; ?>