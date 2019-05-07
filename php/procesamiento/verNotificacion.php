

<?php
require_once 'notificacion.php';
$notificacion = new Notificacion();

if(isset($_POST['dato'])){
   $contenido = '';
   $result = $notificacion->detalleNotificacion($_POST['dato']);

   if($result){
 
        foreach($result as $row) {  
            $contenido .= '
                <div class="text-center">
                <h4 class="modal-title">'.$row['titulo'].'</h4>
                <p class="pt-3">Publicado en :'.$row['fecha'].' por '.$row['usuario'].'</p>
                </div>
                <div class="row pt-3">
                <div class="pt-3">
                <h6>Descripción</h6>'.$row['mensaje'].'
                </div>
            </div>  
                ';  
        }   
        echo $contenido;  
   }
   
}

  

?>