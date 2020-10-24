$(document).ready(function () {
   
    $('#guardar-registro').on('submit', function (e) {
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
            success: function (data) {
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
   




});