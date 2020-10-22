$(document).ready(function() {
   $('#guardar-registro').on('submit', function(e) {
        e.preventDefault();//evita que se abra el archivo del action( osea el insertar-admin.php ahora modelo-admin) del form que esta en crear-admin.php
        //console.log('Click');

        var datos = $(this).serializeArray();//Recupera los datos en los campos de #crear-admin

        console.log(datos);
          //es ajax en jquery
        $.ajax({
            type: $(this).attr('method'), //this se refiere a #crear-admin
            data: datos,
            url: $(this).attr('action'), //se mandan los datos de acuerdo al action del form de crear-admin osea a insert-admin.php (modelo-admin.php)
            dataType: 'json',
            success: function(data) {
                console.log(data);
                var resultado = data;
                if (resultado.respuesta == 'exito') {
                    Swal.fire(
                        'Correcto',
                        'Se guardó correctamente',
                        'success'
                      )
                } if (resultado.respuesta == 'error') {
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Hubo un error!'
                        
                      })
                    
                }
            }

        })

    });

   
    
    
    //se ejecuta cuando hay un archivo a subir 

    $('#guardar-registro-archivo').on('submit', function(e) {
        e.preventDefault();//evita que se abra el archivo del action( osea el insertar-admin.php ahora modelo-admin) del form que esta en crear-admin.php
        //console.log('Click');

       // var datos = new FormData(this);//Recupera los datos en los campos de #crear-admin
        var datos = new FormData(document.getElementById("guardar-registro-archivo"));

        //console.log(datos);
          //es ajax en jquery
        $.ajax({
            type: $(this).attr('method'), //this se refiere a #crear-admin
            data: datos,
            url: $(this).attr('action'), //se mandan los datos de acuerdo al action del form de crear-admin osea a insert-admin.php (modelo-admin.php)
            dataType: 'json',
            contentType: false,//se añaden estas 4 propiedades cuando se suben archivos
            processData: false,
            async: true,
            cache: false,
            success: function(data) {
                console.log(data);
                var resultado = data;
                if (resultado.respuesta == 'exito') {
                    Swal.fire(
                        'Correcto',
                        'Se guardó correctamente',
                        'success'
                      )
                } if (resultado.respuesta == 'error') {
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Hubo un error!'
                        
                      })
                    
                }
            }

        })




    });



    //Eliminar un registro

    $('.borrar_registro').on('click', function(e) {
        e.preventDefault();

        var id = $(this).attr('data-id');
        var tipo = $(this).attr('data-tipo');
        console.log("ID: " + id);

        Swal.fire({
            
            title: '¿Estás seguro?',
            text: "Si eliminas el registro no se puede recuperar !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar !',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.value) {
                
                $.ajax({
                    type:'post',
                    data: {
                        'id' : id,
                        'registro' : 'eliminar'
                    },
                    url: 'modelo-'+tipo+'.php',
                    success:function(data) {
                        //console.log(data);
                        var resultado = JSON.parse(data);
                        //console.log(resultado);
                        if (resultado.respuesta == 'exito') {
                            Swal.fire(
                                'Eliminado!',
                                'Registro Eliminado.',
                                'success'
                              )
                        //con esta linea lo borra del DOM sin tener que recargar la página
                        jQuery('[data-id="'+ resultado.id_eliminado +'"]').parents('tr').remove();
                        
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: 'No se pudo Eliminar!'
                                
                              })
                        }

                        
        
                    }
        
                })

             
            }
          })

         });



   

});

