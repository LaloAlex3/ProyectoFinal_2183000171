<?php
    include "../../Modelo/llenado.php";
    $jsonString = recuperarTemas();
    echo json_encode($jsonString);
?>