<?php include_once 'includes/templates/header.php'; ?>
      
     
      
<link rel="stylesheet" type="text/css" href="main.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />
       
       <section class="seccion contenedor">
         <h2>Calendario de Eventos</h2>
         
         <?php
            
           try{
               require_once('includes/funciones/bd_conexion.php');
             
               
              $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
              $sql.="FROM eventos ";
              $sql.="INNER JOIN categoria_evento ";
              $sql.="ON eventos.id_cat_evento=categoria_evento.id_categoria ";
              $sql.="INNER JOIN invitados ";
              $sql.="ON eventos.id_inv=invitados.invitado_id ";
              $sql.="ORDER BY evento_id ";
               
               
               
               
               $resultado=$conn->query($sql);
               
               
           }catch(Exception $e){
               echo $e->getMessage();
                   
           }
           
           ?>
           
           <div class="calendario">
              
              <?php
               
               $calendario=array();
               
               while($eventos=$resultado->fetch_assoc()){
                   
                   //obtiene fecha del evento para agrupar el arreglo
                   
                   $fecha=$eventos['fecha_evento'];
                  
                   $evento=array(
                       'titulo' => $eventos['nombre_evento'],
                       'fecha' => $eventos['fecha_evento'],
                       'hora' => $eventos['hora_evento'],
                       'categoria' => $eventos['cat_evento'],
                       'icono' => $eventos['icono'],
                       'invitado' => $eventos['nombre_invitado']." ". $eventos['apellido_invitado']
                        ) ;
                       
                   $calendario[$fecha][]=$evento;
                   
                   ?>
            
               <?php }  //while ?> 
               
               
               <?php
               //imprime los eventos
               foreach($calendario as $dia => $lista_eventos1) { ?>
                   <h3>
                    <i class="fa fa-calendar"></i>
                       <?php 
                       
                        //FEcha en español en windows                                       
                        setlocale(LC_TIME, 'es_ES.UTF-8');
                                                               
                        echo strftime("%A, %d de %B del %Y", strtotime($dia) );
                       
                       
                       
                       ?>
                   </h3>
                   
                   <?php foreach($lista_eventos1 as $evento1) { ?>
                           <div class="dia">
                               <p class="titulo"><?php echo $evento1['titulo']; ?></p>
                                <p class="hora"><i class="fa fa-clock-o" aria-hidden="true"></i> 
                                <?php echo $evento1['fecha'] ." ". $evento1['hora']; ?>
                                </p>
                                <p>
                                 <i class="fa <?php echo $evento1['icono']; ?>" aria-hidden="true"></i>
                                  <?php echo $evento1['categoria']; ?></p>
                                <p><i class="fa fa-user" aria-hidden="true"></i>
                                <?php echo $evento1['invitado']; ?>
                                </p>
                                
                               
               </div>    
                           
                           
                     <?php  } //foreach de lista_eventos ?>
                   
                   
             <?php  } //foreach de dia?> 
               
               
               

               
           </div> <!--calendario-->
           
           
           
           <?php
           $conn->close();
           ?>
  
          
       </section><!--seccion-->
       <?php include_once'includes/templates/footer.php'; ?> 
       