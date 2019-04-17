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

    echo $result;  
   
}

?>