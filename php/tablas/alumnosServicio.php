<?php require_once '../vistas/cabezera.php'; ?>

<?php require_once '../vistas/sidebar.php'; ?>
  
<?php require_once '../vistas/labelPerfil.php'; ?>

      <div class="container-fluid">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item">
            Tramite servicio social
            </li>
            <li class="breadcrumb-item active">Alumnos en servicio</li>
        </ol>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Alumnos en servicio</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Carrera</th>
                      <th>N° control</th>
                      <th>Correo</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td class="acciones">
                        <a href="" class="notificacion"><i class="fas fa-bell fa-fw"></i></a>
                        <a href="../post/cartaLiberacion.php" class="text-success subir-carta"><i class="fa fa-upload"></i></a>
                        <a href="" class="text-danger delete"><i class="fa fa-user-times"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td class="acciones">
                        <a href="" class="notificacion"><i class="fas fa-bell fa-fw"></i></a>
                        <a href="" class="text-success subir-carta"><i class="fa fa-upload"></i></a>
                        <a href="" class="text-danger delete"><i class="fa fa-user-times"></i></a>
                      </td>
                    </tr>
                   
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td class="acciones">
                        <a href="" class="notificacion"><i class="fas fa-bell fa-fw"></i></a>
                        <a href="" class="text-success subir-carta"><i class="fa fa-upload"></i></a>
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

<?php require_once '../vistas/bloqueScriptTabla.php'; ?>