
<?php require_once '../vistas/cabezera.php'; ?>
<?php if($user->getTipo() == 1){?>
<?php require_once '../vistas/sidebar.php'; ?>
  
<?php require_once '../vistas/labelPerfil.php'; ?>


<div class="container-fluid d-flex flex-wrap">
  <!-- Grid column -->
  <div class="col mb-4">
   <h4 id="section1"><strong>Tus notificaciones</strong></h4>
    <!-- Exaple 1 -->
    <div>
    <div class="card example-2 scrollbar-ripe-malinka">
      <div class="card-body ">

      <?php
      
      require_once '../procesamiento/notificacion.php';
      $notificacion = new Notificacion();
      $datos = $notificacion->getNotificaciones();

        if($datos){
        
            foreach($datos as $row):
    ?>
       <a class="dropdown-item d-block align-items-center view mb-2 notify" href="#" id="<?php echo $row['id_notificacion'] ?>">
                <div class="">
                    <div class="small text-gray-500"><?php  echo $row['fecha'] ?></div>
                    <span class="font-weight-bold d-block"><?php echo $row['titulo'] ?></span>
                    <span class="d-block"><?php echo substr($row['mensaje'],0,120).'...' ?></span>
                </div>
                </a>
    <?php
            endforeach;  
        }
      ?>

      </div>
    </div>

    </div>


  </div>
  <!-- Grid column -->
  </div>

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

  <script src="../../js/notificacion.js"></script>
  <script type="text/javascript" src="../../js/listaNotificacion.js"></script>
  <script type="text/javascript" src="../../js/listaComentarios.js"></script>
  </body>

</html>
<?php }else{
        $host  = $_SERVER['HTTP_HOST'];

        header("Location: http://$host/proyectoWeb/");
        exit;
    } ?>