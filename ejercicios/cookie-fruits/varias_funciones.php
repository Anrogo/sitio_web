<?php
/**
 * Funciones incluidas en este fichero:
 * function recoge($var)
 * function cabecera($titulo, $estilo, $tituloCSS, $textoh1)
 * function pie($fecha)
 * Referencia: Lecciones de PHP
 * Autor: Bartolomé Sintes Marco
 * Web: http://www.mclibre.org/consultar/php
 */ 



/*
  FUNCIÓN DE RECOGIDA DE UN DATO 
  Funciones de recogida de datos - Recogida de un dato
  http://www.mclibre.org/consultar/php/lecciones/php_recogida_datos.html#Funciones
*/

function recoge($var)
{
    $tmp = (isset($_REQUEST[$var]))
        ? htmlspecialchars(trim(strip_tags($_REQUEST[$var])), ENT_QUOTES, "UTF-8")
        : "";
    return $tmp;
}

/*
   $titulo de la página etiqueta <title> en <head>
   $estilo nombre de la hoja de estilo, fichero css
   $tituloCSS nombre del estilo css
   $textoh1 texto a incluir dentro de la etiqueta <h1> al comienzo de la página
*/

function cabecera($titulo, $estilo, $tituloCSS, $textoh1)
{
    print "<!DOCTYPE html>
<html>
<head>
  <meta charset=\"utf-8\" />
  <title>$titulo</title>
  <link href=\"$estilo\" rel=\"stylesheet\" type=\"text/css\" title=\"$tituloCSS\" />
</head>

<body>
<h1>$textoh1</h1>\n";
}

/*
   $fecha de última modificación de la página que realiza la llamada
*/

function pie($fecha)
{
  print "<address>Este ejemplo utiliza código PHP del curso \"Páginas web con PHP\" disponible en <a
  href=\"http://www.mclibre.org/\">http://www.mclibre.org</a><br />
  Autor: Antonio Rodríguez González<br />
  Última modificación de esta página: $fecha
</address>
<p class=\"licencia\">El programa PHP que genera esta página está bajo 
<a rel=\"license\" href=\"http://www.gnu.org/licenses/agpl.txt\">licencia AGPL 3 o
posterior</a>.</p>
<p>Autor iconos: <div>Iconos diseñados por <a href=\"https://www.flaticon.es/autores/smashicons\" title=\"Smashicons\">Smashicons</a> from <a href=\"https://www.flaticon.es/\" title=\"Flaticon\">www.flaticon.es</a></div>
</p>
</body>
</html>";
}
?>
