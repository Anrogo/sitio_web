<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Password generator example 2</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<?php

// https://www.phpjabbers.com/generate-a-random-password-with-php-php70.html 

// random_int (PHP 7) Generates cryptographically secure pseudo-random integers
// https://www.php.net/manual/en/function.random-int.php

function randomPassword($length,$count, $characters) {
 
// $length - the length of the generated password
// $count - number of passwords to be generated
// $characters - types of characters to be used in the password
 
// define variables used within the function    
    $symbols = array();
    $passwords = array();
    $used_symbols = '';
    $pass = '';
 
// an array of different character types    
    $symbols["lower_case"] = 'abcdefghijklmnopqrstuvwxyz';
    $symbols["upper_case"] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $symbols["numbers"] = '1234567890';
    $symbols["special_symbols"] = '!?~@#-_+<>[]{}';
 
    $characters = explode(",",$characters); // get characters types to be used for the passsword
    foreach ($characters as $key=>$value) {
        $used_symbols .= $symbols[$value]; // build a string with all characters
    }
    $symbols_length = strlen($used_symbols) - 1; //strlen starts from 0 so to get number of characters deduct 1
     
    for ($p = 0; $p < $count; $p++) {
        $pass = '';
        for ($i = 0; $i < $length; $i++) {
            $n = random_int(0, $symbols_length); // get a random character from the string with all characters
            $pass .= $used_symbols[$n]; // add the character to the password string
        }
        $passwords[] = htmlentities($pass);
    }
     
    return $passwords; // return the generated password
}
 
$my_passwords = randomPassword(10,1,"lower_case,upper_case,numbers,special_symbols");
echo "<pre>"; 
var_dump($my_passwords);
echo "</pre>";

?>
</body>
</html>
