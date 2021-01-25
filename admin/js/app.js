$(document).ready(function () {
    $('.sidebar-menu').tree()
    
 
    $('#registros').DataTable({
      'paging'      : true,
      'pageLength'  : 3,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'language' : {
        paginate : {
          next : 'Siguiente',
          previous : 'Anterior',
          last : 'Último',
          first : 'Primero'
        },
        info : 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
        search: 'Buscar:',
        emptyTable: 'No hay registros',
        infoEmpty : '0 Registros'
      }
    });

    // Validacion de Password en crear-admin
    
    $('#crear_registro_admin').attr('disabled', true); //deshabilita boton añadir en crear_admin
   // $('#crear_registro').attr('disabled', true); deshabilitaba boton añadir en crear_evento pero se borro el id crear_registro del boton
   

  // Validacion de Password y campos en crear-usuario
  $('#crear_registro_usuario').attr('disabled', true); //deshabilita boton añadir en crear_admin


  $('#usuario').on('input', function () {
    if ($('#usuario').val() == '') {
      $('#crear_registro_usuario').attr('disabled', true);
      $('#crear_registro_admin').attr('disabled', true);
    } else {
      $('#crear_registro_usuario').attr('disabled', false);
      $('#crear_registro_admin').attr('disabled', false);
    }

  });

  $('#correo_usuario').on('input', function () {
    if ($('#correo_usuario').val() == '') {
      $('#crear_registro_usuario').attr('disabled', true);
    } else {
      $('#crear_registro_usuario').attr('disabled', false);
    }

  });

  

    $('#password').on('input', function(){

      var password_nuevo = $('#repetir_password').val();
      

      if ($(this).val() == password_nuevo) {
        $('#resultado_password').text('Correcto'); //el texto lo coloca en el span creado en crear-admin
        $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('#crear_registro_admin').attr('disabled', false);
        $('#crear_registro_usuario').attr('disabled', false);
        
      } 
      else {
        $('#resultado_password').text('No son iguales!');
        $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
        $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
        $('#crear_registro_admin').attr('disabled', true);
        $('#crear_registro_usuario').attr('disabled', true);
        
      }

      if ($('#password').val() == '' && $('#repetir_password').val() == '') {
        $('#resultado_password').text('Debes introducir una contraseña');
          $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
          $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
          $('#crear_registro_admin').attr('disabled', true);
        $('#crear_registro_usuario').attr('disabled', true);
  
      }

      if ($('#password').val() == '' && $('#repetir_password').val() == '' && $('#actualizar').val() == 'actualizar') {
        $('#resultado_password').text('Escribe password sólo si deseas cambiarlo, en caso contrario, déjalo vacío'); //el texto lo coloca en el span creado en crear-admin
          $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
          $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
          $('#crear_registro_admin').attr('disabled', false);
        $('#crear_registro_usuario').attr('disabled', false);
          
      }

    });


    $('#repetir_password').on('input', function(){
      var password_nuevo = $('#password').val();

      if ($(this).val() == password_nuevo) {
        $('#resultado_password').text('Correcto'); //el texto lo coloca en el span creado en crear-admin
        $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('#crear_registro_admin').attr('disabled', false);
        $('#crear_registro_usuario').attr('disabled', false);
        
      } 
      else {
        $('#resultado_password').text('No son iguales!');
        $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
        $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
        $('#crear_registro_admin').attr('disabled', true);
        $('#crear_registro_usuario').attr('disabled', true);
        
      }

      if ($('#password').val() == '' && $('#repetir_password').val() == '') {
        $('#resultado_password').text('Debes introducir una contraseña');
          $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
          $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
          $('#crear_registro_admin').attr('disabled', true);
        $('#crear_registro_usuario').attr('disabled', true);
  
      }

      if ($('#password').val() == '' && $('#repetir_password').val() == '' && $('#actualizar').val() == 'actualizar') {
        $('#resultado_password').text('Escribe password sólo si deseas cambiarlo, en caso contrario, déjalo vacío'); //el texto lo coloca en el span creado en crear-admin
          $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
          $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
          $('#crear_registro_admin').attr('disabled', false);
        $('#crear_registro_usuario').attr('disabled', false);
          
      }


    });

    if ($('#password').val() == '' && $('#repetir_password').val() == '') {
      $('#resultado_password').text('Debes introducir una contraseña');
        $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
        $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
        $('#crear_registro_admin').attr('disabled', true);
      $('#crear_registro_usuario').attr('disabled', true);

    } 
   //deja  activado el boton guardar si los campos estan vacios
    if ($('#password').val() == '' && $('#repetir_password').val() == '' && $('#actualizar').val() == 'actualizar') {
      $('#resultado_password').text('Escribe password sólo si deseas cambiarlo, en caso contrario, déjalo vacío');  //el texto lo coloca en el span creado en crear-admin
       $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('#crear_registro_admin').attr('disabled', false);
      $('#crear_registro_usuario').attr('disabled', false);
        
    }


    // Validación en el submit
  usuario = document.getElementById('usuario_js');
  admin = document.getElementById('admin_js');

  if(usuario) {
    
    OkButton = document.getElementById('crear_registro_usuario');
    OkButton.addEventListener('click', function () {
      //e.preventDefault();//evita que se abra el archivo del action( osea el insertar-admin.php ahora modelo-admin) del form que esta en crear-admin.php
      //console.log('Click');

      if ($('#usuario').val() == '' || $('#correo_usuario').val() == '' || $('#password').val() == '' || $('#repetir_password').val() == '') {

        $('#error').text('* Debes llenar todos los campos');
        $('#error').parents('.form-group').addClass('has-error');
        $('#crear_registro_usuario').attr('disabled', true);

      } else {
        $('#crear_registro_usuario').attr('disabled', false);
      }

    });

  } else if (admin) {

    OkButton2 = document.getElementById('crear_registro_admin');
    OkButton2.addEventListener('click', function () {
      //e.preventDefault();//evita que se abra el archivo del action( osea el insertar-admin.php ahora modelo-admin) del form que esta en crear-admin.php


      if ($('#usuario').val() == '' || $('#password').val() == '' || $('#repetir_password').val() == '') {

        $('#error').text('* Debes llenar todos los campos');
        $('#error').parents('.form-group').addClass('has-error');
        $('#crear_registro_admin').attr('disabled', true);

      } else {
        $('#crear_registro_admin').attr('disabled', false);
      }

    });
    
  } 
 


 


    //Date picker
$('#fecha').datepicker({
  autoclose: true
});

$('.seleccionar').select2();

//Timepicker
$('.timepicker').timepicker({
  showInputs: false
});
 
$('#icono').iconpicker();

  //Flat red color scheme for iCheck
  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_flat-blue',
    radioClass   : 'iradio_flat-blue'
  });

  // LINE CHART
  $.getJSON('servicio-registrados.php', function(data) { //recibo los datos actualizados de servicio-registrados.php 
    //console.log(data);

    var line = new Morris.Line({
      element: 'grafica-registros',
      resize: true,
      data: data ,
      xkey: 'anios',
      ykeys: ['cantidad'],
      labels: ['Item 1'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });
  });


  /* ChartJS Usuarios
     * -------
     * Here we will create a few charts using ChartJS
     */

    // -----------------------
    // - MONTHLY SALES CHART -
    // -----------------------
  //console.log("Sirve");
  //alert("Sirve"); // NOTA: CUIDADO CON LAS RUTAS 
  $.getJSON('admin/servicio-usuarios.php', function (data) { //recibo los datos actualizados de servicio-registrados.php
    //console.log(data);
    var fecha_registro = [];
    var cantidad_registro = [];

    for (var i = 0; i < data.length; i++) {
      fecha_registro[i] = data[i].fecha;
      cantidad_registro[i] = data[i].cantidad;
    }

    //console.log(fecha_registro);

    //console.log(cantidad_registro);
  
  
  
    // Get context with jQuery - using jQuery's .get() method.
    var salesChartCanvas = $('#usuariosChart').get(0).getContext('2d');
    // This will get the first returned node in the jQuery collection.
    var salesChart = new Chart(salesChartCanvas);

    var salesChartData = {
        labels: fecha_registro,
        datasets: [
           /* {
                label: 'Electronics',
                fillColor: 'rgb(210, 214, 222)',
                strokeColor: 'rgb(210, 214, 222)',
                pointColor: 'rgb(210, 214, 222)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgb(220,220,220)',
                data: [65, 59, 80, 81, 56, 55, 40]
            },*/
            {
                label: 'hkhjh',
                fillColor: 'rgba(60,141,188,0.9)',
                strokeColor: 'rgba(60,141,188,0.8)',
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: cantidad_registro
            }
        ]
    };

    var salesChartOptions = {
        // Boolean - If we should show the scale at all
        showScale: true,
        // Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines: false,
        // String - Colour of the grid lines
        scaleGridLineColor: 'rgba(0,0,0,.05)',
        // Number - Width of the grid lines
        scaleGridLineWidth: 1,
        // Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        // Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines: true,
        // Boolean - Whether the line is curved between points
        bezierCurve: true,
        // Number - Tension of the bezier curve between points
        bezierCurveTension: 0.3,
        // Boolean - Whether to show a dot for each point
        pointDot: false,
        // Number - Radius of each point dot in pixels
        pointDotRadius: 4,
        // Number - Pixel width of point dot stroke
        pointDotStrokeWidth: 1,
        // Number - amount extra to add to the radius to cater for hit detection outside the drawn point
        pointHitDetectionRadius: 20,
        // Boolean - Whether to show a stroke for datasets
        datasetStroke: true,
        // Number - Pixel width of dataset stroke
        datasetStrokeWidth: 2,
        // Boolean - Whether to fill the dataset with a color
        datasetFill: true,
        // String - A legend template
        legendTemplate: '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<datasets.length; i++){%><li><span style=\'background-color:<%=datasets[i].lineColor%>\'></span><%=datasets[i].label%></li><%}%></ul>',
        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio: true,
        // Boolean - whether to make the chart responsive to window resizing
        responsive: true
    };

    // Create the line chart
    salesChart.Line(salesChartData, salesChartOptions);


  });

  /* ChartJS Descargas
     * -------
     * Here we will create a few charts using ChartJS
     */

  // -----------------------
  // - MONTHLY SALES CHART -
  // -----------------------
  //console.log("Sirve");
  //alert("Sirve"); // NOTA: CUIDADO CON LAS RUTAS 
  $.getJSON('admin/servicio-descargas.php', function (data) { //recibo los datos actualizados de servicio-registrados.php
    //console.log(data);
    var fecha_registro = [];
    var cantidad_registro = [];

    for (var i = 0; i < data.length; i++) {
      fecha_registro[i] = data[i].fecha;
      cantidad_registro[i] = data[i].cantidad;
    }

    //console.log(fecha_registro);

    //console.log(cantidad_registro);



    // Get context with jQuery - using jQuery's .get() method.
    var salesChartCanvas = $('#descargasChart').get(0).getContext('2d');
    // This will get the first returned node in the jQuery collection.
    var salesChart = new Chart(salesChartCanvas);

    var salesChartData = {
      labels: fecha_registro,
      datasets: [
        /* {
             label: 'Electronics',
             fillColor: 'rgb(210, 214, 222)',
             strokeColor: 'rgb(210, 214, 222)',
             pointColor: 'rgb(210, 214, 222)',
             pointStrokeColor: '#c1c7d1',
             pointHighlightFill: '#fff',
             pointHighlightStroke: 'rgb(220,220,220)',
             data: [65, 59, 80, 81, 56, 55, 40]
         },*/
        {
          label: 'hkhjh',
          fillColor: 'rgba(60,141,188,0.9)',
          strokeColor: 'rgba(60,141,188,0.8)',
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: cantidad_registro
        }
      ]
    };

    var salesChartOptions = {
      // Boolean - If we should show the scale at all
      showScale: true,
      // Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      // String - Colour of the grid lines
      scaleGridLineColor: 'rgba(0,0,0,.05)',
      // Number - Width of the grid lines
      scaleGridLineWidth: 1,
      // Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      // Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      // Boolean - Whether the line is curved between points
      bezierCurve: true,
      // Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      // Boolean - Whether to show a dot for each point
      pointDot: false,
      // Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      // Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      // Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      // Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      // Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      // Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      // String - A legend template
      legendTemplate: '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<datasets.length; i++){%><li><span style=\'background-color:<%=datasets[i].lineColor%>\'></span><%=datasets[i].label%></li><%}%></ul>',
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      // Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

    // Create the line chart
    salesChart.Line(salesChartData, salesChartOptions);


  });
 

  })  




 

