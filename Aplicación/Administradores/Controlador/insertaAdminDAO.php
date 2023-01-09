<?php
    include "../Modelo/conexion.php";
    include "../Modelo/AdminDAO.php";
    

    if(isset($_POST)){
        $aDAO = new AdminDAO($conn);
        $nombre = $_POST['nombre'];
        $apP = $_POST['apP'];
        $apM = $_POST['apM'];
        $user = $_POST['user'];
        $contra = $_POST['contra'];

        //Creamos a nuestro Administrador con los valores del formulario
        $admin = new Admin(1,$nombre,$apP,$apM,$user,$contra);
        //Llamamos al metodo guardar para almacenar al Administrador nuevo
        $aDAO->GuardarAdmin($admin);
        //Avisamos que se realizo con exito la insercion
        echo "ok";
    }
?>