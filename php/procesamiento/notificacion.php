<?php

require_once '../model/conexion.php';

class Notificacion extends Conexion{


    public function getNotificaciones(){
        $sql  = "CALL ver_notificacion()";

        $query = $this->con->query($sql);

        $respuesta = $query->fetch_all(MYSQLI_ASSOC);

        if($respuesta){
            return $respuesta;

            $respuesta->close();
            $this->con->close();
        }
    }

    public function getNotificacionesLimit(){
        $sql  = "CALL ver_notificacion3()";

        $query = $this->con->query($sql);

        $respuesta = $query->fetch_all(MYSQLI_ASSOC);

        if($respuesta){
            return $respuesta;

            $respuesta->close();
            $this->con->close();
        }
    }

    public function getCountNotificacion(){
       
       $sql = "SELECT COUNT(*) from notificacion 
        WHERE estado = 1";
        $query = mysqli_query($this->con,$sql);
   
        $count = mysqli_num_rows($query);
        if($count > 1){
    
            return $count;
    
        }

    }


    public function detalleNotificacion($id){
        $sql  = "CALL ver_detalle_notificacion($id)";

        $query = $this->con->query($sql);

        $respuesta = $query->fetch_all(MYSQLI_ASSOC);

        if($respuesta){
            return $respuesta;

            $respuesta->close();
            $this->con->close();
        }
    }

    public function deteleteNotificacion($id){
        
    }
}

?>