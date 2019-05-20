
<?php

require_once '../model/conexion.php';
$con = new Conexion();
$conect = $con->getConexion();

if(!empty($_POST['usuario']) && !empty($_POST['documento'])){
    $id = $_POST['usuario'];
    $id_documento = $_POST['documento'];

    $sql = "call aceptar_documento('$id','$id_documento',1)";
    echo mysqli_query($conect,$sql);

}


?>