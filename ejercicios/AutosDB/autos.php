<?php
ob_start();

// Demand a GET parameter
if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1  ) {
    die('Name parameter missing');
}

// If the user requested logout go back to index.php
if ( isset($_POST['logout']) ) {
    header('Location: index.php');
    return;
}

/* Parte que se encarga de conectar con la base de datos y realizar la inserción de datos
 y posterior consulta tras recibir los valores del formulario con POST*/

$error_num = false;
$error_str = false;
$record = false;

if(isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage'])){
    
    require "functions.php";

    $make = recoge("make");//marca
    $year = recoge("year");//año de fabricación
    $mileage = recoge("mileage");//km recorridos

    //Se comprueban y filtran los valores por la función recoge que evita cualquier intento de inyección HTML, SQL..
    //si alguna comprobación falla no accede y no hace ningún cambio en la DB
    //if(comprobar_num($year,$mileage)==true && comprobar_str($make)==true){
    if(!empty($make)){

        if(is_numeric($year) && is_numeric($mileage)){

            require_once "connect_PDO.php";//$pdo viene de conectar con la base de datos

            //Para evitar que muestre una excepción por error (en el caso de que la tabla exista y se duplique la primary key):
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT); 

            //También se utilizan las sentencias preparadas para evitar la inyección SQL
            //Se prepara la sentencia con prepare y los valores de referencia del array ":value1"..
            $new_car = 'INSERT INTO autos (make, year, mileage) VALUES ( :mk, :yr, :mi)';
            $stmt = $pdo->prepare($new_car);
            if($stmt->execute(array(
                    ':mk' => $make,
                    ':yr' => $year,
                    ':mi' => $mileage)
                    ))
            { // Se ejecuta la consulta y si está bien muestra mensaje positivo en verde
                $record = "<p class=\"mensaje_g\">Record inserted</p>";
            } else {
            /*Recoge los posibles errores: fallo al registrar, si falta la marca 
            o si no se han introducido como números los kilometros y el año*/
                $record = "<p class=\"mensaje_r\"><strong>Record failed</strong></p>";
            }

        } else {
            $error_num = "<p class=\"mensaje_r\"><strong>Mileage and year must be numeric</strong></p>";
        }

    } else {
        $error_str = "<p class=\"mensaje_r\"><strong>Make is required</strong></p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Auto's DB antonio r.g.</title>
<?php require_once "bootstrap.php"; ?>
</head>
<body>
<div class="container">
<h1>Tracking Autos for
<?php
if ( isset($_REQUEST['name']) ) {
    echo htmlentities($_REQUEST['name']);
    echo "</h1>";
}
if($record !== false ){
    echo $record;
}
if($error_num !== false){
    echo $error_num;
}
if($error_str !== false){
    echo $error_str;
}
?>
<form method="post">
    <p>Make: <input type="text" name="make" size="60" /></p>
    <p>Year: <input type="text" name="year" /></p>
    <p>Mileage: <input type="text" name="mileage" /></p>
    <input type="submit" name="insertar" value="Add" />
    <input type="submit" name="logout" value="Logout" />
</form>
<h2>Automobiles</h2>
<?php
if ( isset($_POST['insertar']) && isset($pdo)){
    
    $consulta = "SELECT * FROM autos;";
    $stmt = $pdo->query($consulta);
    $rows = $stmt -> fetchAll(PDO::FETCH_ASSOC);

    echo "<ul>";

    if($pdo->query($consulta)){
        foreach($rows as $cell){
            echo "<li>".$cell['year']." ".$cell['make']." / ".$cell['mileage']."</li>";
        }
    }
    echo "</ul>";
}
?>
</div>
</body>
</html>
<?php
ob_end_flush();
?>