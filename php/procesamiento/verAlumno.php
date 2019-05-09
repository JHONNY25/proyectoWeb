

<?php
require_once 'alumno.php';
$alumno = new Alumno();

if(isset($_POST['dato'])){
   $contenido = '';
   $result = $alumno->verAlumno($_POST['dato']);

   if($result){
 
        foreach($result as $row) {  
            $contenido .= '
                <div class="text-center">
                <h5 class="modal-title">Usuario</h5>
                    <p class="pt-3">'.$row['usuario'].'</p>

                    <h5 class="modal-title">Nombre</h5>
                    <p class="pt-3">'.$row['nombre']." ".$row['apellido_paterno']." ".$row['apellido_materno']." ".'</p>

                    <h5 class="modal-title">Numero de control</h5>
                    <p class="pt-3">'.$row['numero_control'].'</p>

                    <h5 class="modal-title">Correo</h5>
                    <p class="pt-3">'.$row['correo'].'</p>

                    <h5 class="modal-title">Telefono</h5>
                    <p class="pt-3">'.$row['telefono'].'</p>
                </div>
                </div> 
                ';  
        }   
        echo $contenido;  
   }
   
}

  

?>