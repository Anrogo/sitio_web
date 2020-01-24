<?php
/**
 * ZODIAC SIGNS - crear_tabla_zodiacsigns.php
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
if(!isset($_SESSION['deleted'])){

  require_once "connect_pdo.php";//tiene que pasar por aquí y conectar con la BD si existe

  $dbname = $_SESSION['dbname'];

  cabecera("Crear Tabla zodiacsigns", MENU_VOLVER);

  //echo "Complete el código para crear la <strong>tabla <em>zodiacsigns</em></strong> en la base de datos zodiaco";
  /*  
    Complete el código  
  */
  /* Tabla zodiac de http://docstore.mik.ua/orelly/webprog/pcook/ch10_01.htm */

  define ("salto","\n<br>");

  //Para evitar que muestre una excepción por error (en el caso de que la tabla exista y se duplique la primary key):
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT); 

  $consulta="CREATE TABLE IF NOT EXISTS zodiacsigns (id INT UNSIGNED NOT NULL, sign CHAR(11), symbol CHAR(13),
    planet CHAR(7),
    element CHAR(5),
    start_month TINYINT,
    start_day TINYINT,
    end_month TINYINT,
    end_day TINYINT,
    PRIMARY KEY(id)
  );";

  if ($pdo->query($consulta)) {  // Se ejecuta la consulta
    echo "<p class=\"mensaje_g\"> Tabla <strong>zodiacsigns</strong> creada en BBDD $dbname</p>\n";
    echo "<b>- CONSULTA DE CREACI&Oacute;N DE LA TABLA zodiacsigns: </b><br />";
    echo $consulta.salto.salto;
    if(isset($_SESSION['drop_table'])){
      unset($_SESSION['drop_table']);//si volvemos a crear la tabla, esta variable de sesión deja de existir y permite volver a visualizarla
    }
  } else {
    echo "<p class=\"mensaje_r\"> No ha sido posible crear la tabla <strong>zodiacsigns</strong> en BBDD $dbname</p>\n";
  }

  pie();

} else {
  cabecera("Crear Tabla zodiacsigns", MENU_VOLVER);
  echo "<p class=\"mensaje_r\"> No ha sido posible crear la tabla <strong>zodiacsigns</strong> en BBDD</p>\n";
  pie();
  header("Location:zodiac.php");
}

ob_end_flush();
?>
