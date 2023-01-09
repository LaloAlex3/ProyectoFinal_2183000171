<?php
    include '../Modelo/llenadoFormMaterial.php';
    $jsonString = recuperarUEA(); 
    echo json_encode($jsonString); 
?>