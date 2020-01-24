<?php // Do not put any HTML above this line
ob_start();

if ( isset($_POST['cancel'] ) ) {
    // Redirect the browser to game.php
    header("Location: index.php");
    return;
}

require "functions.php";

$salt = 'XyZzy12*_';//original:XyZzy12*_
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';  // Pw is php123

$failure = false;  // If we have no POST data
$failure2 = false;
// Check to see if we have some POST data, if we do process it
if ( isset($_POST['who']) && isset($_POST['pass']) ) {
    //Cuando confirmo que están enviados se filtran y se verifican
    $user = recoge("who");
    $pass = recoge("pass");
    if ( strlen($user) < 1 || strlen($pass) < 1 ) {
        $failure = "User name and password are required";
        error_log("Login fail ".$user);//guarda el registro con el fallo al loguearse en el error.log de apache
    }
    if( strpos($user,'@') == false || strpos($user,'@') <= 1 ){
        //Comprueba la existencia de un '@' en el usuario introducido:
        $failure2 = "Email must have an at-sign (@)";
        error_log("Login fail ".$user);//guarda el registro con el fallo al loguearse en el error.log de apache
    }
    if( strlen($user) >= 1 && strlen($pass) >= 1 && strpos($user,'@') >= 1 ) {
        $check = hash('md5', $salt.$pass);
        if ( $check == $stored_hash ) {
            error_log("Login success ".$user);//guarda el registro de que se ha logueado con éxito en el error.log de apache
            // Redirect the browser to autos.php
            header("Location: autos.php?name=".urlencode($user));
            return;
        } else {
            $failure = "Incorrect password";
            error_log("Login fail ".$user." $check");//guarda el registro con el fallo al loguearse en el error.log de apache
        }
    }
}

// Fall through into the View
?>
<!DOCTYPE html>
<html>
<head>
<?php require_once "bootstrap.php"; ?>
<title>Auto's login antonio r.g.</title>
</head>
<body>
<div class="container">
<h1>Please Log In</h1>
<?php
// Note triple not equals and think how badly double
// not equals would work here...
if ( $failure !== false ) {
    // Look closely at the use of single and double quotes
    echo('<p style="color: red;">'.htmlentities($failure)."</p>");
}
if( $failure2 !== false ) {
    // Look closely at the use of single and double quotes
    echo('<p style="color: red;">'.htmlentities($failure2)."</p>");
}
?>
<form method="POST">
<label for="nam">User Name</label>
<input type="text" name="who" id="nam"><br/>
<label for="id_1723">Password</label>
<input type="password" name="pass" id="id_1723"><br/>
<input type="submit" value="Log In">
<input type="submit" name="cancel" value="Cancel">
</form>
<p>
For a password hint, view source and find a password hint
in the HTML comments.
<!-- Hint: The password is the four character sound a cat
makes (all lower case) followed by 123. -->
</p>
</div>
</body>
</html>
<?php
ob_end_flush();
?>