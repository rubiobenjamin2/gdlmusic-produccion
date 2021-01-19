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
            Crear Estilo
            <small>llena el formulario para crear un estilo</small>
        </h1>

    </section>

    <div class="row">
        <div class="col-md-8">



            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Crear Estilo</h3>
                    </div>
                    <div class="box-body">
                        <!-- form start -->
                        <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-estilo.php">
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="usuario">Estilo:</label>
                                    <input type="text" class="form-control" id="nombre_estilo" name="nombre_estilo" placeholder="Nombre Estilo">
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
                                <input type="hidden" name="registro" value="nuevo">
                                <button type="submit" class="btn btn-primary">Añadir</button>
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