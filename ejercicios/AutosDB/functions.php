<?php
/*
  Funciones de recogida de datos - Recogida de un dato
  http://www.mclibre.org/consultar/php/lecciones/php_recogida_datos.html#Funciones
*/

// FUNCIÓN DE RECOGIDA DE UN DATO
function recoge($var) 
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}

?>
