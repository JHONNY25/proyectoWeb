<?php require_once '../vistas/cabezera.php'; ?>

<?php require_once '../vistas/sidebar.php'; ?>
  
<?php require_once '../vistas/labelPerfil.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">
            <ol class="breadcrumb">
            <li class="breadcrumb-item">
            Publicaciones
            </li>
            <li class="breadcrumb-item active">Bolsa de trabajo</li>
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
                  <tbody id="tabla3">
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
          
              <div class="modal-content pl-5 pb-5 pr-5 pt-0">
              <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                         
                </div>  
                <div class="modal-body" id="publicacionDetalle">  

                </div>

          </div>
        </div>
      </div>

      <div class="modal fade bd-example-modal-lg" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
          
              <div class="modal-content pl-3 pb-3 pr-3 pt-0">
              <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                         
                </div>  
                <div class="modal-body" id="actualizar">  
                <form action="post" class="user" id="publicacion">
              <div class="form-group">
                <p for="tipo ">
                      Tipo de publicación
                    <select require  name="tipo" id="tipo" class="custom-select">
                        <option id="tipoActual" value="" ></option>

                        <?php
                      require_once '../procesamiento/publicaciones.php';

                      $publicacion = new Publicacion();
                      $clasificacion = $publicacion->getClasificacionPublic();

                      
                      if($clasificacion){
                        foreach($clasificacion as $row):
                    ?>
                        <option value="<?php echo $row['id_clasificacion_publicacion']; ?>">
                        <?php echo $row['nombre']; ?>
                        </option>
                        <?php
                        endforeach;  
                        }else{
                        ?>
                          <option value="">No hay datos</option>
                        <?php
                        }
                        ?>
                    </select>
                </p>
              </div>

              <div class="form-group">
                <p for="tipo ">
                      Enfocado a:
                    <select require name="carrera" id="carrera" class="custom-select">
                      <option id="carreraActual" value=""></option>

                      <?php
                      $publicacion = new Publicacion();
                      $carrea = $publicacion->getCarreras();

                      if($carrea){
                        foreach($carrea as $row):
                    ?>
                        <option value="<?php echo $row['id_carrera']; ?>">
                        <?php echo $row['nombre']; ?>
                        </option>
                        <?php
                        endforeach;  
                        }else{
                        ?>
                          <option value="">No hay datos</option>
                        <?php
                        }
                        ?>
                    </select>
                </p>
              </div>

                <div class="form-group">
                   <input id="titulo" name="titulo" type="text" maxlength="24" placeholder="Ingresé el título del proyecto" class="form-control" aria-describedby="emailHelp" require>

                </div>

                <div class="form-group">
                   <input name="vacantes" id="vacante" type="text" maxlength="2" placeholder="Ingresé el numero de Vacantes" class="form-control" aria-describedby="emailHelp" require>

                </div>

                <div class="form-group">
                    <P>
                        Descripción del proyecto
                    <textarea require class="form-control" name="descripcion" id="desc" rows="7" >

                    </textarea>
                    </P>
                </div>
                <input type="hidden" id="id" value="" name="id">
                <button id="update" name="update" href="#" class="btn btn-inicio btn-user btn-block">Actualizar publicación</button>
            </form>
                </div>

          </div>
        </div>
      </div>
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
  <script type="text/javascript" src="../../js/trabajo.js"></script>
  <script type="text/javascript" src="../../js/listaComentarios.js"></script>
</body>

</html>