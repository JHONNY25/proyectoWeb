
<?php
require_once 'publicaciones.php';
$publicacion = new Publicacion();

if(isset($_POST['dato'])){
   $contenido = '';
   $result = $publicacion->getDetallePublicacion(($_POST['dato']));

   if($result){
 
        foreach($result as $row) {  
            $contenido .= '
                <div class="text-center">
                <h3 class="modal-title">'.$row['titulo'].'</h3>
                <p class="pt-3">Publicado en :'.$row['fecha'].'</p>
                </div>
                <div class="row pt-3">
                <p>Enfocado a: '.$row['clasificacion'].' para la carrera de '.$row['carrera'].'</p>
                <div class="pt-3">
                <h6>Descripción</h6>'.$row['descripcion'].'
                </div>
            </div>  
                ';  
        }   
        echo $contenido;  
   }
   
}

  

?>