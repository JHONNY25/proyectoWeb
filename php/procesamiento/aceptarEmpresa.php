<?php require_once '../../phpMailer/Enviar.php'; ?>
<?php

require_once '../sesion.php';
require_once '../user.php';
require_once '../model/conexion.php';
$sesion = new Sesion();
$user = new User();
$con = new Conexion();
$conect = $con->getConexion();

$identificador = $_POST['id'];
$mensaje = $_POST['mensaje'];
$mensajeNoHTML = $_POST['mensajeNoHTML'];
$asunto = $_POST['asunto'];
$destino = $_POST['destino'];
$nombre = $_POST['nombre'];


$email = new enviar();
$email->notificaUsuario($mensaje,$mensajeNoHTML,$asunto,$destino,$nombre);

   $sql = "call aceptar_institucion('$identificador')";
   echo mysqli_query($conect,$sql);

?>
