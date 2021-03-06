<?php 
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';//conecta a la base de datos
include_once 'templates/header.php';
include_once 'templates/barra.php';
include_once 'templates/navegacion.php';


?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Crear Artistas
        <small>llena el formulario para añadir un Artista</small>
      </h1>
      
    </section>

    <div class="row">
        <div class="col-md-8">

        

    <!-- Main content -->
        <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Crear Artista</h3>
        </div>
        <div class="box-body">
           <!-- form start -->
           <!-- en este form cambiamos el id y se agrego enctype este ultimo se usa cada vez que se quiere subir una archivo o imagen -->
           <form enctype="multipart/form-data" role="form" name="guardar-registro"  id="guardar-registro-archivo" method="post" action="modelo-artista.php" >
              <div class="box-body">
                    <div class="form-group">
                        <label for="nombre_invitado">Nombre del Artista:</label>
                        <input type="text" class="form-control" id="nombre_artista" name="nombre_artista" placeholder="Nombre Artista">
                    </div>
                    <div class="form-group">
                        <label for="apellido_invitado">PDF:</label>
                        <input type="text" class="form-control" id="url_pdf" name="url_pdf" placeholder="Url_PDF">
                    </div>
                     
 
                    <div class="form-group">
                      <label for="imagen_invitado">Imagen:</label>
                      <input  type="file" id="imagen_artista" name="archivo_imagen">

                      <p class="help-block">Añada la imagen del artista aquí.</p>
                    </div> 

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="registro" value="nuevo">  
                <button type="submit" class="btn btn-primary" id="crear_registro">Añadir</button>
              </div>
            </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
         </div>
     </div>
  </div>
  <!-- /.content-wrapper -->

  <?php 
include_once 'templates/footer.php';

?>

 


