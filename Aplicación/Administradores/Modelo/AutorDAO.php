<?php
    include "../Controlador/Clases/Autor.php";
    class AutorDAO{
        public $conexion;

        public function __construct($conn){
            $this->conexion = $conn;
        }

        public function __destruct(){}

        public function insertarAutor(Autor $autor){
            $nombre = $autor->getNombre();
            $apP = $autor->getApellidoP();
            $apM = $autor->getApellidoM();

            $stm = $this->conexion->prepare("
                INSERT INTO autor (Nombre, ApellidoP, ApellidoM) values (?,?,?);");

            $stm->bind_param("sss",$nombre,$apP,$apM);
            $stm->execute();
            $stm->close();
        }
    }
?>