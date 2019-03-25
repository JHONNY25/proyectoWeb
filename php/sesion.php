<?php
require_once 'autentificacion.php';

if(!empty($_POST)){
    $user = $_POST['usuario'];
    $password = $_POST['pass'];
    
    $autentificacion = new Login();
    $sesion = $autentificacion->sesion($user,$password);
    

}
