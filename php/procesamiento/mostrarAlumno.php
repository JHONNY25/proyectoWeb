
<?php

require_once 'alumno.php';
$publicacion = new Alumno();
$datos = $publicacion->listarAlumno();

$contenido = '';


        if($datos){

          foreach($datos as $row):

        $contenido .= "<tr class='fila' id=".$row['id_usuario']. ">
            <td>".$row['nombre'] ." ". $row['apellido_paterno']. " " . $row['apellido_materno']."</td>
            <td>".$row['numero_control'] ."</td>
            <td>".$row['correo'] ."</td>
            <td  class='d-flex justify-content-center'>
            <a href='' class='btn btn-info btn-circle view' data-toggle='modal' data-target='#modalUsuario' id=".$row['id_persona'].">
            <i class='fas fa-eye'></i></a>
            <a href='../post/asignoServicio.php?folio=".$row['id_usuario']."' class='text-warning delete asigno'><i class='fa fa-folder'></i></a>
            <button class='delete btn btn-danger btn-circle' onclick='confirm(".$row['id_persona'].")'>
            <i class='fas fa-trash'></i></button>
            </td>
            </tr>";

            endforeach;
        }

  echo $contenido;
?>
