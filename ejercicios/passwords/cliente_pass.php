<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password generator Antonio R.G. with GET v2</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        form fieldset{
            width:40%;
            margin:auto;
        }
        .respuesta {
            border:2px solid red;
            font-size:20px;
            width:30%;
            margin:auto;
            text-align: center;
        }
        .respuesta span, legend{
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1></h1>
    <form action="" method="POST">
        <fieldset>
            <legend>GENERADOR DE CONTRASEÑAS ONLINE v2</legend>
            <label for="numero">Número de contraseñas que desea generar</label>
            <select name="numero">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select><br />
            <label for="longitud">Longitud que deben tener las contraseñas</label>
            <select name="length">
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
            </select><br />
            <label for="caracteres">Caracteres que debe contener sus nuevas contraseñas</label><br />
            <input type="checkbox" name="chars[]" value="1" checked>Números<br />
            <input type="checkbox" name="chars[]" value="2" checked>Mayúsculas<br />
            <input type="checkbox" name="chars[]" value="3" >Minúsculas<br>
            <input type="checkbox" name="chars[]" value="4">Caracteres especiales<br />
            <input type="submit" name="submit" value="Generar">
        </fieldset>    
    </form>
    <?php
        if(isset($_POST['submit'])){
            
            $num = $_POST['numero'];
            $length = $_POST['length'];//la longitud de la contraseña
            $chars = $_POST['chars'];//array con números que se corresponden con los tipos de caracteres que se utilizaran para formarla

            //Construimos, con los valores del array, el get que se acopla a la url para la petición al servidor
            $consulta = http_build_query(["numero"=>$num, "longitud" => $length, "caracteres" => $chars]);
    
            //Con file_get_contents se realiza la petición pasándole los valores que sean necesarios
            $string = file_get_contents("http://localhost/password/my_password_gen.php?$consulta");
            
            //var_dump($string);

            $passwords = json_decode($string); 

            //var_dump($passwords);

            //lectura de posibles errores en el JSON
            /*
            switch (json_last_error()) {
                case JSON_ERROR_NONE:
                    echo ' - No errors';
                break;
                case JSON_ERROR_DEPTH:
                    echo ' - Maximum stack depth exceeded';
                break;
                case JSON_ERROR_STATE_MISMATCH:
                    echo ' - Underflow or the modes mismatch';
                break;
                case JSON_ERROR_CTRL_CHAR:
                    echo ' - Unexpected control character found';
                break;
                case JSON_ERROR_SYNTAX:
                    echo ' - Syntax error, malformed JSON';
                break;
                case JSON_ERROR_UTF8:
                    echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
                break;
                default:
                    echo ' - Unknown error';
                break;
            }*/

            //Pequeño array para mostrar las contraseñas solicitadas
            echo "<ol>";
            foreach ($passwords as $p) {
            echo "<li>$p</li>";
            }
            echo "</ol>";
        }
    ?>
</body>
</html>