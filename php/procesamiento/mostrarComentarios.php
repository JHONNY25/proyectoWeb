
<?php
require_once '../sesion.php';
require_once '../user.php';
require_once 'comentarios.php';

$sesion = new Sesion();
$coment = new Comentario();
$user = new User();


if(!empty($_POST['dato'])){
    $id_alumno = filter_var($_POST["dato"], FILTER_VALIDATE_INT);

    $datos = $coment->getComentarios($id_alumno);
    $contenido = '';

    if($datos){
      
      foreach($datos as $row):

    $contenido .= "
        <div class='border rounded mt-3 p-1'>
            <h5 class='ml-2'>".$row['usuario']."</h5>
            <p class='ml-2'>".$row['mensaje']."</p>
            <span class='d-block'>".$row['fecha']."</span>
        </div>";

        endforeach;  
    }else{
        $contenido .= "<div id='' class='alert alert-info text-center' role='alert'>No se ha iniciado una conversación</div>";
    }


echo $contenido;
}

?>