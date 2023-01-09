<?php
    include "conexion.php";
    function recuperarTipoMaterial(){
        include "conexion.php";
        $query = "SELECT * FROM tipomaterial";
        $result = mysqli_query($conn, $query); 
        $json = array(); 
        while ($row = mysqli_fetch_array($result)) {
            $json[] = array(
                "idTM" => $row['idTipoMaterial'],
                "descrip" => $row['Descripcion']
            );
        }
        return $json;
    }
    function recuperarTemas(){
        include "conexion.php";
        $query = "SELECT * FROM tema";
        $result = mysqli_query($conn, $query); 
        $json = array(); 
        while ($row = mysqli_fetch_array($result)) {
            $json[] = array(
                "idTema" => $row['idTema'],
                "Nombre"=> $row['Nombre'],
                "idTemario" => $row['Temario_idTemario']
            );
        }
        return $json;
    }
    function recuperarAutores(){
        include "conexion.php";
        $query = "SELECT * FROM autor";
        $result = mysqli_query($conn, $query); 
        $json = array(); 
        while ($row = mysqli_fetch_array($result)) {
            $json[] = array(
                "idAutor" => $row['idAutor'],
                "Nombre" => $row['Nombre'],
                "ApP" => $row['ApellidoP'],
                "ApM" => $row['ApellidoM']
            );
        }
        return $json;
    }
    function recuperarPalabrasClave(){
        include "conexion.php";
        $query = "SELECT * FROM palabraclave order by idPalabraClave asc";
        $result = mysqli_query($conn, $query); 
        $json = array(); 
        while ($row = mysqli_fetch_array($result)) {
            $json[] = array(
                "idPC" => $row['idPalabraClave'],
                "desc" => $row['Descripcion']
            );
        }
        return $json;
    }

    function recuperarTemario(){
        include "conexion.php";
        $query = "SELECT idTemario, nombreUEA FROM temario inner join uea on UEA_idUEA = idUEA;";
        $result = mysqli_query($conn, $query); 
        $json = array(); 
        while ($row = mysqli_fetch_array($result)) {
            $json[] = array(
                "idTemario" => $row['idTemario'],
                "nombreUEA" => $row['nombreUEA']
            );
        }
        return $json;
    }
    function recuperarUEA(){
        include "conexion.php";
        $query = "SELECT idUEA,nombreUEA,claveUEA,descripcion,Nombre FROM uea inner join temario on UEA_idUEA = idUEA;";
        $result = mysqli_query($conn, $query); 
        $json = array(); 
        while ($row = mysqli_fetch_array($result)) {
            $json[] = array(
                "id" => $row['idUEA'],
                "nombreUEA" => $row['nombreUEA'],
                "clave" => $row['claveUEA'],
                "descrip" => $row['descripcion'],
                "temario" => $row['Nombre']
            );
        }
        return $json;
    }
?>