
<?php require_once '../vistas/cabezera.php'; ?>

<?php require_once '../vistas/sidebar.php'; ?>
  
<?php require_once '../vistas/labelPerfil.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Servicios y Trabajos</h6>
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-end mb-3">
              <form action="" method="post">
                <input id="buscador" type="text" class="form-control form-control-user" name="buscar" placeholder="Buscar ...">
              </form>
              </div>

              <div class="table-responsive">
                <div class="paginacion">

                </div>
                <div class="alerta">

                </div>
                <div class="links"></div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->


        <div class="modal fade bd-example-modal-lg" id="modalResident" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
          <!-- Nested Row within Card Body -->
              <div class="modal-content p-5">
                <div class="text-center">
                  <h3>Proyecto administrativo</h3>

                </div>

                <div class="row pt-3">
                  <h6>Nombre :</h6>
                  <p>Hotel marquis</p>
                  <div class="pt-3">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                    Rem voluptas at placeat eaque iste aut, animi dignissimos, 
                    laborum quidem commodi, nihil sed. Consequatur reiciendis, 
                    dolores consectetur praesentium voluptatum sint amet?
                  </div>
                  <div  class="pt-3">
                    <ul>
                      <li>Dominio de php</li>
                      <li>Dominio de javaScript</li>
                      <li>CSS y HTML</li>
                      <li>Uso de framework laravel</li>
                      <li>Uso de framework angular</li>
                      <li>Se requiere conocimientos en MySQL</li>
                    </ul>
                  </div>
                  <p class="pt-3">fecha : 2019-01-01</p>
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
  <script type="text/javascript" src="ajax.js"></script>
 
</body>

</html>
