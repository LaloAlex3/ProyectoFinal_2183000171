<?php
    include "../../Modelo/llenado.php";
    $jsonString = recuperarMateriales();
    echo json_encode($jsonString);
?>