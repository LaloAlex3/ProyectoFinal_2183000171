<?php
    include "../Modelo/conexion.php";
    include "../Modelo/UEA_DAO.php";

    if(isset($_POST)){
        $ueaDAO = new UEA_DAO($conn);

        $nombreUEA = $_POST['nombre'];
        $claveUEA = $_POST['clave'];
        $descripUEA = $_POST['descrip'];
        $nombreTemario = $_POST['nombreTemario'];
        $temas = $_POST['tema'];
        
        $uea = new UEA(1,$nombreUEA,$claveUEA,$descripUEA);
        $ueaDAO->insertarUEA_Temario($uea,$nombreTemario,$temas);
        echo "ok";
    }
?>