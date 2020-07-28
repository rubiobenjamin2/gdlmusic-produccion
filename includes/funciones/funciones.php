<?php
//enviamos valores a la funcion por "referencia &"
function productos_json(&$boletos, &$camisas = 0, &$etiquetas = 0){
    $dias = array(0 => 'un_dia', 1 => 'pase_completo', 2 => 'pase_2dias');

      unset($boletos['un_dia']['precio']);//elimina el valor de una variable o de una posicion en un arreglo en este caso precio
      unset($boletos['completo']['precio']);
      unset($boletos['2dias']['precio']);
    
      $total_boletos = array_combine($dias, $boletos); //combina el array de dias con el array de boletos
   
    
    
    $camisas = (int) $camisas;
    if($camisas > 0):
    
      $total_boletos['camisas']= $camisas;
    
    endif;
    
    if($etiquetas > 0):
    
      $total_boletos['etiquetas']= $etiquetas;
    
    endif;
    
    return json_encode($total_boletos);
    
   /* echo "<pre>";
     var_dump($total_boletos);
    echo "</pre>";*/
    
}

function eventos_json(&$eventos){
    $eventos_jason = array();
    foreach($eventos as $evento):
      $eventos_jason['eventos'][]= $evento;
    endforeach;
    
    return json_encode($eventos_jason);
    
}



?>