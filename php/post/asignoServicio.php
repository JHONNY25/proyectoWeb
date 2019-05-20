
<?php require_once '../vistas/cabezera.php'; ?>

<?php require_once '../vistas/sidebar.php'; ?>

<?php require_once '../vistas/labelPerfil.php'; ?>


<div class="container">
  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h2>Detalles de asignación a servicio</h2>
                </div>

                <form class="user" method="post" id="">
                  <hr>

                  <div class="row">
                  <div class="col-6">

                  <div class="form-group">
                  
                  <?php
                      require_once '../procesamiento/alumno.php';
                      $alumno = new Alumno();

                      if(isset($_GET['folio'])){
                      $datos = $alumno->verAlumno($_GET['folio']);

                      if($datos){

                        foreach ($datos as $row) {

                  ?>
                    <h5>Nombre</h5>
                    <label for=""><?php echo $row['nombre']; ?></label>

                    <h5>Número de control</h5>
                    <label for=""><?php echo $row['numero_control']; ?></label>

                    <h5>Correo</h5>
                    <label for=""><?php echo $row['correo']; ?></label>

                    <input type="hidden" value="<?php echo $row['fk_carrera']; ?>" class="tipoCarrera">
                    <input type="hidden" value="<?php echo $row['id_persona']; ?>" class="persona">
                    </div>

                    </div>
                    <?php
                        }
                      }else{

            
                    ?>
                      <h5>No hay datos de alumno</h5>
                    <?php 
                        }
              
                    ?>
                    <div class="col-6">
                    <a href="#" class="btn azul-bajo text-white btn-icon-split mb-3" data-toggle='modal' data-target='#modalTable'>
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Asignar servicio</span>
                    </a>

                    <div class="form-group" id="detalleEmpresa">
                      <h5>Empresa</h5>
                      <label for="" id="empresa"></label>

                      <h5>Proyecto</h5>
                      <label for="" id="proyecto"></label>

                      <h5>Proyecto</h5>
                      <label for="" id="desc"></label>

                      <input type="hidden" id="publicacionFK" value="">
                    </div>

                    </div>
 
                  </div>
  
                  <a id="addServicio" class="btn btn-inicio btn-user btn-block text-white">Asignar servicio</a>
                  <?php
                      }
                        ?>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>


<!-- MODAL TABLA DE SERVICIOS ACTIVOS -->
<div class="modal fade bd-example-modal-lg" id="modalTable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <!-- Nested Row within Card Body -->
              <div class="modal-content ">
              <div class="card shadow ">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Servicio Social</h6>
            </div>
                <div class="card-body">
              <div class="table-responsive">
              <table class="table table-striped table-hover rounded" id="dataTable" width="100%" cellspacing="0">
                  <thead class="azul-bajo text-white rounded">
                    <tr>
                      <th>Empresa</th>
                      <th>Proyecto</th>
                      <th>Descripción</th>
                      <th>Fecha</th>
                    </tr>
                  </thead>
                  <tbody id="servicios">
                  
                  </tbody>
                </table>
              </div>
              
          </div>
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
  <script type="text/javascript" src="../../js/servicioActivo.js"></script>
  <script type="text/javascript" src="../../js/listaComentarios.js"></script>
</body>

</html>
