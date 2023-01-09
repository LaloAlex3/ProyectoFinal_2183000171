<?php
    include "../Controlador/Clases/Administrador.php";

    class AdminDAO{
        public $conexion;
        public function __construct($conexion){
            $this->conexion = $conexion;
        }
        public function __destruct(){}

        public function buscarAdmin(Admin $a){
            $user = $a->getUser();
            $contra = $a->getContrasena();  
            //echo "<script>console.log($user); console.log($contra);</script>"

            //validamos que lo que venga en los parametros que pasaron sean validos
            //$user = $conexion->escape($user);
            //$contra = $conexion->escape($contra);
            $sql = "SELECT * FROM admin where usuario ='$user' and contrasena ='$contra';" ;
            $result = $this->conexion->query($sql);
            if ($row = $result->fetch_assoc()) {
                return $d = $row['idAdmin'];
            }else{
                return 0;
            }
        }
        public function GuardarAdmin(Admin $admin){
            $nombre = $admin->getNombre();
            $apP = $admin->getApP();
            $apM = $admin->getApM();
            $user = $admin->getUser();
            $contra = $admin->getContrasena(); 

            $stm = $this->conexion->prepare(
                "INSERT INTO admin (usuario,contrasena,nombre,apellidoP,apellidoM) values (?,?,?,?,?);");
            $stm->bind_param("sssss",$user,$contra,$nombre,$apP,$apM);
            $stm->execute();
            $stm->close();
        }
    }
?>