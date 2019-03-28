<?php require_once '../vistas/cabezera.php'; ?>

<?php require_once '../vistas/sidebar.php'; ?>

<?php require_once '../vistas/labelPerfil.php'; ?>


<div class="container">
  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
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
                  $user->getDetallesUsuario($usuario); ?>

                    <label for=""><?php echo $user->getNombrePersona(); ?></label>
                  
                    </div>
                  <div class="form-group">
                  <h5>Apellido paterno</h5>
                    <label for=""><?php echo $user->getApellidoP(); ?></label>
                  </div>
                  <div class="form-group">
                  <h5>Apellido materno</h5>
                    <label for=""><?php echo $user->getApellidoM(); ?></label>
                  </div>
                  <?php 
                    if(!is_null($user->getCarrera())){
                        echo "<div class='form-group'>";
                        echo "<h5>Carrera</h5>";
                        echo  "<label >" . $user->getCarrera() ."</label>";
                        echo "</div>";
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

<?php require_once '../vistas/logoutModal.php'; ?>

<?php require_once '../vistas/bloqueScriptView.php'; ?>
