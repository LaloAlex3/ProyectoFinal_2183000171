<?php
    class PalabraClave{
        private $idPalabraClave;
        private $descripcion;

        function __construct($id,$descrip){
            $this->idPalabraClave = $id;
            $this->descripcion = $descrip;
        }
        function __destruct(){}

        function setIdPalabraClave($id){
            $this->idPalabraClave = $id;
        }
        function getIdPalabraClave(){
            return $this->idPalabraClave;
        }
        function setDescripcion($descrip){
            $this->descripcion = $descrip;
        }
        function getDescripcion(){
            return $this->descripcion;
        }
        function toJSON():array{
            return [
                "idPalabraClave" => $this->getIdPalabraClave(),
                "descripcion" => $this->getDescripcion()
            ];
        }
        function toString():string{
            return 
                "idPalabraClave: " . $this->getIdPalabraClave() . 
                ", descripcion: " . $this->getDescripcion() . " ";
        }
    }
?>