<?php
// insertar el contenido del fichero cabecera.php mediante include
include 'cabecera.php';

// llamada a la función cabecera con sus correspondientes parámetros
// function cabecera($titulo, $estilo, $tituloCSS, $textoh1)
// NO confunda el fichero cabecera.php con la función cabecera que está declarada en dicho archivo
// Se ha usado el mismo nombre por claridad pero podrían tener nombres diferentes
cabecera("Su cambio (Resultado)",
		 "cambio.css", "Color", "SU CAMBIO (RESULTADO)");

		 
// insertar el contenido del fichero recoge.php mediante require
/* La diferencia con respecto a include es que require produce un error si no se encuentra el archivo 
   (y no se procesa el resto de la página), mientras que include sólo produce un aviso 
   (y se procesa el resto de la página).
*/

require 'recoge.php';

// Se recoge el valor del input "deuda", "b200" y "b100"
$dinero = recoge("deuda");//dinero adeudado
$bill_200 = recoge("b200");//billetes de 200
$bill_100 = recoge("b100");//billetes de 100


//require 'cambio.php';
	

// Control de errores

$dineroOk = false;

if ($dinero == "") {
	
	/*Si no se escribe nada mostraremos un aviso al usuario*/
	
    print "    <p class=\"aviso\">No ha escrito la cantidad a pagar.</p>\n";
	
	
}
if ($dinero < 100 || $dinero % 100 != 0) {

/*Si se escribe una cifra menor que 100 dará fallo por no ser múltiplo de 100*/

print "    <p class=\"aviso\">La cantidad mínima debe ser 100.</p>\n";
} 

if ($bill_200 == ""){
	/*Si no se añaden billetes de 200*/
	print "    <p class=\"aviso\">No ha escrito el número de billetes de 200</p>\n";
} 

if (is_float($bill_200)){
	/*Si no se escribe una cifra entera de billetes de 200*/
	print "    <p class=\"aviso\">No ha escrito el número de billetes de 200 como número entera</p>\n";
} 

if ($bill_100 != 0 && $bill_100 != 1 && $bill_100 != 2 && $bill_100 != 3) {
	/*Si no se añaden correctamente los billetes de 100*/
	print "    <p class=\"aviso\">El número de billetes de 100 no es correcto</p>\n";

/*Solo si todo está correcto y no ha salido ningún mensaje de error le daremos true y pasará a mostrar resultados*/
} elseif (($dinero != "") && ($bill_200 >= 0 && $bill_200 != "") && ($bill_100 >= 0 && $bill_100 <= 3)) 	$dineroOk = true;

if($dineroOk){

/*UNA VEZ SE CONFIRMA QUE LOS DATOS ESTÁN BIEN MOSTRAMOS LOS RESULTADOS*/

$total = $bill_200 *200 + $bill_100*100;//lo que se ha pagado en total

$cambio_200 = intval(($total-$dinero)/200);//nos dice la vuelta en billetes de 200

/*El dinero adeudado y el entregado se muestran siempre de la misma manera así que estos mensajes son predefinidos*/

print "<p>Tiene que pagar <strong>".$dinero." €</strong>.</p>";

print "<p>Ha entregado <strong>".$total." €</strong>.</p>";

	//Luego están los CASOS que se pueden dar en función de lo que se ha pagado o no:

	//1: ha entregado la cantidad exacta:
	if($dinero == $total){
		print "<p>Ha entregado la cantidad exacta.</p>";
	}

	//2: Falta dinero por pagar. Le calculamos la diferencia:
	if($dinero > $total){
		$diferencia = $dinero - $total;
		print "<p>Le falta por entregar <strong>".$diferencia." €.</strong></p>";
	}

	//3: La última opción que queda es que se haya pagado de más, y por tanto hay que devolverle lo que sobra (el cambio):
	if($dinero < $total){
		
		$cambio = $total - $dinero;

		//primero se calcula cuantos billetes de 200 se devolverían
		$cambio_200 = intval($cambio / 200);

		//y lo que sobre, si sobra, serían billetes de 100, así que se calculan sobre el total menos los de 200 que se restan
		$cambio_100 = intval(($cambio - $cambio_200 * 200) / 100);

		print "<p>Tome su cambio: <strong>".$cambio."</strong> (<strong>".$cambio_200."</strong> billetes de 200 € y <strong>".$cambio_100."</strong> de 100 €).</p>";
	}
}

// Link al formulario

print "    <p><a href=\"su-cambio-1.php\">Volver al formulario.</a></p>\n";

// insertar el contenido del fichero pie.php mediante include
include 'pie.php';

// llamada a la función pie con el parámetro $fecha
// function pie($fecha)
// NO confunda el fichero pie.php con la función pie que está declarada en dicho archivo
// Se ha usado el mismo nombre por claridad pero podrían tener nombres diferentes
pie("2019-12-15");
?>
