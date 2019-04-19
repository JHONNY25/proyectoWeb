<?php require_once '../vistas/cabezera.php'; ?>

<?php require_once '../vistas/sidebar.php'; ?>

<?php require_once '../vistas/labelPerfil.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">
            <ol class="breadcrumb">
            <li class="breadcrumb-item">
            Institución
            </li>
            <li class="breadcrumb-item active">Solicitud de Empresas</li>
        </ol>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Empresas para residencias</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive rounded">
                <table class="table table-striped table-hover rounded" id="dataTable" width="100%" cellspacing="0">
                  <thead class="azul-bajo text-white rounded">
                    <tr>
                      <th>Empresa</th>
                      <th>Colonia</th>
                      <th>Calle</th>
                      <th>Correo</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Marquis</td>
                      <td>System Architect</td>
                      <td>sin nombre</td>
                      <td>marquis@hotmail.com</td>

                      <td  class="d-flex justify-content-center">
                      <a href="" class="btn btn-success btn-circle mr-2" data-toggle="modal" data-target="#exampleModal">
                      <i class="fas fa-check"></i></a>
                      <a href="" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#modalRechazar">
                      <i class="fas fa-times"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>Las palmas</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>palmas@hotmail.com</td>
                      <td  class="d-flex justify-content-center">
                      <a href="" class="btn btn-success btn-circle mr-2" data-toggle="modal" data-target="#exampleModal">
                      <i class="fas fa-check"></i></a>
                      <a href="" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#modalRechazar">
                      <i class="fas fa-times"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>Villa real</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>villa@hotmail.com</td>
                      <td  class="d-flex justify-content-center">
                      <a href="" class="btn btn-success btn-circle mr-2" data-toggle="modal" data-target="#exampleModal">
                      <i class="fas fa-check"></i></a>
                      <a href="" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#modalRechazar">
                      <i class="fas fa-times"></i></a>
                      </td>
</tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
<?php require_once '../vistas/footer.php'; ?>

<?php require_once '../vistas/modalAcept.php'; ?>
<?php require_once '../vistas/modalRechazar.php'; ?>

<?php require_once '../vistas/bloqueScriptTabla.php'; ?>
