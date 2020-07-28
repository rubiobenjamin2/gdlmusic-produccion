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
        Listado de Artistas
        <small>Bienvenido</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Administra la lista de Artistas aquí</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Imagen</th>
                  <th>PDF</th>
                  <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        try {
                            $sql = "SELECT * FROM artistas";
                            $resultado = $conn->query($sql);
                            $filas  = $resultado->num_rows;
                            
                            
                        } catch (Exception $e) {
                            $error = $e->getMessage();
                            echo $error;
                        }

                       /* para comprobar que hay informacion
                        $invitado = $resultado->fetch_assoc(); 
                        echo "<pre>";
                        var_dump($invitado);
                        echo "</pre>";*/
                        echo 'Número de total de registros: ' . $filas;
                          while ($artista = $resultado->fetch_assoc()) {?>
                            <tr>
                              <td><?php echo $artista['nombre_artista']; ?></td>
                              <td><img src="../img/artistas/<?php echo $artista['url_img']; ?>" width="100"> </td>
                              <td> <?php echo $artista['url_pdf']; ?> </td>
                              
                              
                              <td>
                                <a href="editar-artista.php?id=<?php echo $artista['id_artista'] ?>" class="btn bg-orange btn-flat margin" > 
                                <i class="fa fa-pencil-alt"></i>
                                </a>
                                <a href="#" data-id="<?php echo $artista['id_artista'] ?>" data-tipo="artista" class="btn bg-maroon btn-flat margin borrar_registro ">
                                <i class="fa fa-trash"></i>
                                </a>
                              </td>
                              
                            </tr>
                            
                         <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Imagen</th>
                  <th>PDF</th>
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

 


