<?php
require_once 'admin/funciones/sesiones_usuario.php'; //esta tiene que ir al principio del todo x el header Location

include_once 'includes/funciones/bd_conexion.php';
//para comprobar que se ha conectado a la base de datos
/*if ($conn->ping()) {
    echo "Conectado";
} else {
    echo "No conectado";
}*/
include_once 'includes/templates/header.php'; ?>


<section class="seccion contenedor">
    <h2>Descarga tu PDF</h2>
    <?php /*session_start();
    echo "
    <pre>";
           var_dump($_SESSION);
           echo "</pre>";*/ ?>
    <p>
        Te probant ne pariatur. O est summis irure nisi id illum distinguantur
        mandaremus veniam occaecat ita illum vidisse e quid quid ut qui ingeniis non
        voluptate, te quem despicationes ea nisi officia exercitation ea possumus
        cohaerescant ne aliquip do varias ad pariatur do malis.
    </p>

    <form class="search-form" action="descargas.php" method="POST">
        <div class="input-group busqpdf">
            <input type="text" name="buscar" class="form-control" placeholder="Buscar">

            <div class="input-group-btn">
                <button type="submit" name="submit" class="btn btn-danger btn-flat" title="Buscar"><i class="fa fa-search"></i>
                </button>
            </div>
        </div>
        <!-- /.input-group -->
    </form>

    <h4></h4>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Resultados de la búsqueda</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="registros" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="font-size: 15px" class="h4">PDF</th>
                                    <th style="font-size: 15px" class="h4">Título</th>
                                    <th style="font-size: 15px" class="h4">Artista</th>
                                    <th style="font-size: 15px" class="h4">Album</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //include_once 'leer_descargas.php';

                                if (!isset($_POST['buscar'])) {
                                    $_POST['buscar'] = "";
                                    $buscar = $_POST['buscar'];
                                }
                                $buscar = $_POST['buscar'];
                                // $buscar = "";

                                try {
                                    $sql = "SELECT * FROM partituras WHERE nombre_partitura LIKE '%" . $buscar . "%' OR nombre_artista LIKE '%" . $buscar . "%' ";
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
                                            <a href="pdf4.php?pdf_url=<?php echo urlencode($partitura['nombre_partitura']) ?>&nom_artista=<?php echo urlencode($partitura['nombre_artista']) ?>&id_partitura=<?php echo urlencode($partitura['id_partitura']) ?>" id="pdf4">

                                                <img src="img/pdf_imagen/<?php echo str_replace(".pdf", ".jpg", $partitura['nombre_partitura']) ?>" width="150px" height="212px">

                                            </a>
                                        </td>


                                        <td><?php echo $partitura['nombre_partitura']; ?></td>

                                        <td><?php echo $partitura['nombre_artista']; ?></td>
                                        <td> <?php echo $partitura['album']; ?> </td>


                                    </tr>



                                    <!--  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js">
</script>   -->

                                <?php } //cierre while
                                ?>


                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="font-size: 15px" class="h4">PDF</th>
                                    <th style="font-size: 15px" class="h4">Título</th>
                                    <th style="font-size: 15px" class="h4">Artista</th>
                                    <th style="font-size: 15px" class="h4">Album</th>
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