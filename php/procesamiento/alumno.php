<?php

require_once '../model/conexion.php';

class Alumno extends Conexion{

    protected $nombre;
    protected $apellidoPaterno;
    protected $apellidoMaterno;
    protected $numControl;
    protected $carrera;


    public function getNombre(){
        return $this->nombre;
    }

    public function getApellidoPaterno(){
        return $this->apellidoPaterno;
    }

    public function getApellidoMaterno(){
        return $this->apellidoMaterno;
    }

    public function getNumControl(){
        return $this->numControl;
    }

    public function getCarrera(){
        return $this->carrera;
    }


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

    public function listarAlumnoSinServicio(){
        $sql = "CALL alumnos_sin_servicio()";
        $ejecuta = $this->con->query($sql); 

        $respuesta = $ejecuta->fetch_all(MYSQLI_ASSOC);

        if($respuesta){
            return $respuesta;

            $respuesta->close();
            $this->con->close();
        }
    }

    public function verAlumno($id){
        $sql = "CALL ver_alumno('$id')";
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

    public function listarAlumnoServicio(){
        $sql = "CALL ver_todos_alumnos_servicio()";
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


    public function documentosAceptados($id){
        $sql = "CALL documentos_aceptados($id)";
        $ejecuta = $this->con->query($sql); 

        $respuesta = $ejecuta->fetch_all(MYSQLI_ASSOC);

        if($respuesta){
            return $respuesta;

            $respuesta->close();
            $this->con->close();
        }
    }


    public function detallesAlumno($id){
        $sql = "CALL detallesAlumno('$id')";
        $user = mysqli_query($this->con,$sql);

        while($row = mysqli_fetch_array($user)){
            $this->nombre = $row['nombre'];
            $this->apellidoPaterno = $row['apellido_paterno'];
            $this->apellidoMaterno = $row['apellido_materno'];
            $this->numControl = $row['numero_control'];
            $this->carrera = $row['carrera'];
        }
    }


    public function existeAlumnoServicio($id){

        $sql = "call existe_alumno_servicio($id)";
        $query = mysqli_query($this->con,$sql);

        if ($query && mysqli_num_rows($query) == 1) {
            return true;
        }else{
            return false;
        }
        $this->con->close();
    }

    public function getPersonal(){
        $sql = "CALL ver_persona_administrador_usuario()";
        $ejecuta = $this->con->query($sql);

        $respuesta = $ejecuta->fetch_all(MYSQLI_ASSOC);

        if($respuesta){
            return $respuesta;

            $respuesta->close();
            $this->con->close();
        }
    }
}
