<?php
ob_start();

    try {
        
        $user = "id12020994_admin";  // usuario con el que se va conectar con MySQL
        $pass = "123456";// contraseña del usuario
        $dbname = "id12020994_zodiac";  // nombre de la base de datos
        $host = "localhost";  // nombre o IP del host

        /*Se inicia la sesión y se pasa la variable que indica el nombre de la base de datos*/
        
        $_SESSION['dbname'] = $dbname;

        if($user=="id12020994_admin" && $pass=="123456"){

            $pdo = new PDO("mysql:host=$host; dbname=$dbname", $user, $pass);  //conectar con MySQL y SELECCIONAR LA BBDD
        
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //Manejo de errores con PDOException
            //echo "<p class=\"mensaje_g\">Se ha conectado a la BBDD $dbname.<p>\n";

        //si no fuesen correctos el usuario o la contraseña manda de vuelta al login
        } elseif($user!="id12020994_admin" || $pass!="123456"){
            session_name("zodiac");
            session_start();
            $_SESSION = array();
            session_destroy();
            header("Location: index.php");
        }

    } catch (PDOException $e) {  // Si hubiera errores de conexión, se captura un objeto de tipo PDOException
      print "<p class=\"mensaje_r\">Error: No se pudo conectar con la BBDD $dbname.</p>\n";
      print "<p class=\"mensaje_r\">Error: " . $e->getMessage() . "</p>\n";  // mensaje de excepción
      exit();
    }

ob_end_flush();
?>