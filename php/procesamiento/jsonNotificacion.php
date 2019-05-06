
<?php

require_once '../model/conexion.php';
$con = new Conexion();
$conect = $con->getConexion();

if(isset($_POST['dato'])){
   
    $id = $_POST['dato'];
    $sql = "call ver_detalle_notificacion('$id')";
    $result = mysqli_query($conect,$sql);
    $datos = mysqli_fetch_array($result);

    echo json_encode($datos);  
   
}


?>