<?php require_once '../vistas/cabezera.php'; ?>

<?php require_once '../vistas/sidebar.php'; ?>

<?php require_once '../vistas/labelPerfil.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid">
            <ol class="breadcrumb">
            <li class="breadcrumb-item active">Notificación</li>
        </ol>


        <a href="#" class="btn azul-bajo text-white btn-icon-split mb-3" id="add" data-toggle='modal' data-target='#addNotificacion'>
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Nueva notificación</span>
        </a>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Notificaciones</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table class="table table-striped table-hover rounded" id="dataTable" width="100%" cellspacing="0">
                  <thead class="azul-bajo text-white rounded">
                  <tr>
                      <th>Notificación</th>
                      <th>Mensaje</th>
                      <th>Fecha de publicación</th>
                      <th>Usuario</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody id="notificacion">
  
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->


        <!-- MODAL PARA AGREGAR Y MODIFICAR DATOS DE NOTIFICACIÓN -->

        <div class="modal fade bd-example-modal-lg" id="addNotificacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
          
              <div class="modal-content pl-3 pb-3 pr-3 pt-0">
              <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                         
                </div>  
                <div class="modal-body" id="actualizar">  
                    <h3 class="text-center" id="etiqueta">Nueva Notificación</h3>
                <form action="post" class="user" id="formNotificacion">

                <div class="form-group">
                   <input id="titulo" name="titulo" type="text" placeholder="Ingrese el título de la notificación" class="form-control" aria-describedby="emailHelp" require>
                </div>

                <div class="form-group">
                    <P>
                        Mensaje
                    <textarea require class="form-control" name="mensaje" id="mensaje" rows="7" >
                    </textarea>
                    </P>
                </div>
                <input type="hidden" id="id" value="" name="id">
                <input type="submit" id="guardar"  href="#" class="btn btn-inicio btn-user btn-block" value="Guardar">
            </form>
                </div>

          </div>
        </div>
      </div>

      <!-- FIN DEL MODAL -->


      <!--  MODAL DE DETALLES-->
      <div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
          
              <div class="modal-content pl-5 pb-5 pr-5 pt-0">
              <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                         
                </div>  
                <div class="modal-body" id="notificacionDetalle">  

                </div>

          </div>
        </div>
      </div>
      <!-- FIN DE MODAL DE DETALLES -->
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
  <script src="../../js/validate.js"></script>
  <script src="../../js/notificacion.js"></script>
  <script type="text/javascript" src="../../js/listaComentarios.js"></script>

</body>

</html>