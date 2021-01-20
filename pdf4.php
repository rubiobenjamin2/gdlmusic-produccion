<?php
include_once 'includes/funciones/bd_conexion.php';

session_start();
$id_usuario = $_SESSION['id_usuario'];
//$fecha_sesion = $_SESSION['fecha_sesion'];
$var_doc = "";
$var_temp1 = "";
$var_temp2 = "";
$var_artista = "";
$var_doc = $_GET['pdf_url'];
$var_temp1 = str_replace(".pdf", "", $var_doc);
$var_temp2 = str_replace("_gm", "", $var_temp1);
$var_artista = $_GET['nom_artista'];
$id_partitura = $_GET['id_partitura'];

/*echo "<pre>";
var_dump($_GET);
echo "El usuario es: " . $id_usuario;
echo "</pre>";*/

//include_once 'includes/funciones/bd_conexion.php';
//para comprobar que se ha conectado a la base de datos
/*if ($conn->ping()) {
    echo "Conectado";
} else {
    echo "No conectado";
}*/
include_once 'includes/templates/header.php';


//SELECT COUNT(*) as resultado FROM descargas WHERE Cast(fecha_descarga AS date) = '2020-10-23' AND id_descarga_usuario = '21'

//if (isset($_POST['insertar_descarga'])) { // si se da submit al botón descargas para insertar en la tabla descargas

    // Recuperamos el número de descargas de usuario por sesión
    //Hacemos un cast a date  a la fecha para eliminar las horas minutos y segundos
    try {
    $sql = "SELECT COUNT(*) as cuenta FROM descargas WHERE Cast(fecha_descarga AS date) = CURRENT_DATE AND id_descarga_usuario = $id_usuario";
        $resultado = $conn->query($sql);
        //$filas  = $resultado->num_rows;
        $partitura = $resultado->fetch_assoc();
        //echo $partitura['cuenta'];
        $num_descargas = $partitura['cuenta'];

        $resultado->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error" . $e->getLine() . "<br>";
        $error = $e->getMessage();
        echo $error;
    }
   


//Insertamos en tabla descargas id de partituras y usuarios para tener un control de descargas
/*try {
        //aqui en insert fue tambien necesario agregar el campo editado
        $stmt = $conn->prepare("INSERT INTO descargas (id_descarga_partitura, id_descarga_usuario, fecha_descarga) VALUES (?, ?, NOW())");
        $stmt->bind_param("ii", $id_partitura, $id_usuario);
        $stmt->execute();
        //print_r($stmt);
        $id_registro = $stmt->insert_id;
        //echo $id_registro;
        if($id_registro > 0) {
        
        $respuesta = array(
            'respuesta' => 'exito',
            'id_admin' => $id_registro   
        );
        //die(json_encode($respuesta));
    } else {
        $respuesta = array(
            'respuesta' => 'error'   
        );

    }

        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error" . $e->getLine() . "<br>";
        echo "Error" . $e->getMessage();
    }
    die(json_encode($respuesta));*/
//}



?>

<!-- Este input es utilizado para el visor PDF (prueba4.js)-->
<input type="hidden" name="nombre_partitura" id="nombre_partitura" value="<?php echo $var_doc ?>">

<section class="seccion contenedor">
    <h2><?php echo  $var_temp2 ?> - <?php echo  $var_artista ?></h2>

    <!-- Implement a Simple PDF Viewer with PDF.js -->


    <div id="documentos">

        <div id="app">
            <!-- <div class="pegajoso"> -->
            <div role="toolbar" id="toolbar" class="text-center">

                <div>
                    <form id="download-form" method="post" action="modelo-descargas.php">
                        <button type="submit" name="down-load" id="descarga-pdf" class="descarga" title="Descarga">Download</button>
                        <input type="hidden" name="insertar_descarga">
                        <input type="hidden" name="id-partitura" value="<?php echo $id_partitura ?>">
                    </form>
                </div>
                <?php if($num_descargas < 3) {?>
                <div id="btn-pdf">
                    <button id="ver-pdf" title="Ver">Visor PDF</button>
                </div>
                <?php } ?>

                <div id="pager">
                    <button data-pager="prev">prev</button>
                    <button data-pager="next">next</button>

                </div>
                <div><label id="numero_pagina"></label> / <label id="total_paginas"></label></div>
                <div id="page-mode">
                    <label>Page Mode <input type="number" value="1" min="1" /></label>
                </div>


            </div>
            <!-- </div> -->




            <div id="viewport-container">
                <div role="main" id="viewport"></div>
            </div>
        </div>

    </div>



    <script type="text/javascript" src="js/usuario-ajax.js">
    </script>


    <script src="https://unpkg.com/pdfjs-dist@2.0.489/build/pdf.min.js">
    </script>
    <script src="js/salto-barra.js"></script>
    <script src="js/prueba4.js"></script>
    <script>
        initPDFViewer("pdf/" + "<?php echo $var_doc ?>"); //pasamos la variable de php a javascript
    </script>

</section>
<!--seccion-->

<?php include_once 'includes/templates/footer.php'; ?>