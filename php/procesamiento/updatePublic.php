<?php

require_once 'publicaciones.php';
require_once '../sesion.php';
require_once '../user.php';
require_once '../model/conexion.php';
$publicacion = new Publicacion();
$sesion = new Sesion();
$user = new User();
$con = new Conexion();
$conect = $con->getConexion();

if(!empty($_POST)){
    $vacantes = 0;
    if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
        $titulo = htmlspecialchars(strip_tags(trim($_POST["titulo"])), ENT_QUOTES);
    }
    
    if(isset($_POST['carrera']) && !empty($_POST['carrera'])){
        $carrera = filter_var($_POST["carrera"], FILTER_VALIDATE_INT);
    }
    
    
    if(isset($_POST['vacantes']) && !empty($_POST['vacantes'])){
        $vacantes = filter_var($_POST["vacantes"], FILTER_VALIDATE_INT);
    }

    if(isset($_POST['tipo']) && !empty($_POST['tipo'])){
        $tipo = filter_var($_POST["tipo"], FILTER_VALIDATE_INT);
    }

    if(isset($_POST['id']) && !empty($_POST['id'])){
        $id = filter_var($_POST["id"], FILTER_VALIDATE_INT);
    }
    
    if(isset($_POST['descripcion']) && !empty($_POST['tipo'])){
        $descripcion = htmlspecialchars(strip_tags(trim($_POST["descripcion"])), ENT_QUOTES);
    }
    
    $idusuario = 0;
    $institucion = 0;

    
    $user->setUser($sesion->getSesion());
    $usuario = $user->getNombre();
    
    $dato = $publicacion->getIdInstitucion($usuario);
    
    if($dato){
    
        foreach ($dato as $row) {
            $idusuario = $row['id_usuario'];
            $institucion = $row['id_institucion'];
        }
    
    }else{
        echo 'no hay datos de institucion';
    }
    
    $sql = "call modificar_publicacion_bancos('$id','$titulo','$descripcion','$vacantes','$idusuario','$institucion','$tipo','$carrera')";
    
    echo mysqli_query($conect,$sql);
}

?>