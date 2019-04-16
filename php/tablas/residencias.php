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
                  <?php
                      require_once '../procesamiento/publicaciones.php';
                      $publicacion = new Publicacion();
                      $datos = $publicacion->getPublicaciones(0,2);
                    
                      if($datos){
                        
                        foreach($datos as $row):
                    ?>
                    <tr>

                      <td><?php echo $row['titulo']; ?></td>
                      <td><?php echo $row['fecha']; ?></td>
                      <td><?php echo substr($row['descripcion'],0,50)."..."; ?></td>

                      <td  class="d-flex justify-content-center">
                      <button href="" id="" class="btn btn-info btn-circle" >
                      <i class="fas fa-eye"></i></button>
                      <button href="" id="" class="delete btn btn-danger btn-circle" onclick="confirm('<?php echo $row['id_publicacion_bancos']; ?>')">
                      <i class="fas fa-trash"></i></button>
                      </td>
                      
                      </tr>
                        <?php 
                      endforeach;  
                      }else{

                        ?>
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

  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../js/demo/datatables-demo.js"></script>

  <script src="../../js/sweetalert2.all.min.js" type="text/javascript"></script>

  <script type="text/javascript" src="../../js/deletePublic.js"></script>
</body>

</html>