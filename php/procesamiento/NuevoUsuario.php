
<script src="/proyectoWeb/js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="/proyectoWeb/js/sweetalert2.all.min.js" type="text/javascript"></script>
<script src="/proyectoWeb/js/bootstrap.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="/proyectoWeb/css/sweetalert2.min.css">
<?php require_once 'phpMailer/Enviar.php'; ?>


<body>
  <script type="text/javascript">
  function alertaProcesando(){
    Swal.fire({
        title: 'Procesando',
        text: 'Espere un momento por favor',
        type: 'info',
        showCancelButton: false,
        showConfirmButton: false,
        allowOutsideClick: false
      })
  }
  function alertaExito(){
    Swal.fire({
    title: '¡Éxito!',
    text: "El usuario se registó correctamente",
    type: 'success',
    confirmButtonText: 'Aceptar',
    allowOutsideClick: false
  }).then((result) => {
    if (result.value) {

      window.location.replace('/proyectoWeb/index.php');

  }
})
  }
  </script>


</body>
<?php

//CONEXION
require 'coneccion.php';
require 'Valida_NuevoUsuario.php';

$mysql = new coneccion();
$conexion = $mysql->get_connection();


//*****************************************************************************************************************************
//*****************************************************************************************************************************
//*****************************************************************************************************************************
//*****************************************************************************************************************************
//*****************************************************************************************************************************
//*****************************************************************************************************************************
//*****************************************************************************************************************************


