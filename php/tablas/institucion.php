<?php require_once '../vistas/cabezera.php'; ?>

<?php require_once '../vistas/sidebar.php'; ?>

<?php require_once '../vistas/labelPerfil.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid">
            <ol class="breadcrumb">
            <li class="breadcrumb-item">
            Institución
            </li>
            <li class="breadcrumb-item active">Empresas</li>
        </ol>

        <a href="../formularios/nuevaEmpresa.php" class="mb-3 btn btn-icon-split btn-add">
            <span class="icon text-white-50">
                <i class="fas fa-plus-circle"></i>
            </span>
            <span class="text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nueva Empresas</font></font></span>
        </a>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Empresas</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Telefono</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Hotel Marquis</td>
                      <td>marquis@hotmail.com</td>
                      <td>6241244554</td>
                      <td class="d-flex justify-content-center">
                      <a href="" class="text-danger delete"><i class="fa fa-user-times"></i></a>
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

<?php require_once '../vistas/logoutModal.php'; ?>

<?php require_once '../vistas/bloqueScriptTabla.php'; ?>