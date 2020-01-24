<?php

    try {
        
        $user = "id12020994_admin2";  // usuario con el que se va conectar con MySQL
        $pass = "123456";// contraseña del usuario
        $dbname = "id12020994_autosdb";  // nombre de la base de datos
        $host = "localhost";  // nombre o IP del host

        /*Se inicia la sesión y se pasa la variable que indica el nombre de la base de datos*/
        
        $_SESSION['dbname'] = $dbname;

        if($user=="id12020994_admin2" && $pass=="123456"){

        $pdo = new PDO("mysql:host=$host; dbname=$dbname", $user, $pass);  //conectar con MySQL y SELECCIONAR LA BBDD
    
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //Manejo de errores con PDOException
        //echo "<p class=\"mensaje_g\">Se ha conectado a la BBDD $dbname.</p><br />";

        $create = "CREATE TABLE IF NOT EXISTS autos (
            auto_id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
            make VARCHAR(128),
            year INTEGER,
            mileage INTEGER
         );";

         if($pdo->query($create)){
            //echo "<p class=\"mensaje_g\"> Tabla <strong>autos</strong> creada en $dbname DB</p>\n";
         }

        //si no fuesen correctos el usuario o la contraseña manda de vuelta al login
        } elseif($user!="admin" || $pass!="1234"){
            session_name("zodiac");
            session_start();
            $_SESSION = array();
            session_destroy();
            header("Location: index.php");
        }

    } catch (PDOException $e) {  // Si hubiera errores de conexión, se captura un objeto de tipo PDOException
      echo "<p class=\"mensaje_r\">Error: No se pudo conectar con la BBDD $dbname.</p><br />";
      echo "<p class=\"mensaje_r\">Error: " . $e->getMessage() . "</p><br />";  // mensaje de excepción
      exit();
    }

    ?>