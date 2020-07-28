<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Javascript: obtener el índice del LI seleccionado</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link rel="stylesheet" href="css/estilos4.css"> 
        
                 <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
         <ul id="list">
            <li>JS <a></a> <img>
            <input type="hidden" name="nombre_partitura" id="nombre_partitura" value="Amigos no por favor_gm.pdf" > </li>
            <li>PHP<a></a> <img>
            <input type="hidden" name="nombre_partitura" id="nombre_partitura" value="Amor a primera vista_gm.pdf"></li>
            <li>Java<a></a> <img>
            <input type="hidden" name="nombre_partitura" id="nombre_partitura" value="Perfect_gm.pdf"></li>
            <li>C#<a></a> <img>
            <input type="hidden" name="nombre_partitura" id="nombre_partitura" value="Colour my world_gm.pdf"></li>
            <li>c++<a></a> <img>
            <input type="hidden" name="nombre_partitura" id="nombre_partitura" value="Even So_gm.pdf"></li>
            <li>HTML<a></a><img>
            <input type="hidden" name="nombre_partitura" id="nombre_partitura" value="Just the two of us_gm.pdf"></li>
            <li>CSS<a></a> <img>
            <input type="hidden" name="nombre_partitura" id="nombre_partitura" value="When i was your man_gm.pdf"></li>
            <li>CSS<a></a> <img>
            <input type="hidden" name="nombre_partitura" id="nombre_partitura" value="Cantaloupe Island_gm.pdf"></li>
            <li>CSS<a></a> <img>
            <input type="hidden" name="nombre_partitura" id="nombre_partitura" value="Invenciones Bach_gm.pdf"></li>
               
            <div id="app">
      <div role="toolbar" id="toolbar">
        <div id="pager">
          <button data-pager="prev">prev</button>
          <button data-pager="next">next</button>
        </div>
        <div id="page-mode">
          <label>Page Mode <input type="number" value="1" min="1"/></label>
        </div>
      </div>
      <div id="viewport-container"><div role="main" id="viewport"></div></div>
    </div>
    
        
</ul>

     <script src="https://unpkg.com/pdfjs-dist@2.0.489/build/pdf.min.js"></script>
    <script src="js/prueba4.js"></script>
    <script>
console.log("hola");

var items = document.querySelectorAll("#list li #nombre_partitura "),
    items2 = document.querySelectorAll("#list li"),
    tab = [], index;
var tab2 = [];

// add values to the array
for(var i = 0; i < items.length; i++){
  console.log(tab.push(items[i].innerHTML));
  console.log(items[i].value);
  console.log(tab2.push(items2[i].innerHTML));
   
 }
console.log("Segundo for");
// get selected element index
var cadena;
for (var j = 0; j < items2.length; j++) {
    //console.log(items[j].value);

    // console.log(items2[j].innerHTML);
    //console.log(items[j].value);
    console.log(j);

    items2[j].onclick = function () {


        //index = tab2.indexOf(this.innerHTML);
        indice = $(this).index();
        console.log(this.innerText);
        console.log(indice);



        console.log(items[indice].value/*this.innerHTML*/ + " Index = " + indice);
        cadena = items[indice].value; 
        
           initPDFViewer("pdf/" + cadena);


       // myFunc(items[indice].value);
        //return false;

    }; //funcion onclick
    

    console.log(j);
} // for

      //initPDFViewer("pdf/" + cadena);
    </script>
        
        
        
        
    </body>
</html>