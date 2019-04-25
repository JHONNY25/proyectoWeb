<?php


require_once '../model/conexion.php';
require_once '../user.php';
require_once '../sesion.php';
$con = new Conexion();
$conect = $con->getConexion();
$user = new User();
$sesion = new Sesion();



if(!empty($_POST)){         
    $user->setUser($sesion->getSesion());
    $password = $user->getContra();

    if(isset($_POST['municipio'])){
        if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
            $nombre = htmlspecialchars(strip_tags(trim($_POST["nombre"])), ENT_QUOTES);
        }
        
        
        if(isset($_POST['telefono']) && !empty($_POST['telefono'])){
            $telefono = htmlspecialchars(strip_tags(trim($_POST["telefono"])), ENT_QUOTES);
        }
    
        if(isset($_POST['correo']) && !empty($_POST['correo'])){
            $correo = htmlspecialchars(strip_tags(trim($_POST["correo"])), ENT_QUOTES);
        }
    
        if(isset($_POST['municipio']) && !empty($_POST['municipio'])){
            $municipio = htmlspecialchars(strip_tags(trim($_POST["municipio"])), ENT_QUOTES);
        }
        
        if(isset($_POST['colonia']) && !empty($_POST['colonia'])){
            $colonia = htmlspecialchars(strip_tags(trim($_POST["colonia"])), ENT_QUOTES);
        }
    
        if(isset($_POST['calle']) && !empty($_POST['calle'])){
            $calle = htmlspecialchars(strip_tags(trim($_POST["calle"])), ENT_QUOTES);
        }
    
        if(isset($_POST['pass2']) && !empty($_POST['pass2'])){
            $pass2 = htmlspecialchars(strip_tags(trim($_POST["pass2"])), ENT_QUOTES);
    
            $password = password_hash($pass2,PASSWORD_BCRYPT,['cost'=>4]);
        }
    
        if(isset($_POST['id']) && !empty($_POST['id'])){
            $id = filter_var($_POST["id"], FILTER_VALIDATE_INT);
        }
        
        
        $sql = "call modificar_institucion_todo('$id','$password','$nombre','$telefono','$correo','$calle','$colonia','$municipio')";
      
    }

    if(isset($_POST['correo2'])){

        if(isset($_POST['telefono']) && !empty($_POST['telefono'])){
            $telefono = htmlspecialchars(strip_tags(trim($_POST["telefono"])), ENT_QUOTES);
        }
    
        if(isset($_POST['correo2']) && !empty($_POST['correo2'])){
            $correo = htmlspecialchars(strip_tags(trim($_POST["correo2"])), ENT_QUOTES);
        }


        if(isset($_POST['pass2']) && !empty($_POST['pass2'])){
            $pass2 = htmlspecialchars(strip_tags(trim($_POST["pass2"])), ENT_QUOTES);
    
            $password = password_hash($pass2,PASSWORD_BCRYPT,['cost'=>4]);
        }
    
        if(isset($_POST['id2']) && !empty($_POST['id2'])){
            $id = filter_var($_POST["id2"], FILTER_VALIDATE_INT);
        }
       
        $sql = "call modificar_alumno('$id','$password','$correo','$telefono')";
     
    }
  
    if(isset($_POST['apeP'])){
        if(isset($_POST['nombre2']) && !empty($_POST['nombre2'])){
            $nombre = htmlspecialchars(strip_tags(trim($_POST["nombre2"])), ENT_QUOTES);
        }
        
        
        if(isset($_POST['telefono2']) && !empty($_POST['telefono2'])){
            $telefono = htmlspecialchars(strip_tags(trim($_POST["telefono2"])), ENT_QUOTES);
        }
    
        if(isset($_POST['correo2']) && !empty($_POST['correo2'])){
            $correo = htmlspecialchars(strip_tags(trim($_POST["correo2"])), ENT_QUOTES);
        }
    
        if(isset($_POST['apeP']) && !empty($_POST['apeP'])){
            $apeP = htmlspecialchars(strip_tags(trim($_POST["apeP"])), ENT_QUOTES);
        }
        
        if(isset($_POST['apeM']) && !empty($_POST['apeM'])){
            $apeM = htmlspecialchars(strip_tags(trim($_POST["apeM"])), ENT_QUOTES);
        }

        if(isset($_POST['pass3']) && !empty($_POST['pass3'])){
            $pass2 = htmlspecialchars(strip_tags(trim($_POST["pass3"])), ENT_QUOTES);
    
            $password = password_hash($pass2,PASSWORD_BCRYPT,['cost'=>4]);
        }
    
        if(isset($_POST['id2']) && !empty($_POST['id2'])){
            $id = filter_var($_POST["id2"], FILTER_VALIDATE_INT);
        }
        
        
        $sql = "call modificar_administrador('$id','$password','$nombre','$apeP','$apeM','$correo','$telefono')";
     
    }
    echo mysqli_query($conect,$sql);
}

?>