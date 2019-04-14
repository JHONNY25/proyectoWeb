<?php require_once '../vistas/cabezera.php'; ?>

<?php require_once '../vistas/sidebar.php'; ?>
  
<?php require_once '../vistas/labelPerfil.php'; ?>


<!-- Begin Page Content -->
<div class="container-fluid">
            <ol class="breadcrumb">
            <li class="breadcrumb-item">
            Aceptaciones
            </li>
            <li class="breadcrumb-item active">Publicaciones aceptadas</li>
        </ol>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Publicaciones aceptadas</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table class="table table-striped table-hover rounded" id="dataTable" width="100%" cellspacing="0">
                  <thead class="azul-bajo text-white rounded">
                    <tr>
                      <th>Tipo publicación</th>
                      <th>Proyecto</th>
                      <th>Fecha</th>
                      <th>Descripción</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      require_once '../procesamiento/publicaciones.php';
                      $publicacion = new Publicacion();
                      $datos = $publicacion->getPublicacionesAceptadas(1);

                    
                      if($datos){
                        
                        foreach($datos as $row):
                    ?>
                    <tr>

                      <td><?php echo $row['clasificacion']; ?></td>
                      <td><?php echo $row['titulo']; ?></td>
                      <td><?php echo $row['fecha']; ?></td>
                      <td><?php echo substr($row['descripcion'],0,50)."..."; ?></td>

                      <td  class="d-flex justify-content-center">
                      <a href="" class="btn btn-danger btn-circle">
                      <i class="fas fa-trash"></i></a>
                      </td>
                      </tr>
                        <?php 
                      endforeach;  
                      }else{

                        ?>
                        <tr>
                          <td colspan="5" class="text-center">No hay datos</td>
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
