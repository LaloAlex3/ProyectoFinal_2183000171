<?php
    include "../../Modelo/llenado.php";
    $jsonString = recuperarUEAs();
    echo json_encode($jsonString);
?>