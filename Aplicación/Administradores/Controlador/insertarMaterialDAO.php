<?php
    include "../Modelo/conexion.php";
    include "../Modelo/MaterialDAO.php";

    if(isset($_POST)){
        $mDAO = new MaterialDAO($conn);
        $nombre = $_POST['nombre'];
        $url = $_POST['url'];
        $fecha = $_POST['fecha'];
        $tipo = $_POST['tipoM'];
        $autores = $_POST['autores'];
        $tema = $_POST['temas'];
        $palabrasC = $_POST['palabrasClave'];
        
        $m = new Material(1,$nombre,$url,$fecha,$tipo,$autores,$palabrasC,$tema);
        $mDAO->insertarMaterial($m);
        echo "ok";
    }
?>