<?php
/*
   $fecha de última modificación de la página que realiza la llamada
   aaaa-mm-dd
*/
function pie($fecha)
{
  $cadenaFecha = formatearFecha($fecha);
  echo <<< FINPIE
    <footer>
      <p class="ultmod">
        Última modificación de esta página:
        <time datetime="$fecha">$cadenaFecha</time></p>

      <p class="licencia">
        Este programa forma parte del curso <a href="http://www.mclibre.org/consultar/php/">
        Programación web en PHP</a> por <a href="http://www.mclibre.org/">Antonio Rodríguez González</a>.<br />
        El programa PHP que genera esta página está bajo
        <a rel="license" href="http://www.gnu.org/licenses/agpl.txt">licencia AGPL 3 o posterior</a>.</p>
    </footer>
  </body>
</html>
FINPIE;
}
/*
   $fecha en formato "aaaa-mm-dd" se pasa a "dd de mes de aaaa"

   Configuración de idioma, para que el mes salga en español
   http://php.net/manual/es/function.setlocale.php

   strftime — Formatea una fecha/hora local según una configuración local
   http://php.net/manual/es/function.strftime.php

   strtotime — Convierte una descripción de fecha/hora textual en Inglés a una fecha Unix
   http://php.net/manual/es/function.strtotime.php
*/

function formatearFecha($fecha)
{
  define('formatoFecha','%d de %B de %Y'); 
  setlocale(LC_ALL,'es_ES.UTF-8');
  return strftime(formatoFecha, strtotime($fecha));
}
?>

