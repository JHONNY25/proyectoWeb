<?php

require_once '../procesamiento/alumno.php';
$publicacion = new Alumno();
$datos = $publicacion->getPersonal();

$contenido = '';


        if($datos){

          foreach($datos as $row):

        $contenido .= "<tr class = 'fila' data-id = ".$row['id_persona'].">
                <td>".$row['nombre']."</td>
                <td>".$row['correo']."</td>
                <td>".$row['telefono']."</td>
                <td class='d-flex justify-content-center'>
                    <button class='btn btn-circle eliminar text-danger' onclick='confirm(".$row['id_persona'].")'>
                        <i class='fa fa-user-times'></i>
                    </button>
                </td>
            </tr>";

            endforeach;
        }

  echo $contenido;
?>