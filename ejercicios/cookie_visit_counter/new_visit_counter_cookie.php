<?php ob_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Visit counter using cookies</title>
</head>
<body>

<h1>Visit counter using a cookie</h1>

<form method="POST">
  <input type="submit" name="create" value="Create Cookie">
  <input type="submit" name="retrieve" value="Retrieve Cookie">
  <input type="submit" name="delete" value="Delete Cookie">
  <input type="submit" name="add" value="Increment 1">
</form>

</body>
</html>
<?php

// Visit counter using cookies 

if(isset($_COOKIE['visitCount'])){

    if(isset($_POST['create'])){

        setcookie('visitCount', 1, time() + 3600 * 24);  // Se crea por primera vez
        $count = 1;
        echo "<p>Cookie Created: visitCount = $count</p>"; 
    }

    if(isset($_POST['add']) && isset($_COOKIE['visitCount'])) {

        $count = ++$_COOKIE['visitCount']; 
        setcookie('visitCount', $count, time() + 3600 * 24);  // Se añade uno y se actualiza su valor 
        echo "<pre>";
        print_r($_COOKIE);
        echo "</pre>";
        
        echo "<p>New value cookie visitCount = <strong>$count</strong></p>";
    }

    if(isset($_POST['retrieve'])){
       
        $count = $_COOKIE['visitCount']; // Muestra el valor actual de la cookie
        echo "<p>Retrieving cookie visitCount Exists with value = <strong>$count</strong></p>";
    }

    if(isset($_POST['delete'])){

        setcookie('visitCount', 0, time()-1);// Se borra con la fecha actual restandole al menos 1 seg, que ya habría expirado
        echo "<p>Cookie visitCount Deleted</p>";
    }

} elseif(isset($_POST['create'])){ 

    setcookie('visitCount', 1, time() + 3600 * 24);  // Se crea por primera vez
    $count = 1;
    echo "<p>Cookie Created: visitCount = $count</p>";

} else if ($_POST) {
   
    echo "<p>Cookie visitCount does Not exists</p>";
}
ob_end_flush();
?>