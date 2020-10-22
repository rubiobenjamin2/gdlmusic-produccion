/*$(document).ready(function () {

   

    // Validacion de Password y campos en crear-usuario
    $('#crear_registro_usuario').attr('disabled', true); //deshabilita boton añadir en crear_admin

    
    $('#usuario').on('input', function () { 
        if ($('#usuario').val() == '') {
            $('#crear_registro_usuario').attr('disabled', true);
        } else {
            $('#crear_registro_usuario').attr('disabled', false);
        }
        
    });
    
    $('#correo_usuario').on('input', function () {
        if ($('#correo_usuario').val() == '') {
            $('#crear_registro_usuario').attr('disabled', true);
        } else {
            $('#crear_registro_usuario').attr('disabled', false);
        }

    });

   

    $('#password').on('input', function () {

        var password_nuevo = $('#repetir_password').val();


        if ($(this).val() == password_nuevo) {
            $('#resultado_password').text('Correcto'); //el texto lo coloca en el span creado en crear-admin
            $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
            $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
            
            $('#crear_registro_usuario').attr('disabled', false);

        }
        else {
            $('#resultado_password').text('No son iguales!');
            $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
            $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
            
            $('#crear_registro_usuario').attr('disabled', true);

        }

        if ($('#password').val() == '' && $('#repetir_password').val() == '') {
            $('#resultado_password').text('Debes introducir una contraseña');
            $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
            $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
            
            $('#crear_registro_usuario').attr('disabled', true);

        }

        if ($('#password').val() == '' && $('#repetir_password').val() == '' && $('#actualizar').val() == 'actualizar') {
            $('#resultado_password').text('Escribe password sólo si deseas cambiarlo, en caso contrario, déjalo vacío'); //el texto lo coloca en el span creado en crear-admin
            $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
            $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
            
            $('#crear_registro_usuario').attr('disabled', false);

        }

    });


    $('#repetir_password').on('input', function () {
        var password_nuevo = $('#password').val();

        if ($(this).val() == password_nuevo) {
            $('#resultado_password').text('Correcto'); //el texto lo coloca en el span creado en crear-admin
            $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
            $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
            
            $('#crear_registro_usuario').attr('disabled', false);

        }
        else {
            $('#resultado_password').text('No son iguales!');
            $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
            $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
            
            $('#crear_registro_usuario').attr('disabled', true);

        }

        if ($('#password').val() == '' && $('#repetir_password').val() == '') {
            $('#resultado_password').text('Debes introducir una contraseña');
            $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
            $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
            
            $('#crear_registro_usuario').attr('disabled', true);

        }

        if ($('#password').val() == '' && $('#repetir_password').val() == '' && $('#actualizar').val() == 'actualizar') {
            $('#resultado_password').text('Escribe password sólo si deseas cambiarlo, en caso contrario, déjalo vacío'); //el texto lo coloca en el span creado en crear-admin
            $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
            $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
            
            $('#crear_registro_usuario').attr('disabled', false);

        }





    });

    if ($('#password').val() == '' && $('#repetir_password').val() == '') {
        $('#resultado_password').text('Debes introducir una contraseña');
        $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
        $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
       
        $('#crear_registro_usuario').attr('disabled', true);

    }
    //deja  activado el boton guardar si los campos estan vacios
    if ($('#password').val() == '' && $('#repetir_password').val() == '' && $('#actualizar').val() == 'actualizar') {
        $('#resultado_password').text('Escribe password sólo si deseas cambiarlo, en caso contrario, déjalo vacío');  //el texto lo coloca en el span creado en crear-admin
        $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
       
        $('#crear_registro_usuario').attr('disabled', false);

    }

   

// Validación en el submit
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


});*/










