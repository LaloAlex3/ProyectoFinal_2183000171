<?php
    class Material{
        private $idMaterial;
        private $nombre;
        private $URL;
        private $fechaPublicacion;
        private $tipoMaterial;
        private $autores = array();
        private $tema = array();
        private $palabrasClave = array();

        function __construct($id,$nombre,$url,$fecha,
        $tipoMaterial,$autores,$palabrasClave,$temas){
            $this->idMaterial = $id;
            $this->nombre = $nombre;
            $this->URL = $url;
            $this->fechaPublicacion = $fecha;
            $this->tipoMaterial = $tipoMaterial;
            $this->autores = $autores;
            $this->palabrasClave = $palabrasClave;
            $this->tema = $temas;
            // $this->tema = new Tema ($tema->getId(),$tema->getNombre());  
        }
        function __destruct(){}

        function setId($id){
            $this->idMaterial = $id;
        }
        function setNombre($nombre){
            $this->nombre = $nombre; 
        }
        function setURL($url){
            $this->URL = $url;
        }
        function setFechaPublicacion($fecha){
            $this->fechaPublicacion = $fecha;
        }
        function setTipoMaterial($tipoM){
            $this->tipoMaterial = $tipoM;
        }
        function setAutores($autores){
            $this->autores = $autores;
        }
        function setTema($temas){
            $this->tema = $temas;
        }
        function setPalabrasClave($pc){
            $this->palabrasClave = $pc;
        }

        function getId():int{
            return $this->idMaterial;
        }
        function getNombre():string{
            return $this->nombre;
        }
        function getURL():string{
            return $this->URL;
        }
        function getFechaPublicacion():string{
            return $this->fechaPublicacion;
        }
        function getTipoMaterial():int{
            return $this->tipoMaterial;
        }
        function getAutores():array{
            return $this->autores;
        }
        function getTemas():array{
            return $this->tema;
        }
        function getPalabrasClave():array{
            return $this->palabrasClave;
        }

        function agregarAutor($autor){
            array_push($this->autores, $autor);
        }
        function eliminaAutor($i){
            unset($this->getAutores()[$i]);
        }
        function muestraTemas():string{
            $cadena = "";
            foreach ($this->getTemas() as $tema) {
                $cadena = $cadena . $tema->toString();
            }
            return $cadena;
        }
        function muestraAutores(): string{
            $cadena = "";
            foreach ($this->getAutores() as $p) {
                $cadena = $cadena . $p->toString();
            }
            return $cadena;
        }
        function muestraPalabrasClave():string{
            $cadena = "";
            foreach ($this->getPalabrasClave() as $pC) {
                $cadena = $cadena . $pC->toString();
            }
            return $cadena;
        }

        function toJSON():array{
            return [
                "idMaterial" => $this->getId(),
                "nombreMaterial" => $this->getNombre(),
                "URL" => $this->getURL(),
                "FechaPublicacion" => $this->getFechaPublicacion(),
                "TipoMaterial" => $this->getTipoMaterial(),
                "Tema" => $this->getTemas()->toJSON(),
                "Autores" => $this->getAutores()->toJSON(),
                "PalabrasClave" => $this->getPalabrasClave()->toJSON()
                          
            ];
        }
        function toString():string{
           // $autores = muestraAutores();
            return 
            "idMaterial: ". $this->getId(). 
            ", nombreMaterial: " .$this->getNombre() .
            ", URL: ".$this->getURL().
            ", FechaPublicacion: " . $this->getFechaPublicacion() .
            ", TipoMaterial: " . $this->getTipoMaterial() .
            ", Autores: " . $this->muestraAutores().
            ", PalabrasClave: " . $this->muestraPalabrasClave(). 
            ", Tema: " . $this->muestraTemas() . " " ;        
        }
    }
?>