<?php
include_once '../Controlador/User/user.php';
include_once '../Controlador/User/user_session.php';


$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    //echo "hay sesion";
    $user->setUser($userSession->getCurrentUser());
    include_once 'indexAdmin.html';

}else if(isset($_POST['usuario_nombre']) && isset($_POST['contra'])){
    
    $userForm = $_POST['usuario_nombre'];
    $passForm = $_POST['contra'];

    $user = new User();
    if($user->userExists($userForm, $passForm)){
        //echo "Existe el usuario";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);
        include_once 'indexAdmin.html';
    }else{
        //echo "No existe el usuario";
        $errorLogin = "Nombre de usuario y/o password incorrecto";
        include_once 'login.html';
    }
}else{
    //echo "login";
    include_once 'login.html';
}