console.log("1");

var api='AIzaSyD_5ZluF-VDv-e1qcQz0s-qKQ-WpwYypps';


      function initMap() {
          var latLng={
              lat: 20.730343,
              lng:-103.336198
          };
     
          //asigna el mapa y le da valores
    var  map = new google.maps.Map(document.getElementById('mapa'), {
          'center': latLng,
          'zoom': 14,
            'mapTypeId': google.maps.MapTypeId.ROADMAP
        });
     
     //Informacio del marcador
    var contenido='<h2> GDLWEBCAMP</h2>'+
                  '<p>Del 10 al 12 de Diciembre</p>'+
                  '<p>Visitanos!</p>';
          
    var informacion=new google.maps.InfoWindow({
            content: contenido
        
    });     
          
    //coloca el marcador rojo
    var marker= new google.maps.Marker({
        position: latLng,
        map: map,
        title: 'GDLWEBCAMP'
        
        });
   
          //Metodo addListener para agregar informacion al marcador
   marker.addListener('click', function(){
          informacion.open(map,marker);          
                       
        });    
          
          
      }
    
    



$(function(){
    
    //Animacion nombre del sitio. Lettering
    $('.nombre-sitio').lettering();
    
    
    //Agregar clase a menu. Para indicar en el menu en que pagina nos encontramos (body.name, name es el archivo php en el que nos encontramos y a:contains('link') es el link de la navegación)
    $('body.index .navegacion-principal a:contains("Inicio")').addClass('activo');
    $('body.descargas .navegacion-principal a:contains("Partituras")').addClass('activo');
    $('body.calendario .navegacion-principal a:contains("Estadísticas")').addClass('activo');
    $('body.invitados .navegacion-principal a:contains("Contacto")').addClass('activo');
    $('body.invitados .navegacion-principal a:contains("Mis descargas")').addClass('activo');
   
    

     
    //Menu Fijo
    var windowHeight = $(window).height();//Nos regresa la altura total de la ventana
    var barraAltura = $('.barra').innerHeight(); // nos da la altura de la barra
   
    //console.log(windowHeight)
   $(window).scroll(function(){
       var scroll= $(window).scrollTop(); //es importante añadir esta linea. scrollTop detecta en que parte de la pantalla estamos
       //console.log(scroll);
       if(scroll > windowHeight){
            //barra fija
            $('.barra').addClass('fixed');
           $('body').css({'margin-top': + barraAltura + 'px'}); 
           // $('.pegajoso').addClass('fixed2');
            //$('.fixed2').css({ 'top': altu + 'px' }); 
          // $('body').css({ 'margin-top': altubody + 'px' }); 
           //$('body').css({ 'margin-top': (barraAltura+toolbarAltura) + 'px' }); 
            //console.log("salio");
            
        } else{
            //console.log("no ha salido");
            
            //remueve la clase fixed creada en barra
             $('.barra').removeClass('fixed');
          // $('.pegajoso').removeClass('fixed2');
             $('body').css({'margin-top': '0px'}); 
           
        }
        
    });

    
    

    //Menu Responsive
    
    $('.menu-movil').on('click', function(){
       $('.navegacion-principal').slideToggle();
        
    });
    
    //Programa de Talleres, seminarios y conferencias
    $('.programa-evento .info-curso:first').show();
    $('.menu-programa a:first').addClass('activo');
    
    $('.menu-programa a').on('click',function(){
        $('.menu-programa a').removeClass('activo');
        $(this).addClass('activo');
        $('.ocultar').hide();
         var enlace=$(this).attr('href');
         $(enlace).fadeIn(1000);
        
        //$('#recarga').load('conferencia.php');
        
        return false;//eliminar el brinco al dar click al menu
       
   });

    //
    
    //Animaciones para los nùmeros
    var resumenLista=jQuery('.resumen-evento');
    if(resumenLista.length>0){
     $('.resumen-evento').waypoint(function(){
     $('.resumen-evento li:nth-child(1) p').animateNumber({ number: 6}, 1200);
     $('.resumen-evento li:nth-child(2) p').animateNumber({ number: 15}, 1200);
     $('.resumen-evento li:nth-child(3) p').animateNumber({ number: 3}, 1500);
     $('.resumen-evento li:nth-child(4) p').animateNumber({ number: 9}, 1500);                           
                                      
         }, {
         offset: '60%'
     });
    }

    
    
    
    
    //Cuenta Regresiva
    
    /*$('.cuenta-regresiva').countdown('2018/07/30 09:00:00', function(event){
        $('#dias').html(event.strftime('%D'));
        $('#horas').html(event.strftime('%H'));
        $('#minutos').html(event.strftime('%M'));
        $('#segundos').html(event.strftime('%S'));
    });*/

    
        
    
    //Colorbox
    //$('.invitado-info').colorbox({inline:true, width:"50%"});
    $('.boton_newsletter').colorbox({inline:true, width:"50%"});


   (function(){
       'use strict'; // para que javaScript se ejecute en modo estricto
        var crearReloj = function(){
            // Obtenemos la fecha actual, incluyendo las horas, minutos, segundos, dia de la semana, dia del mes, mes y año;
            var ahora = new Date();
            var h = ahora.getHours();
            var m = ahora.getMinutes();
            var s = ahora.getSeconds();
            var d = ahora.getDay();
            var dia = ahora.getDate();
			var mes = ahora.getMonth();
			var year = ahora.getFullYear();
              
    
            // Accedemos a los elementos del DOM del index para agregar mas adelante sus correspondientes valores
            var pHoras = document.getElementById('horas'),
                pMinutos = document.getElementById('minutos'),
                pSegundos = document.getElementById('segundos'),
                pDiaSemana = document.getElementById('diaSemana'),
                pDia = document.getElementById('dia'),
			    pMes = document.getElementById('mes'),
                pYear = document.getElementById('anio');
                
                
                // Accedemos a los elementos del DOM en el header para agregar mas adelante sus correspondientes valores
           /* var hDiaSemana = document.getElementById('fecha_diaSemana'),
                hDia = document.getElementById('fecha_dia'),
                hMes = document.getElementById('fecha_mes'),
                hYear = document.getElementById('fecha_anio');*/

                // Obtenemos el dia se la semana y lo mostramos
		var semana = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
        pDiaSemana.textContent = semana[d];

        //hDiaSemana.textContent = semana[d];
        
        // Obtenemos el dia del mes
        pDia.textContent = dia;

        //hDia.textContent = dia;
        
        // Obtenemos el Mes y año y lo mostramos
		var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
		pMes.textContent = meses[mes];
        pYear.textContent = year;
        
        
        //hMes.textContent = meses[mes];
        //hYear.textContent = year;
               
    
        
            // Cambiamos las hora de 24 a 12 horas y establecemos si es AM o PM
    
            /*if (horas >= 12) {
                horas = horas - 12;
                ampm = 'PM';
            } else {
                ampm = 'AM';
            }*/
    
            // Detectamos cuando sean las 0 AM y transformamos a 12 AM
            if (h == 0 ){
                h = 12;
            }
    
            // Si queremos mostrar un cero antes de las horas ejecutamos este condicional
             if (h < 10){h = '0' + h;}
            pHoras.textContent = h;
           // pAMPM.textContent = ampm;
    
            // Minutos y Segundos
            if (m < 10){ m = "0" + m; }
            if (s < 10){ s = "0" + s; }
    
            pMinutos.textContent = m;
            pSegundos.textContent = s;
        };
    
        crearReloj();
        var intervalo = setInterval(crearReloj, 1000);
    //}())
   })()
    
})
    




