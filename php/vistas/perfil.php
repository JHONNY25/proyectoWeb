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
                  <h1>Detalles usuario</h1>
                </div>

                <form class="user" method="post" id="detallePerfil">
                  <hr>

                  <div class="row text-center">
                  <div class="col-6">

                  <div class="form-group">
                  <h5>Nombre</h5>
                  <?php
                  $user->setUser($sesion->getSesion());
                  $usuario = $user->getNombre();
                  $user->getDetallesUsuario($usuario);
                  ?>

                    <label for=""><?php echo $user->getNombrePersona(); ?> <?php echo $user->getApellidoP(); ?> <?php echo $user->getApellidoM(); ?></label>

                    </div>


                    <?php
                      if($user->getTipo() == 0 || $user->getTipo() == 1){
                    ?>
                    <!--
                      <div class="form-group">
                      <h5>Apellido paterno</h5>
                        <label for=""><?php echo $user->getApellidoP(); ?></label>
                      </div>
                      <div class="form-group">
                      <h5>Apellido materno</h5>
                        <label for=""><?php echo $user->getApellidoM(); ?></label>
                      </div>
                      -->
                  <?php
                      }
                  ?>
                  <?php
                    if(!is_null($user->getCarrera())){
                        echo "<div class='form-group'>";
                        echo "<h5>Carrera</h5>";
                        echo  "<label >" . $user->getCarrera() ."</label>";
                        echo "</div>";
                    }
                  ?>

                  <?php
                    if($user->getTipo() == 2){
                  ?>
                    <div class="form-group">
                    <h5>Colonia</h5>
                      <label for=""><?php echo $user->getColonia(); ?></label>
                    </div>

                    <div>
                    <h5>Calle</h5>
                      <label for=""><?php echo $user->getCalle(); ?></label>
                    </div>
                  <?php
                    }
                  ?>

                    </div>

                  <div class="col-6">
                  <?php
                  if(!is_null($user->getNumeroControl())){
                        echo "<div class='form-group'>";
                        echo "<h5>Número de control</h5>";
                        echo  "<label >" . $user->getNumeroControl() ."</label>";
                        echo "</div>";
                    }
                  ?>
                  <?php
                    if($user->getTipo() == 2){
                  ?>
                  <div>
                  <h5>Municipio</h5>
                    <label for=""><?php echo $user->getMunicipio(); ?></label>
                  </div>
                  <?php
                    }
                  ?>

                  <div class="form-group">
                  <h5>Correo</h5>
                    <label for=""><?php echo $user->getCorreo(); ?></label>
                  </div>
                  <div class="form-group">
                  <h5>Teléfono</h5>
                    <label for=""><?php echo $user->getTelefono(); ?></label>
                  </div>

                  </div>
                  </div>
                  <div class="d-flex justify-content-end">
                  <?php if($user->getTipo() == 2){ ?>
                  <a href="" class="mt-2 mb-3 btn btn-info" data-toggle="modal" data-target="#modal" id="edit">
                    <i class="fas fa-user"></i> Editar</a>
                  </div>
                  <?php } ?>

                  <?php if($user->getTipo() == 1){ ?>
                  <a href="" class="mt-2 mb-3 btn btn-info" data-toggle="modal" data-target="#modal2" id="edit2">
                    <i class="fas fa-user"></i> Editar</a>
                  </div>
                  <?php } ?>

                  <?php if($user->getTipo() == 0){ ?>
                  <a href="" class="mt-2 mb-3 btn btn-info" data-toggle="modal" data-target="#modal3" id="edit3">
                    <i class="fas fa-user"></i> Editar</a>
                  </div>
                  <?php } ?>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>

<!-- FORMULARIO PARA EMPRESA -->
<div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">

              <div class="modal-content pl-5 pb-5 pr-5 pt-0">
              <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body" >
                <form action="" class="user" method="post" id="perfilEdit">
                  <h5>Datos Generales</h5>

                  <div class="form-group">
                    <input id="nombre" type="text" class="form-control " name="nombre" aria-describedby="emailHelp" placeholder="Nombre de la empresa">
                  </div>

                  <div class="form-group">
                    <input id="telefono" type="text" class="form-control " name="telefono" aria-describedby="emailHelp" placeholder="Teléfono">
                  </div>
                  <div class="form-group">
                    <input id="correo" type="text" class="form-control " name="correo" aria-describedby="emailHelp" placeholder="Correo">
                  </div>

                  <hr>
                  <h5>Dirección de la empresa</h5>
                  <div class="form-group">
                    <input id="municipio" type="text" class="form-control " name="municipio" aria-describedby="emailHelp" placeholder="Delegación / Municipio">
                  </div>
                  <div class="form-group">
                    <input id="colonia" type="text" class="form-control " name="colonia" aria-describedby="emailHelp" placeholder="Colonia">
                  </div>
                  <div class="form-group">
                    <input id="calle" type="text" class="form-control " name="calle" aria-describedby="emailHelp" placeholder="Calle">
                  </div>

                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="check">
                      <label class="form-check-label" for="invalidCheck2">
                        Cambiar contraseña
                      </label>
                    </div>
                  </div>

                  <h5 class="contra">Contraseña</h5>

                  <div class="form-group">
                    <input id="pass1" type="password" class="form-control " name="pass1" aria-describedby="emailHelp" placeholder="Nueva contraseña">
                  </div>
                  <div class="form-group">
                    <input id="pass2" type="password" class="form-control " name="pass2" aria-describedby="emailHelp" placeholder="Repita la contraseña">
                  </div>
                  <div class="form-group">
                  <input id="editar" type="submit" value="Modificar perfil" href="#" class="btn btn-inicio btn-user btn-block" />
                  </div>

                <input type="hidden" name="id" id="clave" value="">
                </form>
                </div>

          </div>
        </div>
      </div>

