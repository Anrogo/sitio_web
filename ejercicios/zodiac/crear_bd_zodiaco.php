<?php
/**
 * ZODIAC SIGNS - crear_bd_zodiaco.php
 *
 * IES Virgen del Carmen de Jaén
 * Desarrollo Web en Entorno Servidor 2º DAW
 *
 * Basado en el código de:
 *
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
ob_start();

session_name("zodiac");
session_start();

require_once "zodiac_functions.php";

connected();//se comprueba que está conectado

cabecera("Crear BD zodiaco", MENU_VOLVER);

//echo "Complete el código para crear la <strong>base de datos <em>zodiaco</em></strong>";
/*  
   Complete el código  
*/

$pdo = new PDO("mysql:host=localhost", "id12020994_admin", "123456");////conectar con MySQL SIN SELECCIONAR LA BBDD

$dbname = "zodiac";

$consulta="CREATE DATABASE IF NOT EXISTS id12020994_zodiac;";  // Se forma la consulta para crear la BBDD
  
    try {
      if ($pdo->query($consulta)) {  // Se ejecuta la consulta
        echo "<p class=\"mensaje_g\"> Base de datos creada: $dbname</p>\n";
        unset($_SESSION['drop_table']);
        unset($_SESSION['deleted']);
      } else {
          echo "<p class=\"mensaje_r\"> No ha sido posible crear la base de datos: $dbname</p>\n";
        }
      $pdo = null;  // cerrar la conexión
      print "<p>... y se cierra la conexi&oacute;n<p>";
    } catch (PDOException $e) {  // Si hubiera errores de conexión, se captura un objeto de tipo PDOException
        print "<p class=\"mensaje_r\">Error: NO SE PUDO CONECTAR AL SERVIDOR MySQL.</p>\n";
        print "<p class=\"mensaje_r\">Error: " . $e->getMessage() . "</p>\n";  // mensaje de excepción
        exit();
      }

pie();

ob_end_flush();
?>
