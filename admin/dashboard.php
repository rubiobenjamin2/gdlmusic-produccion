<?php 
include_once 'funciones/sesiones.php'; //esta tiene que ir al principio del todo x el header Location
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
       Dashboard
        <small>Información sobre el evento</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="box-body chart-responsive">
              <div class="chart" id="grafica-registros" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->


      </div> <!-- class= row -->
    <h2 class="page-header">Resumen de Registrados</h2>
    <div class="row"> 
               <!-- widget -->
            <div class="col-lg-4 col-xs-6">
                <?php 
                  $sql = "SELECT COUNT(ID_Registrado) AS registros FROM registrados ";
                  $resultado = $conn->query($sql);
                  $registrados = $resultado->fetch_assoc();

                ?>
               <!-- small box -->
              <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3><?php  echo $registrados['registros']; ?></h3>

                      <p>Total Registrados</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-user"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                      Más info <i class="fa fa-arrow-circle-right"></i>
                    </a>
              </div>
            </div> <!-- .col-lg-4 col-xs-6 -->


            <!-- widget -->
            <div class="col-lg-4 col-xs-6">
                <?php 
                  $sql = "SELECT COUNT(ID_Registrado) AS registros FROM registrados WHERE pagado = 1 ";
                  $resultado = $conn->query($sql);
                  $registrados = $resultado->fetch_assoc();
                ?>
                <!-- small box -->
              <div class="small-box bg-green">
                    <div class="inner">
                      <h3><?php  echo $registrados['registros']; ?></h3>

                      <p>Total Pagados</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-user-check"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                      Más info <i class="fa fa-arrow-circle-right"></i>
                    </a>
              </div>
            </div> <!-- .col-lg-4 col-xs-6 -->

            <!-- widget -->
            <div class="col-lg-4 col-xs-6">
                <?php 
                  $sql = "SELECT COUNT(ID_Registrado) AS registros FROM registrados WHERE pagado = 0 ";
                  $resultado = $conn->query($sql);
                  $registrados = $resultado->fetch_assoc();
                ?>
                <!-- small box -->
              <div class="small-box bg-red">
                    <div class="inner">
                      <h3><?php  echo $registrados['registros']; ?></h3>

                      <p>Sin Pagar</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-user-times"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                      Más info <i class="fa fa-arrow-circle-right"></i>
                    </a>
              </div>
            </div> <!-- .col-lg-4 col-xs-6 -->

            <!-- widget -->
            <div class="col-lg-4 col-xs-6">
                <?php 
                  $sql = "SELECT SUM(total_pagado) AS ganancias FROM registrados WHERE pagado = 1 ";
                  $resultado = $conn->query($sql);
                  $registrados = $resultado->fetch_assoc();
                ?>
                <!-- small box -->
              <div class="small-box bg-yellow">
                    <div class="inner">
                    <!-- fotmatea la cantidad a dos decimales  -->
                      <h3>$<?php  echo number_format($registrados['ganancias'], 2, '.', ''); ?></h3>

                      <p>Ganancias Totales</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-money-check-alt"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                      Más info <i class="fa fa-arrow-circle-right"></i>
                    </a>
              </div>
            </div> <!-- .col-lg-4 col-xs-6 -->
        

     </div> <!-- class= row -->

              <!-- REGALOS -->

     <h2 class="page-header">Regalos</h2>
        <div class="row">

            <!-- widget -->
            <div class="col-lg-4 col-xs-6">
                <?php 
                  $sql = "SELECT COUNT(total_pagado) AS pulseras FROM registrados WHERE regalo = 1 && pagado = 1 ";
                  $resultado = $conn->query($sql);
                  $regalo = $resultado->fetch_assoc();
                ?>
                <!-- small box -->
              <div class="small-box bg-maroon-active">
                    <div class="inner">
                    <!-- fotmatea la cantidad a dos decimales  -->
                      <h3>$<?php  echo $regalo['pulseras']; ?></h3>

                      <p>Pulseras</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-gift"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                      Más info <i class="fa fa-arrow-circle-right"></i>
                    </a>
              </div>
            </div> <!-- .col-lg-4 col-xs-6 -->

            <!-- widget -->
            <div class="col-lg-4 col-xs-6">
                <?php 
                  $sql = "SELECT COUNT(total_pagado) AS etiquetas FROM registrados WHERE regalo = 2 && pagado = 1 ";
                  $resultado = $conn->query($sql);
                  $regalo = $resultado->fetch_assoc();
                ?>
                <!-- small box -->
              <div class="small-box bg-maroon-active">
                    <div class="inner">
                    <!-- fotmatea la cantidad a dos decimales  -->
                      <h3>$<?php  echo $regalo['etiquetas']; ?></h3>

                      <p>Etiquetas</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-gift"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                      Más info <i class="fa fa-arrow-circle-right"></i>
                    </a>
              </div>
            </div> <!-- .col-lg-4 col-xs-6 -->

            <!-- widget -->
            <div class="col-lg-4 col-xs-6">
                <?php 
                  $sql = "SELECT COUNT(total_pagado) AS plumas FROM registrados WHERE regalo = 3 && pagado = 1 ";
                  $resultado = $conn->query($sql);
                  $regalo = $resultado->fetch_assoc();
                ?>
                <!-- small box -->
              <div class="small-box bg-maroon-active">
                    <div class="inner">
                    <!-- fotmatea la cantidad a dos decimales  -->
                      <h3>$<?php  echo $regalo['plumas']; ?></h3>

                      <p>Plumas</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-gift"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                      Más info <i class="fa fa-arrow-circle-right"></i>
                    </a>
              </div>
            </div> <!-- .col-lg-4 col-xs-6 -->

        </div> <!-- class= row -->


    

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php 
include_once 'templates/footer.php';

?>

 