if(!empty($_POST) && isset($_POST['newEmp'])){



  //----------------------------------------------------------------------------VARIABLES DE FORMULARIO
  $nombreX = htmlentities($_POST['nombre2']);
  $contrasenaX = htmlentities($_POST['contrasena2']);
  $confirmaContraX = htmlentities($_POST['confirmContra2']);
  $nombreUsuarioX = htmlentities($_POST['nombreUsuario2']);
  $correoX = htmlentities($_POST['correo2']);
  $telefonoX = htmlentities($_POST['telefono2']);

  $coloniaX= htmlentities($_POST['colonia']);
  $calleX= htmlentities($_POST['calle']);
  $municipioX= htmlentities($_POST['municipio']);

  $nombre = mysqli_real_escape_string($conexion,$nombreX);
  $contrasena = mysqli_real_escape_string($conexion,$contrasenaX);
  $confirmaContra = mysqli_real_escape_string($conexion,$confirmaContraX);
  $nombreUsuario = mysqli_real_escape_string($conexion,$nombreUsuarioX);
  $correo = mysqli_real_escape_string($conexion,$correoX);
  $telefono = mysqli_real_escape_string($conexion,$telefonoX);

  $colonia = mysqli_real_escape_string($conexion,$coloniaX);
  $calle = mysqli_real_escape_string($conexion,$calleX);
  $municipio = mysqli_real_escape_string($conexion,$municipioX);






  //----------------------------------------------------------------------------VARIABLES GENERALES
  $tipo = 1;
  $creditos = 0.0;

  //----------------------------------------------------------------------------EN ESTA VARIABLE SE GUARDA EL ID DEL USUARIO INSERTADO
  $idBD;

//------------------------------------------------------------------------------Tipos de errores
  //ERROES DE PERSONA
  $errorNombre=0;
  $errorApPaterno=0;
  $errorApMaterno=0;
  $errorCorreo=0;
  $errorCorreoEmp=0;
  $errorFormatoCorreo=0;
  $errorTelefono=0;
  $errorCalle=0;
  $errorColonia=0;
  $errorMunicipio=0;



  //ERRORES DE USUARIO
  $errorUsuario=0;
  $errorControl = 0;
  $nControlRepetido = 0;
  $errorContra = 0;
  $errorContra2 = 0;
  $errorCoincidencia = 0;
  $errorControlVacio=0;
  $errorUsuarioCorrecto=0;

  //VARIABLE DE REGISTRO EXITOSO
  $registroExitoso=0;

//OBTIENE VALOR DE COMBOBOX
  //Tipo de usuario = 1 ALUMNO
    $tipo = '1';





//------------------------------------------------------------------------------VALIDA USUARIO REPETIDO
  if(existeUsuario($nombreUsuario)){
    $errorUsuario = 1;
  }else if(!existeUsuario($nombreUsuario)){
    $errorUsuario = 0;
  }

//------------------------------------------------------------------------------VALIDA CORREO REPETIDO
  if(existeCorreoEmp($correo)){
    $errorCorreo = 1;
  } else if(existeCorreoEmp($correo)){
    $errorCorreo=0;
  }

//------------------------------------------------------------------------------VALIDAR FORMATO DE CORROEO
  if (correoCorrecto($correo)) {
    $errorFormatoCorreo = 0;
  } else if (!correoCorrecto($correo)) {
    $errorFormatoCorreo = 1;
  }

  //----------------------------------------------------------------------------VALIDAR Nombre
  if (nombreCorrecto($nombre)) {
    $errorNombre = 0;

  } else if (!nombreCorrecto($nombre)) {
    $errorNombre = 1;
  }
  //----------------------------------------------------------------------------VALIDAR Calle
  if (nombreCorrecto($calle)) {
    $errorCalle = 0;

  } else if (!nombreCorrecto($calle)) {
    $errorCalle = 1;
  }
  //----------------------------------------------------------------------------VALIDAR Colonia
  if (nombreCorrecto($colonia)) {
    $errorColonia = 0;

  } else if (!nombreCorrecto($colonia)) {
    $errorColonia = 1;
  }

  //----------------------------------------------------------------------------VALIDAR Municipio
  if (nombreCorrecto($municipio)) {
    $errorMunicipio = 0;

  } else if (!nombreCorrecto($municipio)) {
    $errorMunicipio = 1;
  }



  //----------------------------------------------------------------------------VALIDAR TELEFONO
  if (telefonoCorrecto($telefono)) {
    $errorTelefono = 0;

  } else if (!telefonoCorrecto($telefono)) {
    $errorTelefono = 1;
  }



  //----------------------------------------------------------------------------VALIDAR FORMATO USUARIO
  if (usuarioCorrecto($nombreUsuario)) {
    $errorUsuarioCorrecto = 0;

  } else if (!usuarioCorrecto($nombreUsuario)) {
    $errorUsuarioCorrecto = 1;
  }
  //----------------------------------------------------------------------------VALIDAR CONTRASEÑA
  if (contrasenaCorrecta($contrasena)) {
    $errorContra = 0;

  } else if (!contrasenaCorrecta($contrasena)) {
    $errorContra = 1;
  }

  //----------------------------------------------------------------------------VALIDAR CONTRASEÑA REPETIDA
  if (confirmaContraCorrecta($confirmaContra)) {
    $errorContra2 = 0;

  } else if (!confirmaContraCorrecta($confirmaContra)) {
    $errorContra2 = 1;
  }

  //----------------------------------------------------------------------------VALIDAR COINCIDENCIA DE CONTRASEÑAS
  if (coincidenciaCorrecta($contrasena,$confirmaContra)) {
    $errorCoincidencia = 0;

  } else if (!coincidenciaCorrecta($contrasena,$confirmaContra)) {
    $errorCoincidencia = 1;
  }


  //SI NO HAY ERRORES
  if($errorUsuario == 0 && $errorCorreo == 0 && $errorFormatoCorreo==0
      && $errorNombre == 0 && $errorTelefono == 0 && $errorContra== 0
      && $errorContra2==0 && $errorCoincidencia==0 && $errorUsuarioCorrecto==0){



//===============================================================================SUBIR IMAGEN





//HAY QUE ACTUALIZAR EL PROCEDIMIENTO PARA INSERTAR NUMERO DE CONTROL Y CARRERA

    try {

      $opciones = [
        'cost' => 10,
      ];
      $passwordHash = password_hash($contrasena, PASSWORD_BCRYPT, $opciones);
      $contrasena = $passwordHash;
      //echo "$contrasena";
      $stm = $conexion->prepare("CALL registrar_usuario_institucion(?,?,?,?,?,?,?,?)");
      $stm->bind_param("ssssssss",$nombreUsuario,$contrasena,$nombre,$telefono,$correo,$calle,$colonia,$municipio);
      $stm->execute();
      $stm->close();

      ?>





        <?php
        $email = new enviar();
        $email->notificaUsuario("Te haz registrado exitosamente
        en el portal de vinculacion de ITES los Cabos.
        Debes esperar a que el encargado verifique tus datos para ser aceptado.
        Una vez verificado podrás iniciar sesión y publicar residencias, servicio social u ofertas de trabajo","
        Te haz registrado exitosamente
        en el portal de vinculacion de ITES los Cabos.
        Debes esperar a que el encargado verifique tus datos para ser aceptado.
        Una vez verificado podrás iniciar sesión y publicar residencias, servicio social u ofertas de trabajo","
        Confirmación de registro vinculacion ITES Los Cabos",$correo," ");
         ?>
         <script type="text/javascript">
alertaExito();

      </script>
      <?php

    } catch (\Exception $e) {
      echo "ERROR: ";
      echo "$e";
    }




/*
    //OBTENDREMOS EL ID DEL USUARIO INSERTADO ANTERIORMENTE PERA PODER ASIGNARLO COMO LLAVE FORANEA
    //A LA TABLA PERSONA
      $sql = "SELECT id_usuario FROM usuario WHERE usuario = '$nombreUsuario'";
      $result = $conexion->query($sql);
      if ($result->num_rows > 0) {

           while($row = $result->fetch_assoc()) {
             $idBD = $row['id_usuario'];
           }
         }


    //AGREGAMOS LOS DATOS DE LA PERSONA AL USUARIO
      $stm = $conexion->prepare("CALL registrar_persona(?,?,?,?,?,?,?,?,?)");
      $stm->bind_param("ssssssdii",$nombre,$aPat,$aMat,$numeroControl,$correo,$telefono,$creditos,$idBD,$idCarrera);
      $stm->execute();
      $stm->close();

      */



    $registroExitoso=1;
    ?>

    <?php

    //header('Location: ../tablas/personal.php');
    //--------------------------------------------------------------------------CERRAR IF ERRORES
  } else {
    {
      ?>
      <script type="text/javascript">
      $(document).ready(function() {

  $('#exampleModal').modal('show')

});
      </script>
      <?php
    }
  }






//------------------------------------------------------------------------------Cerrar if empty post
}


//*****************************************************************************************************************************
//*****************************************************************************************************************************
//*****************************************************************************************************************************
//*****************************************************************************************************************************
//*****************************************************************************************************************************
//*****************************************************************************************************************************
//*****************************************************************************************************************************
if(!empty($_POST) && isset($_POST['newUser'])){



  //----------------------------------------------------------------------------VARIABLES DE FORMULARIO
  $nombreX = htmlentities($_POST['nombre']);
  $aPatX = htmlentities($_POST['aPat']);
  $aMatX = htmlentities($_POST['aMat']);
  $numeroControlX = htmlentities($_POST['numeroControl']);
  $contrasenaX = htmlentities($_POST['contrasena']);
  $confirmaContraX = htmlentities($_POST['confirmContra']);
  $nombreUsuarioX = htmlentities($_POST['nombreUsuario']);
  $correoX = htmlentities($_POST['correo']);
  $telefonoX = htmlentities($_POST['telefono']);
  $idCarreraX = htmlentities($_POST['carrera']);

  $nombre = mysqli_real_escape_string($conexion,$nombreX);
  $aPat = mysqli_real_escape_string($conexion,$aPatX);
  $aMat = mysqli_real_escape_string($conexion,$aMatX);
  $numeroControl = mysqli_real_escape_string($conexion,$numeroControlX);
  $contrasena = mysqli_real_escape_string($conexion,$contrasenaX);
  $confirmaContra = mysqli_real_escape_string($conexion,$confirmaContraX);
  $nombreUsuario = mysqli_real_escape_string($conexion,$nombreUsuarioX);
  $correo = mysqli_real_escape_string($conexion,$correoX);
  $telefono = mysqli_real_escape_string($conexion,$telefonoX);
  $idCarrera = mysqli_real_escape_string($conexion,$idCarreraX);




  $target_dir = "upload/kardex/";
  $temp = explode(".", $_FILES["kardex"]["name"]);
  $newfilename = $numeroControl.'-kardex'.'.'.end($temp);

  $target_file = $target_dir . $newfilename;
  $uploadOk = 0;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

      $check = getimagesize($_FILES["kardex"]["tmp_name"]);
      if($check !== false) {
          $uploadOk = 1;
      } else {
          $uploadOk = 0;
      }

  // Check if file already exists
  if (file_exists($target_file)) {
      $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["kardex"]["size"] > 500000) {
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "JPEG"
&& $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "pdf" && $imageFileType != "PDF") {
      $uploadOk = 0;
  } else {
    $uploadOk = 1;
  }



  //----------------------------------------------------------------------------VARIABLES GENERALES
  $tipo = 1;
  $creditos = 0.0;

  //----------------------------------------------------------------------------EN ESTA VARIABLE SE GUARDA EL ID DEL USUARIO INSERTADO
  $idBD;

//------------------------------------------------------------------------------Tipos de errores
  //ERROES DE PERSONA
  $errorNombre=0;
  $errorApPaterno=0;
  $errorApMaterno=0;
  $errorCorreo=0;
  $errorFormatoCorreo=0;
  $errorTelefono=0;


  //ERRORES DE USUARIO
  $errorUsuario=0;
  $errorControl = 0;
  $nControlRepetido = 0;
  $errorContra = 0;
  $errorContra2 = 0;
  $errorCoincidencia = 0;
  $errorControlVacio=0;
  $errorUsuarioCorrecto=0;

  //VARIABLE DE REGISTRO EXITOSO
  $registroExitoso=0;

//OBTIENE VALOR DE COMBOBOX
  //Tipo de usuario = 1 ALUMNO
    $tipo = '1';





//------------------------------------------------------------------------------VALIDA USUARIO REPETIDO
  if(existeUsuario($nombreUsuario)){
    $errorUsuario = 1;
  }else if(!existeUsuario($nombreUsuario)){
    $errorUsuario = 0;
  }

//------------------------------------------------------------------------------VALIDA CORREO REPETIDO
  if(existeCorreo($correo)){
    $errorCorreo = 1;
  } else if(existeCorreo($correo)){
    $errorCorreo=0;
  }

//------------------------------------------------------------------------------VALIDAR FORMATO DE CORROEO
  if (correoCorrecto($correo)) {
    $errorFormatoCorreo = 0;
  } else if (!correoCorrecto($correo)) {
    $errorFormatoCorreo = 1;
  }

  //----------------------------------------------------------------------------VALIDAR Nombre
  if (nombreCorrecto($nombre)) {
    $errorNombre = 0;

  } else if (!nombreCorrecto($nombre)) {
    $errorNombre = 1;
  }

  //----------------------------------------------------------------------------VALIDAR APELLIDO PATERNO
  if (paternoCorrecto($aPat)) {
    $errorApPaterno = 0;

  } else if (!paternoCorrecto($aPat)) {
    $errorApPaterno = 1;
  }

  //----------------------------------------------------------------------------VALIDAR APELLIDO MATERNO
  if (maternoCorrecto($aMat)) {
    $errorApMaterno = 0;


  } else if (!paternoCorrecto($aMat)) {
    $errorApMaterno = 1;

  }

  //----------------------------------------------------------------------------VALIDAR TELEFONO
  if (telefonoCorrecto($telefono)) {
    $errorTelefono = 0;

  } else if (!telefonoCorrecto($telefono)) {
    $errorTelefono = 1;
  }
  //----------------------------------------------------------------------------VALIDAR NUMERO DE CONTROL
  if (controlCorrecto($numeroControl)) {
    $errorControl = 0;

  } else if (!controlCorrecto($numeroControl)) {
    $errorControl = 1;
  }

  //------------------------------------------------------------------------------VALIDA existe REPETIDO
    if(existeControl($numeroControl)){
      $nControlRepetido = 1;
    }else if(!existeUsuario($numeroControl)){
      $nControlRepetido = 0;
    }

  //----------------------------------------------------------------------------VALIDAR FORMATO USUARIO
  if (usuarioCorrecto($nombreUsuario)) {
    $errorUsuarioCorrecto = 0;

  } else if (!usuarioCorrecto($nombreUsuario)) {
    $errorUsuarioCorrecto = 1;
  }
  //----------------------------------------------------------------------------VALIDAR CONTRASEÑA
  if (contrasenaCorrecta($contrasena)) {
    $errorContra = 0;

  } else if (!contrasenaCorrecta($contrasena)) {
    $errorContra = 1;
  }

  //----------------------------------------------------------------------------VALIDAR CONTRASEÑA REPETIDA
  if (confirmaContraCorrecta($confirmaContra)) {
    $errorContra2 = 0;

  } else if (!confirmaContraCorrecta($confirmaContra)) {
    $errorContra2 = 1;
  }

  //----------------------------------------------------------------------------VALIDAR COINCIDENCIA DE CONTRASEÑAS
  if (coincidenciaCorrecta($contrasena,$confirmaContra)) {
    $errorCoincidencia = 0;

  } else if (!coincidenciaCorrecta($contrasena,$confirmaContra)) {
    $errorCoincidencia = 1;
  }

  //----------------------------------------------------------------------------VALIDAR NUMERO CONTROL VACIO
  if (validaControlVacio($numeroControl,$tipo)) {
    $errorControlVacio = 0;

  } else if (!validaControlVacio($numeroControl,$tipo)) {
    $errorControlVacio = 1;
  }

  //SI NO HAY ERRORES
  if($errorUsuario == 0 && $errorCorreo == 0 && $errorFormatoCorreo==0
      && $errorNombre == 0 && $errorApPaterno==0 && $errorApMaterno == 0
      && $errorTelefono == 0 && $errorControl==0 && $errorContra== 0
      && $errorContra2==0 && $errorCoincidencia==0 && $errorControlVacio==0
      && $errorUsuarioCorrecto==0 && $uploadOk == 1 && $nControlRepetido == 0){



//===============================================================================SUBIR IMAGEN
        if (move_uploaded_file($_FILES["kardex"]["tmp_name"], $target_file)) {
        } else {
        }





//HAY QUE ACTUALIZAR EL PROCEDIMIENTO PARA INSERTAR NUMERO DE CONTROL Y CARRERA

    try {

      $opciones = [
        'cost' => 10,
      ];
      $passwordHash = password_hash($contrasena, PASSWORD_BCRYPT, $opciones);
      $contrasena = $passwordHash;
      //echo "$contrasena";
      $stm = $conexion->prepare("CALL registrar_usuario_todo(?,?,?,?,?,?,?,?,?,?)");
      $stm->bind_param("sssssssssi",$nombreUsuario,$contrasena,$nombre,$aPat,$aMat,$numeroControl,$correo,$telefono,$newfilename,$idCarrera);
      $stm->execute();
      $stm->close();

      ?>
      <script type="text/javascript">




        <?php
        $email = new enviar();
        $email->notificaUsuario("Te haz registrado exitosamente
        en el portal de vinculacion de ITES los Cabos.
        Debes esperar a que el encargado verifique tus datos para ser aceptado.
        Una vez verificado podrás iniciar sesión y comenzar con tus trámites","
        Te haz registrado exitosamente
        en el portal de vinculacion de ITES los Cabos.
        Debes esperar a que el encargado verifique tus datos para ser aceptado.
        Una vez verificado podrás iniciar sesión y comenzar con tus trámites","
        Confirmación de registro vinculacion ITES Los Cabos",$correo," ");
         ?>

         alertaExito();
      </script>
      <?php

    } catch (\Exception $e) {
      echo "ERROR: ";
      echo "$e";
    }




/*
    //OBTENDREMOS EL ID DEL USUARIO INSERTADO ANTERIORMENTE PERA PODER ASIGNARLO COMO LLAVE FORANEA
    //A LA TABLA PERSONA
      $sql = "SELECT id_usuario FROM usuario WHERE usuario = '$nombreUsuario'";
      $result = $conexion->query($sql);
      if ($result->num_rows > 0) {

           while($row = $result->fetch_assoc()) {
             $idBD = $row['id_usuario'];
           }
         }


    //AGREGAMOS LOS DATOS DE LA PERSONA AL USUARIO
      $stm = $conexion->prepare("CALL registrar_persona(?,?,?,?,?,?,?,?,?)");
      $stm->bind_param("ssssssdii",$nombre,$aPat,$aMat,$numeroControl,$correo,$telefono,$creditos,$idBD,$idCarrera);
      $stm->execute();
      $stm->close();

      */



    $registroExitoso=1;
    ?>

    <?php

    //header('Location: ../tablas/personal.php');
    //--------------------------------------------------------------------------CERRAR IF ERRORES
  } else {
    {
      ?>
      <script type="text/javascript">
      $(document).ready(function() {

  $('#exampleModal').modal('show')

});
      </script>
      <?php
    }
  }






//------------------------------------------------------------------------------Cerrar if empty post
}


 ?>

 <script type="text/javascript">

 $("#slctCarrera").show();
 $("#nControl").show();
 $("#confirmaContra").hide();
 $("#Contrasena").hide();
 $("#avisoContrasena").show();

 </script>

 <?php

 if (!empty($_POST) && isset($_POST['newUser'])) {
   if ($registroExitoso==1) {
   }
 }



  ?>





<script type="text/javascript">
$(function() {
$("#boton").click( function()
{

}
);
});
</script>
