<?php

require_once '../procesamiento/publicaciones.php';
$publicacion = new Publicacion();
$datos = $publicacion->getPublicaciones(0,2);

$contenido = '';


        if($datos){

          foreach($datos as $row):

        $contenido .= "<tr class='fila' id=".$row['id_publicacion_bancos']. ">
            <td>".$row['titulo'] ."</td>
            <td>".$row['fecha'] ."</td>
            <td>".substr($row['descripcion'],0,50).'...'."</td>
            <td  class='d-flex justify-content-center'>
            <a href='' class='btn btn-info btn-circle view' data-toggle='modal' data-target='#modal' id=".$row['id_publicacion_bancos'].">
            <i class='fas fa-eye'></i></a>
            <button class='delete btn btn-danger btn-circle' onclick='confirm(".$row['id_publicacion_bancos'].")'>
            <i class='fas fa-trash'></i></button>
            </td>
            </tr>";

            endforeach;
        }else{

            $contenido .= "<tr>
            <td colspan='4' class='text-center'>No hay datos</td>
            </tr>";
           }




  echo $contenido;
?>
