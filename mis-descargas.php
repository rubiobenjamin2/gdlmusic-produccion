<?php


include_once 'includes/funciones/bd_conexion.php';
//para comprobar que se ha conectado a la base de datos
/*if ($conn->ping()) {
    echo "Conectado";
} else {
    echo "No conectado";
}*/
session_start();
$id_usuario = $_SESSION['id_usuario'];
include_once 'includes/templates/header.php'; ?>


<section class="seccion contenedor">

    <?php /*session_start();
    echo "
    <pre>";
           var_dump($_SESSION);
           echo "</pre>";*/ ?>



    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Mis partituras descargadas</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <table id="registros" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>PDF</th>
                                    <th>Título</th>
                                    <th>Fecha de descarga</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php


                                try {
                                    $sql = "SELECT descargas.fecha_descarga, partituras.nombre_partitura FROM descargas ";
                                    $sql .= " JOIN partituras ON descargas.id_descarga_usuario = $id_usuario AND partituras.id_partitura = descargas.id_descarga_partitura";
                                    $resultado = $conn->query($sql);
                                    $filas  = $resultado->num_rows;
                                } catch (Exception $e) {
                                    $error = $e->getMessage();
                                    echo $error;
                                }

                                //Comprueba la consulta
                                /*while ($invitado = $resultado->fetch_assoc()) {
     echo "<pre>";
     var_dump($invitado);
     echo "</pre>";
                   } */
                                echo 'Número total de registros: ' . $filas;
                                //echo '<h3 class="box-title">'.'Número total de registros: '.$filas.'</h3>';

                                while ($partitura = $resultado->fetch_assoc()) { ?>
                                    <tr>
                                        <!-- <td><embed src="pdf/<?php //echo $partitura['nombre_partitura'] 
                                                                    ?>" type="application/pdf" width="150px" height="212px"> </td> -->
                                        <td>

                                            <img src="img/pdf_imagen/<?php echo str_replace(".pdf", ".jpg", $partitura['nombre_partitura']) ?>" width="150px" height="212px">

                                        </td>


                                        <td><?php echo $partitura['nombre_partitura']; ?></td>

                                        <td><?php echo $partitura['fecha_descarga']; ?></td>
                                        <td>
                                            <a href="web/viewer.html?file=../pdf/<?php echo $partitura['nombre_partitura'] ?>">
                                                Visor PDF
                                            </a>

                                        </td>


                                    </tr>



                                    <!--  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js">
</script>   -->

                                <?php } //cierre while
                                ?>


                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>PDF</th>
                                    <th>Título</th>
                                    <th>Fecha de descarga</th>
                                    <th></th>
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



</section>
<!--seccion contenedor-->



<script src="js/salto-barra.js"></script>

<?php include_once 'includes/templates/footer.php'; ?>