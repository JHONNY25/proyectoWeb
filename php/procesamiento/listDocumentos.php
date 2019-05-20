
<?php

require_once '../procesamiento/alumno.php';
    require_once '../user.php';
    $alumno = new Alumno();
    $user = new User();

    if(!empty($_POST)){
        $id = filter_var($_POST["dato"], FILTER_VALIDATE_INT);

        $datos = $alumno->documentosAceptados($id);

        $contenido = "";
            
            if($datos){
    
                foreach($datos as $row):
                
              $contenido .=  '<tr id='.$row['id_documento'].'>
                    <td >'.$row['documento'].'</td>
                    <td>'.$row['aprobacion'].'</td>
                    <td>';

                    if($row['aprobacion'] == 'No'){
                        $contenido .= '<button class="btn btn-success btn-circle mr-2 ml-2 check-documento" id='.$row['id_documento'].'> 
                        <i class="fas fa-check"></i></button>';
                    }

                    if($row['aprobacion'] == 'No entragado'){
                        $contenido .= '<button class="btn btn-success btn-circle mr-2 ml-2 check-documento2" id='.$row['id_clasificacion'].'> 
                        <i class="fas fa-check"></i></button>';
                    }

                
            $contenido .= 
                    '</td>
                </tr>';
         
    
            endforeach;
        }

        echo $contenido;
    }


    
?>