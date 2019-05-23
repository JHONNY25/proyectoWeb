
<?php

require_once 'alumno.php';
$alumnos = new Alumno();
require_once 'paginacion.php';
require_once 'comentarios.php';

$coments = new Comentario();
$coment = new Paginacion();
$datos = $alumnos->listarAlumnoServicio();

$contenido = '';


        if($datos){

          foreach($datos as $row):

        $contenido .= "<tr class='fila' id=".$row['id_usuario']. ">
            <td>".$row['nombre'] ."</td>
            <td>".$row['carrera'] ."</td>
            <td>".$row['numero_control']."</td>
            <td>".$row['correo']."</td>
            <td  class='d-flex justify-content-center'>
            <a href='../post/cartaLiberacion.php?al=".$row['id_usuario']."' class='text-success subir-carta'><i class='btn-circle btn-success fa fa-upload'></i></a>
            <button class='delete btn btn-danger btn-circle' onclick='confirm(
              \"".$row['fk_persona']."\",
              \"".$row['correo']."\",
              \"".$row['nombre']."\"
              )'>
            <i class='fas fa-trash'></i></button>
            </td>
            </tr>";

            endforeach;
        }

  echo $contenido;
?>
