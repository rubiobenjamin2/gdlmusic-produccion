<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php'; //conecta a la base de datos
include_once 'templates/header.php';
include_once 'templates/barra.php';
include_once 'templates/navegacion.php';


?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Crear Usuario <br>
            <small>Llena el formulario para crear un usuario</small>
        </h1>

    </section>

    <div class="row">
        <div class="col-md-8">



            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Crear Usuario</h3>
                    </div>
                    <div class="box-body">
                        <!-- form start -->
                        <form role="form" name="guardar-registro-usuario-admin" id="guardar-registro-usuario-admin" method="post" action="modelo-usuario.php">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="usuario">Usuario:</label>
                                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nombre">
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Email:</label>
                                    <input type="email" class="form-control" id="correo_usuario" name="correo_usuario" placeholder="Correo electrónico">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="password">Repetir Password:</label>
                                    <input type="password" class="form-control" id="repetir_password" name="repetir_password" placeholder="Repetir Password">
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
                            <div class="form-group has-feedback"><span id="error" class="help-block"></span></div>

                            <div class="box-footer">
                                <input type="hidden" id="usuario_js" name="registro" value="nuevo">
                                <button type="submit" class="btn btn-primary" id="crear_registro_usuario">Añadir</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->
        </div> <!-- col-md-4 -->
    </div> <!-- row -->
</div>
<!-- /.content-wrapper -->

<?php
include_once 'templates/footer.php';

?>