<?php

  function existeUsuario($usuario){
    global $conexion;
    $stm = $conexion->prepare("SELECT usuario FROM usuario WHERE usuario = ?");

    $stm->bind_param("s",$usuario);
    $stm->execute();
    $stm->store_result();
    $num = $stm->num_rows;
    $stm->close();

    if($num >0){
      return true;
    }else{
      return false;
    }
  }

  function existeControl($numeroControl){
    global $conexion;
    $stm = $conexion->prepare("SELECT numero_control FROM persona WHERE numero_control = ?");

    $stm->bind_param("s",$numeroControl);
    $stm->execute();
    $stm->store_result();
    $num = $stm->num_rows;
    $stm->close();

    if($num >0){
      return true;
    }else{
      return false;
    }
  }


  function existeCorreo($correo){
    global $conexion;
    $stm = $conexion->prepare("SELECT correo FROM persona WHERE correo = ?");

    $stm->bind_param("s",$correo);
    $stm->execute();
    $stm->store_result();
    $num = $stm->num_rows;
    $stm->close();

    if($num >0){
      return true;
    }else{
      return false;
    }
  }


  function obtIdUsuario($id){
    global $conexion;
    $sql = "SELECT id_usuario FROM usuario WHERE usuario = '$id'";
    $result = $conexion->query($sql);
    if ($result->num_rows > 0) {

         while($row = $result->fetch_assoc()) {
           return $row['id_usuario'];
         }
       }
  }


  function correoCorrecto($correo){
    if (!empty($correo)){

      if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
         return true;
       } else {
         return false;
       }

    }
    else{
      return false;
    }
  }

  function nombreCorrecto($nombre){
    if(!empty($nombre)){
      $len = strlen($nombre);
      if($len > 24){
        return false;
      }
      else{
        return true;
      }
    } else{
      return false;
    }
  }

  function paternoCorrecto($paterno){
    if(!empty($paterno)){
      $len = strlen($paterno);
      if($len > 24){
        return false;
      }
      else{
        return true;
      }
    } else{
      return false;
    }
  }
  function maternoCorrecto($materno){
    if(!empty($materno)){
      $len = strlen($materno);
      if($len > 24){
        return false;
      }
      else{
        return true;
      }
    } else{
      return false;
    }
  }

  function telefonoCorrecto($telefono){

    $patron = '/^([0-9]{10})$/';

    if((preg_match($patron, $telefono))){

        return true;
    } else{

        return false;
    }
  }

  function controlCorrecto($control){
    if(empty($control)){
      return true;
    }else{
      if (strlen($control)>8) {
        return false;
      }else{
        return true;
      }
    }
  }

  function validaControlVacio($nControl,$tipoControl){
    $alu='1';
    $admin='2';

    if (empty($nControl) && $tipoControl == $admin) {
      return true;
      echo "Numero de control vacio y tipo admin TRUE";
    }
    else if (empty($nControl) && $tipoControl == $alu) {
      return false;
      echo "Numero de control vacio y tipo ALUMNO FALSE";
    }else {
      return true;
      echo "else TRUE";
    }


    }





  function contrasenaCorrecta($contra){
    if (empty($contra)) {
      return false;
    }else{
      if (strlen($contra)>7 && strlen($contra)<50) {
        return true;
      }
    }
  }

  function confirmaContraCorrecta($confirmacionContrasena){
    if (empty($confirmacionContrasena)) {
      return false;
    }else{
      if (strlen($confirmacionContrasena)>7 && strlen($confirmacionContrasena)<50) {
        return true;
      }
    }
  }

  function coincidenciaCorrecta($contraPrimera, $contraSegunda){
    if ($contraPrimera == $contraSegunda) {
      return true;
    }else{
      return false;
    }

  }

  function usuarioCorrecto($usuarioCorrecto){
    if (!empty($usuarioCorrecto) && (strlen($usuarioCorrecto)>2 && strlen($usuarioCorrecto)<51)) {
      return true;
    }
    else {
      return false;
    }
  }
 ?>
