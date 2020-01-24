<?php
/**
 * ZODIAC SIGNS - zodiac.php
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

cabecera("Inicio", MENU_PRINCIPAL);

//echo "<h2>No se deben mostrar estas páginas sin hacer <em>log in</em></h2>";

if (!isset($_SESSION['connected'])) {

  if(isset($_POST['user']) && isset($_POST['pass'])){ 

    if(($_POST['user']==="user") && (hash_password($_POST['pass'])===true)){
      echo "<p class=\"mensaje_g\">Logueado con éxito</p>";
      $_SESSION['connected'] = "true";
  
    } else {
      $_SESSION['error']='Incorrect Password';
      header("Location: index.php");
    }

  } else { 
    $_SESSION['error']='User and password are required';
    header("Location: index.php");
  }

} else {
  echo "<p class=\"mensaje_g\">Sigue logueado</p>";

}

pie();

ob_end_flush();
?>
