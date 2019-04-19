<?php

require_once '../model/conexion.php';

class Alumno extends Conexion{

    public function __construct(){
        parent::__construct();
    }

    public function listarAlumno(){
        $sql = "CALL ver_alumnnos_activos()";
        $ejecuta = $this->con->query($sql);

        $respuesta = $ejecuta->fetch_all(MYSQLI_ASSOC);

        if($respuesta){
            return $respuesta;

            $respuesta->close();
            $this->con->close();
        }
    }

    public function listarAlumnoInactivo(){
        $sql = "CALL ver_alumnnos_inactivos()";
        $ejecuta = $this->con->query($sql);

        $respuesta = $ejecuta->fetch_all(MYSQLI_ASSOC);

        if($respuesta){
            return $respuesta;

            $respuesta->close();
            $this->con->close();
        }
    }

    public function rechazarAlumno($control){
        $sql = "CALL rechazar_alumno()";
        $ejecuta = $this->con->query($sql);
        mysqli_query($this->con,$sql);
    }

    public function registrarAlumno(){

    }

    public function modificarAlumno($control){
      $sql = "CALL modificar_estado_usuario()";
      $ejecuta = $this->con->query($sql);
      mysqli_query($this->con,$sql);

    }
}
