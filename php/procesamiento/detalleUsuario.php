<?php

require_once '../model/conexion.php';
require_once '../sesion.php';
require_once '../user.php';
$user = new User();
$sesion = new Sesion();

$con = new Conexion();
$conect = $con->getConexion();

$user->setUser($sesion->getSesion());
$usuario = $user->getNombre();
$user->getDetallesUsuario($usuario); 

 
    $sql = "call getDetallesUsuario('$usuario')";
    $result = mysqli_query($conect,$sql);
    $datos = mysqli_fetch_array($result);

    echo json_encode($datos);  

?>