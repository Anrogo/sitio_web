<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Password generator example 1</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<?php

// https://hugh.blog/2012/04/23/simple-way-to-generate-a-random-password-in-php/

function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr( str_shuffle( $chars ), 0, $length );
    // If you want to have a password with repeating chars:
    // $password = substr ( str_shuffle ( str_repeat ( $chars ,$length ) ), 0, $length );
    return $password;
}

// random_int (PHP 7) Generates cryptographically secure pseudo-random integers
// https://www.php.net/manual/en/function.random-int.php

function random_password2( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = "";
    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[random_int(0, strlen($chars) -1)];
    }
    return $password;
}

$pass = random_password();
print "  <p>Your password: <strong>$pass</strong></p>\n";
?>
</body>
</html>