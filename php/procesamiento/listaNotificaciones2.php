
<?php

require_once 'notificacion.php';
require_once 'paginacion.php';
$notificacion = new Notificacion();
$numeroLista = new Paginacion();

$datos = $notificacion->getNotificacionesLimit();

$count = $numeroLista->getCountNotificacion();



$contenido = '<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->';


            if($count > 3){
                $contenido .= ' <span class="badge badge-danger badge-counter" id="conteo2">3+</span></a>';
            }else if($count == 0){
                $contenido .= ' <span class="badge badge-danger badge-counter d-none" id="conteo2"></span></a>';
            }
            else{
                $contenido .= ' <span class="badge badge-danger badge-counter" id="conteo2">'.$count.'</span></a>';
            }

              
    if($count != 0){
        $contenido .='
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
        Notificaciones
        </h6>
        <div class="example-1 scrollbar-ripe-malinka">';


    if($datos){
      
      foreach($datos as $row):

    $contenido .=   '<a class="dropdown-item d-block align-items-center view" href="#" id="'.$row['id_notificacion'].'">
            <div class="">
                <div class="small text-gray-500">'.$row['fecha'].'</div>
                <span class="font-weight-bold d-block">'.$row['titulo'].'</span>
                <span class="d-block">'.substr($row['mensaje'],0,30).'...'.'</span>
            </div>
            </a>
            ';

        endforeach;  
    }

$contenido .= '</div>
                <a class="dropdown-item text-center small text-gray-500" href="php/post/listaNotificaciones.php">Ver todas las alertas</a>
            </div>';
  
    }



  echo $contenido;
?>