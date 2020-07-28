<?php 
$id = $_GET['id'];
/*echo "<pre>";
var_dump($_GET); 
echo "</pre>";*/
if(!filter_var($id, FILTER_VALIDATE_INT)) { //valida que la variable sea un entero
    die("ERROR!!");

}

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
        Editar Artistas
        <small>llena el formulario para editar un Artista</small>
      </h1>
      
    </section>

    <div class="row">
        <div class="col-md-8">

        

    <!-- Main content -->
        <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Artista</h3>
        </div>
        <div class="box-body">

            <?php 
                $sql = "SELECT * FROM artistas WHERE id_artista = $id"; 
                $resultado = $conn->query($sql);
                $artista = $resultado->fetch_assoc();
               /* echo "<pre>";
                var_dump($artista); 
                echo "</pre>";*/
    

            ?>

           <!-- form start -->
           <!-- en este form cambiamos el id y se agrego enctype este ultimo se usa cada vez que se quiere subir una archivo o imagen -->
           <form enctype="multipart/form-data" role="form" name="guardar-registro"  id="guardar-registro-archivo" method="post" action="modelo-artista.php" >
              <div class="box-body">
                    <div class="form-group">
                        <label for="nombre_artista">Nombre del Artista:</label>
                        <input type="text" class="form-control" id="nombre_artista" name="nombre_artista" placeholder="Nombre Artista" value="<?php echo $artista['nombre_artista']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="url_pdf">PDF:</label>
                        <input type="text" class="form-control" id="url_pdf" name="url_pdf" placeholder="Url_Pdf" value="<?php echo $artista['url_pdf']; ?>">
                    </div>
                   

                    <div class="form-group">
                        <label for="imagen_actual"> Imagen Actual:</label>
                        <br>
                        <img src="../img/artistas/<?php echo $artista['url_img'];  ?>" width="200">
                        </div>
                    <div>

                    </div>
                    <br>
                    <br>
 
                    <div class="form-group">
                      <label for="imagen_invitado">Elegir imagen:</label>
                      <input  type="file" id="imagen_artista" name="archivo_imagen">

                      <p class="help-block">Añada la imagen del artista aquí.</p>
                    </div> 

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="registro" value="actualizar">  
                <input type="hidden" name="id_registro" value="<?php echo $artista['id_artista']; ?>">
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

 


