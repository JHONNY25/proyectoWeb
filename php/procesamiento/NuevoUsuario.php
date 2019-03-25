<?php

//CONEXION
require '../procesamiento/coneccion.php';
require '../Validaciones/Valida_NuevoUsuario.php';
$mysql = new coneccion();
$conexion = $mysql->get_connection();

//VARIABLES DE FORMULARIO
$nombre = $_POST['nombre'];
$aPat = $_POST['aPat'];
$aMat = $_POST['aMat'];
$numeroControl = $_POST['numeroControl'];
$contrasena = $_POST['contrasena'];
$confirmaContra = $_POST['confirmContra'];
$tipoCB = $_POST['tipo'];
$nombreUsuario = $_POST['nombreUsuario'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];

//VALIDA SI EXISTE EL USUARIO
if(existeUsuario($nombreUsuario)){
  echo "=========================================USUARIO REPETIDO";
}

//VALIDA SI EXISTE EL CORREO


//VARIABLES GENERALES
$tipo = 1;
$creditos = 0.0;

//ERRORES AL INSERTAR USUARIO O PERSONA. 0 = NO HAY ERROR
$errorUsuario=0;
$errorPersona=0;

//EN ESTA VARIABLE SE GUARDA EL ID DEL USUARIO INSERTADO
$idBD;

//MENSAJE QUE ARROJA MYSQL AL ENCONTRAR UN USUARIO REPETIDO
$repetido = 'Duplicate entry "'.$nombreUsuario.'" for key "usuario_UNIQUE"';

//OBTENER VALOR DEL COMBOBOX Y ASIGNARLE UN NÚMERO
if($tipoCB == 'Alumno'){
  $tipo = '1';
}
else if($tipoCB == 'Administrativo'){
  $tipo = '2';
}


//LLAMAR AL PROCEDIMIENTO PARA INSERTAR USUARIO "SSI" SIGNIFICA "STRING STRING INT", ES DECIR, EL TIPO DE VALORES A INGRESAR
$stm = $conexion->prepare("CALL registrar_usuario(?,?,?)");
$stm->bind_param("ssi",$nombreUsuario,$contrasena,$tipo);
//EJECUTAR EL PROCEDIMIENTO
$stm->execute();

//OBTENER EL ERROR AL EJECUTAR EL PROCEDIMIENTO EN CASO DE QUE HAYA
$error = "$stm->error";
$stm->close();

//SI EL ERROR OBTENIDO AL INSERTAR UN USUARIO QUIERE DECIR QUE ESTE ESTA REPETIDO,
//errorUsuario SERÁ IGUAL A 1, ASI SABREMOS QUE HUBO UN ERROR.
if ($error == str_replace("\"", "'", $repetido)) {
  echo "EL NOMBRE DE USUARIO YA ESTÁ EN USO ";
  $errorUsuario = 1;
}
else {
  echo "USUARIO INSERTADO... continua con persona";
  $errorUsuario = 0;

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
  $stm = $conexion->prepare("CALL registrar_persona(?,?,?,?,?,?,?,?)");
  $stm->bind_param("ssssssdi",$nombre,$aPat,$aMat,$numeroControl,$correo,$telefono,$creditos,$idBD);
  $stm->execute();

  //OBTENEMOS EL ERROR DEL STMT
  $error = "$stm->error";

//SI errorPerdona ESTA VACIO, QUIERE DECIR QUE NO HUBO NINGUN ERROR,
// DE LO CONTRARIO, LE DAREMOS EL VALOR DE 1
  if($errorPersona == ''){
    $errorPersona=0;

  }
  else{
    $errorPersona=1;
  }
  //CERRAMOS EL STATEMENT
  $stm->close();

//SI NO HUBO ERROR AL INSERTAR EL USUARIO O LA PERSONA PODEMOS CONTINUAR
  if ($errorUsuario==0 && $errorPersona==0) {
    echo "*******USUARIO CREADO CON EXITO*******";
  }

}





$conexion->close();

 ?>
