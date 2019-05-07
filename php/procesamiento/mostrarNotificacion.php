<?php

require_once 'notificacion.php';
$notificacion = new Notificacion();
$datos = $notificacion->getNotificaciones();

$contenido = '';

    
        if($datos){
          
          foreach($datos as $row):
 
        $contenido .= "<tr class='fila' id=".$row['id_notificacion']. ">
            <td>".$row['titulo'] ."</td>
            <td>".substr($row['mensaje'],0,60).'...'."</td>
            <td>".$row['fecha'] ."</td>
            <td>".$row['usuario']."</td>
            <td  class='d-flex justify-content-center'>
            <a href='' class='btn btn-info btn-circle view' data-toggle='modal' data-target='#modal' id=".$row['id_notificacion'].">
            <i class='fas fa-eye'></i></a>
            <button class='delete btn btn-danger btn-circle' onclick='confirm(".$row['id_notificacion'].")'>
            <i class='fas fa-trash'></i></button>
            </td>
            </tr>";

            endforeach;  
        }
    
      


  echo $contenido;
?>