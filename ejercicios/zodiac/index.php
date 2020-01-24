<?php
/**
 * ZODIAC SIGNS - index.php (log in)
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
ob_start();//output buffering activado para evitar el fallo típico de "headers already sent"

session_name("zodiac");
session_start();

require_once "zodiac_functions.php";

cabecera("Log In", MENU_VOLVER);


if(isset($_SESSION['error'])){
    echo('<p class="mensaje_r">'.htmlentities($_SESSION['error'])."</p>\n");
    unset($_SESSION['error']);
}
?>

    <form method="POST" action="zodiac.php">
        <label for="user">User</label>
        <input type="text" name="user" id="user"><br/>
        <label for="pass">Password</label>
        <input type="password" name="pass" id="pass"><br/>
        <input type="submit" value="Log In">
        <input type="submit" name="cancel" value="Cancel">
    </form>
    
<?php
pie("2019-12-30");

ob_end_flush();
?>

