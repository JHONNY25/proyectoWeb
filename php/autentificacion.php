<?php

require_once 'model/conexion.php';

class Login extends conexion{

    protected $usuario;
    protected $password;

    public function __construct()
    {
       parent::__construct(); 
    }

    public function sesion($usuario,$password){
        
        if (isset($_POST)) {
            $sesion = "";
            //borrar error antiguo
            if(isset($_SESSION['error_login'])){
                session_unset($_SESSION['error_login']);
            }
    
            //quito espacios que pueda ingresar usuario en campo de texto
            $user = trim($usuario);
    
            $sql = "select * from usuario where usuario = '$user' and contrasena='$password'";
            $user = mysqli_query($this->con,$sql);
    
    
            if ($user && mysqli_num_rows($user) == 1) {
                
                $arreglo = mysqli_fetch_assoc($user);
    
                $_SESSION['usuario'] = $arreglo;
                header("Location: formularios/presentacion.php");
                //comprobar la contraseña
               /* $verifica = password_verify($password, $arreglo['contrasena']);
    
                if($verifica){
                    $_SESSION['usuario'] = $arreglo;
                    $this->$valido=true;
    
                }else{
                    $_SESSION['error_login'] = "Sesión incorrecta, verifica tus datos";
                    $this->$valido= false;
                }*/
            }else{
                $_SESSION['error_login'] = "Sesión incorrecta, verifica tus datos";
                header("Location: ../index.php");
            }
    
        }
    
        
    }

    public function errorSesion(){
        $alerta = '';

        if (isset($_SESSION['error_login'] )) {
            $alerta = "<div class='alert alert-danger' role='alert'>".$_SESSION['error_login']."</div>";
        }

        return $alerta;
    }
}