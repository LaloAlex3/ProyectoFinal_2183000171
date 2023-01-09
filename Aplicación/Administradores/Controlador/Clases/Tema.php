<?php
    class Tema{
        private $idTema;
        private $nombreTema;
        private $temario;
        
        function __construct($id,$nombre,$temario){
            $this->idTema = $id;
            $this->nombreTema = $nombre;
            $this->temario = new Temario($temario->getIdTemario(),
                                         $temario->getNombreTemario(),
                                         $temario->getUEA());
        }
        function __destruct(){}

        function setIdTema($id){
            $this->idTema = $id;
        }
        function setNombreTema($nombre){
            $this->nombreTema = $nombre;
        }
        function setTemario($temario){
            $this->temario = $temario;
        }
        function getIdTema():int{
            return $this->idTema;
        }
        function getNombre():string{
            return $this->nombreTema;
        }
        function getTemario():Temario{
            return $this->temario;
        }

        function toJSON():array{
            return[
                "idTema" => $this->getIdTema(),
                "nombreTema" => $this->getNombre(),
                "temario" => $this->getTemario()->toJSON()
            ];
        }   
        function toString():string{
            return 
             "idTema: " . $this->getIdTema() .
             ", nombreTema: " . $this->getNombre() .
             ", Temario: " . $this->getTemario()->toString()." ";
        }
    }
?>