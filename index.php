<?php

require_once 'php/user.php';
require_once 'php/sesion.php';

$user = new User();
$sesion = new Sesion();

if (isset($_SESSION['usuario'])) {
     //echo 'existe sesion';

     $user->setUser($sesion->getSesion());
     require_once 'php/formularios/presentacion.php';
}else if(isset($_POST['usuario']) && isset($_POST['pass'])){
    //echo 'validacion';

    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];


    if($user->existeUsuario($usuario,$pass)){

            $user->setUser($usuario);
            $sesion->setSesion($usuario);

            require_once 'php/formularios/presentacion.php';
    }else{
        $errorLogin = "Sesión incorrecta, verifique sus datos.";
        require_once 'php/autentificacion.php';
    }
}else{ 
    //echo 'login';
    require_once 'php/autentificacion.php';
}
?>