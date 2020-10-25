$(document).ready(function () {
   
    $('#download-form').on('submit', function (e) {
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
                    
                    var ruta = document.querySelector("#nombre_partitura").value;
                    console.log("ruta:" + ruta);
                    var link = document.createElement("a");
                    link.setAttribute("href", "pdf/" + ruta);
                    link.setAttribute("download", "");
                    link.click();

                    Swal.fire({
                        title: '... descargando PDF',
                        confirmButtonColor: '#fe4918'
                    })
                } if (resultado.respuesta == 'exceso') {
                    Swal.fire({
                       // type: 'error',
                        title: '¡ Llegaste al límite de descargas por día !',
                        confirmButtonColor: '#fe4918'

                    })

                }
            }

        })

    });
   




});