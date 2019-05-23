  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
    <!-- Logout Modal-->
    <div class="modal fade " id="modalInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Informacion de solicitud del alumno</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body"><?php require_once 'infoAlumno.php'; ?>
          </div>
          <div class="modal-footer">
            <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
             <button href="" class="btn btn-success btn-circle mr-2" data-dismiss="modal" onclick="confirmaAceptar
            (
            '<?php echo $row['numero_control']; ?>',
            '<?php echo ""; ?>',
            '<?php echo ""; ?>',
            '<?php echo $row['correo']; ?>',
            '<?php echo $row['nombre'] ." ". $row['apellido_paterno']. " " . $row['apellido_materno']; ?>'
            )">
            <i class="fas fa-check"></i></button>
            <button href="" class="btn btn-danger btn-circle" data-dismiss="modal" onclick="confirm
            (
            '<?php echo $row['numero_control']; ?>',
            '<?php echo ""; ?>',
            '<?php echo ""; ?>',
            '<?php echo $row['correo']; ?>',
            '<?php echo $row['nombre'] ." ". $row['apellido_paterno']. " " . $row['apellido_materno']; ?>'
            )">
            <i class="fas fa-times"></i></button>
        !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!  -->
          </div>
        </div>
      </div>
    </div>

    <?php require_once 'modalAceptAlu.php'; ?>
    <?php require_once 'modalRechazarAlu.php'; ?>
