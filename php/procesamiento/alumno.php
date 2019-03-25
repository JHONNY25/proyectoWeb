<?php

require_once '../model/conexion.php';

class Alumno extends Conexion{

    public function __construct(){
        parent::__construct();
    }

    public function listarAlumno(){
        $sql = "CALL ver_persona_alumno()";
        $ejecuta = $this->con->query($sql);

        $respuesta = $ejecuta->fetch_all(MYSQLI_ASSOC);

        if($respuesta){
            return $respuesta;

            $respuesta->close();
            $this->con->close();
        }
    }

    public function registrarAlumno(){
        
    }

    public function modificarAlumno(){
        
    }
}