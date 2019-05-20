<?php


require_once '../model/conexion.php';
require_once '../user.php';
require_once '../sesion.php';
$con = new Conexion();
$conect = $con->getConexion();
$user = new User();
$sesion = new Sesion();



if(!empty($_POST)){         
    $id = filter_var($_POST["id"], FILTER_VALIDATE_INT);

    $user->contrasena($id);
    $password = $user->getContra();


        if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
            $nombre = htmlspecialchars(strip_tags(trim($_POST["nombre"])), ENT_QUOTES);
        }
         
        if(isset($_POST['telefono']) && !empty($_POST['telefono'])){
            $telefono = htmlspecialchars(strip_tags(trim($_POST["telefono"])), ENT_QUOTES);
        }
    
        if(isset($_POST['correo']) && !empty($_POST['correo'])){
            $correo = htmlspecialchars(strip_tags(trim($_POST["correo"])), ENT_QUOTES);
        }
    
        if(isset($_POST['apellido_p']) && !empty($_POST['apellido_p'])){
            $apellido_p = htmlspecialchars(strip_tags(trim($_POST["apellido_p"])), ENT_QUOTES);
        }
        
        if(isset($_POST['apellido_m']) && !empty($_POST['apellido_m'])){
            $apellido_m = htmlspecialchars(strip_tags(trim($_POST["apellido_m"])), ENT_QUOTES);
        }

    
        if(isset($_POST['rep_contra']) && !empty($_POST['rep_contra'])){
            $pass2 = htmlspecialchars(strip_tags(trim($_POST["rep_contra"])), ENT_QUOTES);
    
            $password = password_hash($pass2,PASSWORD_BCRYPT,['cost'=>4]);
        }
    
        if(isset($_POST['id']) && !empty($_POST['id'])){
            $id = filter_var($_POST["id"], FILTER_VALIDATE_INT);
        }

        
        $sql = "call modificar_persona_administrador('$id','$password','$nombre','$apellido_p','$apellido_m','$correo','$telefono')";


    echo mysqli_query($conect,$sql);
}

?>