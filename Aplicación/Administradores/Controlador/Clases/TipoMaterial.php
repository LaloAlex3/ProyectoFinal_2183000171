<?php
    class TipoMaterial{
        private $idTipoMaterial;
        private $descripcion;

        function __construct($idTM,$descrip){
            $this->idTipoMaterial = $idTM;
            $this->descripcion = $descrip;
        }
        
        function __destruct(){}

        function setIdTipoMaterial($id){
            $this->idTipoMaterial = $id;
        }
        function getIdTipoMaterial():int{
            return $this->idTipoMaterial;
        }
        function setDescripcion($descrip){
            $this->descripcion = $descrip;
        }
        function getDescripcion():string{
            return $this->descripcion;
        }
        function toJSON():array{
            return [
                "idTipoMaterial" => $this->getIdTipoMaterial(),
                "descripcion" => $this->getDescripcion()
            ];
        }
        function toString():string{
            return 
            "idTipoMaterial: " . $this->getIdTipoMaterial() .
            " , decripcion: " . $this->getDescripcion() . "";
        }
    }
?>