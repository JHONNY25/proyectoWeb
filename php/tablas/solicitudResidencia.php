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
              <div class="table-responsive">
              <table class="table table-striped table-hover rounded" id="dataTable" width="100%" cellspacing="0">
                  <thead class="azul-bajo text-white rounded">
                    <tr>
                      <th>Empresa</th>
                      <th>Proyecto</th>
                      <th>Fecha</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Marquis</td>
                      <td>Página web</td>
                      <td>2019-01-02</td>
                      <td  class="d-flex justify-content-center">
                      <a href="" class="btn btn-success btn-circle mr-2" data-toggle="modal" data-target="#exampleModal">
                      <i class="fas fa-check"></i></a>
                      <a href="" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#modalRechazar">
                      <i class="fas fa-times"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>System Architect</td>
                      <td>Estructura de una red</td>
                      <td>2019-01-04</td>
                      <td  class="d-flex justify-content-center">
                      <a href="" class="btn btn-success btn-circle mr-2" data-toggle="modal" data-target="#exampleModal">
                      <i class="fas fa-check"></i></a>
                      <a href="" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#modalRechazar">
                      <i class="fas fa-times"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>Villa real</td>
                      <td>Edinburgh</td>
                      <td>2019-12-23</td>
                      <td  class="d-flex justify-content-center">
                      <a href="" class="btn btn-success btn-circle mr-2" data-toggle="modal" data-target="#exampleModal">
                      <i class="fas fa-check"></i></a>
                      <a href="" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#modalRechazar">
                      <i class="fas fa-times"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>Villa real</td>
                      <td>Edinburgh</td>
                      <td>2019-02-12</td>
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

<?php require_once '../vistas/bloqueScriptTabla.php'; ?>