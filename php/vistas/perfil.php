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

                <form action="../procesamiento/NuevoUsuario.php" class="user" method="post">
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

                    <label for=""><?php echo $user->getNombrePersona(); ?></label>
                  
                    </div>

                    
                    <?php
                      if($user->getTipo() == 0 || $user->getTipo() == 1){
                    ?>
                      <div class="form-group">
                      <h5>Apellido paterno</h5>
                        <label for=""><?php echo $user->getApellidoP(); ?></label>
                      </div>
                      <div class="form-group">
                      <h5>Apellido materno</h5>
                        <label for=""><?php echo $user->getApellidoM(); ?></label>
                      </div>
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
                        echo "<h5>Numero de control</h5>";
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
                  <h5>Telefono</h5>
                    <label for=""><?php echo $user->getTelefono(); ?></label>
                  </div>

                  </div>
                  </div>
                  <div class="d-flex justify-content-end">
                  <a href="" class="mt-2 mb-3 btn btn-info" data-toggle="modal" data-target="#modalDocs">
                    <i class="fas fa-user"></i> Editar</a>
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


<?php require_once '../vistas/footer.php'; ?>

<?php require_once '../vistas/bloqueScriptView.php'; ?>
