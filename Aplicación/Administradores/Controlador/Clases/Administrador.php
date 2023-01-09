<?php
    class Admin{
        private $idAdmin;
        private $nombre;
        private $apM;
        private $apP;
        private $user;
        private $contrasena;
        
        function __construct($idAdmin,$nombre,$apP,$apM,$user,$contrasena){
            $this->idAdmin = $idAdmin;
            $this->nombre = $nombre;
            $this->apP = $apP;
            $this->apM = $apM; 
            $this->user = $user;
            $this->contrasena = $contrasena;
        }
        function __destruct(){}

        function setIdAdmin($idAdmin){
            $this->idAdmin = $idAdmin;
        }
        function getIdAdmin():int{
            return $this->idAdmin;
        }
        function setNombre($nombre){
            $this->nombre = $nombre;
        }
        function getNombre():string{
            return $this->nombre;
        }
        function setApP($apP){
            $this->apP = $apP;
        }
        function getApP():string{
            return $this->apP;
        }
        function setApM($apM){
            $this->apM = $apM;
        }
        function getApM():string{
            return $this->apM;
        }
        function setUser($user){
            $this->user = $user;
        }
        function getUser():string{
            return $this->user;
        }
        function setContrasena($contrasena){
            $this->contrasena = $contrasena; 
        }
        function getContrasena():string{
            return $this->contrasena;
        }

        function toJSON():array{
            return [
                "user" => $this->getUser(),
                "contrasena" => $this->getContrasena(),
                "nombre" => $this->getNombre() ,
                "apellidoP" => $this->getApP() ,
                "apellidoM" => $this->getApM()
            ];
        }
        function toString():string{
            return 
            "user: ".$this->getUser() .
            " , contrasena: " . $this->getContrasena() .
            " , nombre: " . $this->getNombre() .
            " ,apellidoP: " . $this->getApP() .
            " , apellidoM: " . $this->getApM() . " ";
        }
    }
?>