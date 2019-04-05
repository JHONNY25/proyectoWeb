

<form  action="<?php $_SERVER['PHP_SELF'] ?>" class="user" method="post" enctype="multipart/form-data">
  <hr>
  <h5>Datos Generales</h5>


  <div class="form-group" >
  </div>

  <div id="slctCarrera" class="form-group" >
      <p>Carrera
      <select name="carrera"class="custom-select "  >
        <?php
        $sql = "SELECT id_carrera,nombre FROM carrera";
        $result = $conexion->query($sql);
        if ($result->num_rows > 0) {

             while($row = $result->fetch_assoc()) {
               ?>
               <option value=<?php print($row['id_carrera']); ?>> <?php print($row['nombre']); ?> </option>
               <?php
             }
           }

         ?>

      </select>
      </p>
  </div>


  <div class="form-group">
    <?php
    //----------------------------------------------------------MUESTRA ERROR NOMBRE
      if (!empty($_POST) && isset($_POST['newUser'])) {
        if ($errorNombre==1) {
          ?>
          <p class="text-danger">X Campo requerido</p>
          <?php
        }
      }
     ?>


    <input type="text" required maxlength="24" class="form-control form-control-user" name="nombre" aria-describedby="emailHelp" placeholder="Nombre" <?php if (!empty($_POST) && isset($_POST['newUser'])) {
      ?>value= <?php print($nombre); ?> <?php
    } ?>>
  </div>


  <div class="form-group">
    <?php
    //----------------------------------------------------------MUESTRA ERROR APELLIDO PATERNO
      if (!empty($_POST) && isset($_POST['newUser'])) {
        if ($errorApPaterno==1) {
          ?>
          <p class="text-danger">X Campo requerido</p>
          <?php
        }
      }
     ?>
    <input type="text"  required maxlength="24" class="form-control form-control-user" name="aPat" aria-describedby="emailHelp" placeholder="Apellido Paterno" <?php if (!empty($_POST) && isset($_POST['newUser'])) {
      ?>value= <?php print($aPat); ?> <?php
    } ?>>
  </div>


  <div class="form-group">
    <?php
    //----------------------------------------------------------MUESTRA ERROR APELLIDO MATERNO
      if (!empty($_POST) && isset($_POST['newUser'])) {
        if ($errorApMaterno==1) {
          ?>
          <p class="text-danger">X Campo requerido</p>
          <?php
        }
      }
     ?>
    <input type="text" required maxlength="24" class="form-control form-control-user" name="aMat" aria-describedby="emailHelp" placeholder="Apellido Materno" <?php if (!empty($_POST) && isset($_POST['newUser'])) {
      ?>value= <?php print($aMat); ?> <?php
    } ?>>
  </div>


  <div class="form-group">
    <?php
    //----------------------------------------------------------MUESTRA ERROR CORREO
      if (!empty($_POST) && isset($_POST['newUser'])) {
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
    <input type="email" required maxlength="50" class="form-control form-control-user" name="correo" aria-describedby="emailHelp" placeholder="Correo" <?php if (!empty($_POST) && isset($_POST['newUser'])) {
      ?>value= <?php print($correo); ?> <?php
    } ?>>
  </div>


  <div class="form-group">
    <?php
    //----------------------------------------------------------MUESTRA ERROR TELEFONO
        if (!empty($_POST) && isset($_POST['newUser'])) {
          if ($errorTelefono==1) {
            ?>
            <p class="text-danger">X Formato de teléfono invalido, por favor verifique el campo</p>
            <?php
          }
        }

     ?>
    <input type="text" required maxlength="10"class="form-control form-control-user" name="telefono" aria-describedby="emailHelp" placeholder="Teléfono" <?php if (!empty($_POST) && isset($_POST['newUser'])) {
      ?>value= <?php print($telefono); ?> <?php
    } ?>>
  </div>


  <hr>
  <h5>Datos De Usuario</h5>
  <div class="form-group">
    <?php
    //----------------------------------------------------------MUESTRA ERROR USUARIO
        if (!empty($_POST) && isset($_POST['newUser'])) {
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
      <input type="text" minlength=1 required maxlength="50" class="form-control form-control-user" name="nombreUsuario" aria-describedby="emailHelp" placeholder="Nombre de usuario" <?php if (!empty($_POST) && isset($_POST['newUser'])) {
        ?>value= <?php print($nombreUsuario);} ?>>
  </div>


  <div id="nControl" class="form-group">
    <?php
    //----------------------------------------------------------MUESTRA ERROR NUMERO DE CONTROL
        if (!empty($_POST) && isset($_POST['newUser'])) {
          if ($errorControl==1) {
            ?>
            <p class="text-danger">X Formato de número de control inválido, por favor verifique el campo</p>
            <?php
          }
          if ($errorControlVacio==1) {
            ?>
            <p class="text-danger">X Número de control no puede estar vacío</p>
            <?php
          }
          if ($nControlRepetido==1) {
            ?>
            <p class="text-danger">X El número de control ya está registrado</p>
            <?php
          }
        }

     ?>
    <input type="text" required maxlength="8" class="form-control form-control-user" name="numeroControl" aria-describedby="emailHelp" placeholder="Número de control" <?php if (!empty($_POST) && isset($_POST['newUser'])) {
      ?>value= <?php print($numeroControl);} ?>>

    <div id="avisoContrasena" class="">
      <p class="text-danger">IMPORTANTE:</p>
      <p class="text-info">La contraseña del usuario será el número de control, el alumno deberá cambiarla al iniciar sesión</p>
    </div>
    <script type="text/javascript"> $("#avisoContrasena").hide(); </script>
  </div>


  <div id="Contrasena" class="form-group">
    <?php
    //----------------------------------------------------------MUESTRA ERROR CONTRASEÑA
        if (!empty($_POST) && isset($_POST['newUser'])) {
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
    <input type="password" required minlength=8 maxlength="50" class="form-control form-control-user" name="contrasena" placeholder="Contraseña" <?php if (!empty($_POST) && isset($_POST['newUser'])) {
      ?>value= <?php print($nombreUsuario);} ?>>
  </div>


  <div id="confirmaContra" class="form-group">
    <?php
    //----------------------------------------------------------MUESTRA ERROR CONFIRMA CONTRASEÑA
        if (!empty($_POST) && isset($_POST['newUser'])) {
          if ($errorContra2==1) {
            ?>
            <p class="text-danger">X Debe ingresar una contraseña de mínimo 8 caracteres</p>
            <?php
          }
        }

     ?>
    <input type="password" required minlength=8 maxlength="50" class="form-control form-control-user" name="confirmContra" placeholder="Confirma contraseña" <?php if (!empty($_POST) && isset($_POST['newUser'])) {
      ?>value= <?php print($nombreUsuario);} ?>>
  </div>


  <div class="form-group">
    <p>Sube tu kardex
      <?php
      //----------------------------------------------------------MUESTRA ERROR SUBIR IMAGEN
          if (!empty($_POST) && isset($_POST['newUser'])) {
            if ($uploadOk==0) {
              ?>
              <p class="text-danger">X Por favor verifíca tu kardex, debes subir una imagen en formato PNG, JPG o JPEG</p>
              <?php
            }
          }
       ?>
    <input type="file" required class="custom-file" name="kardex" id="kardex" onChange="ver(form.fileToUpload.value)">
    </p>
  </div>




  <div class="form-group">
  </div>
  <p><input id="boton" type="submit" name="newUser" value="Registrar Usuario" href="#" class="btn btn-inicio btn-user btn-block" />
  </p>

</form>
