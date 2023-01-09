<?php
    include "../Modelo/conexion.php";
    include "../Modelo/PalabraClaveDAO.php";

    if(isset($_POST)){
        $pcDAO = new PalabraClaveDAO($conn);

        $descrip = $_POST['descrip'];
        $pc= new PalabraClave(1,$descrip);
        $pcDAO->insertarPC($pc);
        echo "ok";
    }

?>