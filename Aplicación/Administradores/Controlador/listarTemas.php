<?php
    include '../Modelo/llenadoFormMaterial.php';
    $jsonString = recuperarTemas(); 
    echo json_encode($jsonString); 
?>