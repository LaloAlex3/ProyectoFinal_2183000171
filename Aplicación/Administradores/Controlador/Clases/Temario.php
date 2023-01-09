<?php
    class Temario{
        private $idTemario;
        private $nombreTemario;
        private $UEA;

        function __construct($id,$nombre,$UEA){
            $this->idTemario = $id;
            $this->nombreTemario = $nombre;
            $this->UEA = new UEA($UEA->getIdUEA(),$UEA->getNombreUEA(),
                                   $UEA->getClaveUEA(),$UEA->getDescrip());
        }
        function __destruct(){}

        function setIdTemario($id){
            $this->idTemario = $id;
        }
        function setNombreTemario($nombre){
            $this->nombreTemario = $nombre;
        }
        function setUEA($UEA){
            $this->UEA = $UEA;
        }

        function getIdTemario():int{
            return $this->idTemario;
        }
        function getNombreTemario():string{
            return $this->nombreTemario;
        }
        function getUEA():UEA{
            return $this->UEA;
        }


        function toJSON():array{
            return[
                "idTemario" => $this->getIdTemario(),
                "nombreTemario" => $this->getNombreTemario(),
                "UEA" =>$this->getUEA()->toJSON()
            ];
        }
        function toString():string{
            return 
            "idTemario: " . $this->getIdTemario() .
            ", nombreTemario: " . $this->getNombreTemario() . 
            ", UEA: " . $this->getUEA()->toString() . " " ;
        }
    }
?>