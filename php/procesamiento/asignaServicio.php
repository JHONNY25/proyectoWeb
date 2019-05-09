
<?php

require_once '../model/conexion.php';
$con = new Conexion();
$conect = $con->getConexion();

if(!empty($_POST)){
    $idpersona = $_POST['persona'];
    $idpublicacion = $_POST['publicacion'];

    
    $sql = "call registrar_servicio_alumno('$idpersona','$idpublicacion')";

    echo mysqli_query($conect,$sql);
}


?>