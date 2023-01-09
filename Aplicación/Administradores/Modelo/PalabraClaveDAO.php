<?php
    include "../Controlador/Clases/PalabraClave.php";
    class PalabraClaveDAO{
        public $conexion;

        public function __construct($conn){
            $this->conexion = $conn;
        }
        public function __destruct(){}

        public function insertarPC(PalabraClave $pc){
            $descrip = $pc->getDescripcion();

            $stm = $this->conexion->prepare("
                INSERT INTO palabraclave (Descripcion) values(?);");

            $stm->bind_param("s",$descrip);
            $stm->execute();
            $stm->close();
        }
    }
?>