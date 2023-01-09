<?php
    include "../Modelo/conexion.php";
    include "../Modelo/AdminDAO.php";

    session_start();
    if(isset($_POST['usuario_nombre']) && isset($_POST['contra'])){
        $user = $_POST['usuario_nombre'];
        $contra = $_POST['contra'];
        
        $admin = new Admin(1,"null","null","null",$user,$contra);
        $adminDAO = new AdminDAO($conn);
        $flag = $adminDAO->buscarAdmin($admin);
        if($flag != 0){
            $_SESSION['login'] = true;
            echo $flag;
        }else{
            echo "0";
        }
   }
 
?>