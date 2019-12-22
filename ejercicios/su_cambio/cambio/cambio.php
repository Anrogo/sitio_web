<?php
/*
  Funciones de recogida de datos - Recogida de un dato
  http://www.mclibre.org/consultar/php/lecciones/php_recogida_datos.html#Funciones
*/

// FUNCIÓN DE RECOGIDA DE UN DATO

/*La función extrae del string que contiene todas las letras la posición 
 * correspondiente al resto del número de dni/23, con el último 1, indicamos 
 * las posiciones que debe coger a partir de ese índice (En este caso 1 letra)*/
 
 
/*http://php.net/manual/es/function.substr.php*/

/*Lo que debe es $d, el dinero adeudado, y lo que ha abonado está en el $array en forma de billetes de 100 y 200*/
/*$array: 1º los de 100 y 2º los de 200*/
function su_cambio($d) {

  $sobra = ($bill_200 *200 + $bill_100*100) - $dinero; 

  if($sobra>200){
    $bill_200 = intval($sobra / 200);
    $sobra = $sobra - $bill_200 * 200; 
  }

  if($sobra>=100){
    $bill_100 = 1;
  } else $bill_100 = 0;

  //devuelve en el mismo array los billetes de 100 y 200 que habrá que dar de cambio en el caso de que haga falta
  return $bill_200;
} 
?>
