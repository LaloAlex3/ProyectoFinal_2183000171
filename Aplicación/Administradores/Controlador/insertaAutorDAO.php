<?php
    include "../Modelo/conexion.php";
    include "../Modelo/AutorDAO.php";

    if(isset($_POST)){
        $autorDAO = new AutorDAO($conn);

        $nombre = $_POST['nombre'];
        $apP = $_POST['apP'];
        $apM = $_POST['apM'];  
        $autor = new Autor(1,$nombre,$apP,$apM);
        $autorDAO->insertarAutor($autor);
        echo "ok";  
    }
?>