<!-- FORMULARIO PARA ALUMNO -->
      <div class="modal fade bd-example-modal-lg" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">

              <div class="modal-content pl-5 pb-5 pr-5 pt-0">
                <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body" >
                <form action="" class="user" method="post" id="perfilEdit2">
                  <h5>Datos Generales</h5>

                  <div class="form-group">
                    <input id="telefono2" type="text" class="form-control " name="telefono" aria-describedby="emailHelp" placeholder="Teléfono">
                  </div>
                  <div class="form-group">
                    <input id="correo2" require type="text" class="form-control " name="correo2" aria-describedby="emailHelp" placeholder="Correo">
                  </div>

                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="check1">
                      <label class="form-check-label" for="invalidCheck2">
                        Cambiar contraseña
                      </label>
                    </div>
                  </div>

                  <h5 class="contra">Contraseña</h5>

                  <div class="form-group">
                    <input id="passalumno" type="password" class="form-control " name="pass1" aria-describedby="emailHelp" placeholder="Nueva contraseña">
                  </div>
                  <div class="form-group">
                    <input id="passalumno2" type="password" class="form-control " name="pass2" aria-describedby="emailHelp" placeholder="Repita la contraseña">
                  </div>
                  <div class="form-group">
                  <input id="editar2" type="submit" value="Modificar perfil" href="#" class="btn btn-inicio btn-user btn-block" />
                  </div>

                <input type="hidden" name="id2" id="clave2" value="">
                </form>
                </div>

          </div>
        </div>
      </div>

<!-- FORMULARIO PARA ADMIN -->
<div class="modal fade bd-example-modal-lg" id="modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">

              <div class="modal-content pl-5 pb-5 pr-5 pt-0">
              <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body" >
                <form action="" class="user" method="post" id="perfilEdit3">
                  <h5>Datos Generales</h5>

                    <div class="form-group">
                    <input id="nombre3" type="text" class="form-control " name="nombre2" aria-describedby="emailHelp" placeholder="Nombre">
                  </div>
                  <div class="form-group">
                    <input id="apeP" type="text" class="form-control " name="apeP" aria-describedby="emailHelp" placeholder="Apellido paterno">
                  </div>
                  <div class="form-group">
                    <input id="apeM" type="text" class="form-control " name="apeM" aria-describedby="emailHelp" placeholder="Apellido materno">
                  </div>


                  <div class="form-group">
                    <input id="telefono3" type="text" class="form-control " name="telefono2" aria-describedby="emailHelp" placeholder="Teléfono">
                  </div>
                  <div class="form-group">
                    <input id="correo3" type="text" class="form-control " name="correo2" aria-describedby="emailHelp" placeholder="Correo">
                  </div>

                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="check2">
                      <label class="form-check-label" for="invalidCheck2">
                        Cambiar contraseña
                      </label>
                    </div>
                  </div>

                  <h5 class="contra2">Contraseña</h5>

                   <div class="form-group">
                    <input id="passadmin" type="password" class="form-control " name="pass1" aria-describedby="emailHelp" placeholder="Nueva contraseña">
                  </div>
                  <div class="form-group">
                    <input id="passadmin2" type="password" class="form-control " name="pass3" aria-describedby="emailHelp" placeholder="Repita la contraseña">
                  </div>
                  <div class="form-group">
                  <input id="editar3" type="submit" value="Modificar perfil" href="#" class="btn btn-inicio btn-user btn-block" />
                  </div>

                <input type="hidden" name="id2" id="clave3" value="">
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
  <script src="../../js/sweetalert2.all.min.js" type="text/javascript"></script>
  <script src="../../js/validate.js"></script>
  <script src="../../js/edit.js"></script>
<<<<<<< HEAD
  <script type="text/javascript" src="../../js/listaNotificacion.js"></script>
=======
  <script src="../../js/listaNotificacion.js"></script>


>>>>>>> jonathan
</body>

</html>
