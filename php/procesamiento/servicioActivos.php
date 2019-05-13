
<?php

require_once 'publicaciones.php';
$publicacion = new Publicacion();

if(!empty($_POST['dato'])){
  $datos = $publicacion->getPublicacionesServicio($_POST['dato']);

$contenido = '';


        if($datos){

          foreach($datos as $row):

        $contenido .= "<tr class='fila' id=".$row['id_publicacion_bancos']. ">
        <td>".$row['empresa'] ."</td>
            <td>".$row['titulo'] ."</td>
            <td>".substr($row['descripcion'],0,60).'...'."</td>
            <td>".$row['fecha'] ."</td>
            </tr>";

            endforeach;
        }else{

            $contenido .= "<tr>
            <td colspan='4' class='text-center'>No hay datos</td>
            </tr>";
           }




  echo $contenido;
}

?>
