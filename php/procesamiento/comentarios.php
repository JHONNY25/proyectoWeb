<?php

require_once '../model/conexion.php';

class Comentario extends Conexion{

    public function getComentarios($id){
        $sql = "CALL ver_comentarios($id)";
        $ejecuta = $this->con->query($sql); 

        $respuesta = $ejecuta->fetch_all(MYSQLI_ASSOC);

        if($respuesta){
            return $respuesta;

            $respuesta->close();
            $this->con->close();
        }
    }

    public function getComentariosLimit($id){
        $sql = "CALL ver_comentarios_limit($id)";
        $ejecuta = $this->con->query($sql); 

        $respuesta = $ejecuta->fetch_all(MYSQLI_ASSOC);

        if($respuesta){
            return $respuesta;

            $respuesta->close();
            $this->con->close();
        }
    }


    public function getComentariosLimitAlumno(){
        $sql = "CALL ver_comentarios_limit_alumno()";
        $ejecuta = $this->con->query($sql); 

        $respuesta = $ejecuta->fetch_all(MYSQLI_ASSOC);

        if($respuesta){
            return $respuesta;

            $respuesta->close();
            $this->con->close();
        }
    }


    public function getNumeroComentarios($id){
       
        $sql = "CALL numero_comentarios($id)";
         $query = mysqli_query($this->con,$sql);
    
         $count = mysqli_num_rows($query);
         if($count > 1){
     
             return $count;
     
         }
 
     }


}
?>