<?php
    include "conexion.php";
    function recuperarUEAs(){
        include "conexion.php";
        $query = "SELECT uea.idUEA,uea.nombreUEA, uea.claveUEA, uea.descripcion,
                         temario.idTemario,temario.Nombre as nombreTemario
                         from temario inner join uea 
                         on temario.UEA_idUEA = uea.idUEA;";
        $result = mysqli_query($conn,$query);
        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[]=array (
                "idUEA" => $row['idUEA'],
                "nombre" => $row['nombreUEA'],
                "clave" => $row['claveUEA'],
                "descripcion" => $row['descripcion'],
                "idTemario" => $row['idTemario'],
                "nombreTemario" => $row['nombreTemario']
            );
        }
        return $json;
    } 
    
    function recuperarTemas(){
        include "conexion.php";
        $query = "SELECT  tema.idTema, tema.Nombre as nombreTema,idTemario from tema 
        inner join temario on temario.idTemario = tema.Temario_idTemario 
        inner join uea on uea.idUEA = temario.UEA_idUEA;";
        $result = mysqli_query($conn,$query);
        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] = array(
                "idTema" => $row['idTema'],
                "nombreTema" => $row['nombreTema'],
                "idTemario" => $row['idTemario']
            );
        }
        return $json;
    }

    function recuperarMateriales(){
        include "conexion.php";
        $query = "SELECT idTemario, idTema, material.tipomaterial_idTipoMaterial as idTipoMat ,material.Nombre as nombreMaterial, material.URL from tema 
        inner join material_has_tema on tema.idTema = material_has_tema.tema_idTema 
        inner join material on material_has_tema.material_idMaterial = material.idMaterial 
        inner join temario on tema.Temario_idTemario = temario.idTemario;";
        $result = mysqli_query($conn,$query);
        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json [] = array(
                "idTemario" => $row['idTemario'],
                "idTema" => $row['idTema'],
                "idTipoMat" => $row['idTipoMat'],
                "nombreMaterial" => $row['nombreMaterial'],
                "url" => $row['URL']
            );
        }
        return $json;
    }
?>