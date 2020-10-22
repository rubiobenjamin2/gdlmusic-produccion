$(document).ready(function() {
$('#login-admin').on('submit', function(e) {
    e.preventDefault();//evita que se abra el archivo del action( osea el insertar-admin.php(modelo-admin.php)) del form que esta en login.php
    //console.log('Click');

    var datos = $(this).serializeArray();//Recupera los datos del formulario en los campos de #login-admin

    console.log(datos);
      //es ajax en jquery
    $.ajax({
        type: $(this).attr('method'), //this se refiere a #login
        data: datos,
        url: $(this).attr('action'), //se mandan los datos de acuerdo al action del form de login.php osea a insert-admin.php osea ahora modelo-admin.php
        dataType: 'json',
        success: function(data) { //se retornan los datos de insertar-admin (modelo-admin.php)
            console.log(data);
             var resultado = data;
            if (resultado.respuesta == 'exitoso') {
                Swal.fire(
                    'Login Correcto',
                    'Bienvenid@ ' + resultado.usuario + '!!',
                    'success'
                  )
                  setTimeout(function(){
                    window.location.href = 'admin-area.php';
                  }, 2000);
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Usuario o password Incorrectos!'
                    
                  })
                
            }  
          
        }

    })


});


  $('#login-usuario').on('submit', function (e) {
    e.preventDefault();//evita que se abra el archivo del action( osea el insertar-admin.php(modelo-admin.php)) del form que esta en login.php
    //console.log('Click');

    var datos = $(this).serializeArray();//Recupera los datos del formulario en los campos de #login-admin

    console.log(datos);
    //es ajax en jquery
    $.ajax({
      type: $(this).attr('method'), //this se refiere a #login
      data: datos,
      url: $(this).attr('action'), //se mandan los datos de acuerdo al action del form de login.php osea a insert-admin.php osea ahora modelo-admin.php
      dataType: 'json',
      success: function (data) { //se retornan los datos de insertar-admin (modelo-admin.php)
        console.log(data);
        var resultado = data;
        if (resultado.respuesta == 'exitoso') {
          Swal.fire(
            'Login Correcto',
            'Bienvenid@ ' + resultado.usuario + '!!',
            'success'
          )
          setTimeout(function () {
            window.location.href = '../index.php';
          }, 2000);
        } else {
          Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Usuario o password Incorrectos!'

          })

        }

      }

    })


  });



//Para la parte WEB 
  $('#guardar-registro-usuario').on('submit', function (e) {
    e.preventDefault();//evita que se abra el archivo del action( osea el insertar-admin.php(modelo-admin.php)) del form que esta en login.php
    //console.log('Click');

    var datos = $(this).serializeArray();//Recupera los datos en los campos de #login

    console.log(datos);
    //es ajax en jquery
    $.ajax({
      type: $(this).attr('method'), //this se refiere a #login
      data: datos,
      url: $(this).attr('action'), //se mandan los datos de acuerdo al action del form de login.php osea a insert-admin.php osea ahora modelo-admin.php
      dataType: 'json',
      success: function (data) { //se retornan los datos de insertar-admin (modelo-admin.php)
        console.log(data);
        var resultado = data;
        if (resultado.respuesta == 'exitoso') {
          Swal.fire(
            'Login Correcto',
            'Bienvenid@ ' + resultado.usuario + '!!',
            'success'
          )
          setTimeout(function () {
            window.location.href = '../index.php';
          }, 2000);
        } else {
          Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Usuario o password Incorrectos!'

          })

        }

      }

    })


  });

  //Para la parte del Administrador

  $('#guardar-registro-usuario-admin').on('submit', function (e) {
    e.preventDefault();//evita que se abra el archivo del action( osea el insertar-admin.php(modelo-admin.php)) del form que esta en login.php
    //console.log('Click');

    var datos = $(this).serializeArray();//Recupera los datos en los campos de #login

    console.log(datos);
    //es ajax en jquery
    $.ajax({
      type: $(this).attr('method'), //this se refiere a #login
      data: datos,
      url: $(this).attr('action'), //se mandan los datos de acuerdo al action del form de login.php osea a insert-admin.php osea ahora modelo-admin.php
      dataType: 'json',
      success: function (data) { //se retornan los datos de insertar-admin (modelo-admin.php)
        console.log(data);
        var resultado = data;
        if (resultado.respuesta == 'exitoso') {
          Swal.fire(
            'Login Correcto',
            'Bienvenid@ ' + resultado.usuario + '!!',
            'success'
          )
         
        } else {
          Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Usuario o password Incorrectos!'

          })

        }

      }

    })


  });



});