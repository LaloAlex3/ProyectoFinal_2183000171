<?php
    include "../Modelo/conexion.php";
    session_start();
    if(isset($_SESSION['login'])){
      echo 1;
    }else{
      echo 0;
    }
?>