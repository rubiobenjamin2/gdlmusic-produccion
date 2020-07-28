<?php 
include_once 'funciones/sesiones.php'; //esta tiene que ir al principio del todo x el Location
include_once 'funciones/funciones.php';
include_once 'templates/header.php';
include_once 'templates/barra.php';
include_once 'templates/navegacion.php';


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Listado de Personas Registradas 
        <small>Bienvenido</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Gestiona los visitantes registrados</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive" >
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Fecha Registro</th>
                  <th>Artículos</th>
                  <th>Talleres</th>
                  <th>Regalo</th>
                  <th>Compra</th>
                  <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        try {
                            $sql = "SELECT registrados.*, regalos.nombre_regalo FROM registrados ";
                            $sql .= " JOIN regalos";
                            $sql .= " ON registrados.regalo = regalos.ID_regalo";
                            $resultado = $conn->query($sql);
                            $filas  = $resultado->num_rows;
                            //para comprobar la consulta. y se pega en mysql y la ejecutas
                            //echo $sql;
                            
                            
                        } catch (Exception $e) {
                            $error = $e->getMessage();
                            echo $error;
                        }

                        /*para comprobar que hay informacion
                        $categoria = $resultado->fetch_assoc(); 
                        echo "<pre>";
                        var_dump($admin);
                        echo "</pre>";*/
                        echo 'Número de total de registros: ' . $filas;
                          while ($registrado = $resultado->fetch_assoc()) {?>
                            <tr width="150">
                              <td><?php echo $registrado['nombre_registrado'] . " " . $registrado['apellido_registrado']; 
                                $pagado = $registrado['pagado'];
                                if($pagado) {
                                    echo '<span class = "badge bg-green">Pagado</span>';

                                } else {
                                    echo '<span class = "badge bg-red">No Pagado</span>';

                                }?>
                                </td>
                              <td ><?php echo $registrado['email_registrado']; ?></td>
                              <td><?php echo $registrado['fecha_registro']; ?></td>
                               <td >
                                  <?php 
                                  // json_decode convierte de json a arreglo con true y a objeto en false  para que se vea mejor el formato en la tabla
                                  $articulos = json_decode($registrado['pases_articulos'], true) ; 
                                    /* echo "<pre>";
                                    var_dump($articulos);
                                    echo "</pre>";*/
                                    $arreglo_articulo = array ( //para cambiar el nombre a las llaves
                                        'un_dia' => 'Pase 1 día',
                                        'pase_2dias' => 'Pase 2 dias',
                                        'pase_completo' => 'Pase Completo',
                                        'camisas' => 'Camisas',
                                        'etiquetas' => 'Etiquetas'

                                    );   
                                    foreach ($articulos as $llave =>$articulo) {   
                                        if(array_key_exists('cantidad', $articulo)){
                                          echo $articulo['cantidad']  . " " . $arreglo_articulo[$llave] . "<br>";

                                        } else {
                                          echo $articulo  . " " . $arreglo_articulo[$llave] . "<br>";

                                        }
                                      
                                        
                                    }
                                  
                                  ?>
                                </td>
                              <td>
                                  <?php $eventos_resultados = $registrado['talleres_registrados']; 
                                        $talleres = json_decode($eventos_resultados, true); //lo convertimos a arreglo
                                        /*echo "<pre>";
                                    var_dump($talleres);
                                    echo "</pre>";*/
                                        $talleres = implode("', '", $talleres['eventos']); //convierte una array en string
                                        /*echo "<pre>";
                                    var_dump($talleres);
                                    echo "</pre>";*/
                                       $sql_talleres = "SELECT nombre_evento, fecha_evento, hora_evento FROM eventos WHERE clave IN ('$talleres') OR evento_id IN ('$talleres') ";     
                                       $resultado_talleres = $conn->query($sql_talleres);
                                        /*$eventos = $resultado_talleres->fetch_assoc();
                                        echo "<pre>";
                                    var_dump($eventos);
                                    echo "</pre>";*/
                                    while ($eventos = $resultado_talleres->fetch_assoc()) {
                                        echo $eventos['nombre_evento'] . " " . $eventos['fecha_evento'] . " " . $eventos['hora_evento'] . "<br>" ;
                                    }



                                  ?>
                              </td>
                              <td><?php echo $registrado['nombre_regalo']; ?></td>
                              <td><?php echo $registrado['total_pagado']; ?></td>
                              <td> 
                              <!-- acciones editar y borrar -->
                                <a href="editar-registro.php?id=<?php echo $registrado['ID_Registrado'] ?>" class="btn bg-orange btn-flat margin" > 
                                <i class="fa fa-pencil-alt"></i>
                                </a>
                                <a href="#" data-id="<?php echo $registrado['ID_Registrado'] ?>" data-tipo="registrado" class="btn bg-maroon btn-flat margin borrar_registro ">
                                <i class="fa fa-trash"></i>
                                </a>
                              </td>
                              
                                
                              
                              
                            </tr>
                            
                         <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Fecha Registro</th>
                  <th>Artículos</th>
                  <th>Talleres</th>
                  <th>Regalo</th>
                  <th>Compra</th>
                  <th>Acciones</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php 
include_once 'templates/footer.php';

?>

 


