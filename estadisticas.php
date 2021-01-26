<?php
//require_once 'admin/funciones/sesiones_usuario.php'; //esta tiene que ir al principio del todo x el header Location si quieres que sea vista solo por usuarios registrados
include_once 'includes/funciones/bd_conexion.php';
//para comprobar que se ha conectado a la base de datos
/*if ($conn->ping()) {
    echo "Conectado";
} else {
    echo "No conectado";
}*/
include_once 'includes/templates/header.php';


?>
<section class="seccion">


    <div class="contenedor">
        <section class="content">
            <h2 class="page-header">Usuarios / Mes</h2>
            <div class="row">

                <div class="col-md-12">
                    <!-- LINE CHART -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Gráfica: Usuarios registrados por mes</h3>

                        </div>
                        <div class="box-body">
                            <p style="font-size: 15px" class="text-center h4">
                                16 Sep, 2020 - 24 Jun, 2021
                            </p>
                            <div class="chart">
                                <canvas id="usuariosChart" style="height:250px"></canvas>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>

            </div>
            <!-- /.row -->

            <h2 class="page-header">Descargas / Mes</h2>
            <div class="row">

                <div class="col-md-12">
                    <!-- LINE CHART -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Gráfica: Descargas de usuarios registrados por mes</h3>

                        </div>
                        <div class="box-body">
                            <p style="font-size: 15px" class="text-center h4">
                                1
                                22 Oct, 2020 - 20 Ene, 2021
                            </p>

                            <div class="chart">
                                <canvas id="descargasChart" style="height:250px"></canvas>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>

            </div>
            <!-- /.row -->

            <h2 class="page-header">Descargas Ranking</h2>
            <?php

            $sql = "SELECT nombre_partitura, no_descargas FROM partituras ORDER BY no_descargas DESC LIMIT 0, 5";
            $resultado = $conn->query($sql);
            /*echo "<pre>";
                        var_dump($registrados);
                        echo "</pre>";*/
            //$conn->close();
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Las 10 partituras más descargadas</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <!-- <thead class="thead-dark">
                                                    <tr>
                                                        <th style="width: 10px; font-size: 15px; font-family: 'Oswald', sans-serif">#</th>
                                                        <th style="font-size: 15px; font-family: 'Oswald', sans-serif" class="h4">
                                                            Partitura
                                                        </th>
                                                        <th style="width: 40px; font-size: 15px; font-family: 'Oswald', sans-serif" class="h4">Descargas</th>
                                                    </tr>
                                                </thead> -->
                                <tbody>
                                    <?php
                                    $i  = 1;
                                    while ($top = $resultado->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $top['nombre_partitura']; ?></td>
                                            <td><span class="badge bg-red"><?php echo $top['no_descargas']; ?></span></td>
                                        </tr>
                                    <?php $i++;
                                    } ?>

                                </tbody>

                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
            </div>
            <!-- /.row -->

            <h2 class="page-header">Datos Generales</h2>

            <!-- Contador de visitas -->
            <?php
            //Almacenamos los datos de esta seccion en un arreglo para usarlos en la página de estadísticas
            $arreglo_datos = array();
            $datos['campo'];
            $datos['valor'];


            $fp = fopen("contador.txt", "r");
            $counter = fgets($fp, 7);
            //echo $counter;
            fclose($fp);
            echo "</b></p>";

            //Guardamos valores 
            $datos['campo'] = "Visitas";
            $datos['valor'] = $counter;
            $arreglo_datos[] = $datos;


            // No. de  usuarios

            try {
                $sql = "SELECT COUNT(*) AS registrados FROM usuarios";
                $resultado = $conn->query($sql);
                $registrados = $resultado->fetch_assoc();
                /*echo "<pre>";
var_dump($registrados);
echo "</pre>";*/

                //Guardamos valores 
                $datos['campo'] = "Usuarios";
                $datos['valor'] = $registrados['registrados'];
                $arreglo_datos[] = $datos;
            } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
            }

            // No. de  partituras 

            try {
                $sql = "SELECT COUNT(*) AS partituras FROM partituras";
                $resultado = $conn->query($sql);
                $registrados = $resultado->fetch_assoc();
                /*echo "<pre>";
var_dump($registrados);
echo "</pre>";*/

                //Guardamos valores 
                $datos['campo'] = "Partituras";
                $datos['valor'] = $registrados['partituras'];
                $arreglo_datos[] = $datos;
            } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
            }


            // No. de  descargas 

            try {
                $sql = "SELECT COUNT(*) AS descargas FROM descargas";
                $resultado = $conn->query($sql);
                $registrados = $resultado->fetch_assoc();
                /*echo "<pre>";
var_dump($registrados);
echo "</pre>";*/

                //Guardamos valores 
                $datos['campo'] = "Descargas";
                $datos['valor'] = $registrados['descargas'];
                $arreglo_datos[] = $datos;
            } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
            }
            $conn->close(); //Cerramos la conexión a la BBDD
            //$arreglo_datos[] = $datos;
            /*echo "<pre>";
            var_dump($arreglo_datos);
            echo "</pre>";*/
            ?>


            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Número total de visitas, usuarios, partituras y descargas</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <!-- <thead class="thead-dark">
                                                    <tr>
                                                        <th style="width: 10px; font-size: 15px; font-family: 'Oswald', sans-serif">#</th>
                                                        <th style="font-size: 15px; font-family: 'Oswald', sans-serif" class="h4">
                                                            Partitura
                                                        </th>
                                                        <th style="width: 40px; font-size: 15px; font-family: 'Oswald', sans-serif" class="h4">Descargas</th>
                                                    </tr>
                                                </thead> -->
                                <tbody>
                                    <?php

                                    foreach ($arreglo_datos as $campo) {

                                    ?>
                                        <tr>

                                            <td><?php echo $campo['campo']; ?></td>
                                            <td><span class="badge bg-red"><?php echo $campo['valor']; ?></span></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>

                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
            </div>

        </section>
        <!-- /.content -->


    </div>





</section>
<script src="js/salto-barra.js"></script>

<?php include_once 'includes/templates/footer.php'; ?>