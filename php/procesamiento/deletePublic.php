
<?php

require_once '../sesion.php';
require_once '../user.php';
require_once '../model/conexion.php';
$sesion = new Sesion();
$user = new User();
$con = new Conexion();
$conect = $con->getConexion();

$identificador = $_POST['id'];

//$identificador = 19;

    
    $sql = "call eliminar_publicacion('$identificador')";

    echo mysqli_query($conect,$sql);

?>