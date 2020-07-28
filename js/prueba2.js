(function () {
    
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

    
function myFunc(cadena){

   

    }; //myFunc


  

       

    

})();