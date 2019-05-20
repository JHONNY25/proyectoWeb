
<?php

require_once '../sesion.php';
require_once '../user.php';
require_once '../model/conexion.php';

$con = new Conexion();
$conect = $con->getConexion();

$sesion = new Sesion();
$user = new User();


if(!empty($_POST)){

    $user->setUser($sesion->getSesion());
	$usuario = $user->getNombre();
	$user->getDetallesUsuario($usuario);

    $tipo = $user->getTipo();
    $id = $user->getId();

    $mensaje = htmlspecialchars(strip_tags(trim($_POST["coments"])), ENT_QUOTES);

    if ($tipo == 1) {

        $sql = "call registrar_comentario('$mensaje','$id',0)";

    }
    
    if($tipo == 0){
        $id_alumno = filter_var($_POST["id"], FILTER_VALIDATE_INT);

        $sql = "call registrar_comentario('$mensaje','$id','$id_alumno')";
    }

    echo mysqli_query($conect,$sql);
}


?>