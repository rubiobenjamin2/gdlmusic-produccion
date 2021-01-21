<?php include_once 'includes/templates/header.php'; ?>


<!-- <section class="seccion contenedor">
          <h2>Las partituras más populares </h2>
          
        <p>
          Esta página pretende ser un recurso de gran utilidad para todas aquellas personas que se desarrollan en el ambiente de la
           música, y que en determinado momento necesiten consultar y/o descargar una partitura, puedan realizarlo en cualquier momento y lugar desde este portal. 
           Uno de los objetivo principales es retroalimentar este recurso por medio de sus aportaciones con 
           partituras, libros u otros materiales de interés común, haciéndolo llegar por medio del contacto de este sitio web.</p> <br> 
           <div class="reg">¡Sólo regístrate y listo!</div>
           
 
          </Sólo>
      </section>seccion contenedor -->

<section class="programa">
    <div class="contenedor-video">
        <video autoplay="" preload="auto" muted loop="" poster="img/clave.png">
            <!-- <source src="video/prueba.mp4" type="video/mp4" >
                <source src="video/prueba.ogv" type="video/ogv" >
                <source src="video/prueba.webm" type="video/webm" >  -->
        </video>
    </div>
    <!--contenedor-video-->

    <div class="contenido-programa">
        <div class="contenedor">
            <div class="programa-evento">
                <h2>Principales</h2>
                <nav class="menu-programa">
                    <a href="#gdlmusic"><i class="fa fa-code" aria-hidden="true"></i>GdlMusic</a>
                    <a href="#ranking"><i class="fa fa-code" aria-hidden="true"></i>Ranking Descargas</a>
                    <!-- <a href="#sesion"><i class="fa fa-code" aria-hidden="true"></i>Inicio de Sesión</a> -->
                    <!-- <a href="#mentoria"><i class="fa fa-code" aria-hidden="true"></i>Mentoria</a> -->
                </nav>






                <div id="gdlmusic" class="info-curso ocultar clearfix">
                    <div class="detalle-evento">

                        <h3>LAS PARTITURAS MÁS POPULARES</h3> <br>

                        <p>
                            Esta página pretende ser un recurso de gran utilidad para todas aquellas personas que se
                            desarrollan en el ambiente de la
                            música, y que en determinado momento necesiten consultar y/o descargar una partitura, puedan
                            realizarlo en cualquier momento y lugar desde este portal.
                            Uno de los objetivo principales es retroalimentar este recurso por medio de sus aportaciones
                            con
                            partituras, libros u otros materiales de interés común, haciéndolo llegar por medio del
                            contacto de este sitio web.</p> <br>
                        <!-- <div class="reg">¡Sólo regístrate y listo!</div> -->


                    </div>

                    <a href="admin/registro-usuario.php" class="button float-right">¡Sólo regístrate y listo!</a>
                </div>

                <div id="ranking" class="info-curso ocultar clearfix">
                    <div class="detalle-evento">
                        <h3>En construcción</h3>
                        <img src="img/construccion.jpg" alt="construccion">

                        <?php //include_once'conferencia.php'; 
                        ?>
                    </div>

                    <a href="admin/registro-usuario.php" class="button float-right">¡Sólo regístrate y listo!</a>
                </div>

                <div id="sesion" class="info-curso ocultar clearfix">
                    <div class="detalle-evento">
                        <h3>En construcción</h3>
                        <img src="img/construccion.jpg" alt="construccion">

                    </div>

                    <a href="#" class="button float-right">Ver todos</a>
                </div>

                <div id="mentoria" class="info-curso ocultar clearfix">
                    <div class="detalle-evento">
                        <h3>Diseño UI/UX</h3>
                        <img src="img/construccion.jpg" alt="construccion">

                    </div>

                    <a href="#" class="button float-right">Ver todos</a>
                </div>
                <!--info-curso -->

            </div>
            <!--programa-evento-->

        </div>
        <!--contenedor-->
    </div>
    <!--contenido-programa-->

