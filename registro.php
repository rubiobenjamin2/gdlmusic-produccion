<?php include_once'includes/templates/header.php'; ?>
      
      <section class="seccion contenedor">
          <h2>Registro de usuarios</h2>
          
          <form id="registro" class="registro" action="pagar.php" method="post">
             <div id="datos_usuario" class="registro caja clearfix">
                 <div class="campo">
                     <label for="nombre">Nombre:</label>
                     <input type="text" id="nombre" name="nombre" placeholder="tu nombre">
                 </div>
                 <div class="campo">
                     <label for="apellido">Apellido:</label>
                     <input type="text" id="apellido" name="apellido" placeholder="tu apellido">
                 </div>
                 <div class="campo">
                     <label for="email">Email:</label>
                     <input type="text" id="email" name="email" placeholder="tu email">
                 </div>
                 <div id="error"></div>
             </div><!--datos_usuario-->
              
             <div id="paquetes" class="paquetes">
                 <h3>Elige el número de boletos</h3>
                 
                 <ul class="lista-precios clearfix">
                  <li>
                      <div class="tabla-precio">
                          <h3>Pase por día(viernes)</h3>
                          <p class="numero">$30</p>
                          <ul>
                              <li>Bocadillos Gratis</li>
                              <li>Todas las conferencias</li>
                              <li>Todos los talleres</li>
                          </ul>
                          <div class="orden">
                              <label for="pase_dia">Boletos deseados:</label>
                              <input type="number" min="0" id="pase_dia" size="3" name="boletos[un_dia][cantidad]" placeholder="0">
                              <input type="hidden" value="30" name="boletos[un_dia][precio]">
                          </div>
                      </div>
                  </li>
                  
                  <li>
                      <div class="tabla-precio">
                          <h3>Todos los dias</h3>
                          <p class="numero">$50</p>
                          <ul>
                              <li>Bocadillos Gratis</li>
                              <li>Todas las conferencias</li>
                              <li>Todos los talleres</li>
                          </ul>
                          <div class="orden">
                              <label for="pase_completo">Boletos deseados:</label>
                              <input type="number" min="0" id="pase_completo" size="3" name="boletos[completo][cantidad]" placeholder="0">
                              <input type="hidden" value="50" name="boletos[completo][precio]">
                          </div>
                      </div>
                  </li>
                  
                  <li>
                      <div class="tabla-precio">
                          <h3>Pase por 2 días(viernes y sábado)</h3>
                          <p class="numero">$45</p>
                          <ul>
                              <li>Bocadillos Gratis</li>
                              <li>Todas las conferencias</li>
                              <li>Todos los talleres</li>
                          </ul>
                          <div class="orden">
                              <label for="pase_dosdias">Boletos deseados:</label>
                              <input type="number" min="0" id="pase_dosdias" size="3" name="boletos[2dias][cantidad]" placeholder="0">
                              <input type="hidden" value="45" name="boletos[2dias][precio]">
                          </div>
                      </div>
                  </li>
              </ul>
             </div><!--paquetes--> 
             
              <div id="eventos" class="eventos clearfix">
                         <h3>Elige tus talleres</h3>
                         <div class="caja">
                             <?php
                                try {
                                    require_once('includes/funciones/bd_conexion.php');
                                    $sql = "SELECT eventos.*, categoria_evento.cat_evento, invitados.nombre_invitado, invitados.apellido_invitado ";
                                    $sql .= " FROM eventos ";
                                    $sql .= " JOIN categoria_evento ";
                                    $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                                    $sql .= " JOIN invitados ";
                                    $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                                    $sql .= " ORDER BY eventos.fecha_evento, eventos.id_cat_evento, eventos.hora_evento ";
                                    //echo $sql;
                                    $resultado = $conn->query($sql);

                                } catch (Exception $e) {
                                    echo $e->getMessage();
                                }
                                $eventos = $resultado->fetch_assoc();
                                /*echo "<pre>";
                                  var_dump($eventos);  
                                echo "</pre>"; */
                                setlocale(LC_ALL,"es_ES");//cambia los dias de la semana del servidor en español 

                                $eventos_dias = array();
                                while ($eventos = $resultado->fetch_assoc()) {
                                    $fecha = $eventos['fecha_evento'];
                                    $dia_semana = strftime("%A", strtotime($fecha)); //sustrae los dias de la semana
                                    //echo $dia_semana;

                                    $categoria = $eventos['cat_evento']; //almacenamos las categorias para q en el arreglo $eventos_dias poder ordenar x catgoria tmb

                                    //en este arreglo almacenamos el ultimo valor con clave valor
                                    $dia = array(  
                                        'dia' => $dia_semana,
                                        'nombre_evento' => $eventos['nombre_evento'],
                                        'hora' => $eventos['hora_evento'],
                                        'id' => $eventos['evento_id'],
                                        'nombre_invitado' => $eventos['nombre_invitado'],
                                        'apellido_invitado' => $eventos['apellido_invitado']
                                    );
                                    /*echo "<pre>";
                                    var_dump($dia);  
                                    echo "</pre>"; */
                                    $eventos_dias[$dia_semana]['eventos'][$categoria][] = $dia; //almacenamos cada valor del arreglo $dia osea un arreglo multidimensional agrupandolo por $dia_semana eventos y categoria

                                }
                                /*echo "<pre>";
                                    var_dump($eventos_dias);  
                                    echo "</pre>";*/
                                    ?>

                                    <?php foreach($eventos_dias as $dia => $eventos ) { ?>
                               <div id="<?php echo str_replace('á', 'a', $dia); ?>" class="contenido-dia clearfix">
                                   <h4><?php echo $dia; ?></h4>
                                        <?php foreach($eventos['eventos'] as $tipo => $evento_dia): ?>
                                       <div>
                                                    <!-- categoria -->
                                           <p><?php echo $tipo; ?></p> 
                                           <?php foreach($evento_dia as $evento ) { ?>
                                           <label>
                                               <input type="checkbox" name="registro[]" id="<?php echo $evento['id']; ?>" value="<?php echo $evento['id']; ?>">
                                               <time><?php echo $evento['hora']; ?></time> <?php echo $evento['nombre_evento']; ?>
                                               <br>
                                               <span class="autor"><?php echo $evento['nombre_invitado'] . " " . $evento['apellido_invitado'];  ?></span>
                                            </label>
                                        <?php } ?>
                                           
                                       </div>
                                        <?php endforeach; ?>
                                     <!--   <div>
                                           <p>Conferencias:</p>
                                           <label><input type="checkbox" name="registro[]" id="conf_01" value="conf_01"><time>10:00</time> Como ser Freelancer</label>
                                           <label><input type="checkbox" name="registro[]" id="conf_02" value="conf_02"><time>17:00</time> Tecnologías del Futuro</label>
                                           <label><input type="checkbox" name="registro[]" id="conf_03" value="conf_03"><time>19:00</time> Seguridad en la Web</label>
                                       </div>
                                       <div>
                                           <p>Seminarios:</p>
                                           <label><input type="checkbox" name="registro[]" id="sem_01" value="sem_01"><time>10:00</time> Diseño UI y UX para móviles</label>
                                       </div> -->
                               </div> <!--.contenido-dia-->
                                    <?php } ?>
                              <!--  <div id="sabado" class="contenido-dia clearfix">
                                   <h4>Sábado</h4>
                                   <div>
                                         <p>Talleres:</p>
                                         <label><input type="checkbox" name="registro[]" id="taller_06" value="taller_06"><time>10:00</time> AngularJS</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_07" value="taller_07"><time>12:00</time> PHP y MySQL</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_08" value="taller_08"><time>14:00</time> JavaScript Avanzado</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_09" value="taller_09"><time>17:00</time> SEO en Google</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_10" value="taller_10"><time>19:00</time> De Photoshop a HTML5 y CSS3</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_11" value="taller_11"><time>21:00</time> PHP Medio y Avanzado</label>
                                   </div>
                                   <div>
                                         <p>Conferencias:</p>
                                         <label><input type="checkbox" name="registro[]" id="conf_04" value="conf_04"><time>10:00</time> Como crear una tienda online que venda millones en pocos días</label>
                                         <label><input type="checkbox" name="registro[]" id="conf_05" value="conf_05"><time>17:00</time> Los mejores lugares para encontrar trabajo</label>
                                         <label><input type="checkbox" name="registro[]" id="conf_06" value="conf_06"><time>19:00</time> Pasos para crear un negocio rentable</label>
                                   </div>
                                   <div>
                                         <p>Seminarios:</p>
                                         <label><input type="checkbox" name="registro[]" id="sem_02" value="sem_02"><time>10:00</time> Aprende a Programar en una mañana</label>
                                         <label><input type="checkbox" name="registro[]" id="sem_03" value="sem_03"><time>17:00</time> Diseño UI y UX para móviles</label>
                                   </div>
                               </div>  --><!--#sabado-->
                               <!-- <div id="domingo" class="contenido-dia clearfix">
                                   <h4>Domingo</h4>
                                   <div>
                                         <p>Talleres:</p>
                                         <label><input type="checkbox" name="registro[]" id="taller_12" value="taller_12"><time>10:00</time> Laravel</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_13" value="taller_13"><time>12:00</time> Crea tu propia API</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_14" value="taller_14"><time>14:00</time> JavaScript y jQuery</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_15" value="taller_15"><time>17:00</time> Creando Plantillas para WordPress</label>
                                         <label><input type="checkbox" name="registro[]" id="taller_16" value="taller_16"><time>19:00</time> Tiendas Virtuales en Magento</label>
                                   </div>
                                   <div>
                                         <p>Conferencias:</p>
                                         <label><input type="checkbox" name="registro[]" id="conf_07" value="conf_07"><time>10:00</time> Como hacer Marketing en línea</label>
                                         <label><input type="checkbox" name="registro[]" id="conf_08" value="conf_08"><time>17:00</time> ¿Con que lenguaje debo empezar?</label>
                                         <label><input type="checkbox" name="registro[]" id="conf_09" value="conf_09"><time>19:00</time> Frameworks y librerias Open Source</label>
                                   </div>
                                   <div>
                                         <p>Seminarios:</p>
                                         <label><input type="checkbox" name="registro[]" id="sem_04" value="sem_04"><time>14:00</time> Creando una App en Android en una tarde</label>
                                         <label><input type="checkbox" name="registro[]" id="sem_05" value="sem_05"><time>17:00</time> Creando una App en iOS en una tarde</label>
                                   </div>
                               </div> --> <!--#domingo-->
                           </div><!--.caja-->
                     </div> <!--#eventos-->
                     
                     <div id="resumen" class="resumen">
                         <h3>Pago y Extras</h3>
                         <div class="caja clearfix">
                             <div class="extras">
                                 <div class="orden">
                                     <label for="camisa_evento">Camisa del evento $10 <small>(promocion 7% dto.)</small></label>
                                     <input type="number" min="0" id="camisa_evento" name="pedido_extra[camisas][cantidad]" size="3" placeholder="0">
                                     <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
                                 </div><!--orden-->
                                 <div class="orden">
                                     <label for="etiquetas">Paquete de 10 etiquetas $2 <small>(HTML5, CSS3, JavaScript, Chrome)</small></label>
                                     <input type="number" min="0" id="etiquetas" name="pedido_extra[etiquetas][cantidad]" size="3" placeholder="0">
                                     <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
                                 </div><!--orden-->
                                 <div class="orden">
                                     <label for="regalo">Seleccione un regalo</label><br>
                                     <select id="regalo" name="regalo" required>
                                         <option value="">--Seleccione un regalo--</option>
                                         <option value="2">Etiquetas</option>
                                         <option value="1">Pulsera</option>
                                         <option value="3">Plumas</option>
                                         
                                     </select>
                                 </div><!--orden-->
                                 
                                 <input type="button" id="calcular" class="button" value="Calcular">
                                 
                             </div><!--extras-->
                             
                             <div class="total">
                                 <p>Resumen:</p>
                                 <div id="lista-productos">
                                     
                                 </div>
                                 <p>Total:</p>
                                 <div id="suma-total">
                                     
                                 </div>
                                 <input type="hidden" name="total_pedido" id="total_pedido" >
                                 <input id="btnRegistro" type="submit" name="submit" class="button" value="Pagar">
                             </div><!--total-->
                             
                         </div><!--caja clearfix-->
                     </div><!--resumen-->
             
             
          </form>
      </section>
      
    <?php include_once'includes/templates/footer.php'; ?> 
       
       