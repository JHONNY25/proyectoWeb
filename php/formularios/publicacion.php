<?php require_once '../vistas/cabezera.php'; ?>
<?php if($user->getTipo() == 2){?>
<?php require_once '../vistas/sidebar.php'; ?>
  
<?php require_once '../vistas/labelPerfil.php'; ?>


<div class="container-fluid">
<ol class="breadcrumb">
            <li class="breadcrumb-item">
            Publicación
            </li>
            <li class="breadcrumb-item active">Nueva publicación</li>
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
            <div class="text-center">
                  <h1>Nueva publicación</h1>
                </div>
            <form action="post" class="user" id="publicacion">
              <div class="form-group">
                <p for="tipo ">
                      Tipo de publicación
                    <select require  name="tipo" id="tipo" class="custom-select">
                    <option value="0"></option>

                    <?php
                      require_once '../procesamiento/publicaciones.php';

                      $publicacion = new Publicacion();
                      $clasificacion = $publicacion->getClasificacionPublic();

                      
                      if($clasificacion){
                        foreach($clasificacion as $row):
                    ?>
                        <option value="<?php echo $row['id_clasificacion_publicacion']; ?>">
                        <?php echo $row['nombre']; ?>
                        </option>
                        <?php
                        endforeach;  
                        }else{
                        ?>
                          <option value="">No hay datos</option>
                        <?php
                        }
                        ?>
                    </select>
                </p>
              </div>

              <div class="form-group">
                <p for="tipo ">
                      Enfocado a:
                    <select require name="carrera" id="carrera" class="custom-select">
                    <option value="0"></option>
                        <?php
                      $publicacion = new Publicacion();
                      $carrea = $publicacion->getCarreras();

                      if($carrea){
                        foreach($carrea as $row):
                    ?>
                        <option value="<?php echo $row['id_carrera']; ?>">
                        <?php echo $row['nombre']; ?>
                        </option>
                        <?php
                        endforeach;  
                        }else{
                        ?>
                          <option value="">No hay datos</option>
                        <?php
                        }
                        ?>
                    </select>
                </p>
              </div>

                <div class="form-group">
                   <input id="titulo" name="titulo" type="text" placeholder="Ingrese el titulo del proyecto" class="form-control" aria-describedby="emailHelp" require>

                </div>

                <div class="form-group">
                   <input name="vacantes" id="vacante" type="text" maxlength="2" placeholder="Ingrese el numero de Vacantes" class="form-control" aria-describedby="emailHelp" require>

                </div>

                <div class="form-group">
                    <P>
                        Descripción del proyecto
                    <textarea require class="form-control" name="descripcion" id="desc" rows="7" >

                    </textarea>
                    </P>
                </div>
                <button id="guardar" name="guardar" href="#" class="btn btn-inicio btn-user btn-block">Registrar publicación</button>
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

  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>
  <script src="../../js/sweetalert2.all.min.js" type="text/javascript"></script>
  <script src="../../js/validate.js"></script>
  <script type="text/javascript" src="../../js/validatePostPublic.js"></script>
</body>

</html>

<?php }else{
        $host  = $_SERVER['HTTP_HOST'];

        header("Location: http://$host/proyectoWeb/");
        exit;
    } ?>