<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password generator Antonio R.G. 1</title>
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
            <legend>GENERADOR DE CONTRASEÑAS ONLINE v1</legend>

            <label for="longitud">Número de caracteres</label>
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
            <label for="caracteres">Caracteres que debe contener su nueva contraseña</label><br />
            <input type="checkbox" name="chars[]" value="1" checked>Minúsculas<br />
            <input type="checkbox" name="chars[]" value="2" >Mayúsculas<br>
            <input type="checkbox" name="chars[]" value="3" checked>Números<br />
            <input type="checkbox" name="chars[]" value="4">Caracteres especiales<br />
            <input type="submit" name="submit" value="Generar">
        </fieldset>    
    </form>
    <?php
        if(isset($_POST['submit'])){
            
            //$num = $_POST['numero'];
            $length = $_POST['length'];//la longitud de la contraseña
            $chars = $_POST['chars'];//array con números que se corresponden con los grupos de tipos de caracteres que se utilizaran para formarla
            
            //Construimos, con los valores del array, el get que se acopla a la url para la petición al servidor
            $consulta = http_build_query(["longitud" => $length, "caracteres" => $chars]);

            //Con file_get_contents se realiza la petición pasándole los valores que sean necesarios. Se conecta al servidor del hosting y desde allí manda la contraseña
            $json = file_get_contents("http://anrogo.000webhostapp.com/ejercicios/passwords/un_password/my_password_gen.php?$consulta");
        
            echo "<div class=\"respuesta\"><p>Su contraseña es: ";
            echo "<span>".$json."</span></p></div>";
        }
    ?>
</body>
</html>