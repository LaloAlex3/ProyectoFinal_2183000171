<?php
    include '../Modelo/llenadoFormMaterial.php';
    $jsonString = recuperarAutores(); 
    echo json_encode($jsonString); 
?>