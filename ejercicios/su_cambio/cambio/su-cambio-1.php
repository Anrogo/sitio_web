<?php
// insertar el contenido del fichero cabecera.php
include 'cabecera.php';

// llamada a la función cabecera con sus correspondientes parámetros
// function cabecera($titulo, $estilo, $tituloCSS, $textoh1)
// NO confunda el fichero cabecera.php con la función cabecera que está declarada en dicho archivo
// Se ha usado el mismo nombre por claridad pero podrían tener nombres diferentes
cabecera("Su cambio (Formulario)",
		 "cambio.css", "Color", "SU CAMBIO (FORMULARIO)");
?>

  <form action="su-cambio-2.php" method="get">
    <p>Indique la cantidad a pagar y los billetes entregados.</p>
    <table>
      <tbody>
        <tr>
            <td><strong>Cantidad a pagar:</strong> </td>
            <td><input type="number" name="deuda" min="0" step="100" value="1000" /></td>
        </tr>
        <tr>
          <td><strong>Billetes de 200:</strong></td>
          <td><input type="number" name="b200" min="0" /></td>
        </tr>
        <tr>
          <td><strong>Billetes de 100:</strong></td>
          <td><select name="b100">
              <option>0</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
            </select>
          </td>
        </tr>
      </tbody>
    </table>
    <p>
      <input type="submit" value="Mostrar" />
      <input type="reset" value="Borrar" />
    </p>
  </form>

<?php
// insertar el contenido del fichero pie.php mediante include
include 'pie.php';

// llamada a la función pie con el parámetro $fecha
// function pie($fecha)
// NO confunda el fichero pie.php con la función pie que está declarada en dicho archivo
// Se ha usado el mismo nombre por claridad pero podrían tener nombres diferentes
pie("2019-12-15");
?>
