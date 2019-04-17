<?php
require_once 'publicaciones.php';
require_once '../model/conexion.php';
$publicacion = new Publicacion();
$con = new Conexion();
$conect = $con->getConexion();

if(isset($_POST['dato'])){
   
    $id = $_POST['dato'];
    $sql = "call ver_detalle_publicacion('$id')";
    $result = mysqli_query($conect,$sql);
    $datos = mysqli_fetch_array($result);

    echo json_encode($datos);  
   
}
/*
$sql = "call ver_detalle_publicacion('2')";
$result = mysqli_query($conect,$sql);
$datos = mysqli_fetch_assoc($result);
//$array = array($datos);

echo json_encode($datos); */
  

?>