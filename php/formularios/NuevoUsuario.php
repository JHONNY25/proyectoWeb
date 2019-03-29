<script src="/proyectoWeb/js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="/proyectoWeb/js/sweetalert2.all.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="/proyectoWeb/css/sweetalert2.min.css">
<body>
  <script type="text/javascript">
  function alertaExito(){
    Swal.fire(
    'Éxito',
    'El usuario se registró correctamente',
    'success'
    )
  }
  </script>
</body>
<?php

//CONEXION
require '../procesamiento/coneccion.php';
require '../Validaciones/Valida_NuevoUsuario.php';

$mysql = new coneccion();
$conexion = $mysql->get_connection();
if(!empty($_POST)){


  //----------------------------------------------------------------------------VARIABLES DE FORMULARIO
  $nombre = $_POST['nombre'];
  $aPat = $_POST['aPat'];
  $aMat = $_POST['aMat'];
  $numeroControl = $_POST['numeroControl'];
  $contrasena = $_POST['contrasena'];
  $confirmaContra = $_POST['confirmContra'];
  $tipoCB = $_POST['tipo'];
  $nombreUsuario = $_POST['nombreUsuario'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];
  $idCarrera = $_POST['carrera'];



  //----------------------------------------------------------------------------VARIABLES GENERALES
  $tipo = 1;
  $creditos = 0.0;

  //----------------------------------------------------------------------------EN ESTA VARIABLE SE GUARDA EL ID DEL USUARIO INSERTADO
  $idBD;

//------------------------------------------------------------------------------Tipos de errores
  //ERROES DE PERSONA
  $errorNombre=0;
  $errorApPaterno=0;
  $errorApMaterno=0;
  $errorCorreo=0;
  $errorFormatoCorreo=0;
  $errorTelefono=0;


  //ERRORES DE USUARIO
  $errorUsuario=0;
  $errorControl = 0;
  $errorContra = 0;
  $errorContra2 = 0;
  $errorCoincidencia = 0;
  $errorControlVacio=0;
  $errorUsuarioCorrecto=0;

  //VARIABLE DE REGISTRO EXITOSO
  $registroExitoso=0;

//OBTIENE VALOR DE COMBOBOX
  if($tipoCB == 'Alumno'){
    $tipo = '1';
  }
  else if($tipoCB == 'Administrativo'){
    $tipo = '0';
  }

  if ($tipoCB=='Alumno') {
    $contrasena = $numeroControl;
    $confirmaContra = $numeroControl;
  }

  if ($tipoCB=='Administrativo') {
    $numeroControl = null;
    $idCarrera=null;
    $creditos = null;
  }


//------------------------------------------------------------------------------VALIDA USUARIO REPETIDO
  if(existeUsuario($nombreUsuario)){
    $errorUsuario = 1;
  }else if(!existeUsuario($nombreUsuario)){
    $errorUsuario = 0;
  }

//------------------------------------------------------------------------------VALIDA CORREO REPETIDO
  if(existeCorreo($correo)){
    $errorCorreo = 1;
  } else if(existeCorreo($correo)){
    $errorCorreo=0;
  }

//------------------------------------------------------------------------------VALIDAR FORMATO DE CORROEO
  if (correoCorrecto($correo)) {
    $errorFormatoCorreo = 0;
  } else if (!correoCorrecto($correo)) {
    $errorFormatoCorreo = 1;
  }

  //----------------------------------------------------------------------------VALIDAR Nombre
  if (nombreCorrecto($nombre)) {
    $errorNombre = 0;

  } else if (!nombreCorrecto($nombre)) {
    $errorNombre = 1;
  }

  //----------------------------------------------------------------------------VALIDAR APELLIDO PATERNO
  if (paternoCorrecto($aPat)) {
    $errorApPaterno = 0;

  } else if (!paternoCorrecto($aPat)) {
    $errorApPaterno = 1;
  }

  //----------------------------------------------------------------------------VALIDAR APELLIDO MATERNO
  if (maternoCorrecto($aMat)) {
    $errorApMaterno = 0;


  } else if (!paternoCorrecto($aMat)) {
    $errorApMaterno = 1;

  }

  //----------------------------------------------------------------------------VALIDAR TELEFONO
  if (telefonoCorrecto($telefono)) {
    $errorTelefono = 0;

  } else if (!telefonoCorrecto($telefono)) {
    $errorTelefono = 1;
  }
  //----------------------------------------------------------------------------VALIDAR NUMERO DE CONTROL
  if (controlCorrecto($numeroControl)) {
    $errorControl = 0;

  } else if (!controlCorrecto($numeroControl)) {
    $errorControl = 1;
  }

  //----------------------------------------------------------------------------VALIDAR FORMATO USUARIO
  if (usuarioCorrecto($nombreUsuario)) {
    $errorUsuarioCorrecto = 0;

  } else if (!usuarioCorrecto($nombreUsuario)) {
    $errorUsuarioCorrecto = 1;
  }
  //----------------------------------------------------------------------------VALIDAR CONTRASEÑA
  if (contrasenaCorrecta($contrasena)) {
    $errorContra = 0;

  } else if (!contrasenaCorrecta($contrasena)) {
    $errorContra = 1;
  }

  //----------------------------------------------------------------------------VALIDAR CONTRASEÑA REPETIDA
  if (confirmaContraCorrecta($confirmaContra)) {
    $errorContra2 = 0;

  } else if (!confirmaContraCorrecta($confirmaContra)) {
    $errorContra2 = 1;
  }

  //----------------------------------------------------------------------------VALIDAR COINCIDENCIA DE CONTRASEÑAS
  if (coincidenciaCorrecta($contrasena,$confirmaContra)) {
    $errorCoincidencia = 0;

  } else if (!coincidenciaCorrecta($contrasena,$confirmaContra)) {
    $errorCoincidencia = 1;
  }

  //----------------------------------------------------------------------------VALIDAR NUMERO CONTROL VACIO
  if (validaControlVacio($numeroControl,$tipo)) {
    $errorControlVacio = 0;

  } else if (!validaControlVacio($numeroControl,$tipo)) {
    $errorControlVacio = 1;
  }

  //SI NO HAY ERRORES
  if($errorUsuario == 0 && $errorCorreo == 0 && $errorFormatoCorreo==0
      && $errorNombre == 0 && $errorApPaterno==0 && $errorApMaterno == 0
      && $errorTelefono == 0 && $errorControl==0 && $errorContra== 0
      && $errorContra2==0 && $errorCoincidencia==0 && $errorControlVacio==0
      && $errorUsuarioCorrecto==0){
    //OBTENER VALOR DEL COMBOBOX Y ASIGNARLE UN NÚMERO




    //LLAMAR AL PROCEDIMIENTO PARA INSERTAR USUARIO "SSI" SIGNIFICA "STRING STRING INT", ES DECIR, EL TIPO DE VALORES A INGRESAR
    $stm = $conexion->prepare("CALL registrar_persona(?,?,?,?,?,?,?,?)");
    $stm->bind_param("ssisssss",$nombreUsuario,$contrasena,$tipo,$nombre,$aPat,$aMat,$correo,$telefono);
    $stm->execute();
    $stm->close();
    ?>
    <script type="text/javascript">
      alertaExito();
    </script>
    <?php


/*
    //OBTENDREMOS EL ID DEL USUARIO INSERTADO ANTERIORMENTE PERA PODER ASIGNARLO COMO LLAVE FORANEA
    //A LA TABLA PERSONA
      $sql = "SELECT id_usuario FROM usuario WHERE usuario = '$nombreUsuario'";
      $result = $conexion->query($sql);
      if ($result->num_rows > 0) {

           while($row = $result->fetch_assoc()) {
             $idBD = $row['id_usuario'];
           }
         }


    //AGREGAMOS LOS DATOS DE LA PERSONA AL USUARIO
      $stm = $conexion->prepare("CALL registrar_persona(?,?,?,?,?,?,?,?,?)");
      $stm->bind_param("ssssssdii",$nombre,$aPat,$aMat,$numeroControl,$correo,$telefono,$creditos,$idBD,$idCarrera);
      $stm->execute();
      $stm->close();

      */



    $registroExitoso=1;
    ?>

    <?php

    //header('Location: ../tablas/personal.php');
    //--------------------------------------------------------------------------CERRAR IF ERRORES
  }






//------------------------------------------------------------------------------Cerrar if empty post
}


 ?>

























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




                <form  action="<?php $_SERVER['PHP_SELF'] ?>" class="user" method="post">
                  <hr>
                  <h5>Datos Generales</h5>


                  <div class="form-group" >
                      <p>Tipo de usuario
                      <select id="slctTipo" name="tipo"class="custom-select "  >
                        <option value="Alumno">Alumno</option>
                        <option value="Administrativo">Administrativo</option>
                      </select>
                      </p>
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
                      if (!empty($_POST)) {
                        if ($errorNombre==1) {
                          ?>
                          <p class="text-danger">X Campo requerido</p>
                          <?php
                        }
                      }
                     ?>


                    <input type="text" maxlength="24" class="form-control form-control-user" name="nombre" aria-describedby="emailHelp" placeholder="Nombre" <?php if (!empty($_POST)) {
                      ?>value= <?php print($nombre); ?> <?php
                    } ?>>
                  </div>


                  <div class="form-group">
                    <?php
                    //----------------------------------------------------------MUESTRA ERROR APELLIDO PATERNO
                      if (!empty($_POST)) {
                        if ($errorApPaterno==1) {
                          ?>
                          <p class="text-danger">X Campo requerido</p>
                          <?php
                        }
                      }
                     ?>
                    <input type="text" maxlength="24" class="form-control form-control-user" name="aPat" aria-describedby="emailHelp" placeholder="Apellido Paterno" <?php if (!empty($_POST)) {
                      ?>value= <?php print($aPat); ?> <?php
                    } ?>>
                  </div>


                  <div class="form-group">
                    <?php
                    //----------------------------------------------------------MUESTRA ERROR APELLIDO MATERNO
                      if (!empty($_POST)) {
                        if ($errorApMaterno==1) {
                          ?>
                          <p class="text-danger">X Campo requerido</p>
                          <?php
                        }
                      }
                     ?>
                    <input type="text" maxlength="24" class="form-control form-control-user" name="aMat" aria-describedby="emailHelp" placeholder="Apellido Materno" <?php if (!empty($_POST)) {
                      ?>value= <?php print($aMat); ?> <?php
                    } ?>>
                  </div>


                  <div class="form-group">
                    <?php
                    //----------------------------------------------------------MUESTRA ERROR CORREO
                      if (!empty($_POST)) {
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
                    <input type="email" maxlength="50" class="form-control form-control-user" name="correo" aria-describedby="emailHelp" placeholder="Correo" <?php if (!empty($_POST)) {
                      ?>value= <?php print($correo); ?> <?php
                    } ?>>
                  </div>


                  <div class="form-group">
                    <?php
                    //----------------------------------------------------------MUESTRA ERROR TELEFONO
                        if (!empty($_POST)) {
                          if ($errorTelefono==1) {
                            ?>
                            <p class="text-danger">X Formato de teléfono invalido, por favor verifique el campo</p>
                            <?php
                          }
                        }

                     ?>
                    <input type="text" maxlength="10"class="form-control form-control-user" name="telefono" aria-describedby="emailHelp" placeholder="Teléfono" <?php if (!empty($_POST)) {
                      ?>value= <?php print($telefono); ?> <?php
                    } ?>>
                  </div>


                  <hr>
                  <h5>Datos De Usuario</h5>
                  <div class="form-group">
                    <?php
                    //----------------------------------------------------------MUESTRA ERROR USUARIO
                        if (!empty($_POST)) {
                          if ($errorUsuario==1) {
                            ?>
                            <p class="text-danger">X El usuario ya existe, por favor ingresa uno distinto</p>
                            <?php
                          }
                          if ($errorUsuarioCorrecto==1) {
                            ?>
                            <p class="text-danger">X El usuario no puede estar vacio, debe tener mínimo 8 caracteres y máximo 50</p>

                            <?php
                          }
                        }

                     ?>
                      <input type="text" maxlength="50" class="form-control form-control-user" name="nombreUsuario" aria-describedby="emailHelp" placeholder="Nombre de usuario" <?php if (!empty($_POST)) {
                        ?>value= <?php print($nombreUsuario);} ?>>
                  </div>


                  <div id="nControl" class="form-group">
                    <?php
                    //----------------------------------------------------------MUESTRA ERROR NUMERO DE CONTROL
                        if (!empty($_POST)) {
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
                        }

                     ?>
                    <input type="text" maxlength="8" class="form-control form-control-user" name="numeroControl" aria-describedby="emailHelp" placeholder="Número de control" <?php if (!empty($_POST)) {
                      ?>value= <?php print($numeroControl);} ?>>

                    <div id="avisoContrasena" class="">
                      <p class="text-danger">IMPORTANTE:</p>
                      <p class="text-info">La contraseña del usuario será el número de control, el alumno deberá cambiarla al iniciar sesión</p>
                    </div>
                    <script type="text/javascript"> $("#avisoContrasena").hide(); </script>
                  </div>


                  <div id="Contrasena" class="form-group">
                    <?php
                    //----------------------------------------------------------MUESTRA ERROR NUMERO DE CONTROL
                        if (!empty($_POST)) {
                          if ($errorContra==1) {
                            ?>
                            <p class="text-danger">X Este campo no puede estar vacío, debe ingresar una contraseña de mínimo 8 caracteres</p>
                            <?php
                          }
                          if ($errorCoincidencia==1) {
                            ?>
                            <p class="text-danger">X Ambas contraseñas deben coincidir</p>
                            <?php
                          }
                        }

                     ?>
                    <input type="password" minlength=8 maxlength="50" class="form-control form-control-user" name="contrasena" placeholder="Contraseña" <?php if (!empty($_POST)) {
                      ?>value= <?php print($nombreUsuario);} ?>>
                  </div>


                  <div id="confirmaContra" class="form-group">
                    <?php
                    //----------------------------------------------------------MUESTRA ERROR CONFIRMA CONTRASEÑA
                        if (!empty($_POST)) {
                          if ($errorContra2==1) {
                            ?>
                            <p class="text-danger">X Este campo no puede estar vacío, debe ingresar una contraseña de mínimo 8 caracteres</p>
                            <?php
                          }
                        }

                     ?>
                    <input type="password"  minlength=8 maxlength="50" class="form-control form-control-user" name="confirmContra" placeholder="Confirma contraseña" <?php if (!empty($_POST)) {
                      ?>value= <?php print($nombreUsuario);} ?>>
                  </div>


                  <div class="form-group">
                  </div>
                  <p><input id="boton" type="submit" value="Registrar Usuario" href="#" class="btn btn-inicio btn-user btn-block" />
                  </p>

                </form>

                <script type="text/javascript">

                $("#slctCarrera").show();
                $("#nControl").show();
                $("#confirmaContra").hide();
                $("#Contrasena").hide();
                $("#avisoContrasena").show();

                </script>

                <?php

                if (!empty($_POST)) {
                  if ($registroExitoso==1) {
                    echo "REGISTRO REALIZADO EXITOSAMENTE";
                  }
                }



                 ?>

<script type="text/javascript">
$(document).ready(function(){
                $("#slctTipo").change(function(){

                  if ($(this).val()=="Administrativo") {
                    $("#slctCarrera").hide();
                    $("#nControl").hide();
                    $("#confirmaContra").show();
                    $("#Contrasena").show();
                    $("#avisoContrasena").hide();




                  }else{
                    $("#slctCarrera").show();
                    $("#nControl").show();
                    $("#confirmaContra").hide();
                    $("#Contrasena").hide();
                    $("#avisoContrasena").show();
                  }
                });
            });
</script>




<script type="text/javascript">
$(function() {
    $("#boton").click( function()
         {

         }
    );
});
</script>



              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>
<?php $conexion->close(); ?>













<?php require_once '../vistas/footer.php'; ?>

<?php require_once '../vistas/logoutModal.php'; ?>

<?php require_once '../vistas/bloqueScriptView.php'; ?>
