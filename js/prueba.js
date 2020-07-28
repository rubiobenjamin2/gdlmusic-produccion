(function() {
'use strict'
//console.log("hola");
//console.log(document.querySelector('td+td').innerText);
    //console.log(document.getElementsByClassName('nom_partitura').innerText);
    //document.getElementById('my_pdf_viewer').innerText = document.querySelector('td+td').innerText;
    //console.log(document.querySelectorAll('td+td'));
    console.log("hola hola");
   // console.log(document.getElementById('nombre_partitura').value);

   /* $('.invitado-info').on('click', function () {
        console.log($('.invitado-info #partitu').data);
    
    });

    let celdasNombre = document.querySelectorAll('.lista-invitados li #nombre_partitura'); //segundo td
    var arr = [];
    let j = 0;
    for (let i = 0; i < celdasNombre.length; i++) {  // recorre la tabal en la celda especifica

        console.log(celdasNombre[i].value);
       // arr[j] = celdasNombre[i].firstChild.nodeValue;
        //j++;
        //i = i + 2; //celda especifica. La segunda
    }
*/

    var items = document.querySelectorAll(".lista-invitados li #nombre_partitura"),
        items2 = document.querySelectorAll(".lista-invitados li"),
        tab = [], index;
    var tab2 = [];

    // add values to the array
    /*for (var i = 0; i < items.length; i++) {
        //console.log(tab.push(items[i].innerHTML));
        console.log(items[i].value);
        console.log(tab2.push(items2[i].innerHTML));

    }*/
console.log("Segundo for");
    // get selected element index

    var cadena;
    
    for (var j = 0; j < items2.length; j++) {
        //console.log(items[j].value);

        //console.log(items2[j].innerHTML);
        /*console.log(items[j].value);
console.log(tab2[j]);*/

        items2[j].onclick = function () {

            //console.log(this.innerHTML);
           /* index = tab2.indexOf(this.innerHTML);
            console.log(index);*/
            // console.log(items[index].value + " Index = " + index);
            index = $(this).index();
            console.log(index / 2); // el colorBox al parecer crea dobles li x eso el index se duplica. y para aaceder alos valor lo divido entre 2
            console.log(items[index / 2].value + " Index = " + index);
            cadena = items[index / 2].value;
            console.log(cadena);

            initPDFViewer("pdf/"+cadena);

            


        }; //Cierre de la función onclick items2
    } //cierre del segundo for

    /*let celdasNombre = document.querySelectorAll('td+td'); //segundo td
    var arr = [];
    let j =0;
    for(let i = 0; i < celdasNombre.length; i++ ) {  // recorre la tabal en la celda especifica
        
        console.log(celdasNombre[i].firstChild.nodeValue);
        arr[j] = celdasNombre[i].firstChild.nodeValue;
        j++;
        i = i + 2; //celda especifica. La segunda
    }
    let celdasNombre2 = document.querySelectorAll('td'); //primer td
     let valor = 0;
    for (let i = 0; i < celdasNombre2.length; i++) {

        var myState = {
            pdf: null,
            currentPage: 1,
            zoom: 1.8
        }

        celdasNombre2[i].firstChild.data = arr[valor]; //asignamos valor a la celda especifica osea la primera de cada renglon
        
        pdfjsLib.getDocument('pdf/' + arr[valor]).then((pdf) => {

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

            });
        }
        

       ++valor;
        i = i + 3; //celda especifica. La primera
    }*/

    



})();

