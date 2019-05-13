
<?php

require_once 'alumno.php';
$alumnos = new Alumno();
$datos = $alumnos->listarAlumnoServicio();

$contenido = '';


        if($datos){

          foreach($datos as $row):

        $contenido .= "<tr class='fila' id=".$row['fk_persona']. ">
            <td>".$row['nombre'] ."</td>
            <td>".$row['carrera'] ."</td>
            <td>".$row['numero_control']."</td>
            <td>".$row['correo']."</td>
            <td  class='d-flex justify-content-center'>
            <a href='' class='notificacion'><i class='btn-circle btn-info fas fa-bell fa-fw'></i></a>
            <a href='../post/cartaLiberacion.php?al=".$row['fk_persona']."' class='text-success subir-carta'><i class='btn-circle btn-success fa fa-upload'></i></a>
            <button class='delete btn btn-danger btn-circle'onclick='confirm(
              \"".$row['numero_control']."\",
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
