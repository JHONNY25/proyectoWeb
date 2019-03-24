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
                  <h1>Nuevo Usuario</h1>
                </div>




                <form action="../procesamiento/NuevoUsuario.php" class="user" method="post">
                  <hr>
                  <h5>Datos Generales</h5>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="nombre" aria-describedby="emailHelp" placeholder="Nombre">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="aPat" aria-describedby="emailHelp" placeholder="Apellido Paterno">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="aMat" aria-describedby="emailHelp" placeholder="Apellido Materno">
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-user" name="correo" aria-describedby="emailHelp" placeholder="Correo">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="telefono" aria-describedby="emailHelp" placeholder="Teléfono">
                  </div>
                  <hr>
                  <h5>Datos De Usuario</h5>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="nombreUsuario" aria-describedby="emailHelp" placeholder="Nombre de usuario">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="numeroControl" aria-describedby="emailHelp" placeholder="Número de control o clave">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" name="contrasena" placeholder="Contraseña">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" name="confirmContra" placeholder="Confirma contraseña">
                  </div>

                  <div class="form-group" >
                      <select name="tipo"class="custom-select "  >
                        <option value="nada"></option>
                        <option value="Alumno">Alumno</option>
                        <option value="Administrativo">Administrativo</option>
                      </select>
                  </div>

                  <div class="form-group">
                  </div>
                  <p><input type="submit" value="Registrar Usuario" href="#" class="btn btn-inicio btn-user btn-block" />
                  </p>

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
