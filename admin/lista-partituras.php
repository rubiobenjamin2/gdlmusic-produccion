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
            Listado de Partituras
            <small>Bienvenido</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Administra la lista de Partituras aquí</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="registros" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Artista</th>
                                    <th>Album</th>
                                    <th>Estilo</th>
                                    <th>Fecha de carga</th>
                                    <th>No. de descargas</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                try {
                                    $sql = "SELECT partituras.*, estilo.nombre_estilo FROM partituras ";
                                    $sql .= " JOIN estilo ON estilo.id_estilo = partituras.id_estilo";
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
                                while ($partitura = $resultado->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $partitura['nombre_partitura']; ?></td>
                                        <td><?php echo $partitura['nombre_artista']; ?> </td>
                                        <td> <?php echo $partitura['album']; ?> </td>
                                        <td> <?php echo $partitura['nombre_estilo']; ?> </td>
                                        <td> <?php echo $partitura['fecha_carga']; ?> </td>
                                        <td> <?php echo $partitura['no_descargas']; ?> </td>


                                        <td>
                                            <a href="editar-partitura.php?id=<?php echo $partitura['id_partitura'] ?>" class="btn bg-orange btn-flat margin">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <a href="#" data-id="<?php echo $partitura['id_partitura'] ?>" data-tipo="partitura" class="btn bg-maroon btn-flat margin borrar_registro ">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>

                                    </tr>

                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Artista</th>
                                    <th>Album</th>
                                    <th>Estilo</th>
                                    <th>Fecha de carga</th>
                                    <th>No. de descargas</th>
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