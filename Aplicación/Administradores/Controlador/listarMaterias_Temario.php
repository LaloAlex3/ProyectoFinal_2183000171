<?php
    include '../Modelo/llenadoFormMaterial.php';
    $jsonString = recuperarTemario(); 
    echo json_encode($jsonString); 
?>