
<?php
require_once '../model/conexion.php';

class Publicacion extends Conexion{

    protected $titulo;
    protected $descripcion;
    protected $fecha;
    protected $vacantes;
    protected $estado;
    protected $idClasificacion;
    protected $nombreClasificacion;
    protected $idInstitucion;
    protected $clasificacion;

    public function __construct(){
        parent::__construct();
    }
    
    public function getTitulo(){
        return $this->titulo;
    }

    public function getCalsificacion(){
        return $this->clasificacion;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getVacantes(){
        return $this->vacantes;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function getIdClasificacion(){
        return $this->idClasificacion;
    }

    public function getNombreClasificacion(){
        return $this->nombreClasificacion;
    }


    public function getPublicacionesAceptadas($estado){
        $sql = "call ver_publicacion_bancos('$estado')";
        $query = $this->con->query($sql);

        $respuesta = $query->fetch_all(MYSQLI_ASSOC);

        if($respuesta){
            return $respuesta;

            $respuesta->close();
            $this->con->close();
        }

    }

    public function getPublicaciones($estado,$clasificacion){
        $sql = "call ver_publicacion_tipo('$estado','$clasificacion')";
        $query = $this->con->query($sql);

        $respuesta = $query->fetch_all(MYSQLI_ASSOC);

        if($respuesta){
            return $respuesta;

            $respuesta->close();
            $this->con->close();
        }

    }

    public function postPublicaciones(){


        $this->con->close();
    }

    public function getClasificacion(){

        $this->con->close();
    }

    public function getIdInstitucion(){

        $this->con->close();
    }
}

?>