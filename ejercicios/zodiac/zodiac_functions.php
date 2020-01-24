<?php
/**
 * ZODIAC SIGNS - zodiac_functions.php
 *
 * IES Virgen del Carmen de Jaén
 * Desarrollo Web en Entorno Servidor 2º DAW
 *
 * Basado en el código de:
 * @author    Bartolomé Sintes Marco <bartolome.sintes+mclibre@gmail.com>
 * @copyright 2012 Bartolomé Sintes Marco
 * @license   http://www.gnu.org/licenses/agpl.txt AGPL 3 or later
 * @version   2012-11-27
 * @link      http://www.mclibre.org
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
define("MENU_PRINCIPAL", "menuPrincipal"); // Menú principal
define("MENU_VOLVER",    "menuVolver");    // Menú Volver a inicio

function cabecera($texto, $menu)
{
    print "<!DOCTYPE html>
<html lang='es'>
  <head>
    <meta charset='utf-8' />
    <title>Ejercicio Signos del Zodiaco en Inglés - $texto</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <link href=\"mclibre_php_soluciones_proyectos_comun.css\" rel=\"stylesheet\" type=\"text/css\" />
  </head>
<body>
<h1>Zodiac signs - $texto</h1>
<div id=\"menu\">
  <ul>\n";
    if ($menu == MENU_PRINCIPAL) {
           print "    <li><a href=\"crear_bd_zodiaco.php\">Crear BD zodiaco</a></li>
    <li><a href=\"crear_tabla_zodiacsigns.php\">Crear Tabla zodiacsigns</a></li>
    <li><a href=\"insertar_signos_zodiaco.php\">Insertar filas Tabla zodiacsigns</a></li>
    <li><a href=\"mostrar_tabla_zodiacsigns.php\">Ver Tabla zodiacsigns</a></li>
    <li><a href=\"drop_table.php\">Drop Table</a></li>
    <li><a href=\"drop_db.php\">Drop Database</a></li>
    <li><a href=\"logout.php\">Log Out</a></li>\n";
    } elseif ($menu == MENU_VOLVER) {
        print "    <li><a href=\"zodiac.php\">Página inicial</a></li>\n";
    } else {
        print "    <li>Error en la selección de menú</li>\n";
    }
    print "  </ul>
</div>

<div id=\"contenido\">\n";
}

/*
   $fecha de última modificación de la página que realiza la llamada
   aaaa-mm-dd
*/
function pie()
{
$fecha = "2020-01-12";
print "</div>\n";
  $cadenaFecha = formatearFecha($fecha);
  echo <<< FINPIE
    <footer>
      <p class="ultmod">
        Última modificación de esta página:
        <time datetime="$fecha">$cadenaFecha</time> (Antonio Rodríguez González)</p>

      <p class="licencia">
        Este programa utiliza código del curso "Páginas web con PHP" disponible en <a
        href="http://www.mclibre.org/consultar/php/">http://www.mclibre.org/consultar/php/</a><br />
        cuyo autor es Bartolomé Sintes Marco<br />
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

function hash_password($pass){
  /*se crea el hash con password_hash() y se compara a través de  la función password_verify*/
  $hash = password_hash("php123",PASSWORD_BCRYPT);
  return password_verify($pass,$hash);
}
/*Función que comprueba la conexión, es decir si tras hacer login sigue conectado o no*/
function connected(){
  if (!isset($_SESSION['connected'])){
      session_name("zodiac");
      session_start();
      $_SESSION = array();
      session_destroy();
      header("Location:index.php");
      return false;
  } else {
    return true;
  }
}
?>
