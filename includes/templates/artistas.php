 <?php
            
           try{
               require_once('includes/funciones/bd_conexion.php');
             
               
              $sql = "SELECT * FROM artistas";
               
               
               
               
               $resultado=$conn->query($sql);
               
               
           }catch(Exception $e){
               echo $e->getMessage();
                   
           }
           
           ?>
           
           
              
               
        <section class="invitados contenedor seccion">
          <h2>Partituras de tus Artistas Favoritos</h2>
          <ul class="lista-invitados clearfix" >
               
              <?php while($artistas=$resultado->fetch_assoc()){?>
                  <!-- <pre>
                   <?php //echo var_dump($invitados); ?>
                  </pre> -->
                 
              <li>
                  <div class="invitado">
                      <a class="invitado-info" href="#invitado<?php echo $artistas['id_artista']; ?>">
                      <img src="img/artistas/<?php echo $artistas['url_img'] ?>" alt="imagen invitado">
                      <input type="hidden" name="nombre_partitura" id="nombre_partitura" value="<?php echo $artistas['url_pdf'] ?>">
                      <p><?php echo $artistas['nombre_artista']; ?></p>
                      </a>

<div style="display:none;" >
                         <div id="app" class="invitado">
      <div role="toolbar" id="toolbar">
        <div id="pager">
          <button data-pager="prev">prev</button>
          <button data-pager="next">next</button>
        </div>
        <div id="page-mode">
          <label>Page Mode <input type="number" value="1" min="1"/></label>
        </div>
      </div>
      <div  id="viewport-container"><div role="main" id="viewport"></div></div>
    </div> 
                        </div>



                    </div>
                            
                    
                </li>
              
              <div style="display:none;" class="invitado">
                  <div class="invitado-info" id="invitado<?php echo $artistas['id_artista']; ?>">
                        <h2 ><?php echo $artistas['nombre_artista'] ?></h2>
                        <!-- <img src="img/invitados/<?php// echo $invitados['url_imagen'] ?>" alt="imagen invitado">-->
                         <!-- <object data="pdf/<?php //echo $artistas['url_pdf'] ?>" type="application/pdf" width="595px" height="842px">   -->
                        <!-- <embed src="pdf/<?php echo $artistas['url_pdf'] ?>" type="application/pdf" width="425px" height="601px">  -->
                         
                                 <div id="app" class="invitado">
      <div role="toolbar" id="toolbar">
        <div id="pager">
          <button data-pager="prev">prev</button>
          <button data-pager="next">next</button>
        </div>
        <div id="page-mode">
          <label>Page Mode <input type="number" value="1" min="1"/></label>
        </div>
      </div>
      <div id="viewport-container"><div  role="main" id="viewport"></div></div>
    </div> 
                    
                         <!-- </object>   -->
                        <p><?php //echo $invitados['descripcion']; ?></p>
                  </div>
              </div>
              

                
             <?php  } //while?> 
                
          </ul>
          <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>     -->
<!-- <script src="js/prueba.js"></script>  -->
          
  <script src="https://unpkg.com/pdfjs-dist@2.0.489/build/pdf.min.js"></script>
    <script src="js/prueba4.js"></script> 
      <!-- <script src="js/prueba.js"></script>  -->
     <script>
        console.log("hola hola");


 var items = document.querySelectorAll(".lista-invitados li #nombre_partitura"),
        items2 = document.querySelectorAll(".lista-invitados li"),
        tab = [], index;
    var tab2 = [];

    // add values to the array
    for (var i = 0; i < items.length; i++) {
        //console.log(tab.push(items[i].innerHTML));
        console.log(items[i].value);
        console.log(tab2.push(items2[i].innerHTML));

    }
console.log("Segundo for");
var cadena;


    
    for (var j = 0; j < items2.length; j++) {
items2[j].onclick = function () {
 index = $(this).index();
            console.log(index / 2); // el colorBox al parecer crea dobles li x eso el index se duplica. y para aaceder alos valor lo divido entre 2
            console.log(items[index / 2].value + " Index = " + index);
            cadena = items[index / 2].value;
            console.log(cadena);

           initPDFViewer("pdf/" + cadena);

               
                


}; //Cierre de la función onclick items2
    } //cierre del segundo for
        
      //initPDFViewer("pdf/"+cadena);
    </script> 

    
 
      </section><!--seccion invitados-->
               
               
               

              
         
           
           
           
           <?php
           $conn->close();
           ?>