<?php
use PayPal\Api\Payer; //para poder usar la clase Payer la importamos
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

/*
echo "<pre>";
var_dump($_POST);

echo "</pre>";*/

//Insertar en la BD
if(!isset($_POST['submit'])){
    echo "<h1>";
    exit("Hubo un error");
    echo "</h1>";
}



require 'includes/paypal.php';


 if(isset($_POST['submit'])):
    
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $regalo = $_POST['regalo'];
    $total = $_POST['total_pedido'];
    $fecha = date('Y-m-d H:i:s');

    // Pedidos
    
    $boletos = $_POST['boletos'];
    $numero_boletos = $boletos; // hacemos una copia de boletos para obtener el numero
    $pedidoExtra = $_POST['pedido_extra'];
    $camisas = $_POST['pedido_extra']['camisas']['cantidad'];
    $precioCamisa = $_POST['pedido_extra']['camisas']['precio'];
    $etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];
    $precioEtiquetas = $_POST['pedido_extra']['etiquetas']['precio'];
     
  
    include_once 'includes/funciones/funciones.php';
    $pedido = productos_json($boletos, $camisas, $etiquetas);
    
    //eventos
    $eventos = $_POST['registro'];
    $registro = eventos_json($eventos);
    
    
    // para imprimir lo q nos manda la funcion productos_jason
    /*echo "<pre>";
       var_dump($numero_boletos);
    echo "</pre>";
    
     echo "<hr>";  

     exit;*/
   
     //unimos la parte de validar_registro.php con pagar.php
    
   try{
      require_once('includes/funciones/bd_conexion.php');    
       //prepara a la base de datos para una insercion de datos         
      $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrado, regalo, total_pagado) VALUES(?,?,?,?,?,?,?,?)");
       //s significa cadena e i entero, en el orden de los datos del INSERT 
       $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
       $stmt->execute();
       $ID_registro = $stmt->insert_id; //gurdamaos el id del registro
       $stmt->close();
       $conn->close();
       
       //Para evitar que se registre varias veces un mismo registro 
       // es decir para evitar duplicar un registro al recargar
       //la página. Se redirecciona
       //a la misma pagina. 
       header('Location: validar_registro.php?exitoso=1');
      
      
  }catch(Exception $e){
      echo $e->getMessage();
          
  }
 
endif; 



$compra = new Payer();
$compra->setPaymentMethod('paypal');//establecemos el método de pago
//echo $compra->getPaymentMethod();


$articulo = new Item();
$articulo->setName($producto);//el nombre del producto
$articulo->setCurrency('MXN');//El tipo de moneda
$articulo->setQuantity(1);//la cantidad de articulos a vender
$articulo->setPrice($precio);
//echo $articulo;

//Este foreach es x si tuvieramos una gran cantidad de boletos 
$i = 0;
$arreglo_pedido = array();
foreach ($numero_boletos as $key => $value) {
    if ((int) $value['cantidad'] > 0) {
        
        ${"articulo$i"} = new Item();
        $arreglo_pedido[] = ${"articulo$i"};
        ${"articulo$i"}->setName('Pase: ' . $key);//el nombre del producto
        ${"articulo$i"}->setCurrency('MXN');//El tipo de moneda
        ${"articulo$i"}->setQuantity((int) $value['cantidad']);//la cantidad de articulos a vender
        ${"articulo$i"}->setPrice((int) $value['precio']);

        $i++;
    }
}
//echo $articulo0;
//echo $i;

foreach ($pedidoExtra as $key => $value) {
    if ((int) $value['cantidad'] > 0) {

        if ($key == 'camisas') {
            $precio = (float) $value['precio'] * .93;

        } else {
            $precio = (int) $value['precio'];
        }
        
        ${"articulo$i"} = new Item();
        $arreglo_pedido[] = ${"articulo$i"};
        ${"articulo$i"}->setName('Extras: ' . $key);//el nombre del producto
        ${"articulo$i"}->setCurrency('MXN');//El tipo de moneda
        ${"articulo$i"}->setQuantity((int) $value['cantidad']);//la cantidad de articulos a vender
        ${"articulo$i"}->setPrice($precio);

        $i++;
    }
}

//echo $articulo2;
//echo $i;


$listaArticulos = new ItemList();//listas de articulos
$listaArticulos->setItems($arreglo_pedido);
/*echo "<pre>";
       var_dump($listaArticulos);
    echo "</pre>";*/
//echo $listaArticulos; 

/*$detalles = new Details(); //detalles de la venta
$detalles->setShipping($envio)
          ->setSubtotal($precio);
          //echo $detalles;*/
  
$cantidad = new Amount();   
$cantidad->setCurrency('MXN')
         ->setTotal($total);
         //->setDetails($detalles);
         //echo $cantidad->getTotal();  
         //echo "<BR>";
        
$transaccion = new Transaction();
$transaccion->setAmount($cantidad)
            ->setItemList($listaArticulos)
            ->setDescription('Pago GDLWEBCAMP')
            ->setInvoiceNumber($ID_registro); //el regitro de la persona que esta pagando. uniqid funcion que genera un  id aleatorio 
            //echo $transaccion;
            //echo $transaccion->getInvoiceNumber();
            

$redireccionar = new RedirectUrls();
$redireccionar->setReturnUrl(URL_SITIO . "/pago_finalizado.php?&id_pago={$ID_registro}")//redirecciona a esta pagina despues de haber pagado
              ->setCancelUrl(URL_SITIO . "/pago_finalizado.php?&id_pago={$ID_registro}");
              //echo $redireccionar->getReturnUrl();

$pago = new Payment();
$pago ->setIntent("sale")
      ->setPayer($compra)
      ->setRedirectUrls($redireccionar)
      ->setTransactions(array($transaccion));
      
      try {
          $pago->create($apiContext);
          echo "resulto";
      } catch (PayPal\Exception\PayPalConnectionException $pce) {
          //echo "<pre>";
          print_r(json_decode($pce->getData()));
          //var_dump(json_decode($pce->getData()));
          //exit;
          
         // echo "</pre>";
          
      } 

      $aprobado = $pago->getApprovalLink();
      header("Location: {$aprobado}"); 
              

?>