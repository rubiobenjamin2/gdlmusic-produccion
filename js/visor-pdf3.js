

var items = document.querySelector("#nombre_partitura");
var cadena;
cadena = items.value;
console.log(items);
console.log(cadena);

  var myState = {
        pdf: null,
        currentPage: 1,
        zoom: 1.8
    }
//var pdf_text = document.querySelector('td').innerText;

pdfjsLib.getDocument('pdf/' + cadena).then((pdf) => {
 
        myState.pdf = pdf;
        render();
     
    });

    function render() {
        myState.pdf.getPage(myState.currentPage).then((page) => {
     
            var canvas = document.getElementById("pdf_renderer");
            var ctx = canvas.getContext('2d');
 
            var viewport = page.getViewport(myState.zoom);
            
            canvas.width = viewport.width;
            canvas.height = viewport.height;

            page.render({
                canvasContext: ctx,
                viewport: viewport
            });
            console.log(myState.pdf._pdfInfo.numPages); //imprime numeo de páginas
        });
    }

    document.getElementById('go_previous')
        .addEventListener('click', (e) => {
            if(myState.pdf == null
               || myState.currentPage == 1) return;
            myState.currentPage -= 1;
            document.getElementById("current_page")
                    .value = myState.currentPage;
            render();
        });

        document.getElementById('go_next')
        .addEventListener('click', (e) => {
            if(myState.pdf == null
               || myState.currentPage > myState.pdf
                                               ._pdfInfo.numPages) 
               return;
         
            myState.currentPage += 1;
            document.getElementById("current_page")
                    .value = myState.currentPage;
            render();
        });

        document.getElementById('current_page')
        .addEventListener('keypress', (e) => {
            if(myState.pdf == null) return;
         
            // Get key code
            var code = (e.keyCode ? e.keyCode : e.which);
         
            // If key code matches that of the Enter key
            if(code == 13) {
                var desiredPage = 
                        document.getElementById('current_page')
                                .valueAsNumber;
                                 
                if(desiredPage >= 1 
                   && desiredPage <= myState.pdf
                                            ._pdfInfo.numPages) {
                        myState.currentPage = desiredPage;
                        document.getElementById("current_page")
                                .value = desiredPage;
                        render();
                }
            }
        });

        document.getElementById('zoom_in')
        .addEventListener('click', (e) => {
            if(myState.pdf == null) return;
            myState.zoom += 0.5;
            render();
        });

        document.getElementById('zoom_out')
        .addEventListener('click', (e) => {
            if(myState.pdf == null) return;
            myState.zoom -= 0.5;
            render();
        });
       
          // descarga
        document.getElementById('download')
        .addEventListener('click', (e) => {
            //console.log('hola');
           //var ancla = document.getElementById("milink");
           //ancla.href='pdf/Consulta de Adeudo Predial __ Municipio de Zapopan Jalisco.pdf' ;
           //$('.milink').href;
           //window.location.href='<a href="pdf/Consulta de Adeudo Predial __ Municipio de Zapopan Jalisco.pdf" id="milink" download></a>');
           //var ancla = document.getElementById('milink');
           //document.getElementById("my_pdf_viewer").innerHTML = ancla.href;

           var link = document.createElement("a");
           link.setAttribute("href","pdf/Consulta de Adeudo Predial __ Municipio de Zapopan Jalisco.pdf");
           link.setAttribute("download","");
           link.setAttribute("id","milink");
          //generamos el click al link dentro de la funcion 
           link.click();
           //document.getElementById('download').append(link);
           
           //document.getElementById('download').innerHTML='<a href="pdf/Consulta de Adeudo Predial __ Municipio de Zapopan Jalisco.pdf" id="milink" download>Download</a>';

           
           /*var ancla = document.getElementById("milink2");
           var var1 = ancla.getAttribute("href");*/

           //console.log(var1);
        }); 

       




 
    
