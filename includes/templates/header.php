<?php
session_start();
/* // CACHE . en el header el código sig.  como en el footer otro código
    // Definir un nombre para cachear. Nos crea una copia de las paginas visitadas que duran determinado tiempo ($tiempo) esto es para no recargarlas cada vez que se visitan. Se cargan mas rapido las paginas y no se le exige tanto al servidor
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo); //nos regresa la pagina donde nos situamos en el momento actual

    // Definir archivo para cachear (puede ser .php o .html también)
    //$archivoCache = 'cache/'.$pagina.'.html';
    $archivoCache = 'cache/'.$pagina.'.php';
	// Cuanto tiempo deberá estar este archivo almacenado (segundos)
    //$tiempo = 36000;
    $tiempo = 86400; // 86400 segundos que es 24 horas un dia. Es lo que tardara la pagina para actualizarse o hacer una copia del sitio
	// Checar que el archivo exista, el tiempo sea el adecuado y muestralo
	if (file_exists($archivoCache) && time() - $tiempo < filemtime($archivoCache)) {
   	include($archivoCache);
    	exit;
	}
	// Si el archivo no existe, o el tiempo de cacheo ya se venció genera uno nuevo
	ob_start();*/
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

     <link rel="stylesheet" href="css/normalize.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css" integrity="sha256-HxaKz5E/eBbvhGMNwhWRPrAR9i/lG1JeT4mD6hCQ7s4=" crossorigin="anonymous" />

    <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">

    <!-- Estilos ADMIN -->

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="admin/css/bootstrap.min.css" media="screen">
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="admin/css/font-awesome.min.css"> -->
    <!-- Ionicons -->
    <link rel="stylesheet" href="admin/css/ionicons.min.css">
    <!-- DATATABLES -->
    <link rel="stylesheet" href="admin/css/dataTables.bootstrap.min.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="admin/css/bootstrap-datepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="admin/css/select2.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="admin/css/bootstrap-timepicker.min.css">

    <link rel="stylesheet" href="admin/css/fontawesome-iconpicker.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="admin/css/AdminLTE.min.css">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="admin/css/skins/_all-skins.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="admin/css/icheck.css">
    <!-- <link rel="stylesheet" href="admin/css/sweetalert2.min.css"> -->
    <!-- Morris charts -->
    <link rel="stylesheet" href="admin/css/morris.css">

    <link rel="stylesheet" href="admin/css/admin.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <!--  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous"> -->

    <!-- FIN de Estilos ADMIN -->


    <?php
    //Este codigo es para usar colorbox o lightbox solo en la pagina que se utiliza
    $archivo = basename($_SERVER['PHP_SELF']); //devuelve la pagina actual
    $pagina = str_replace(".php", "", $archivo); //elimina la extension al archivo actual
    if ($pagina == 'invitados' || $pagina == 'index') {
        echo '<link rel="stylesheet" href="css/colorbox.css">';
    } else if ($pagina == 'conferencia') {
        echo '<link rel="stylesheet" href="css/lightbox.css">';
    }

    ?>


    <link rel="stylesheet" href="css/main.css">

    <!-- Estilos del PDF -->
    <link rel="stylesheet" href="css/estilos4.css">
    <!-- <link rel="stylesheet" href="css/estilos3.css">  -->



    <script src="js/vendor/modernizr-3.5.0.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')
    </script>

    <script src="js/plugins.js"></script>

    <!-- Script Fecha -->
    <script type="text/javascript">
        $(function() {
            var crearReloj2 = function() {
                // Obtenemos la fecha actual, incluyendo las horas, minutos, segundos, dia de la semana, dia del mes, mes y año;
                var f_ahora = new Date();
                var d = f_ahora.getDay();
                var f_dia = f_ahora.getDate();
                var f_mes = f_ahora.getMonth();
                var f_year = f_ahora.getFullYear();


                // Accedemos a los elementos del DOM en el header para agregar mas adelante sus correspondientes valores
                //var hDiaSemana = document.getElementById('fecha_diaSemana'),
                var h_Dia = document.getElementById('fecha_dia');
                var hMes = document.getElementById('fecha_mes');
                var hYear = document.getElementById('fecha_anio');

                // Obtenemos el dia se la semana y lo mostramos
                //var semana = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];

                //hDiaSemana.textContent = semana[d];

                // Obtenemos el dia del mes

                h_Dia.textContent = f_dia;

                // Obtenemos el Mes y año y lo mostramos
                var f_meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']

                hMes.textContent = f_meses[f_mes];
                hYear.textContent = f_year;


            };

            crearReloj2();
            var intervalo2 = setInterval(crearReloj2, 1000);

        });
    </script> <!-- Script Fecha -->

    <script src="js/sweetalert2.all.min.js" charset="UTF-8"></script>


