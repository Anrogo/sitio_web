<?php
/**
 * ZODIAC SIGNS - drop_db.php
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

connected();

$dbname = $_SESSION['dbname'];

//Confirmamos la existencia de la base de datos utilizando una variable de sesión, si ésta existe es que se ha borrado
if(!isset($_SESSION['drop_table'])){

require_once "connect_pdo.php";//tiene que pasar por aquí y conectar con la BD si existe

cabecera("Drop Table", MENU_VOLVER);

//echo "Complete el código para Borrar la <strong>Tabla <em>zodiacsigns</em></strong>";
/*  
   Complete el código  
*/
//Para evitar que muestre una excepción por error (en el caso de que la tabla exista y se duplique la primary key):
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT); 

$borrar = "DROP TABLE zodiacsigns;";

if($pdo->query($borrar)){
    echo "<p class=\"mensaje_g\">SE HA BORRADO LA TABLA zodiacsigns.</p>\n";
    $_SESSION['drop_table']="confirm";//variable de sesión que permite saber en el resto de pag que la tabla no existe ya
} else {
    echo "<p class=\"mensaje_r\">NO SE HA PODIDO BORRAR LA TABLA zodiacsigns.</p>\n";
}

pie();

} else {
    cabecera("Drop Table", MENU_VOLVER);
    echo "<p class=\"mensaje_r\"> No ha sido posible borrar la tabla <strong>zodiacsigns</strong> en BBDD</p>\n";
    pie();
    header("Location:zodiac.php");
}
ob_end_flush();
?>
