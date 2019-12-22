<?php 
/**
 * IAW - 2ºASIR - IES Virgen del Carmen de Jaén
 *
 * Ejercicio basado en: Cookies 1 - cookies_1a.php
 * 
 * @author    Antonio Rodríguez González
 * @copyright 2019 Antonio Rodríguez González
 * @license   http://www.gnu.org/licenses/agpl.txt AGPL 3 or later
 * @version   2019 - 12 - 22
 * @link      http://www.mclibre.org
 */

 // Para usar las funciones recoge, cabecera y pie 
require 'varias_funciones.php';

 // function cabecera($titulo, $estilo, $tituloCSS, $textoh1)
cabecera("Ejemplo de uso de Cookies - Elegir la fruta",
"frutas.css", "Estilo básico", "Ejemplo de uso de Cookies (Elegir fruta)");
/*
?>

    <form action="mostrar_fruit.php" method="get">
        <p>Indique su fruta preferida:<br>
            <label><input type="radio" name="fruta" value="cerezas"> Cerezas</label><br>
            <label><input type="radio" name="fruta" value="fresa"> Fresa</label><br>
            <label><input type="radio" name="fruta" value="limon"> Limón</label><br>
            <label><input type="radio" name="fruta" value="manzana"> Manzana</label><br>
            <label><input type="radio" name="fruta" value="naranja"> Naranja</label><br>
            <label><input type="radio" name="fruta" value="pera"> Pera</label>
        </p>

        <p>
            <input type="submit" value="Enviar">
            <input type="reset" value="Borrar">
        </p>
    </form>

<?php 
*/
$fruta = recoge('fruta');

    // Si se establece un fruta se crea la cookie fruit con el valor correspondiente $fruta
    if (($fruta=='cerezas') || ($fruta=='fresa') || ($fruta=='limon') || ($fruta=='manzana') || ($fruta=='naranja') || ($fruta=='pera') ) {
        setcookie('fruit', $fruta,  time() + 3600 * 24 * 60 *60);
    // Si se elige fruta ninguno se borra la cookie fruit
    } elseif ($fruta=='none') {
        setcookie ("fruit", "", time() - 3600);
    // Si no se elige fruta se comprueba si ya existe la cookie fruit y se guarda en $fruta
    } elseif (isset($_COOKIE['fruit'])) {
        $fruta = $_COOKIE['fruit'];
    }

    // Mostrar mensaje respecto al valor de $fruta
    if ($fruta=='') {
        print "<p id='mensaje' >No se ha seleccionado ningún fruta.</p>\n";
    } else { 
        print "<p>Ha elegido el fruta: $fruta.</p>\n";
    }

//Cambiar de fruta
print "<p>Indique su fruta favorita: 
  <a href=\"$_SERVER[PHP_SELF]?fruta=cerezas\"><img src=\"images/cerezas.png\" alt=\"Cerezas\" title=\"Cerezas\" /></a>
  <a href=\"$_SERVER[PHP_SELF]?fruta=fresa\"><img src=\"images/fresa.png\" alt=\"Fresa\" title=\"Fresa\" /></a>
  <a href=\"$_SERVER[PHP_SELF]?fruta=limon\"><img src=\"images/limon.png\" alt=\"Limon\" title=\"Limon\" /></a>
  <a href=\"$_SERVER[PHP_SELF]?fruta=manzana\"><img src=\"images/manzana.png\" alt=\"Manzana\" title=\"Manzana\" /></a>
  <a href=\"$_SERVER[PHP_SELF]?fruta=naranja\"><img src=\"images/naranja.png\" alt=\"Naranja\" title=\"Naranja\" /></a>
  <a href=\"$_SERVER[PHP_SELF]?fruta=pera\"><img src=\"images/pera.png\" alt=\"Pera\" title=\"Pera\" /></a>
  <a href=\"$_SERVER[PHP_SELF]?fruta=none\">Ninguno / None / Aucun<img src=\"images/none_50px.png\" alt=\"Ninguno\" title=\"Ninguno\" /></a>(se borra la cookie fruit)</p>";
print "<p><a href=\"mostrar_fruit.php\">Observe su fruta elegida en otra página</a></p>";

// function pie($fecha)
pie("22 de diciembre de 2019");
?>