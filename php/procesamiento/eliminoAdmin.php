<?php

require_once '../model/conexion.php';
$con = new Conexion();
$conect = $con->getConexion();

if(!empty($_POST)){
    $identificador = $_POST['id'];

//$identificador = 19;

    
    $sql = "CALL deshabilitar_persona_administrador('$identificador')";

    echo mysqli_query($conect,$sql);
}


?>