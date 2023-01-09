<?php
    class UEA{
        private $idUEA;
        private $nombreUEA;
        private $claveUEA;
        private $descrip;

        function __construct($id,$nombre,$clave,$descrip){
            $this->idUEA = $id;
            $this->nombreUEA  = $nombre;
            $this->claveUEA = $clave;
            $this->descrip = $descrip;
        }
        function __destruct(){}

        function setIdUEA($id){
            $this->idUEA = $id;
        }
        function getIdUEA(){
            return $this->idUEA;
        }
        function setNombreUEA($nombre){
            $this->nombreUEA = $nombre;
        }
        function getNombreUEA():string{
            return $this->nombreUEA;
        }
        function setClaveUEA($clave){
            $this->claveUEA = $clave;
        }
        function getClaveUEA():int{
            return $this->claveUEA;
        }
        function setDescrip($descrip){
            $this->descrip = $descrip;
        }
        function getDescrip():string{
            return $this->descrip;
        }
        function toJSON():array{
            return [
                "idUEA" => $this->getIdUEA(),
                "nombreUEA" => $this->getNombreUEA(),
                "claveUEA" => $this->getClaveUEA(),
                "descripcion" => $this->getDescrip()
            ];
        }
        function toString():string{
            return 
                "idUEA: " . $this->getIdUEA() .
                ", nombreUEA: " . $this->getNombreUEA() .
                ", claveUEA: " . $this->getClaveUEA() . 
                ", descripcion: " . $this->getDescrip() . "";
        }
    }
?>