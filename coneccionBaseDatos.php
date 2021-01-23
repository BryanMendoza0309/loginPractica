<?php 
    
        $usuario = "admin"; 
        $password = "andyloor123"; 
        $endpoint = "dbloginregister.cdy5ocgqwxiq.us-east-1.rds.amazonaws.com";  
        $basedatos = "";
        $basedatos = "dbloginregister";
        $tabla_db = "usuario";
        $mysqli = new mysqli($endpoint, $usuario, $password, $basedatos);

        if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }
?>