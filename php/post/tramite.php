<?php require_once '../vistas/cabezera.php'; ?>
<?php if($user->getTipo() == 0 || $user->getTipo() == 1){?>
<?php require_once '../vistas/sidebar.php'; ?>

<?php require_once '../vistas/labelPerfil.php'; ?>

<div class="container-fluid">
<ol class="breadcrumb">
            <li class="breadcrumb-item">
            Tramite de servico social
            </li>
            <li class="breadcrumb-item active">Tramite</li>
        </ol>
  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg mb-4">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
              <?php
                    if($tipo == 1){
                  ?>
                <div class="text-center">
                  <h3>Tramite de servicio social</h3>

                  <a href="" class="ml-1 text-primary" data-toggle="modal" data-target="#modalDocs">
                    <i class="fas fa-info-circle"></i></a>
                  <p class="pt-1">Durante el servicio social se llevara a cabo un tramite, el cual será verificado por el personal de vinculación. </p>
                </div>
                <div>
                Cuando el documento este con un <span class="text-info">Sí</span>
                significa que ha sido verificado por el personal de vinculación, si es un <span class="text-info">NO</span>
                significa que no ha sido verificado y estas a espera de revisión.
                </div>

                    <?php
                    }else if($tipo == 0){

                      require_once '../procesamiento/alumno.php';

                      $alumno = new Alumno();

                      if(isset($_GET['al']) && !empty($_GET['al'])){
                        $id = $_GET['al'];

                      $detalles = $alumno->detallesAlumno($id);

                      $nombre = $alumno->getNombre();
                      $apeP = $alumno->getApellidoPaterno();
                      $apeM = $alumno->getApellidoMaterno();

                ?>

                  <h3>Tramite de servicio social</h3>
                  <div class="row">
                    <div class="col-6">
                    <div class="form-group">
                    <h5>Nombre Completo :</h5>
                    <label for=""><?php echo " ".$nombre." " .$apeP ." " .$apeM; ?></label>
                    </div>

                    <div class="form-group">
                    <h5>Carrera</h5>
                    <label for=""><?php echo $alumno->getCarrera(); ?></label>
                    </div>
                    </div>

                    <div class="col-6">
                    <div class="form-group">
                    <h5>Numero de control</h5>
                    <label for=""><?php echo $alumno->getNumControl(); ?></label>
                    </div>

                    </div>
                  </div>
                  <?php
                      }
                  ?>

                <?php
                    }
                ?>

                  <?php
                    if($tipo == 1){

                      require_once '../procesamiento/alumno.php';

                      $alumno = new Alumno();

                    if($alumno->existeAlumnoServicio($user->getId())){

                      $termino = $user->fin_servicio($user->getId());

                      $numeroDocumentos = $user->getNumeroDeDocumentosAceptados();

                      if($numeroDocumentos == 12){

                    ?>
                         <div class='text-center'>
                          <a href='' class='btn text-success text-white btn-icon-split warning-servicio' id=''>
                                    <i class='fas fa-check-circle'></i>
                            </a>
                          </div>
                      <div id='' class='alert alert-success mt-3' role='alert'>
                       Felicidades por terminar tu servicio social, este es un pasó más para terminar tu carrera.
                      </div>
                  <?php
                      }
                  ?>
                   <a href="cartaLiberacion.php?al=<?php echo $user->getId(); ?>" class="btn azul-bajo text-white btn-icon-split mb-2 mt-3">
                        <span class="icon text-white-50">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="text">Administrar documentos</span>
                    </a>


                <h5 class="mt-2 mb-2">Documentos :</h5>

                <div class="table-responsive">

              <table class=" table table-striped table-hover rounded" id="" width="100%" cellspacing="0">
                  <thead class="azul-bajo text-white rounded">
                    <tr>
                      <th>Documento</th>
                      <th>Aceptado</th>
                    </tr>
                  </thead>
                  <tbody id="" >

                  <?php
                    require_once '../procesamiento/alumno.php';
                     $id_usuario =  $user->getId();
                    $alumno = new Alumno();
                    $datos = $alumno->documentosAceptados($id_usuario,1);

                    if($datos){

                      foreach($datos as $row):

                  ?>
                    <tr id="">
                      <td ><?php echo $row['documento']; ?></td>
                      <td><?php echo $row['aprobacion']; ?></td>
                    </tr>

                    <?php
                    endforeach;
                    }
                    ?>
                  </tbody>
                </table>


                <?php
                    }else{
                ?>
                  <div class="text-center">
                      <a href="" class="btn text-warning text-white btn-icon-split warning-servicio" id="">
                                <i class="fas fa-exclamation-triangle"></i>
                        </a>

                  </div>


                  <div id='' class='alert alert-danger mt-3' role='alert'>No has iniciado tu servicio, debes acudir a vinculación
                    para ser asignado a un servicio, así podras iniciar tu tramite donde podras comunicarte con
                    un administrador de vinculación el cual te guiara en tu tramite al dar click en administrar documentos.</div>
                  <?php
                    }
                    }else if($tipo == 0){

                ?>
                <h5 class="mt-2 mb-2">Documentos :</h5>

                <div class="table-responsive">
              <table class=" table table-striped table-hover rounded" id="" width="100%" cellspacing="0">
                  <thead class="azul-bajo text-white rounded">
                    <tr>
                      <th>Documento</th>
                      <th>Aceptado</th>
                      <th>Aceptar documento</th>
                    </tr>
                  </thead>
                  <tbody id="aceptaciones" >

                  </tbody>
                </table>

                <input type="hidden" id="valor" value="<?php echo $_GET['al']; ?>">

              <?php
                    }
              ?>
              </div>

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

  <div class="modal fade bd-example-modal-lg" id="modalDocs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <!-- Nested Row within Card Body -->
              <div class="modal-content p-5">
                <div class="text-center">
                  <h3>Documentos para tramite de servicio social</h3>

                  <p class="pt-1 text-danger">!! El servicio no se podra realizar con colaboradores del Instituto Tecnologico de Los Cabos. ¡¡</p>

                </div>
                <div> Para poder realizar tu tramite debes contar con el 70% de creditos o proximo a acreditarlos.
                <h5><span>Documentos descargables:</span></h5>
                <?php
                    if (file_exists("../../upload/formatosAlumnos/formato/formato-SolicitudSS.docx")) {
                      ?><a class="d-block" href="../../upload/formatosAlumnos/formato/formato-SolicitudSS.docx" target="_blank">➨Solicitud de servicio social</a><?php
                    }
                    if (file_exists("../../upload/formatosAlumnos/ejemplo/ejemplo-SolicitudSS.pdf")) {

                      ?>
                      <div style="padding-left:15px;">
                        <a class="d-block" href="../../upload/formatosAlumnos/ejemplo/ejemplo-SolicitudSS.pdf" target="_blank">➥Ejemplo de llenado de servicio social</a><p></p>
                      </div>
                      <?php
                    }
                    //================================================================================================
                    if (file_exists("../../upload/formatosAlumnos/formato/formato-Solicitud-prestador-servicio.docx")) {
                      ?><a class="d-block" href="../../upload/formatosAlumnos/formato/formato-Solicitud-prestador-servicio.docx" target="_blank">➨Solicitud de prestador de servicio social</a><?php
                    }
                    if (file_exists("../../upload/formatosAlumnos/ejemplo/ejemplo-solicitud-prestador-servicio.pdf")) {

                      ?>
                      <div style="padding-left:15px;">
                        <a class="d-block" href="../../upload/formatosAlumnos/ejemplo/ejemplo-solicitud-prestador-servicio.pdf" target="_blank">➥Ejemplo de solicitud de prestador de servicio social</a><p></p>
                      </div>
                      <?php
                    }

                    //================================================================================================
                    if (file_exists("../../upload/formatosAlumnos/formato/formato-Carta-compromiso.docx")) {
                      ?><a class="d-block" href="../../upload/formatosAlumnos/formato/formato-Carta-compromiso.docx" target="_blank">➨Carta compromiso</a><?php
                    }
                    if (file_exists("../../upload/formatosAlumnos/ejemplo/ejemplo-carta-compromiso.pdf")) {

                      ?>
                      <div style="padding-left:15px;">
                        <a class="d-block" href="../../upload/formatosAlumnos/ejemplo/ejemplo-carta-compromiso.pdf" target="_blank">➥Ejemplo de carta compromiso</a><p></p>
                      </div>
                      <?php
                    }

                    //================================================================================================
                    if (file_exists("../../upload/formatosAlumnos/formato/formato-Reportes-bimestrales.docx")) {
                      ?><a class="d-block" href="../../upload/formatosAlumnos/formato/formato-Reportes-bimestrales.docx" target="_blank">➨Reportes bimestrales</a><?php
                    }
                    if (file_exists("../../upload/formatosAlumnos/ejemplo/ejemplo-Reportes-bimestrales.pdf")) {

                      ?>
                      <div style="padding-left:15px;">
                        <a class="d-block" href="../../upload/formatosAlumnos/ejemplo/ejemplo-Reportes-bimestrales.pdf" target="_blank">➥Ejemplo de Reportes bimestrales</a><p></p>
                      </div>
                      <?php
                    }

                    //================================================================================================
                    if (file_exists("../../upload/formatosAlumnos/formato/formato-Informe-final.docx")) {
                      ?><a class="d-block" href="../../upload/formatosAlumnos/formato/formato-Informe-final.docx" target="_blank">➨Informe final</a><?php
                    }
                    if (file_exists("../../upload/formatosAlumnos/ejemplo/ejemplo-Informe-final.pdf")) {

                      ?>
                      <div style="padding-left:15px;">
                        <a class="d-block" href="../../upload/formatosAlumnos/ejemplo/ejemplo-Informe-final.pdf" target="_blank">➥Ejemplo de informe final</a><p></p>
                      </div>
                      <?php
                    }

                    //================================================================================================
                    if (file_exists("../../upload/formatosAlumnos/formato/formato-Carta-de-liberacion.docx")) {
                      ?><a class="d-block" href="../../upload/formatosAlumnos/formato/formato-Carta-de-liberacion.docx" target="_blank">➨Carta de liberación</a><?php
                    }
                    if (file_exists("../../upload/formatosAlumnos/ejemplo/ejemplo-Carta-liberacion.pdf")) {

                      ?>
                      <div style="padding-left:15px;">
                        <a class="d-block" href="../../upload/formatosAlumnos/ejemplo/ejemplo-Carta-liberacion.pdf" target="_blank">➥Ejemplo de carta de liberación</a><p></p>
                      </div>
                      <?php
                    }

                 ?>

              </div>
                <div class="row pt-3">
                <div class="col-6">
                <h5>Necesitas los siguientes documentos:</h5>
                    <ul>
                        <li class="m-2">Solicitud de servicio social</li>
                        <li class="m-2">Solicitud de prestador de servicio social</li>
                        <li class="m-2">Carta compromiso</li>
                        <li class="m-2">Constancia de tutorias (Departamento de desarrollo academico)</li>
                        <li class="m-2">Constancia de actividades escolares (Se solicita en vinculación)</li>
                        <li class="m-2">Constancia del curso de inducción (Responsable de academia)</li>
                    </ul>
                </div>
                <div class="col-6">
                <h6>Documentación de mi expediente</h6>
                    <ul>
                        <li class="m-2">Carta de presentación</li>
                        <li class="m-2">Carta de aceptación</li>
                        <li class="m-2">
                        3 Reportes bimestrales con firma del prestador del servicio,
                        Firma del alumno y Evaluación del prestador del servicio social.
                        </li>
                        <li class="m-2">Carta de terminación expedida por la dependencia</li>
                        <li class="m-2">Informe final (Documento en USB)</li>
                        <li class="m-2">Carta de cartaLiberación expedida por la dependencia</li>
                    </ul>
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
  <script type="text/javascript" src="../../js/listaNotificacion.js"></script>
  <script type="text/javascript" src="../../js/listaComentarios.js"></script>

  </body>

</html>
<?php }else{
        $host  = $_SERVER['HTTP_HOST'];

        header("Location: http://$host/proyectoWeb/");
        exit;
    } ?>
