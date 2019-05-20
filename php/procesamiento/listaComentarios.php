
<?php

require_once 'paginacion.php';
require_once '../user.php';
require_once 'comentarios.php';

$user = new User();
$coments = new Comentario();
$coment = new Paginacion();


$user->setUser($_SESSION['usuario']);

$id_alumno = $user->getId();

    $comentario = $coments->getComentariosLimit($id_alumno);

    $conteo = $coment->getNumeroComentarios($id_alumno);

    $contenido = '<a class="nav-link dropdown-toggle d-flex" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-comments fa-fw"></i>';

        if($conteo > 5){
            $contenido .= ' <span class="badge badge-danger badge-counter" id="conteo">5+</span></a>';
        }else if($conteo == 0){
            $contenido .= ' <span class="badge badge-danger badge-counter d-none" id="conteo"></span></a>';
        }
        else{
            $contenido .= ' <span class="badge badge-danger badge-counter" id="conteo">'.$conteo.'</span></a>';
        }

        if($conteo != 0){
            $contenido .='
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in " aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
            Comentarios
            </h6>
            <div class="example-1 scrollbar-ripe-malinka">';


        if($comentario){
        
        foreach($comentario as $row):

        $contenido .=   '<a class="dropdown-item d-block align-items-center viewComents" href="#" id="'.$row['fk_conversacion'].'">
                <div class="">
                    <div class="small text-gray-500">'.$row['fecha'].'</div>
                    <span class="font-weight-bold d-block">'.$row['usuario'].'</span>
                    <span class="d-block">'.substr($row['mensaje'],0,30).'...'.'</span>
                </div>
                </a>
                ';

            endforeach;  
        }

        $contenido .= '</div>
                    </div>';
        
            }



    echo $contenido;

?>