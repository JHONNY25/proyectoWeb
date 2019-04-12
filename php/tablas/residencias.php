<?php require_once '../vistas/cabezera.php'; ?>

<?php require_once '../vistas/sidebar.php'; ?>
  
<?php require_once '../vistas/labelPerfil.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">
            <ol class="breadcrumb">
            <li class="breadcrumb-item">
            Publicaciones
            </li>
            <li class="breadcrumb-item active">Residencias</li>
        </ol>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Publicaciones</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table class="table table-striped table-hover rounded" id="dataTable" width="100%" cellspacing="0">
                  <thead class="azul-bajo text-white rounded">
                    <tr>
                      <th>Proyecto</th>
                      <th>Fecha</th>
                      <th>Descripción</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Marquis</td>
                      <td>Página web</td>
                      <td>2019-01-02</td>
                      <td  class="d-flex justify-content-center">
                      <a href="" class="btn btn-danger btn-circle">
                      <i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>System Architect</td>
                      <td>Estructura de una red</td>
                      <td>2019-01-04</td>
                      <td  class="d-flex justify-content-center">
                      <a href="" class="btn btn-danger btn-circle">
                      <i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>Villa real</td>
                      <td>Edinburgh</td>
                      <td>2019-12-23</td>
                      <td  class="d-flex justify-content-center">
                      <a href="" class="btn btn-danger btn-circle">
                      <i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>Villa real</td>
                      <td>Edinburgh</td>
                      <td>2019-02-12</td>
                      <td  class="d-flex justify-content-center">
                      <a href="" class="btn btn-danger btn-circle">
                      <i class="fas fa-trash"></i></a>
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

<?php require_once '../vistas/bloqueScriptTabla.php'; ?>