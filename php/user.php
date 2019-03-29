<?php

    require_once 'model/conexion.php';

    class User extends Conexion{
        
        protected $usuario;
        protected $pass;

        //datos de usuario
        protected $carrera;
        protected $nombrePersona;
        protected $apellidoPaterno;
        protected $apellidoMaterno;
        protected $correo;
        protected $telefono;
        protected $num_control;


        public function getNombre(){
            return $this->usuario;
        }

        public function getNombrePersona(){
            return $this->nombrePersona;
        }

        public function getCarrera(){
            return $this->carrera;
        }

        public function getApellidoP(){
            return $this->apellidoPaterno;
        }

        public function getApellidoM(){
            return $this->apellidoMaterno;
        }

        public function getCorreo(){
            return $this->correo;
        }

        public function getTelefono(){
            return $this->telefono;
        }

        public function getNumeroControl(){
            return $this->num_control;
        }
        public function existeUsuario($usuario, $password){
            $user = trim($usuario);
    
            $sql = "select * from usuario where usuario = '$user' and contrasena='$password'";
            $user = mysqli_query($this->con,$sql);
    
    
            if ($user && mysqli_num_rows($user) == 1) {
                return true;
                //comprobar la contraseña
               /* 
               $arreglo = mysqli_fetch_assoc($user);
               $verifica = password_verify($password, $arreglo['contrasena']);
    
                if($verifica){
                    return true
    
                }else{
                    return false;
                }*/
            }else{
                return false;
            }
        }

        public function setUser($usuario){
            $user = trim($usuario);
    
            $sql = "select * from usuario where usuario = '$user'";
            $user = mysqli_query($this->con,$sql);

            while($row = mysqli_fetch_array($user)){
                $this->usuario = $row['usuario'];
            }
        }



        public function getDetallesUsuario($usuario){
            $user = trim($usuario);
    
            $sql = "CALL getDetallesUsuario('$user')";
            $user = mysqli_query($this->con,$sql);

            while($row = mysqli_fetch_array($user)){
                $this->nombrePersona = $row['nombre'];
                $this->apellidoPaterno = $row['apellido_paterno'];
                $this->apellidoMaterno = $row['apellido_materno'];
                $this->correo = $row['correo'];
                $this->telefono = $row['telefono'];

                if(isset($row['numero_control']) && isset($row['carrera'])){
                    $this->num_control= $row['numero_control'];
                    $this->carrera = $row['carrera'];
                }
            }
        }

        public function NombrePersona($usuario){
            $user = trim($usuario);
    
            $sql = "CALL getNombreUsuario('$user')";
            $user = mysqli_query($this->con,$sql);

            while($row = mysqli_fetch_array($user)){
                $this->nombrePersona = $row['nombre'];
            }
        }

    }

?>