<?php

require_once '../model/conexion.php';
$con = new Conexion();
$conect = $con->getConexion();

if(!empty($_POST['usuario']) && !empty($_POST['documento'])){
    $id = $_POST['usuario'];
    $id_documento = $_POST['documento'];

    $sql = "call registrar_documento2('carta','DocumentoAcept',null,'$id','$id_documento')";
    echo mysqli_query($conect, $sql);

}


?>