</head>

<body class="<?php echo $pagina; ?>">
    <!--Nos devuelve la pagina actual y nos servira en el js para sabaer donde se encuentra el usuario actualmente-->
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <header class="site-header">
        <div class="hero">
            <div class="contenido-header">
                <nav class="redes-sociales">
                    <a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="https://twitter.com/explore"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="https://www.pinterest.com.mx/"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    <a href="https://www.youtube.com/"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </nav>
                <div class="informacion-evento">
                    <div class="clearfix">
                        <p class="fecha"><i class="fa fa-calendar" aria-hidden="true"></i>
                            <!-- <p id="fecha_diaSemana" class="fechas"></p> -->
                            <p id="fecha_dia" class="fechas"></p>
                            <p class="separacion">/</p>
                            <p id="fecha_mes" class="fechas"></p>
                            <p class="separacion">/</p>
                            <p id="fecha_anio" class="fechas"></p>
                        </p>


                        <p class="ciudad"><i class="fa fa-map-marker" aria-hidden="true"></i>Guadalajara, Mx</p>
                    </div>

                    <h1 class="nombre-sitio">GdlMusic &#9835;</h1>

                    <div class="slogan1">
                        <?php if ($_SESSION['nombre_usuario']) { ?>
                            <p class="slogan"><span> ¡ Hola <?php echo $_SESSION['nombre_usuario']; ?> !</span></p><br>
                        <?php }  ?>

                        <p class="slogan">Descarga Partituras en formato <span> PDF</span></p>
                    </div>
                    <!--.slogan1-->
                </div>
                <!--.informacion-evento-->

            </div>
            <!--contenido-header-->

        </div>
        <!--.hero-->

    </header>
    <!-- Con el enlace muesta desde este punto la página -->
    <a name="enlace"></a>
    <div class="barra">
        <div class="contenedor clearfix">
            <div class="logo">
                <a href="index.php">
                    <!-- <img src="img/logo.svg" alt="logo gdlmusic"> -->
                    <img src="img/logo2.png" alt="logo gdlmusic">
                </a>
            </div>
            <!-- Para construir el menu tipo hamburguesa para los móviles -->
            <div class="menu-movil">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav class="navegacion-principal clearfix">
                <a href="index.php">Inicio</a>
                <a href="descargas.php">Partituras</a>
                <a href="estadisticas.php">Estadísticas</a>

                <?php if (!$_SESSION['nombre_usuario']) { ?>
                    <a href="contacto.php">Contáctenos</a>
                <?php } else { ?>

                    <a href="mis-descargas.php">Mis descargas</a>

                <?php } ?>

                <?php if (!$_SESSION['nombre_usuario']) { ?>
                    <a href="admin/login-usuario.php">Inicio de sesión</a>
                <?php } else { ?>

                    <a href="admin/login-usuario.php?cerrar_sesion=true">Cerrar Sesión</a>

                <?php } ?>
            </nav>
        </div>
        <!--contenedor-->
    </div>
    <!--barra-->

