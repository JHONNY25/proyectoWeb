<?php
class Sesion {
    
    public function __construct()
    {
        session_start();
    }

    public function setSesion($user){
        $_SESSION['usuario'] = $user;
    }

    public function getSesion(){
        return $_SESSION['usuario'];
    }

    public function cerrarSesion(){
        session_unset();
        session_destroy();
    }
}

