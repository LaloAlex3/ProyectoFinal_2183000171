<?php
    class Autor{
        private $idAutor;
        private $nombre;
        private $apellidoP;
        private $apellidoM;

        function __construct ($id, $nombre, $apP, $apM){
            $this->idAutor = $id;
            $this->nombre = $nombre;
            $this->apellidoP = $apP;
            $this->apellidoM = $apM;
        }
        function __destruct(){}

        function setIdAutor($id){
            $this->idAutor = $id;
        }
        function getIdAutor():int{
            return $this->idAutor;
        }
        function setNombre($nombre){
            $this->nombre = $nombre;
        }
        function getNombre():string{
            return $this->nombre;
        }
        function setApellidoP($apP){
            $this->apellidoP = $apP;
        }
        function getApellidoP():string{
            return $this->apellidoP;
        }
        function setApellidoM($apM){
            $this->apellidoM = $apM;
        }
        function getApellidoM():string{
            return $this->apellidoM;
        }

        function toJSON():array{
            return [
                "idAutor" => $this->getIdAutor(),
                "nombre" => $this->getNombre(),
                "apellidoP" => $this->getApellidoP(),
                "apellidoM" => $this->getApellidoM()
            ];
        }
        function toString():string{
            return 
                "idAutor: " . $this->getIdAutor() .
                ", nombre: " . $this->getNombre() .
                ", apellido Paterno: " . $this->getApellidoP() .
                ", apellido Materno: " . $this->getApellidoM() ." ";
        }
    }
?>