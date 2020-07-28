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
   


    $('#password').on('input', function(){

      var password_nuevo = $('#repetir_password').val();
      

      if ($(this).val() == password_nuevo) {
        $('#resultado_password').text('Correcto'); //el texto lo coloca en el span creado en crear-admin
        $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('#crear_registro_admin').attr('disabled', false);
        
      } 
      else {
        $('#resultado_password').text('No son iguales!');
        $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
        $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
        $('#crear_registro_admin').attr('disabled', true);
        
      }

      if ($('#password').val() == '' && $('#repetir_password').val() == '') {
        $('#resultado_password').text('Debes introducir una contraseña');
          $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
          $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
          $('#crear_registro_admin').attr('disabled', true);
  
      }

      if ($('#password').val() == '' && $('#repetir_password').val() == '' && $('#actualizar').val() == 'actualizar') {
        $('#resultado_password').text('Escribe password sólo si deseas cambiarlo, en caso contrario, déjalo vacío'); //el texto lo coloca en el span creado en crear-admin
          $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
          $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
          $('#crear_registro_admin').attr('disabled', false);
          
      }

    });


    $('#repetir_password').on('input', function(){
      var password_nuevo = $('#password').val();

      if ($(this).val() == password_nuevo) {
        $('#resultado_password').text('Correcto'); //el texto lo coloca en el span creado en crear-admin
        $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('#crear_registro_admin').attr('disabled', false);
        
      } 
      else {
        $('#resultado_password').text('No son iguales!');
        $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
        $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
        $('#crear_registro_admin').attr('disabled', true);
        
      }

      if ($('#password').val() == '' && $('#repetir_password').val() == '') {
        $('#resultado_password').text('Debes introducir una contraseña');
          $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
          $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
          $('#crear_registro_admin').attr('disabled', true);
  
      }

      if ($('#password').val() == '' && $('#repetir_password').val() == '' && $('#actualizar').val() == 'actualizar') {
        $('#resultado_password').text('Escribe password sólo si deseas cambiarlo, en caso contrario, déjalo vacío'); //el texto lo coloca en el span creado en crear-admin
          $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
          $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
          $('#crear_registro_admin').attr('disabled', false);
          
      }





    });

    if ($('#password').val() == '' && $('#repetir_password').val() == '') {
      $('#resultado_password').text('Debes introducir una contraseña');
        $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
        $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
        $('#crear_registro_admin').attr('disabled', true);

    } 
   //deja  activado el boton guardar si los campos estan vacios
    if ($('#password').val() == '' && $('#repetir_password').val() == '' && $('#actualizar').val() == 'actualizar') {
      $('#resultado_password').text('Escribe password sólo si deseas cambiarlo, en caso contrario, déjalo vacío');  //el texto lo coloca en el span creado en crear-admin
       $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('#crear_registro_admin').attr('disabled', false);
        
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
    console.log(data);

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




  })  

 

