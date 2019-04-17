
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
    protected $carrera;

    public function __construct(){
        parent::__construct();
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getCarrera(){
        return $this->carrera;
    }

    public function getClasificacion(){
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

    public function getDetallePublicacion($id){
        $sql = "call ver_detalle_publicacion('$id')";
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

    public function postPublicaciones($titulo,$descripcion,$vacantes,$usuario,$institucion,$clasificacion,$carrera){
        $sql = "call registrar_publicacion_bancos('$titulo','$descripcion','$vacantes','$usuario','$institucion','$clasificacion','$carrera')";

        $post = mysqli_query($this->con,$sql);
        return $post;
        /*$stmtInsert = $this->con->prepare($sql);

        $stmtInsert->bind_param("ssiiiii", $titulo, $descripcion, $vacantes, $usuario, 
        $institucion, $clasificacion, $carrera);
        $stmtInsert->execute();
        $stmtInsert->close();*/
    }

    public function deletePublicacion($id){
        $sql = "call eliminar_publicacion('$id')";

        mysqli_query($this->con,$sql);

    }

    public function getClasificacionPublic(){
        $sql = "call ver_clasificacion_publicacion()";

        $query = $this->con->query($sql);

        $respuesta = $query->fetch_all(MYSQLI_ASSOC);

        if($respuesta){
            return $respuesta;

            $respuesta->close();
            $this->con->close();
        }
    }

    public function getCarreras(){
        $sql = "call ver_carrera()";

        $query = $this->con->query($sql);

        $respuesta = $query->fetch_all(MYSQLI_ASSOC);

        if($respuesta){
            return $respuesta;

            $respuesta->close();
            $this->con->close();
        }
    }

    public function getIdInstitucion($usuario){
        $sql = "call get_identificador('$usuario')";

        $query = $this->con->query($sql);

        $respuesta = $query->fetch_all(MYSQLI_ASSOC);

        if($respuesta){
            return $respuesta;

            $respuesta->close();
            $this->con->close();
        }
    }
}

?>