</section>
<!--seccion programa-->

<!--La seccion de invitados la llamamos desde aqui-->
<?php //include_once'includes/templates/artistas.php'; 
?>

<?php include_once 'includes/templates/artistas2.php'; ?>


<!-- <section class="invitados contenedor seccion">
          <h2>Nuestros Invitados</h2>
          <ul class="lista-invitados clearfix">
              <li>
                  <div class="invitado">
                      <img src="img/invitado1.jpg" alt="imagen invitado1">
                      <p>Rafael Bautista</p>
                  </div>
              </li>
              <li>
                  <div class="invitado">
                      <img src="img/invitado2.jpg" alt="imagen invitado1">
                      <p>Shari Herrera</p>
                  </div>
              </li>
              <li>
                  <div class="invitado">
                      <img src="img/invitado3.jpg" alt="imagen invitado1">
                      <p>Greogorio Sanchez</p>
                  </div>
              </li>
              <li>
                  <div class="invitado">
                      <img src="img/invitado4.jpg" alt="imagen invitado1">
                      <p>Susana Rivera</p>
                  </div>
              </li>
              <li>
                  <div class="invitado">
                      <img src="img/invitado5.jpg" alt="imagen invitado1">
                      <p>Harold Garcia</p>
                  </div>
              </li>
              <li>
                  <div class="invitado">
                      <img src="img/invitado6.jpg" alt="imagen invitado1">
                      <p>Susan Sanchez</p>
                  </div>
              </li>
              
          </ul>
      </section> -->
<!--seccion invitados-->
<?php echo $counter; ?>
<div class="contador parallax">
    <div class="contenedor">
        <ul class="resumen-evento clearfix">
            <li>
                <p class="numero">0</p>Invitados
            </li>
            <li>
                <p class="numero">0</p>Talleres
            </li>
            <li>
                <p class="numero">0</p>Dias
            </li>
            <li>
                <p class="numero">0</p>Conferencias
            </li>
        </ul>
    </div>

</div>
<!--contador parallax-->

<section class="precios seccion">
    <h2>Precios</h2>
    <div class="contenedor">
        <ul class="lista-precios clearfix">
            <li>
                <div class="tabla-precio">
                    <h3>Pase por día</h3>
                    <p class="numero">$30</p>
                    <ul>
                        <li>Bocadillos Gratis</li>
                        <li>Todas las conferencias</li>
                        <li>Todos los talleres</li>
                    </ul>
                    <a href="#" class="button hollow">Comprar</a>
                </div>
            </li>

            <li>
                <div class="tabla-precio">
                    <h3>Todos los dias</h3>
                    <p class="numero">$50</p>
                    <ul>
                        <li>Bocadillos Gratis</li>
                        <li>Todas las conferencias</li>
                        <li>Todos los talleres</li>
                    </ul>
                    <a href="#" class="button">Comprar</a>
                </div>
            </li>

            <li>
                <div class="tabla-precio">
                    <h3>Pase por 2 días</h3>
                    <p class="numero">$45</p>
                    <ul>
                        <li>Bocadillos Gratis</li>
                        <li>Todas las conferencias</li>
                        <li>Todos los talleres</li>
                    </ul>
                    <a href="#" class="button hollow">Comprar</a>
                </div>
            </li>
        </ul>
    </div>
</section>
<!--precios seccion-->

<div id="mapa" class="mapa">

</div>
<!--mapa-->

