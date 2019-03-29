<?php

require_once 'config.php';

class Conexion {
    protected $con;

    public function __construct(){
        $this->con= new mysqli(
            BD_HOST,
            BD_USER,
            BD_PASS,
            BD_NOMBRE
        );

        if($this->con -> connect_errno){
            echo "Hubo un fallo de conexion: ".$this->con->connect_errno;
            return;
        }

        $this->con->set_charset(BD_CHARSET);
        
    }


}

?>