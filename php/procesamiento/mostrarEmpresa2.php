<?php

    require_once 'empresa.php';
    $listado = new Empresa();
                    
    $datos = $listado->getEmpresaEstado(1);
    $contenido = '';

        if($datos){
          
          foreach($datos as $row):
 
        $contenido .= "<tr>
            <td>".$row['nombre'] ."</td>
            <td>".$row['colonia'] ."</td>
            <td>".$row['calle']."</td>
            <td>".$row['correo']."</td>
            <td  class='d-flex justify-content-center '>
            <a href='' class='btn btn-info btn-circle view'>
             <i class='fas fa-eye'></i></a>
            <button class='delete btn btn-danger btn-circle' onclick='confirm(".$row['id_institucion'].")'>
            <i class='fas fa-trash'></i></button>
            </td>
            </tr>";

            endforeach;  
        }

    
  echo $contenido;
?>