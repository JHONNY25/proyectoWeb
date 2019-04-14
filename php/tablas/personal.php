
<?php require_once '../vistas/cabezera.php'; ?>

<?php require_once '../vistas/sidebar.php'; ?>

<?php require_once '../vistas/labelPerfil.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid">
            <ol class="breadcrumb">
            <li class="breadcrumb-item">
            Usuarios
            </li>
            <li class="breadcrumb-item active">Personal</li>
        </ol>

        <a href="../formularios/NuevoUsuario.php" class="mb-3 btn btn-icon-split btn-add">
            <span class="icon text-white-50">
                <i class="fas fa-plus-circle"></i>
            </span>
            <span class="text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nuevo Usuario</font></font></span>
        </a>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Personal</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table class="table table-striped table-hover rounded" id="dataTable" width="100%" cellspacing="0">
                  <thead class="azul-bajo text-white rounded">
                    <tr>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Telefono</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    require_once '../procesamiento/personal.php';
                    $listado = new Personal();
                  
                    $resp = $listado->listarPersonas();
                  
                    if($resp){
                      foreach($resp as $row): ?>
                    <tr>
                      <td><?php echo $row['nombre'] ." ". $row['apellido_paterno']. " " . $row['apellido_materno']; ?></td>
                      <td><?php echo $row['correo']; ?></td>
                      <td><?php echo $row['telefono']; ?></td>
                      <td class="d-flex justify-content-center">
                      <a href="" class="text-danger delete"><i class="fa fa-user-times"></i></a>
                      </td>
                    </tr>
                    <?php endforeach; 
                  }else{?>
                      <tr>
                      <td colspan="4" class="text-center">No hay datos</td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

<?php require_once '../vistas/footer.php'; ?>

<?php require_once '../vistas/bloqueScriptTabla.php'; ?>
