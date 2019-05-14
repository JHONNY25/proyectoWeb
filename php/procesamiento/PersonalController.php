<?php
require_once DIR_DB . 'Personal.php';

class PersonalController {
    private $model;

    public function __contruct($model){
        $this->model = $model;
    }

    private function datosPost () {
        $modelo = new Personal();
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $modelo->id = $_POST['id'];
        }
        $modelo->nombre = $_POST['nombre'];
        $modelo->apellidoP = $_POST['apellido_p'];
        $modelo->apellidoM = $_POST['apellido_m'];
        $modelo->correo = $_POST['correo'];
        $modelo->telefono = $_POST['telefono'];
        $modelo->usuario = $_POST['usuario'];
        $modelo->contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
        return $modelo;
    }

    public function registrar() {
        $modelo = $this->datosPost();
        $modelo->registrar($modelo);
    }

    public function actualizar(){
        $modelo = $this->datosPost();
        $modelo->actualizar($modelo);
    }

    public function deshabilitar(){
        $id = $_POST['id'];
        $modelo = new Personal();
        $modelo->deshabilitar($id);
    }

    public function detalles() {
        $id = $_POST['id'];
        $modelo = new Personal();
        $resultado = $modelo->getPorId($id);
        echo json_encode($resultado);
    }

    public function crearNuevo(){
        $variable = 'Personal';
        require_once DIR_VIEWS . 'personal_template.php';
    }

    public function existeCorreo(){
        $correo = $_POST['correo'];
        $existe = Personal::existeCorreo($correo);
        echo json_encode($existe);
    }

    public function existeUsuario(){
        $usuario = $_POST['usuario'];
        $existe = Personal::existeUsuario($usuario);
        echo json_encode($existe);
    }

    public function getListaPersonas(){
        $modelo = new Personal();
        $lista = $modelo->getLista();
        echo json_encode($lista);
    }

    public function index() {
        $modelo = new Personal();
        $lista = $modelo->getLista();
        require_once DIR_VIEWS . 'personal_tabla_template.php';
    }
}