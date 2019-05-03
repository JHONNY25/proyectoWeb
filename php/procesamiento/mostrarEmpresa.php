
<?php

    require_once 'empresa.php';
    $listado = new Empresa();

    $datos = $listado->getEmpresaEstado(0);
    $contenido = '';


        if($datos){

          foreach($datos as $row):

        $contenido .= "<tr>
            <td>".$row['nombre'] ."</td>
            <td>".$row['colonia'] ."</td>
            <td>".$row['calle']."</td>
            <td>".$row['correo']."</td>
            <td  class='d-flex justify-content-center '>
            <a
            data-id = \"".$row['id_institucion']."\"
            data-nombre = \"".$row['nombre']."\"
            data-calle = \"".$row['calle']."\"
            data-colonia = \"".$row['colonia']."\"
            data-municipio = \"".$row['municipio']."\"
            data-correo = \"".$row['correo']."\"
            data-telefono = \"".$row['telefono']."\"

            href='' class='open-AddBookDialog btn btn-info btn-circle view' data-toggle='modal' data-target='#modalInfo'>
             <i class='fas fa-eye'></i></a>
            <button class='btn btn-success btn-circle mr-2 ml-2' onclick='confirmaAceptar(
              \"".$row['id_institucion']."\",
              \" \",
              \" \",
              \"".$row['correo']."\",
              \"".$row['nombre']."\"
              )'>
            <i class='fas fa-check'></i></button>
            <button class='btn btn-danger btn-circle' onclick='confirm(
              \"".$row['id_institucion']."\",
              \" \",
              \" \",
              \"".$row['correo']."\",
              \"".$row['nombre']."\"
              )'>
            <i class='fas fa-times'></i></button>
            </td>
            </tr>";

            endforeach;
        }




  echo $contenido;
?>

<script type="text/javascript">


$('.open-AddBookDialog').on('click',function () {
    var id = $(this).data("id");
    var nombre = $(this).data("nombre");
    var calle = $(this).data("calle");
    var colonia = $(this).data("colonia");
    var municipio = $(this).data("municipio");
    var correo = $(this).data("correo");
    var telefono = $(this).data("telefono");
    $("[name='nombre']").val(nombre);
    $("[name='calle']").val(calle);
    $("[name='colonia']").val(colonia);
    $("[name='municipio']").val(municipio);
    $("[name='correo']").val(correo);
    $("[name='telefono']").val(telefono);
});
</script>



</script>
