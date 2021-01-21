<footer class="site footer">
    <div class="contenedor clearfix">
        <div class="footer informacion">
            <h3>Sobre <span>GdlMusic &#9835;</span></h3>
            <p>Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie. Curabitur urna metus, placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempus euismod.</p>
        </div>

        <div class="ultimos-tweets">
            <h3>facebook<span> Videos</span></h3>
            <!-- integrar videos de facebook -->
            <!-- <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v7.0"></script>
            <div class="fb-video" data-href="https://www.facebook.com/455351521595256/videos/575449136255625/" data-show-text="false" data-width=""><blockquote cite="https://developers.facebook.com/455351521595256/videos/575449136255625/" class="fb-xfbml-parse-ignore"><a href="https://developers.facebook.com/455351521595256/videos/575449136255625/">Concierto de Osmany Paredes en en Cauz / transmisión en vivo Red Estudio</a><p>Concierto de Osmany Paredes en en Cauz / transmisión en vivo Red Estudio</p>Publicado por <a href="https://www.facebook.com/Red-Estudio-455351521595256/">Red Estudio</a> en Jueves, 27 de diciembre de 2018</blockquote></div> -->

            <ul>
                <li> Integer ultricies justo nec ipsum finibus, eu interdum quam vulputate. #Pellentesque nec @justo non est eleifend pulvinar.</li>
                <li> Integer ultricies justo nec ipsum finibus, eu interdum quam vulputate. #Pellentesque nec @justo non est eleifend pulvinar.</li>
                <li> Integer ultricies justo nec ipsum finibus, eu interdum quam vulputate. #Pellentesque nec @justo non est eleifend pulvinar.</li>
            </ul>

        </div>
        <div class="menu">
            <h3>Redes <span>Sociales</span></h3>
            <nav class="redes-sociales">
                <a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="https://twitter.com/explore"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="https://www.pinterest.com.mx/"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </nav>
            <p>Ing. Benjamin Rubio Madrid</p>
        </div>

        <div class="contacto">
            <a href="contacto.php">
                Contáctenos
            </a>
        </div>

    </div>
    <!--contenedor clearfix-->
    <p class="copyright">
        Todos los Derechos Reservados © 2020 GDLMUSIC &#9835; <br>
       
        <!-- Contador de Visias-->
        Visitas: 
        <?php
        $fp = fopen("contador.txt", "r+");
        $counter = fgets($fp, 7);
        echo $counter;
        $counter++;
        rewind($fp);
        fputs($fp, $counter);
        fclose($fp);
        echo "</b></p>";
        ?>
    </p>

    <!-- formulario de mailchimp -->
    <!-- Begin Mailchimp Signup Form -->
    <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        #mc_embed_signup {
            background: #fff;
            clear: left;
            font: 14px Helvetica, Arial, sans-serif;
        }

        /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
    </style>
    <div style="display: none;">
        <!-- para que no se vea el formulario abajo del footer -->
        <div id="mc_embed_signup">
            <form action="https://facebook.us19.list-manage.com/subscribe/post?u=5009ca6753ea56561b465b171&amp;id=53fd42ce3a" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll">
                    <h2>Suscríbete al Newsletter y no te pierdas nada de este evento</h2>
                    <div class="indicates-required"><span class="asterisk">*</span> es obligatorio</div>
                    <div class="mc-field-group">
                        <label for="mce-EMAIL">Correo Electrónico <span class="asterisk">*</span>
                        </label>
                        <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                    </div>
                    <div id="mce-responses" class="clear">
                        <div class="response" id="mce-error-response" style="display:none"></div>
                        <div class="response" id="mce-success-response" style="display:none"></div>
                    </div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_5009ca6753ea56561b465b171_53fd42ce3a" tabindex="-1" value=""></div>
                    <div class="clear"><input type="submit" style="width: 150px;" value="Suscribirse" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                </div>
            </form>
        </div>
        <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
        <script type='text/javascript'>
            (function($) {
                window.fnames = new Array();
                window.ftypes = new Array();
                fnames[0] = 'EMAIL';
                ftypes[0] = 'email';
                fnames[1] = 'FNAME';
                ftypes[1] = 'text';
                fnames[2] = 'LNAME';
                ftypes[2] = 'text';
                fnames[3] = 'ADDRESS';
                ftypes[3] = 'address';
                fnames[4] = 'PHONE';
                ftypes[4] = 'phone';
            }(jQuery));
            var $mcj = jQuery.noConflict(true);
        </script>
        <!--End mc_embed_signup-->
    </div>



</footer>
<!--site footer-->
<!-- <script type="text/javascript" src="js/header-fecha.js"></script>   -->
<script src="js/vendor/modernizr-3.5.0.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>
    window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')
</script>
<script src="js/plugins.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/jquery.lettering.js"></script>

<!--Scripts ADMIN  -->
<!-- jQuery 3 -->
<!-- <script src="admin/js/jquery.min.js"></script> -->
<!-- Bootstrap 3.3.7 -->
<script src="admin/js/bootstrap.min.js"></script>
<!-- DATATABLES -->
<script src="admin/js/jquery.dataTables.min.js"></script>
<script src="admin/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="admin/js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="admin/js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="admin/js/adminlte.min.js"></script>




<!--  App.js -->
<script src="admin/js/app.js"></script>
<!-- bootstrap datepicker -->
<script src="admin/js/bootstrap-datepicker.min.js"></script>



<!-- FIN de Scripts ADMIN -->

<?php
//Este codigo es para usar colorbox o lightbox solo en la pagina que se utiliza
$archivo = basename($_SERVER['PHP_SELF']); //Devuelve la pagina actual
$pagina = str_replace(".php", "", $archivo); //elimina la extension al archivo actual
if ($pagina == 'invitados' || $pagina == 'index') {
    echo '<script src="js/jquery.colorbox-min.js"></script>';
} else if ($pagina == 'conferencia') {
    echo '<script src="js/lightbox.js"></script>';
}

/*$archivo2 = basename($_SERVER['PHP_SELF']); //Devuelve la pagina actual
$pagina2 = str_replace(".php", "", $archivo2); //elimina la extension al archivo actual
if ($pagina2 == 'pdf4') {
    echo '<script src="js/usuario-ajax.js"></script>';
}*/



?>



<script src="js/main.js"></script>
<script src="js/cotizador.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_5ZluF-VDv-e1qcQz0s-qKQ-WpwYypps&callback=initMap" async defer></script>



<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga = function() {
        ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>

<!-- MailChimp -->
<script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/unique-methods/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script>
<script type="text/javascript">
    window.dojoRequire(["mojo/signup-forms/Loader"], function(L) {
        L.start({
            "baseUrl": "mc.us19.list-manage.com",
            "uuid": "5009ca6753ea56561b465b171",
            "lid": "53fd42ce3a",
            "uniqueMethods": true
        })
    })
</script>

<!-- CACHE -->
<?php
/* // Guarda todo el contenido a un archivo
            $fp = fopen($archivoCache, 'w');
            fwrite($fp, ob_get_contents());
            fclose($fp);
            // Enviar al navegador
            ob_end_flush();*/
?>

</body>

</html>