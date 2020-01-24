<?php
/**
 * ZODIAC SIGNS - mostrar_tabla_zodiacsigns.php
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

//Confirmamos la existencia de la base de datos utilizando una variable de sesión, si ésta existe es que se ha borrado
//Y continua el proceso con normalidad
if(!isset($_SESSION['deleted']) && !isset($_SESSION['drop_table'])){
    
require_once "connect_pdo.php";//tiene que pasar por aquí y conectar con la BD si existe

$dbname = $_SESSION['dbname'];

cabecera("Ver Tabla zodiacsigns", MENU_VOLVER);

//echo "Complete el código para mostrar la <strong>tabla <em>zodiacsigns</em></strong>";
/*  
   Complete el código  
*/
//Para evitar que muestre una excepción por error (en el caso de que la tabla exista y se duplique la primary key):
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT); 

$consulta = "SELECT id,sign,symbol,planet,element,start_month,start_day,end_month,end_day FROM zodiacsigns;";

$stmt = $pdo->query($consulta);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if($pdo->query($consulta)){

    /*
    id
    sign
    symbol
    planet CHAR(7),
    element CHAR(5),
    start_month TINYINT,
    start_day TINYINT,
    end_month TINYINT,
    end_day TINYINT,
    */

    echo "<table>";
    //cabecera
    echo("<tr><th>ID</th>");
    echo("<th>SIGNO</th>");
    echo("<th>SIMBOLO</th>");
    echo("<th>PLANETA</th>");
    echo("<th>ELEMENTO</th>");
    echo("<th>MES QUE EMPIEZA</th>");
    echo("<th>DÍA COMIENZO</th>");
    echo("<th>MES QUE FINALIZA</th>");
    echo("<th>ÚLTIMO DÍA</th></tr>");

    //todos el resto de registros:
    foreach($rows as $row){
        echo "<tr><td>";
        echo(utf8_encode($row['id']));
        echo("</td><td>");
        echo(utf8_encode($row['sign']));
        echo("</td><td>");
        echo(utf8_encode($row['symbol']));
        echo("</td><td>");
        echo(utf8_encode($row['planet']));
        echo("</td><td>");
        echo(utf8_encode($row['element']));
        echo("</td><td>");
        echo(utf8_encode($row['start_month']));
        echo("</td><td>");
        echo(utf8_encode($row['start_day']));
        echo("</td><td>");
        echo(utf8_encode($row['end_month']));
        echo("</td><td>");
        echo(utf8_encode($row['end_day']));
        echo("</td></tr>");
    }

    echo "</table>";

} else {
    echo "<p class=\"mensaje_r\">ERROR AL MOSTRAR LOS VALORES DE LA TABLA zodiacsigns.</p>\n";
}

pie();

} elseif(isset($_SESSION['deleted']) || isset($_SESSION['drop_table'])) {
        cabecera("Ver Tabla zodiacsigns", MENU_VOLVER);
        echo "<p class=\"mensaje_r\"> No ha sido posible mostrar la tabla <strong>zodiacsigns</strong> en BBDD</p>\n";
        pie();
}
ob_end_flush();
?>
