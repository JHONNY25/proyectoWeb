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
        protected $tipo;
        protected $colonia;
        protected $calle;
        protected $municipio;
        protected $id;

        public function getColonia(){
            return $this->colonia;
        }

        public function getId(){
            return $this->id;
        }

        public function getCalle(){
            return $this->calle;
        }

        public function getMunicipio(){
            return $this->municipio;
        }

        public function getTipo(){
            return $this->tipo;
        }

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

        public function getContra(){
            return $this->pass;
        }

        public function existeUsuario($usuario, $password){
            $user = trim($usuario);
    
            $sql = "select * from usuario where usuario = '$user' && estado =1";
            $query = mysqli_query($this->con,$sql);
    
    
            if ($query && mysqli_num_rows($query) == 1) {
                
                //comprobar la contraseña
               
               $arreglo = mysqli_fetch_assoc($query);
               $verifica = password_verify($password, $arreglo['contrasena']);
    
                if($verifica){
                    return true;
    
                }else{
                    return false;
                }
            }else{
                return false;
            }
            $this->con->close();
        }

        public function setUser($usuario){
            $user = trim($usuario);
    
            $sql = "select * from usuario where usuario = '$user'";
            $user = mysqli_query($this->con,$sql);

            while($row = mysqli_fetch_array($user)){
                $this->usuario = $row['usuario'];
                $this->tipo = $row['tipo_usuario'];
                $this->pass = $row['contrasena'];
                $this->id = $row['id_usuario'];
            }
        }



        public function getDetallesUsuario($usuario){
            $user = trim($usuario);
    
            $sql = "CALL getDetallesUsuario('$user')";
            $user = mysqli_query($this->con,$sql);

            while($row = mysqli_fetch_array($user)){

                
                $this->nombrePersona = $row['nombre'];
                $this->id = $row['id_usuario'];

                if($row['tipo_usuario'] == 1 || $row['tipo_usuario'] == 0){
                    $this->apellidoPaterno = $row['apellido_paterno'];
                    $this->apellidoMaterno = $row['apellido_materno'];
                }else if($row['tipo_usuario'] == 2){
                    $this->colonia = $row['colonia'];
                    $this->calle = $row['calle'];
                    $this->municipio = $row['municipio'];
                }
                //hacer condicion de asignacion de datos respecto al tipo de usuario
                $this->correo = $row['correo'];
                $this->telefono = $row['telefono'];
                $this->tipo = $row['tipo_usuario'];

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