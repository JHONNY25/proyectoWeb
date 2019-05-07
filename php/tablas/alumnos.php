
<?php require_once '../vistas/cabezera.php'; ?>

<?php require_once '../vistas/sidebar.php'; ?>
  
<?php require_once '../vistas/labelPerfil.php'; ?>


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
                    require_once '../procesamiento/alumno.php';
                    $listado = new Alumno();
                  
                    $resp = $listado->listarAlumno();
                  
                    if($resp){
                      foreach($resp as $row): ?>
                    <tr>
                      <td><?php echo $row['nombre'] ." ". $row['apellido_paterno']. " " . $row['apellido_materno']; ?></td>
                      <td><?php echo $row['numero_control']; ?></td>
                      <td><?php echo $row['correo']; ?></td>
                      <td class="acciones">
                        <a href="" class="text-warning delete"><i class="fa fa-folder"></i></a>
                        <a href="" class="text-danger delete"><i class="fa fa-user-times"></i></a>
                        
                      </td>
                    </tr>
                  <?php endforeach; }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

  </div>
        <!-- /.container-fluid -->
<!-- MODAL TABLA DE SERVICIOS ACTIVOS -->
        <div class="modal fade bd-example-modal-lg" id="modalDocs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <!-- Nested Row within Card Body -->
              <div class="modal-content p-5">
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
                  <tbody id="servicios">
                  
                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
</div>

                            

    
<?php require_once '../vistas/footer.php'; ?>


<?php require_once '../vistas/bloqueScriptTabla.php'; ?>