console.log("3");

// Reloj Digital
/*(function(){
	var actualizarHora = function(){
		// Obtenemos la fecha actual, incluyendo las horas, minutos, segundos, dia de la semana, dia del mes, mes y año;
		var fecha = new Date(),
			horas = fecha.getHours(),
			ampm,
			minutos = fecha.getMinutes(),
			segundos = fecha.getSeconds(),
			diaSemana = fecha.getDay(),
			dia = fecha.getDate(),
			mes = fecha.getMonth(),
			year = fecha.getFullYear();

		// Accedemos a los elementos del DOM para agregar mas adelante sus correspondientes valores
		var pHoras = document.getElementById('horas'),
			pAMPM = document.getElementById('ampm'),
			pMinutos = document.getElementById('minutos'),
			pSegundos = document.getElementById('segundos'),
			pDiaSemana = document.getElementById('diaSemana'),
			pDia = document.getElementById('dia'),
			pMes = document.getElementById('mes'),
			pYear = document.getElementById('year');

		
		// Obtenemos el dia se la semana y lo mostramos
		var semana = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
		pDiaSemana.textContent = semana[diaSemana];

		// Obtenemos el dia del mes
		pDia.textContent = dia;

		// Obtenemos el Mes y año y lo mostramos
		var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
		pMes.textContent = meses[mes];
		pYear.textContent = year;

		// Cambiamos las hora de 24 a 12 horas y establecemos si es AM o PM

		if (horas >= 12) {
			horas = horas - 12;
			ampm = 'PM';
		} else {
			ampm = 'AM';
		}

		// Detectamos cuando sean las 0 AM y transformamos a 12 AM
		if (horas == 0 ){
			horas = 12;
		}

		// Si queremos mostrar un cero antes de las horas ejecutamos este condicional
		// if (horas < 10){horas = '0' + horas;}
		pHoras.textContent = horas;
		pAMPM.textContent = ampm;

		// Minutos y Segundos
		if (minutos < 10){ minutos = "0" + minutos; }
		if (segundos < 10){ segundos = "0" + segundos; }

		pMinutos.textContent = minutos;
		pSegundos.textContent = segundos;
	};

	actualizarHora();
	var intervalo = setInterval(actualizarHora, 1000);
}())*/
