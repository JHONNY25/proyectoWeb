<?php

require_once '../model/conexion.php';
$con = new Conexion();
$conect = $con->getConexion();

$identificador = $_GET['al'];

//$identificador = 19;


    $sql = "call ver_alumnno_carta('$identificador')";
    $result = mysqli_query($conect,$sql);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $nControl = $row["numero_control"];
    }
} else {
}


?>
