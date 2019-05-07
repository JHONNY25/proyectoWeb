

<?php

require_once 'publicaciones.php';
require_once 'valores.php';
$publicacion = new Publicacion();
$valores = '2';

if(isset($_POST['dato'])){
    $datos = $publicacion->getPublicacionesInactivas(0,$_POST['dato']);

    $contenido = '';
    $vacio = '';


            if($datos){

              foreach($datos as $row):

            $contenido .= "<tr>
                <td>".$row['empresa'] ."</td>
                <td>".$row['correo'] ."</td>
                <td>".$row['titulo']."</td>
                <td>".$row['fecha']."</td>
                <td  class='d-flex justify-content-center'>
                <a
                data-id = \"".$row['id_publicacion_bancos']."\"
                data-descripcion = \"".$row['descripcion']."\"
                data-vacantes = \"".$row['vacantes']."\"
                data-fecha = \"".$row['fecha']."\"
                data-empresa = \"".$row['empresa']."\"
                data-correo = \"".$row['correo']."\"
                data-nombre = \"".$row['nombre']."\"
                data-titulo = \"".$row['titulo']."\"
                data-accion = \"".$_POST['dato']."\"

                href='' class='open-AddBookDialog btn btn-info btn-circle mr-2' data-toggle='modal' data-target='#modalInfo'>
                 <i class='fas fa-eye'></i></a>
                <button class='btn btn-success btn-circle mr-2 ml-2' onclick='confirmaAceptar(
                  \"".$row['id_publicacion_bancos']."\",
                  \" \",
                  \" \",
                  \"".$row['correo']."\",
                  \"".$row['empresa']."\"
                  )'>
                <i class='fas fa-check'></i></button>
                <button class='btn btn-danger btn-circle' onclick='confirm(
                  \"".$row['id_publicacion_bancos']."\",
                  \" \",
                  \" \",
                  \"".$row['correo']."\",
                  \"".$row['empresa']."\"
                  )'>
                <i class='fas fa-times'></i></button>
                </td>
                </tr>";



                endforeach;
            }

      echo $contenido;


}



?>

<script type="text/javascript">
$('.open-AddBookDialog').on('click',function () {
    var id = $(this).data("id");
    var descripcion = $(this).data("descripcion");
    var vacantes = $(this).data("vacantes");
    var fecha = $(this).data("fecha");
    var empresa = $(this).data("empresa");
    var correo = $(this).data("correo");
    var nombre = $(this).data("nombre");
    var titulo = $(this).data("titulo");
    var accion = $(this).data("accion");

    $("#empresa").text(empresa);
    $("#desc").text(descripcion);
    $("#fecha").text(fecha);
    $("#correo").text(correo);
    $("#para").text(nombre);
    $("#proyecto").text(titulo);
    $("#vacantes").text(vacantes);
    if (accion!=3) {
      $("#vacantesDiv").hide();
    }
});
</script>
