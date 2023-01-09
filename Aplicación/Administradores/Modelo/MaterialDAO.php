<?php
    include "../Controlador/Clases/Material.php";
    class MaterialDAO{
        public $conexion;

        public function __construct($conn){
            $this->conexion = $conn;
        }

        public function __destruct(){}

        public function insertarMaterial(Material $mat){
            $nombre = $mat->getNombre();
            $url = $mat->getURL();
            $fechaPub = $mat->getFechaPublicacion();
            $tipo = $mat->getTipoMaterial();

            $stm = $this->conexion->prepare("
                insert into material (nombre,URL,FechaPublicacion,tipomaterial_idTipoMaterial) values (?,?,?,?);");
            $stm->bind_param("sssi",$nombre,$url,$fechaPub,$tipo);
            $stm->execute();

            $sql = "SELECT MAX(idMaterial) AS id FROM material;";
            $result = $this->conexion->query($sql);
            $row = $result->fetch_assoc();
            $idMat = $row['id'];


            $autores = $mat->getAutores(); 
            for ($i = 0; $i < count($autores); ++$i) {
                $stm = $this->conexion->prepare("
                Insert into material_has_autor
                (Autor_idAutor,Material_idMaterial) values (?,?);");
                $stm->bind_param("ii",$autores[$i],$idMat);
                $stm->execute();
            }
            
            $palabrasC = $mat->getPalabrasClave(); 
            for ($i = 0; $i < count($palabrasC); ++$i) {
                $stm = $this->conexion->prepare("
                Insert into palabraclave_has_material
                (PalabraClave_idPalabraClave,Material_idMaterial) values (?,?);");
                $stm->bind_param("ii",$palabrasC[$i],$idMat);
                $stm->execute();
            }
            
            $temas = $mat->getTemas();
            for($i = 0; $i < count($temas); ++$i){
                $stm = $this->conexion->prepare("
                Insert into material_has_tema (tema_idTema,Material_idMaterial) value (?,?);");
                $stm->bind_param("ii",$temas[$i],$idMat);
                $stm->execute();
            }
        }
    }
?>