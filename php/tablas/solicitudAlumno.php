<?php require_once '../vistas/cabezera.php'; ?>

<?php require_once '../vistas/sidebar.php'; ?>

<?php require_once '../vistas/labelPerfil.php'; ?>

<?php require_once '../../phpMailer/Enviar.php'; ?>


      <div class="container-fluid">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item">
            Tramite servicio social
            </li>
            <li class="breadcrumb-item active">Alumnos</li>
        </ol>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Alumnos</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table class="table table-striped table-hover rounded" id="dataTable" width="100%" cellspacing="0">
                  <thead class="azul-bajo text-white rounded">
                    <tr>
                      <th>Nombre</th>
                      <th>N° control</th>
                      <th>Correo</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  
                  $rechazado = "";
                  $rechazadoAsunto = "";

                    require_once '../procesamiento/alumno.php';
                    $listado = new Alumno();

                    $resp = $listado->listarAlumnoInactivo();

                    if($resp){

                  foreach($resp as $row): ?>
                    <tr>
                      <td id="fila"><?php echo $row['nombre'] ." ". $row['apellido_paterno']. " " . $row['apellido_materno']; ?></td>
                      <td><?php echo $row['numero_control']; ?></td>
                      <td><?php echo $row['correo']; ?></td>
                      <td  class="d-flex justify-content-center">
                        <a  data-id = "<?php echo $row['numero_control']; ?>"
                          data-nombre = "<?php echo $row['nombre'] ." ". $row['apellido_paterno']. " " . $row['apellido_materno']; ?>"
                          data-correo = "<?php echo $row['correo']; ?>"
                          data-telefono = "<?php echo $row['telefono']; ?>"
                          data-carrera = "<?php echo $row['carrera']; ?>"
                          data-kardex = "<?php echo $row['kardex']; ?>"
                          href="" class="open-AddBookDialog btn btn-info btn-circle mr-2" data-toggle="modal" data-target="#modalInfo">
                        <i class="fas fa-eye"></i></a>
                      <button href="" class="btn btn-success btn-circle mr-2" onclick="confirmaAceptar
                      (
                      '<?php echo $row['numero_control']; ?>',
                      '<?php echo ""; ?>',
                      '<?php echo ""; ?>',
                      '<?php echo $row['correo']; ?>',
                      '<?php echo $row['nombre'] ." ". $row['apellido_paterno']. " " . $row['apellido_materno']; ?>'
                      )">
                      <i class="fas fa-check"></i></button>
                      <button href="" id="" class="btn btn-danger btn-circle" onclick="confirm
                      (
                      '<?php echo $row['numero_control']; ?>',
                      '<?php echo $rechazado; ?>',
                      '<?php echo $rechazadoAsunto; ?>',
                      '<?php echo $row['correo']; ?>',
                      '<?php echo $row['nombre'] ." ". $row['apellido_paterno']. " " . $row['apellido_materno']; ?>'
                      )">
                      <i class="fas fa-times"></i></button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
                <?php } ?>
              </div>
            </div>
          </div>

  </div>
        <!-- /.container-fluid -->

<?php require_once '../vistas/footer.php'; ?>

<?php require_once '../vistas/modalAceptAlu.php'; ?>
<?php require_once '../vistas/modalRechazarAlu.php'; ?>
<?php require_once '../vistas/modalAluInfo.php'; ?>

<?php require_once '../vistas/bloqueScriptTabla.php'; ?>
<script type="text/javascript">
$('.open-AddBookDialog').on('click',function () {

    var id = $(this).data("id");
    var nombre = $(this).data("nombre");
    var correo = $(this).data("correo");
    var telefono = $(this).data("telefono");
    var carrera = $(this).data("carrera");
    var kardex = $(this).data("kardex");
    var ruta = '../../upload/kardex/'+kardex;
    $("[name='control']").val(id);
    $("[name='nombre']").val(nombre);
    $("[name='correo']").val(correo);
    $("[name='telefono']").val(telefono);
    $("[name='carrera']").val(carrera);
    $("[name='imagen']").attr('src', ruta);
    $("[name='detImagen']").attr('href', ruta);
    $("[name='abrir']").attr('href', ruta);

});



$('#fila').dblclick(function () {
  $('#exampleModal').modal('toggle');
  var id = $(this).data("id");
  var nombre = $(this).data("nombre");
  var correo = $(this).data("correo");
  var telefono = $(this).data("telefono");
  var carrera = $(this).data("carrera");
  var kardex = $(this).data("kardex");
  var ruta = '../../upload/kardex/'+kardex;
  $("[name='control']").val(id);
  $("[name='nombre']").val(nombre);
  $("[name='correo']").val(correo);
  $("[name='telefono']").val(telefono);
  $("[name='carrera']").val(carrera);
  $("[name='imagen']").attr('src', ruta);
  $("[name='detImagen']").attr('href', ruta);
  $("[name='abrir']").attr('href', ruta);
});
</script>
<?php

// $email = new enviar();
// $email->notificaUsuario("SI FUNCIONO");




 ?>

<script src="../../vendor/jquery/jquery.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../../js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../../vendor/datatables/jquery.dataTables.js"></script>
<script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../../js/demo/datatables-demo.js"></script>

<script src="../../js/sweetalert2.all.min.js" type="text/javascript"></script>

<script type="text/javascript" src="../../js/alumno.js"></script>
