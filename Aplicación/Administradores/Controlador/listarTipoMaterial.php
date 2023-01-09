<?php
    include "../Modelo/llenadoFormMaterial.php";
    $jsonString = recuperarTipoMaterial();
    echo json_encode($jsonString);
?>