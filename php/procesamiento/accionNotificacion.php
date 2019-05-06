
<?php

require_once '../sesion.php';
require_once '../user.php';
require_once '../model/conexion.php';
$sesion = new Sesion();
$user = new User();
$con = new Conexion();
$conect = $con->getConexion();

if(!empty($_POST)){
    
    if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
        $titulo = htmlspecialchars(strip_tags(trim($_POST["titulo"])), ENT_QUOTES);
    }
    
    if(isset($_POST['mensaje']) && !empty($_POST['mensaje'])){
        $mensaje = htmlspecialchars(strip_tags(trim($_POST["mensaje"])), ENT_QUOTES);
    }

    if(isset($_POST['id']) && !empty($_POST['id'])){
        $id = filter_var($_POST["id"], FILTER_VALIDATE_INT);
    }

    if(empty($_POST['id'])){
        $user->setUser($sesion->getSesion());
        $idusuario = $user->getId();
        
        $sql = "call registrar_notificacion('$titulo','$mensaje','$idusuario')";
    }else{

        $user->setUser($sesion->getSesion());
        $idusuario = $user->getId();
        
        $sql = "call modificar_notificacion('$id','$titulo','$mensaje','$idusuario')";
    }

    
    
    echo mysqli_query($conect,$sql);
}

?>