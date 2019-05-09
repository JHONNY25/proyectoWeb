
<?php

require_once '../model/conexion.php';
$con = new Conexion();
$conect = $con->getConexion();

$identificador = $_POST['id'];

//$identificador = 19;

    
    $sql = "call modificar_estado_alumno('$identificador',0)";

    echo mysqli_query($conect,$sql);

?>