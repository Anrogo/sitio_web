<!DOCTYPE html>
<html lang="es">
    <head>
      <meta charset="utf-8">
      <title>Password generator Antonio R.G. 1 </title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
    <?php
    
    // https://www.phpjabbers.com/generate-a-random-password-with-php-php70.html 
    
    // random_int (PHP 7) Generates cryptographically secure pseudo-random integers
    // https://www.php.net/manual/en/function.random-int.php

    /*Para generar una contraseña aleatoria y segura es imprescindible que cumpla unos requisitos:
    *   -No ser una frase o algo lógico e interpretable.
    *   -Mínimo de 8 caracteres.
    *   -Contener números, letras y caracteres especiales.
    *   -Letras mayúsculas y minúsculas.
    */

    if(isset($_REQUEST)){
        //Se recogen los valores adjuntos a la url
        //$num = $_REQUEST['numero'];
        $len = $_REQUEST['longitud'];
        $chars = $_REQUEST['caracteres'];
    }

    /*Antes de pedir la contraseña, debemos "traducir" a algo que entienda la función lo que serían 
    los campos seleccionados (mayúsculas, minúsculas, números y caracteres especiales) para formarla.
    Para ello paso el array de $chars por la función characters*/
    
    $chars = characters($chars);
    

    //$my_passwords = randomPassword(10,1,"lower_case,upper_case,numbers,special_symbols");

    //Se pasan los valores por la función, de la que se extrae la contraseña que viene del return.
    $password = randomPassword($len,$chars);

    //Se muestra a través del cliente con:
    echo $password;


    //Función que genera estas contraseñas:
    function randomPassword($length, $characters) {
     
        // $length - the length of the generated password
        // $count - number of passwords to be generated
        // $characters - types of characters to be used in the password
         
        // define variables used within the function    
            $symbols = array();
            $password = '';
            $pass = '';
         
        // an array of different character types    
            $symbols["lower_case"] = 'abcdefghijklmnopqrstuvwxyz';
            $symbols["upper_case"] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $symbols["numbers"] = '1234567890';
            $symbols["special_symbols"] = '!?~@#-_+<>[]{}';

            $symbols_length = strlen($characters) - 1; //strlen starts from 0 so to get number of characters deduct 1
             
            //for ($p = 0; $p < $count; $p++) {
                $pass = '';
                for ($i = 0; $i < $length; $i++) {
                    $n = random_int(0, $symbols_length); // get a random character from the string with all characters
                    $pass .= $characters[$n]; // add the character to the password string
                }
                //$passwords[] = htmlentities($pass);
                $password = htmlentities($pass);
           // }
             
            return $password; // return the generated password
        }
        /**Función characters($chars)
         * Calcula los campos que incluye la selección de checkbox elegidos en el formulario
         * 
         * params $chars: array que contiene los valores del checkbox
         */
        function characters($chars){
            $characters = "";

            for($i=0; $i<count($chars); $i++){
                if($chars[$i] == 1) $characters .= "abcdefghijklmnopqrstuvwxyz";
                if($chars[$i] == 2) $characters .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                if($chars[$i] == 3) $characters .= "1234567890";
                if($chars[$i] == 4) $characters .= "!?~@#-_+<>[]{}";
            }
            
            return $characters;//devuelve el array que necesita la función randomPassword()
        }
    ?>
    </body>
    </html>