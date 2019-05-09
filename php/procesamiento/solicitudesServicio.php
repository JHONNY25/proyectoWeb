
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
            <a href='' class='notificacion'><i class='fas fa-bell fa-fw'></i></a>
            <a href='../post/cartaLiberacion.php' class='text-success subir-carta'><i class='fa fa-upload'></i></a>
            <button class='delete btn btn-danger btn-circle'>
            <i class='fas fa-trash'></i></button>
            </td>
            </tr>";

            endforeach;  
        }
    
  echo $contenido;
?>