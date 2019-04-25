<?php require_once '../vistas/cabezera.php'; ?>
<?php if($user->getTipo() == 0 || $user->getTipo() == 1){?>
<?php require_once '../vistas/sidebar.php'; ?>
  
<?php require_once '../vistas/labelPerfil.php'; ?>

<div class="container-fluid">
<ol class="breadcrumb">
            <li class="breadcrumb-item">
            Tramite de servico social
            </li>
            <li class="breadcrumb-item active">Mi tramite</li>
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
                Cuando el documento este con una <a href="" class="ml-1 text-primary"><i class="fas fa-check"></i></a>
                significa que ha sido verificado por el personal, si no esta macada
                significa que no ha sido verificado y estas a espera de revisión.
                </div>
                <?php
                    }else if($tipo == 0){
                  $usuario = $user->getNombre();
                  $user->getDetallesUsuario($usuario);

                  $apeP = $user->getApellidoP();
                  $apeM = $user->getApellidoM();
                ?>

                  <h3>Tramite de servicio social</h3>
                  <div class="row">
                    <div class="col-6">
                    <div class="form-group">
                    <h5>Nombre Completo :</h5>
                    <label for=""><?php echo " ".$usuario." " .$apeP ." " .$apeM; ?></label>
                    </div>
                    </div>

                    <div class="col-6">
                    <div class="form-group">
                    <h5>Numero de control</h5>
                    <label for=""><?php echo $user->getNumeroControl(); ?></label>
                    </div>
                    </div>
                  </div>
                <?php
                    }
                ?>
                
                <h5 class="mt-2 mb-2">Documnetos entregados:</h5>
                    
                <div class="row pt-3">
                  
                <div class="col-6">
                <form action="">


                <div class="custom-control custom-checkbox check">
                    <input type="checkbox" class="custom-control-input" autocomplete="off" id="doc1" checked>
                    <label class="custom-control-label" for="doc1">Solicitud de servicio social</label>
                  </div>

                  <div class="custom-control custom-checkbox check">
                    <input type="checkbox" class="custom-control-input" autocomplete="off" id="doc2" checked>
                    <label class="custom-control-label" for="doc2">Solicitud de prestador de servicio social</label>
                  </div>

                  <div class="custom-control custom-checkbox check">
                    <input type="checkbox" class="custom-control-input" autocomplete="off" id="doc3" checked>
                    <label class="custom-control-label" for="doc3">Carta compromiso</label>
                  </div>

                  <div class="custom-control custom-checkbox check">
                    <input type="checkbox" class="custom-control-input" autocomplete="off" id="doc4" >
                    <label class="custom-control-label" for="doc4">Constancia de tutorias (Departamento de desarrollo academico)</label>
                  </div>

                  
                  <div class="custom-control custom-checkbox check">
                    <input type="checkbox" class="custom-control-input" autocomplete="off" id="doc5" >
                    <label class="custom-control-label" for="doc5">Constancia de actividades escolares (Se solicita en vinculación)</label>
                  </div>

                  <div class="custom-control custom-checkbox check">
                    <input type="checkbox" class="custom-control-input" autocomplete="off" id="doc6" >
                    <label class="custom-control-label" for="doc6">Constancia del curso de inducción (Responsable de academia)</label>
                  </div>

                </form>
                </div>
                <div class="col-6">
                <form action="">

                <div class="custom-control custom-checkbox check">
                    <input type="checkbox" class="custom-control-input" autocomplete="off" id="doc7" >
                    <label class="custom-control-label" for="doc7">Carta de presentación</label>
                  </div>

                  <div class="custom-control custom-checkbox check">
                    <input type="checkbox" class="custom-control-input" autocomplete="off" id="doc8" >
                    <label class="custom-control-label" for="doc8">Carta de aceptación</label>
                  </div>

                  <div class="custom-control custom-checkbox check">
                    <input type="checkbox" class="custom-control-input" autocomplete="off" id="doc9" >
                    <label class="custom-control-label" for="doc9">3 Reportes bimestrales con firma del prestador del servicio,
                        Firma del alumno y Evaluación del prestador del servicio social.</label>
                  </div>

                  <div class="custom-control custom-checkbox check">
                    <input type="checkbox" class="custom-control-input" autocomplete="off" id="doc10" >
                    <label class="custom-control-label" for="doc10">Carta de terminación expedida por la dependencia</label>
                  </div>

                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input check" autocomplete="off" id="doc11" checked disabled>
                    <label class="custom-control-label" for="doc11">Informe final (Documento en USB)</label>
                  </div>

                  </form>
                </div>
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
                    </ul>
                </div>
                </div>

          </div>
        </div>
      </div>
</div>




<?php require_once '../vistas/footer.php'; ?>

<?php
      if($tipo == 1){ 
    ?>
      <script>
      document.getElementById('doc1').disabled = true;
      document.getElementById('doc2').disabled = true;
      document.getElementById('doc3').disabled = true;
      document.getElementById('doc4').disabled = true;
      document.getElementById('doc5').disabled = true;
      document.getElementById('doc6').disabled = true;
      document.getElementById('doc7').disabled = true;
      document.getElementById('doc8').disabled = true;
      document.getElementById('doc9').disabled = true;
      document.getElementById('doc10').disabled = true;
      document.getElementById('doc11').disabled = true;
      </script>
    <?php
      }else if($tipo == 0){
        ?>
      <script>
      document.getElementById('doc1').disabled = false;
      document.getElementById('doc2').disabled = false;
      document.getElementById('doc3').disabled = false;
      document.getElementById('doc4').disabled = false;
      document.getElementById('doc5').disabled = false;
      document.getElementById('doc6').disabled = false;
      document.getElementById('doc7').disabled = false;
      document.getElementById('doc8').disabled = false;
      document.getElementById('doc9').disabled = false;
      document.getElementById('doc10').disabled = false;
      document.getElementById('doc11').disabled = false;
      </script>
    <?php
      }
    ?>
<?php require_once '../vistas/bloqueScriptTabla.php'; ?>

<?php }else{
        $host  = $_SERVER['HTTP_HOST'];

        header("Location: http://$host/proyectoWeb/");
        exit;
    } ?>