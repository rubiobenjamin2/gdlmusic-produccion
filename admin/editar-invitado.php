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
        Editar Invitados
        <small>llena el formulario para editar un invitado</small>
      </h1>
      
    </section>

    <div class="row">
        <div class="col-md-8">

        

    <!-- Main content -->
        <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Invitado</h3>
        </div>
        <div class="box-body">

            <?php 
                $sql = "SELECT * FROM invitados WHERE invitado_id = $id"; 
                $resultado = $conn->query($sql);
                $invitado = $resultado->fetch_assoc();
                /*echo "<pre>";
                var_dump($invitado); 
                echo "</pre>";*/
    

            ?>

           <!-- form start -->
           <!-- en este form cambiamos el id y se agrego enctype este ultimo se usa cada vez que se quiere subir una archivo o imagen -->
           <form enctype="multipart/form-data" role="form" name="guardar-registro"  id="guardar-registro-archivo" method="post" action="modelo-invitado.php" >
              <div class="box-body">
                    <div class="form-group">
                        <label for="nombre_invitado">Nombre:</label>
                        <input type="text" class="form-control" id="nombre_invitado" name="nombre_invitado" placeholder="Nombre" value="<?php echo $invitado['nombre_invitado']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="apellido_invitado">Apellido:</label>
                        <input type="text" class="form-control" id="apellido_invitado" name="apellido_invitado" placeholder="Apellido" value="<?php echo $invitado['apellido_invitado']; ?>">
                    </div>
                     <div class="form-group">
                        <label for="biografia_invitado">Biografia</label>
                        <textarea class="form-control" name="biografia_invitado" id="biografia_invitado" cols="30" rows="8" placeholder="Biografía" ><?php echo $invitado['descripcion']; ?></textarea>

                    </div class="form-group">
                        <label for="imagen_actual"> Imagen Actual:</label>
                        <br>
                        <img src="../img/invitados/<?php echo $invitado['url_imagen'];  ?>" width="200">
                    <div>

                    </div>
                    <br>
                    <br>
 
                    <div class="form-group">
                      <label for="imagen_invitado">Elegir imagen:</label>
                      <input  type="file" id="imagen_invitado" name="archivo_imagen">

                      <p class="help-block">Añada la imagen del invitado aquí.</p>
                    </div> 

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="registro" value="actualizar">  
                <input type="hidden" name="id_registro" value="<?php echo $invitado['invitado_id']; ?>">
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

 


