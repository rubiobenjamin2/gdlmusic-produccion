<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php'; //conecta a la base de datos
$id = $_GET['id'];
/*echo "<pre>";
var_dump($_GET); 
echo "</pre>";*/
if (!filter_var($id, FILTER_VALIDATE_INT)) { //valida que la variable sea un entero
    die("ERROR!!");
}
include_once 'templates/header.php';
include_once 'templates/barra.php';
include_once 'templates/navegacion.php';


?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Editar Usuario
            <small>editar un usuario aquí</small>
        </h1>

    </section>

    <div class="row">
        <div class="col-md-8">



            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Editar Usuario</h3>
                    </div>
                    <div class="box-body">
                        <?php

                        $sql = "SELECT * FROM `usuarios` WHERE id_usuario = $id ";
                        $resultado = $conn->query($sql);
                        $usuario = $resultado->fetch_assoc();
                        /*echo "<pre>";
            var_dump($admin); 
            echo "</pre>";*/


                        ?>

                        <!-- form start -->
                        <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-usuario.php">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="usuario">Usuario:</label>
                                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nombre" value="<?php echo $usuario['nombre_usuario']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Email:</label>
                                    <input type="text" class="form-control" id="correo_usuario" name="correo_usuario" placeholder="Email" value="<?php echo $usuario['email_usuario']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nivel">Pagado:</label>
                                    <input type="text" class="form-control" id="pagado" name="pagado" placeholder="Pagado" value="<?php echo $usuario['pagado']; ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="password">Repetir Password:</label>
                                    <input type="password" class="form-control" id="repetir_password" name="repetir_password" placeholder="Password">
                                    <span id="resultado_password" class="help-block"></span>
                                </div>

                                <!-- Para añadir una fotografia al administrador -->
                                <!-- <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block">Example block-level help text here.</p>
                </div> -->

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <input type="hidden" name="registro" id="actualizar" value="actualizar">
                                <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                                <button type="submit" class="btn btn-primary" id="crear_registro_usuario">Guardar</button>
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