<?php require_once '../vistas/cabezera.php'; ?>

<?php require_once '../vistas/sidebar.php'; ?>
  
<?php require_once '../vistas/labelPerfil.php'; ?>

<?php 

  require_once '../procesamiento/alumno.php';
  $listado = new Alumno();

  $resp = $listado->listarAlumno();

  if($resp){
?>
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>N° control</th>
                      <th>Correo</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($resp as $row): ?>
                    <tr>
                      <td><?php echo $row['nombre'] ." ". $row['apellido_paterno']. " " . $row['apellido_materno']; ?></td>
                      <td><?php echo $row['numero_control']; ?></td>
                      <td><?php echo $row['correo']; ?></td>
                      <td  class="d-flex justify-content-center">
                      <a href="" class="btn btn-success btn-circle mr-2" data-toggle="modal" data-target="#exampleModal">
                      <i class="fas fa-check"></i></a>
                      <a href="" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#modalRechazar">
                      <i class="fas fa-times"></i></a>
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

<?php require_once '../vistas/bloqueScriptTabla.php'; ?>