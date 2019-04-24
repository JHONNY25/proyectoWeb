
<?php

require_once 'publicaciones.php';
$publicacion = new Publicacion();

if(isset($_POST['dato'])){
    $datos = $publicacion->getPublicacionesInactivas(0,$_POST['dato']);

    $contenido = '';
    
        
            if($datos){
              
              foreach($datos as $row):
     
            $contenido .= "<tr>
                <td>".$row['empresa'] ."</td>
                <td>".$row['correo'] ."</td>
                <td>".$row['titulo']."</td>
                <td>".$row['fecha']."</td>
                <td  class='d-flex justify-content-center'>
                <a href='' class='btn btn-info btn-circle view'>
                 <i class='fas fa-eye'></i></a>
                <a href='' class='btn btn-success btn-circle mr-2 ml-2'>
                <i class='fas fa-check'></i></a>
                <button class='btn btn-danger btn-circle' onclick='confirm(".$row['id_publicacion_bancos'].")'>
                <i class='fas fa-times'></i></button>
                </td>
                </tr>";
    
                endforeach;  
            }

      echo $contenido;
}

?>