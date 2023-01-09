<?php
    $server = "localhost:3307";
    $user = "root";
    $password="";
    $db="azcme_uam";
    $conn = new mysqli($server,$user,$password,$db);
    if($conn->connect_error){
        die("Conexion a la BD erronea".$conn->connect_error);
    }else{
        //echo("Conexion exitosa");
    }
    // $server = "localhost";
    // $user = "laloalex";
    // $password= "superlalo";
    // $db = "laloalex";
    // $conn = new mysqli($server,$user,$password,$db);
    // if ($mysqli->connect_errno) {
    //     echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    // }else{
    //     //echo("Conexion exitosa");    
    // }
?>