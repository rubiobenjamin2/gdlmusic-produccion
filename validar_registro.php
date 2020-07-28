  
   <?php if(isset($_POST['submit'])):
     
             $nombre = $_POST['nombre'];
             $apellido = $_POST['apellido'];
             $email = $_POST['email'];
             $regalo = $_POST['regalo'];
             $total = $_POST['total_pedido'];
             $fecha = date('Y-m-d H:i:s');
    
             // Pedidos
             
             $boletos = $_POST['boletos'];
             $camisas = $_POST['pedido_camisas'];
             $etiquetas = $_POST['pedido_etiquetas'];
     
           
             include_once 'includes/funciones/funciones.php';
             $pedido = productos_json($boletos, $camisas, $etiquetas);
             
             //eventos
             $eventos = $_POST['registro'];
             $registro = eventos_json($eventos);
             
             
             // para imprimir lo q nos manda la funcion productos_jason
            /* echo "<pre>";
                var_dump($registro);
             echo "</pre>";
             
              echo "<hr>";  */  
    
            try{
               require_once('includes/funciones/bd_conexion.php');    
                //prepara a la base de datos para una insercion de datos         
               $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrado, regalo, total_pagado) VALUES(?,?,?,?,?,?,?,?)");
                //s significa cadena e i entero, en el orden de los datos del INSERT 
                $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
                $stmt->execute();
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
    
    
          ?>

    <?php endif; ?>


<?php include_once 'includes/templates/header.php'; ?>
<section class="seccion contenedor">
          <h2>Resumen Registro</h2>
          
          <?php if(isset($_GET['exitoso'])):
                if($_GET['exitoso'] == "1"):
                  echo "<h1>";  
                  echo "Registro exitoso";
                  echo "</h1>"; 
                endif;
                
    
    
          endif; ?>
          
    
</section>
<?php include_once'includes/templates/footer.php'; ?> 