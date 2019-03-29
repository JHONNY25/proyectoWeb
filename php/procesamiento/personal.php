<?php

require_once '../model/conexion.php';

class Personal extends Conexion{

    public function __construct(){
        parent::__construct();
    }

    public function listarPersonas(){
        $sql = "CALL ver_persona_administrador()";
        $ejecuta = $this->con->query($sql);

        $respuesta = $ejecuta->fetch_all(MYSQLI_ASSOC);

        if($respuesta){
            return $respuesta;

            $respuesta->close();
            $this->con->close();
        }
    }

    public function registrarPersonas(){

    }

    public function modificarPersonas(){

    }
}
?>
