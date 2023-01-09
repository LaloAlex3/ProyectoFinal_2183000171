<?php
include "../Controlador/Clases/UEA.php";
include "../Controlador/Clases/Temario.php";
    class UEA_DAO{
        public $conexion;

        public function __construct($conexion){
            $this->conexion = $conexion;
        }
        public function __destruct(){}

        public function insertarUEA_Temario(UEA $uea, $tem,$temas){
            $nombre = $uea->getNombreUEA();
            $clave = $uea->getClaveUEA();
            $descrip = $uea->getDescrip();

            $stm = $this->conexion->prepare("
                INSERT INTO uea (nombreUEa,claveUEA,descripcion) values (?,?,?);");
            $stm->bind_param("sis",$nombre,$clave,$descrip);
            $stm->execute();

            $sql = "SELECT idUEA from uea WHERE nombreUEA = '$nombre' and claveUEA = '$clave' Limit 1 ;";
            $result = $this->conexion->query($sql);
            $row = $result->fetch_assoc();
            $idUEA = $row["idUEA"];

            $stm = $this->conexion->prepare("
                INSERT INTO temario (Nombre,UEA_idUEA) values (?,?);");
            $stm->bind_param("si",$tem,$idUEA);
            $stm->execute();
            
            $sql = "SELECT MAX(idTemario) AS id FROM temario;";
            $result = $this->conexion->query($sql);
            $row = $result->fetch_assoc();
            $idTem = $row['id'];
 
            for ($i = 0; $i < count($temas); ++$i) {
                $stm = $this->conexion->prepare("
                Insert into tema
                (Nombre,Temario_idTemario) values (?,?);");
                $stm->bind_param("si",$temas[$i],$idTem);
                $stm->execute();
            }

            $stm->close();
        }
    }
?>