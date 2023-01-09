<?php
    include '../Modelo/llenadoFormMaterial.php';
    $jsonString = recuperarPalabrasClave(); 
    echo json_encode($jsonString); 
?>