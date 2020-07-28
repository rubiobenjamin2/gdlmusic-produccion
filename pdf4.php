<?php 
$var_doc = "";
$var_temp1 = "";
$var_temp2 = "";
$var_artista = "";
$var_doc = $_GET['pdf_url'];
$var_temp1 = str_replace(".pdf", "", $var_doc);
$var_temp2 = str_replace("_gm", "", $var_temp1);
$var_artista = $_GET['nom_artista'];

/* echo "<pre>";
var_dump($_GET); 
echo "</pre>"; */
include_once'includes/templates/header.php'; 

?>

<!-- Este input es utilizado para capturar su valor y realizar la descarga del pdf (prueba4.js)-->
<input type="hidden" name="nombre_partitura" id="nombre_partitura" value="<?php echo $var_doc ?>">

<section class="seccion contenedor">
    <h2><?php echo  $var_temp2 ?> - <?php echo  $var_artista ?></h2> 
    <!-- Implement a Simple PDF Viewer with PDF.js -->
    <div id="documentos">

        <div id="app">
            <!-- <div class="pegajoso"> -->
                <div role="toolbar" id="toolbar">
                    <div id="descarga">
                        <button id="descarga" class="descarga" title="Descarga">Download
                        </button>
                    </div>
                    <div id="pager">
                        <button data-pager="prev">prev</button>
                        <button data-pager="next">next</button>

                    </div>
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

    <script src="https://unpkg.com/pdfjs-dist@2.0.489/build/pdf.min.js"></script>
    <script src="js/prueba4.js"></script>
    <script>
    initPDFViewer("pdf/" + "<?php echo $var_doc?>"); //pasamos la variable de php a javascript
    </script>

</section>
<!--seccion-->

<?php include_once'includes/templates/footer.php'; ?>