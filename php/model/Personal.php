<?php
require_once DIR_DB . 'conexion.php';

class Personal{
    private $cx;
    public $id;
    public $nombre;
    public $apellidoP;
    public $apellidoM;
    public $correo;
    public $telefono;
    public $usuario;
    public $contrasena;
    public $repContrasena;

    public function __construct($cx = null){
    }

    private function getDb($cx = null){
        if ($cx !== null) {
            try {
                $this->cx = $cx->getConexion();
            } catch(Exception $e) {}
        } else {
            try {
                $this->cx = new Conexion();
                $this->cx = $this->cx->getConexion();
            } catch(Exception $e) {}
        }
    }

    private static function getDb2(){
        if (!isset($cx2) or $cx2 === NULL){
            try {
                $cx2 = new Conexion();
                $cx2 = $cx2->getConexion();
            } catch(Exception $e) {}
        }

        return $cx2;
    }
    
    public function registrar($modelo){
        $query = "
            CALL registrar_persona_administrador(?,?,?,?,?,?,?);
        ";

        $this->getDb();
        
        if (!($stmt = $this->cx->prepare($query))) {
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }

        if (!$stmt->bind_param(
            "sssssss",
            $modelo->usuario,
            $modelo->contrasena,
            $modelo->nombre,
            $modelo->apellidoP,
            $modelo->apellidoM,
            $modelo->correo,
            $modelo->telefono
            )) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }        

        if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
    }

    public function actualizar($modelo){
        $query = "
            CALL modificar_persona_administrador(?,?,?,?,?,?,?,?);
        ";

        $this->getDb();
        
        if (!($stmt = $this->cx->prepare($query))) {
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }

        if (!$stmt->bind_param(
            "isssssss",
            $modelo->id,
            $modelo->usuario,
            $modelo->contrasena,
            $modelo->nombre,
            $modelo->apellidoP,
            $modelo->apellidoM,
            $modelo->correo,
            $modelo->telefono
            )) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }        

        if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
    }

    public function deshabilitar($id){
        $query = "
            CALL deshabilitar_persona_administrador(?);
        ";

        $this->getDb();
        
        if (!($stmt = $this->cx->prepare($query))) {
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }

        if (!$stmt->bind_param(
            "i",
            $id
            )) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }        

        if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
    }

    public static function existeUsuario($usuario){
        $query = "CALL existe_usuario(?, @ex);";
        $query2 = "SELECT @ex AS ex;";
        $cx = self::getDb2();

        if (!($stmt = $cx->prepare($query))) {
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }

        if (!$stmt->bind_param(
            "s",
            $usuario
            )) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }        

        if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $existe = NULL;
        $rs = $cx->query($query2);
        while ($row = $rs->fetch_assoc()) {
            $existe = (bool) $row['ex'];
        }

        $array = array("existe" => $existe);
        
        return $array;
    }

    public static function existeCorreo($correo){
        $query = "CALL existe_correo(?, @ex);";
        $query2 = "SELECT @ex AS ex;";
        $cx = self::getDb2();

        if (!($stmt = $cx->prepare($query))) {
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }

        if (!$stmt->bind_param(
            "s",
            $correo
            )) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }        

        if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $existe = NULL;
        $rs = $cx->query($query2);
        while ($row = $rs->fetch_assoc()) {
            $existe = (bool) $row['ex'];
        }

        $array = array("existe" => $existe);
        
        return $array;
    }

    public function getPorId($id){
        if(!is_numeric($id))throw new Exception('El id debe ser numerico');
        $query = "
            CALL ver_persona_administrador(?);
        ";

        $cx = self::getDb2();
        //$this->getDb();
        
        if (!($stmt = $cx->prepare($query))) {
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }

        if (!$stmt->bind_param("i", $id)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }        

        if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $actual=$this->hidratar($row);

        return $actual;
    }

    private function hidratar($row){
        $actual = new Personal();
        $actual->id = $row['id_persona'];
        $actual->nombre = $row['nombre'];
        $actual->apellidoP = $row['apellido_paterno'];
        $actual->apellidoM = $row['apellido_materno'];
        $actual->correo = $row['correo'];
        $actual->telefono = $row['telefono'];
        $actual->usuario = $row['usuario'];
        $actual->contrasena = $row['contrasena'];
        return $actual;
    }

    public function getLista(){
        $id = NULL;
        $query = "
            CALL ver_persona_administrador(?);
        ";

        $this->getDb();
        
        if (!($stmt = $this->cx->prepare($query))) {
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }

        if (!$stmt->bind_param("i", $id)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }        

        if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }

        $result = $stmt->get_result();

        $lista = array();
        while($row = $result->fetch_assoc()){
            $lista[] = $this->hidratar($row);
        }
        return $lista;
    }
}