<section class="seccion">
    <h2>Testimoniales</h2>

    <div class="testimoniales contenedor clearfix">
        <div class="testimonial">
            <blockquote>
                <p>Sed mollis velit sit amet felis condimentum ultrices. Fusce vehicula ut sem vitae semper. Nullam
                    blandit neque eu semper ullamcorper. Duis commodo quam in orci condimentum ultricies.</p>
                <footer class="info-testimonial clearfix">
                    <img src="img/testimonial.jpg" alt="imagen testimonial">
                    <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                </footer>
            </blockquote>
        </div>
        <!--testimonial-->

        <div class="testimonial">
            <blockquote>
                <p>Sed mollis velit sit amet felis condimentum ultrices. Fusce vehicula ut sem vitae semper. Nullam
                    blandit neque eu semper ullamcorper. Duis commodo quam in orci condimentum ultricies.</p>
                <footer class="info-testimonial clearfix">
                    <img src="img/testimonial.jpg" alt="imagen testimonial">
                    <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                </footer>
            </blockquote>
        </div>
        <!--testimonial-->

        <div class="testimonial">
            <blockquote>
                <p>Sed mollis velit sit amet felis condimentum ultrices. Fusce vehicula ut sem vitae semper. Nullam
                    blandit neque eu semper ullamcorper. Duis commodo quam in orci condimentum ultricies.</p>
                <footer class="info-testimonial clearfix">
                    <img src="img/testimonial.jpg" alt="imagen testimonial">
                    <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                </footer>
            </blockquote>
        </div>
        <!--testimonial-->
    </div>
    <!--testimoniales contenedor clearfix-->

</section>
<!--seccion-->

<div class="newsletter parallax">
    <div class="contenido contenedor">
        <p>regístrate al newletter:</p>
        <h3>gdlmusic &#9835;</h3>
        <a href="#mc_embed_signup" class="boton_newsletter button transparente">Registro</a>
    </div>
</div>
<!--newsletter parallax-->


<!-- Relog digital de falcon master <div class="wrap">
		<div class="widget">
			<div class="fecha">
				<p id="diaSemana" class="diaSemana">Martes</p>
				<p id="dia" class="dia">27</p>
				<p>de </p>
				<p id="mes" class="mes">Octubre</p>
				<p>del </p>
				<p id="year" class="year">2015</p>
			</div>
	
			<div class="reloj">
				<p id="horas" class="horas">11</p>
				<p>:</p>
				<p id="minutos" class="minutos">48</p>
				<p>:</p>
				<div class="caja-segundos">
					<p id="ampm" class="ampm">AM</p>
					<p id="segundos" class="segundos">12</p>
				</div>
			</div>
		</div>
    </div> -->

<!-- Original <section class="seccion">
           <h2>Horario</h2>
           <div class="cuenta-regresiva contenedor">
               <ul class="clearfix">
                   <li><p id="dias" class="numero"></p> día</li>
                   <li><p id="horas" class="numero"></p> hora</li>
                   <li><p id="minutos" class="numero"></p> minutos</li>
                   <li><p id="segundos" class="numero"></p> segundos</li>
               </ul>
           </div>
       </section> -->


<section class="seccion">
    <h2>Fecha / Hora</h2>
    <div class="cuenta-regresiva1 contenedor">

        <div class="reloj1">
            <ul class="clearfix">
                <li>
                    <p id="diaSemana" class="numero"></p>
                </li>
                <li>
                    <p id="dia" class="numero"></p>
                </li>
                <li>
                    <p id="mes" class="numero"></p>
                </li>
                <li>
                    <p id="anio" class="numero"></p>
                </li>
            </ul>
        </div>




    </div>
    <!--cuenta-regresiva contenedor-->
    <div class="cuenta-regresiva contenedor">


        <div class="reloj">
            <ul class="clearfix">
                <li>
                    <p id="horas" class="numero"></p>
                </li>
                <li>
                    <p id="horas1" class="numero">:</p>
                </li>
                <li>
                    <p id="minutos" class="numero"></p>
                    </>
                <li>
                    <p id="horas1" class="numero">:</p>
                </li>
                <li>
                    <p id="segundos" class="numero"></p>
                </li>
            </ul>
        </div>



    </div>
    <!--cuenta-regresiva contenedor-->
</section>
<!--seccion-->







<?php include_once 'includes/templates/footer.php'; ?>