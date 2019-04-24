<?php

    require_once '../model/conexion.php';

    class Empresa extends Conexion{

        public function getEmpresaEstado($estado){
            $sql = "call ver_instituciones_inactivas($estado)";
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