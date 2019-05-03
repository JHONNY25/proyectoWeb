

<form  action="<?php $_SERVER['PHP_SELF'] ?>" class="user" method="post" enctype="multipart/form-data">
  <hr>
  <h5>Datos Generales</h5>


  <div class="form-group" >
  </div>



  <div class="form-group">
    <?php
    //----------------------------------------------------------MUESTRA ERROR NOMBRE
      if (!empty($_POST) && isset($_POST['newEmp'])) {
        if ($errorNombre==1) {
          ?>
          <p class="text-danger">X Campo requerido</p>
          <?php
        }
      }
     ?>


    <input type="text" required maxlength="24" class="form-control form-control-user" name="nombre2" aria-describedby="emailHelp" placeholder="Nombre de la empresa" <?php if (!empty($_POST) && isset($_POST['newEmp'])) {
      ?>value= <?php print($nombre); ?> <?php
    } ?>>
  </div>

  <div class="form-group">
    <?php
    //----------------------------------------------------------MUESTRA ERROR NOMBRE
      if (!empty($_POST) && isset($_POST['newEmp'])) {
        if ($errorCalle==1) {
          ?>
          <p class="text-danger">X Campo requerido</p>
          <?php
        }
      }
     ?>


    <input type="text" required maxlength="24" class="form-control form-control-user" name="calle" aria-describedby="emailHelp" placeholder="Calle" <?php if (!empty($_POST) && isset($_POST['newEmp'])) {
      ?>value= <?php print($calle); ?> <?php
    } ?>>
  </div>

  <div class="form-group">
    <?php
    //----------------------------------------------------------MUESTRA ERROR NOMBRE
      if (!empty($_POST) && isset($_POST['newEmp'])) {
        if ($errorColonia==1) {
          ?>
          <p class="text-danger">X Campo requerido</p>
          <?php
        }
      }
     ?>


    <input type="text" required maxlength="24" class="form-control form-control-user" name="colonia" aria-describedby="emailHelp" placeholder="Colonia" <?php if (!empty($_POST) && isset($_POST['newEmp'])) {
      ?>value= <?php print($colonia); ?> <?php
    } ?>>
  </div>

  <div class="form-group">
    <?php
    //----------------------------------------------------------MUESTRA ERROR NOMBRE
      if (!empty($_POST) && isset($_POST['newEmp'])) {
        if ($errorMunicipio==1) {
          ?>
          <p class="text-danger">X Campo requerido</p>
          <?php
        }
      }
     ?>


    <input type="text" required maxlength="24" class="form-control form-control-user" name="municipio" aria-describedby="emailHelp" placeholder="Municipio" <?php if (!empty($_POST) && isset($_POST['newEmp'])) {
      ?>value= <?php print($municipio); ?> <?php
    } ?>>
  </div>


  <div class="form-group">
    <?php
    //----------------------------------------------------------MUESTRA ERROR CORREO
      if (!empty($_POST) && isset($_POST['newEmp'])) {
        if ($errorCorreo==1) {
          ?>
          <p class="text-danger">X Este correo ya está en uso. Ingresa uno distinto</p>
          <?php
        }
        if ($errorFormatoCorreo==1) {
          ?>
          <p class="text-danger">X Campo vacío o formato de correo inválido, por favor verifique el campo</p>
          <?php
        }
      }
     ?>
    <input type="email" required maxlength="50" class="form-control form-control-user" name="correo2" aria-describedby="emailHelp" placeholder="Correo" <?php if (!empty($_POST) && isset($_POST['newEmp'])) {
      ?>value= <?php print($correo); ?> <?php
    } ?>>
  </div>


  <div class="form-group">
    <?php
    //----------------------------------------------------------MUESTRA ERROR TELEFONO
        if (!empty($_POST) && isset($_POST['newEmp'])) {
          if ($errorTelefono==1) {
            ?>
            <p class="text-danger">X Formato de teléfono invalido, por favor verifique el campo</p>
            <?php
          }
        }

     ?>
    <input type="text" required maxlength="10"class="form-control form-control-user" name="telefono2" aria-describedby="emailHelp" placeholder="Teléfono" <?php if (!empty($_POST) && isset($_POST['newEmp'])) {
      ?>value= <?php print($telefono); ?> <?php
    } ?>>
  </div>


  <hr>
  <h5>Datos De Usuario</h5>
  <div class="form-group">
    <?php
    //----------------------------------------------------------MUESTRA ERROR USUARIO
        if (!empty($_POST) && isset($_POST['newEmp'])) {
          if ($errorUsuario==1) {
            ?>
            <p class="text-danger">X El usuario ya existe, por favor ingresa uno distinto</p>
            <?php
          }
          if ($errorUsuarioCorrecto==1) {
            ?>
            <p class="text-danger">X El usuario debe tener mínimo 3 caracteres y máximo 50</p>

            <?php
          }
        }

     ?>
      <input type="text" minlength=1 required maxlength="50" class="form-control form-control-user" name="nombreUsuario2" aria-describedby="emailHelp" placeholder="Nombre de usuario" <?php if (!empty($_POST) && isset($_POST['newEmp'])) {
        ?>value= <?php print($nombreUsuario);} ?>>
  </div>


  <div id="nControl2" class="form-group">
    <?php



     ?>

    <div id="avisoContrasena2" class="">
      <p class="text-danger">IMPORTANTE:</p>
      <p class="text-info">La contraseña del usuario será el número de control, el alumno deberá cambiarla al iniciar sesión</p>
    </div>
    <script type="text/javascript"> $("#avisoContrasena2").hide(); </script>
  </div>


  <div id="Contrasena2" class="form-group">
    <?php
    //----------------------------------------------------------MUESTRA ERROR CONTRASEÑA
        if (!empty($_POST) && isset($_POST['newEmp'])) {
          if ($errorContra==1) {
            ?>
            <p class="text-danger">X Debe ingresar una contraseña de mínimo 8 caracteres</p>
            <?php
          }
          if ($errorCoincidencia==1) {
            ?>
            <p class="text-danger">X Ambas contraseñas deben coincidir</p>
            <?php
          }
        }

     ?>
    <input type="password" required minlength=8 maxlength="50" class="form-control form-control-user" name="contrasena2" placeholder="Contraseña" <?php if (!empty($_POST) && isset($_POST['newEmp'])) {
      ?>value= <?php print($nombreUsuario);} ?>>
  </div>


  <div id="confirmaContra2" class="form-group">
    <?php
    //----------------------------------------------------------MUESTRA ERROR CONFIRMA CONTRASEÑA
        if (!empty($_POST) && isset($_POST['newEmp'])) {
          if ($errorContra2==1) {
            ?>
            <p class="text-danger">X Debe ingresar una contraseña de mínimo 8 caracteres</p>
            <?php
          }
        }

     ?>
    <input type="password" required minlength=8 maxlength="50" class="form-control form-control-user" name="confirmContra2" placeholder="Confirma contraseña" <?php if (!empty($_POST) && isset($_POST['newEmp'])) {
      ?>value= <?php print($nombreUsuario);} ?>>
  </div>





  <div class="form-group">
  </div>
  <p><input id="boton2" type="submit" name="newEmp" value="Registrar Usuario" href="#" class="btn btn-inicio btn-user btn-block" />
  </p>

</form>
