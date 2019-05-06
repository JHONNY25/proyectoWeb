
<?php

require_once '../model/conexion.php';

$con = new Conexion();
$conect = $con->getConexion();

$identificador = $_POST['id'];

//$identificador = 19;

    
    $sql = "call eliminar_notificacion('$identificador')";

    echo mysqli_query($conect,$sql);

?>