<?php 
/**
 * IAW - 2ºASIR - IES Virgen del Carmen de Jaén
 *
 * Ejercicio basado en: Cookies 1 - cookies_1b.php
 * 
 * @author    Antonio Rodríguez González
 * @copyright 2019 Antonio Rodríguez González
 * @license   http://www.gnu.org/licenses/agpl.txt AGPL 3 or later
 * @version   2019 - 12 - 22
 * @link      http://www.mclibre.org
 */

// Para usar las funciones cabecera y pie 
require 'varias_funciones.php';

// Comprobar valor de la cookie fruit
// Si está definida la cookie fruit se guarda su valor en $fruta
// si no está definida la coookie fruit se guarda la cadena vacía en $fruta
if (isset($_COOKIE['fruit']))
  $fruta = $_COOKIE['fruit'];
else
  $fruta = '';

// El if else anterior se puede hacer en una sola línea con el operador condicional  
// $fruta = isset($_COOKIE['fruit'])?$_COOKIE['fruit']:'';

// function cabecera($titulo, $estilo, $tituloCSS, $textoh1)
cabecera("Ejemplo de uso de Cookies - Mostrar la fruta elegida",
		 "frutas.css", "Estilo básico", "Comprobando la cookie (Elegir fruta)");
		 
// Texto del mensaje según el fruta seleccionado
// $alt para el atributo alt y title de la imagen de cada bandera
$texto = "Su fruta favorita es: ";

switch ($fruta) {
	case '':
		$texto=$texto."Ninguna.";
		$alt="Ninguna";
		break;
	case 'cerezas':
		$texto=$texto."cerezas.";
		$alt="Cerezas";
		break;
	case 'fresa':
		$texto=$texto."fresa.";
		$alt="fresa";
		break;
	case 'limon':
		$texto=$texto."limon.";
		$alt="limon";
		break;
	case 'manzana':
		$texto=$texto."manzana.";
		$alt="Manzana";
		break;
	case 'naranja':
		$texto=$texto."naranja.";
		$alt="Naranja";
		break;
	case 'pera':
		$texto=$texto."pera.";
		$alt="Pera";
		break;
	default:  //se pone solamente a modo de ejemplo 
		$texto="OjO: el switch no entraría por default nunca.";
}



// Si hay algún fruta elegido se muestra la bandera
if ($fruta!=''){
	print "<p id=\"mensaje\">$texto</p>\n";
	print "<p class=\"bandera\"><img src=\"images/".$fruta."2.png\" alt=\"".$alt."\" title=\"".$alt."\" /></p>\n";
} else 
	print "<p id='mensaje' >No se ha seleccionado ningún fruta.</p>\n";

print "<p><a href=\"elegir_fruit.php\">Volver a elegir fruta</a></p>\n";

// function pie($fecha)
pie("31 de enero de 2013");
?>