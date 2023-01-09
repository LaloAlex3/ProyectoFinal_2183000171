<?php
    $server = "localhost:3307";
    $user = "root";
    $password= "";
    $db = "azcme_uam";
    $conn = new mysqli($server,$user,$password,$db);
    if($conn->connect_error){
        die("Conexion fallida" . $conn->connect_error);
    }
?> 