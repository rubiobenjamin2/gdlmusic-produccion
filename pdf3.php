<!-- <!DOCTYPE html> -->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <!-- <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>My PDF Viewer</title> -->
         <!-- <script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>  -->
         
        <!-- <meta name="description" content="">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="css/estilos3.css"> 
    </head>
    <body> -->

    <?php 
$var_doc = $_GET['pdf_url'];
$var_artista = $_GET['nom_artista'];

 echo "<pre>";
var_dump($_GET); 
echo "</pre>"; 
include_once'includes/templates/header.php'; 

?>
<input type="hidden" name="nombre_partitura" id="nombre_partitura" value="<?php echo $var_doc ?>">
    <h1>PDF.js Previous/Next and Zoom example</h1>

<!-- CONTROLES -->

     <div id="navigation_controls">
    <button id="go_previous">Previous</button>
    <input id="current_page" value="1" type="number"/>
    <button id="go_next">Next</button>
    </div>

    <div id="zoom_controls">  
    <button id="zoom_in">+</button>
    <button id="zoom_out">-</button>

    <!-- CONTENEDOR -->
    
    <div id="my_pdf_viewer">
        <div id="canvas_container">
            <canvas id="pdf_renderer"></canvas>
        </div>
     </div>

     
     <!-- 1er forma para descarga -->
    <button  id="descarga" class="descarga" title="Descarga">Download
      <!-- <a href="pdf/Consulta de Adeudo Predial __ Municipio de Zapopan Jalisco.pdf" id="milink2" download></a>  -->

    </button> 

    <!-- 2da forma de descarga -->
    <div class="grid_8"></div>
    <a href="pdf/Consulta de Adeudo Predial __ Municipio de Zapopan Jalisco.pdf" id="milink" download>Descargar</a>
    </div>
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js">
</script>     

<script src="js/visor-pdf3.js"></script> 


    <!-- </body>
</html> -->
<?php include_once'includes/templates/footer.php'; ?>