<script src="../../js/sweetalert2.all.min.js" type="text/javascript"></script>
<script src="../../js/jquery-3.3.1.min.js" type="text/javascript"></script>
<!--<script src="../../js/alertaFormatos.js" type="text/javascript"></script>-->



<?php require '../procesamiento/subirFormatos.php' ?>
<?php require_once '../vistas/cabezera.php'; ?>
<?php if($user->getTipo() == 0){?>
<?php require_once '../vistas/sidebar.php'; ?>

<?php require_once '../vistas/labelPerfil.php'; ?>

<div class="container-fluid">
<ol class="breadcrumb mt-3">
        <li class="breadcrumb-item">
        Tramite servicio social
        </li>
        <li class="breadcrumb-item active">Subir Formatos</li>
</ol>
<!-- ========================================================================================================== -->
<div class="container-fluid d-flex border rounded mb-4 flex-wrap ml-2 mr-2">
    <div class="col-md-6 d-flex align-items-center t-center">
        <Strong><h1>Solicitud de servicio social</h1></Strong>
    </div>
    <div class="col-md-6">
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" role="form" id="form">
        <div class="form-group">
          <?php
          if (!empty($_POST) && isset($_POST['solicitudSS'])) {
            if ($errorVacio) {
              ?> <p></p> <h5 class="text-danger">X Debes seleccionar almenos un archivo para subir</h5> <?php
            }
          }
           ?>
          <Strong><h4 id="section1">Formato de Solicitud de servicio social (.doc o .docx)</h4></Strong>
          <?php
          if (!empty($_POST) && isset($_POST['solicitudSS'])) {
            if ($errorDoc) {
              ?> <h5 class="text-danger">X Debes subir un formato de archivo válido (doc o docx)</h5> <?php
            }
            if ($exitoFormato) {
              ?> <h5 class="text-success">✓ Formato subido exitosamente</h5> <?php
            }
          }
           ?>
          <input type="file" class="form-control-file btn btn-add" id="formato" name="formato" onChange="ver(form.fileToUpload.value)">
          <Strong><h4 id="section1">Imagen ejemplo de llenado (jpg, jpeg o png)</h4></Strong>
          <?php
          if (!empty($_POST) && isset($_POST['solicitudSS'])) {
            if ($errorEj) {
              ?> <h5 class="text-danger">X Debes subir un formato de archivo válido (jpg, jpeg o png)</h5> <?php
            }
            if ($exitoEjemplo) {
              ?> <h5 class="text-success">✓ Ejemplo subido exitosamente</h5> <?php
            }
          }

           ?>
          <input type="file" class="form-control-file btn btn-add" id="ejemplo" name="ejemplo" onChange="ver(form.fileToUpload.value)">
          <!--   <textarea class="form-control border rounded mt-3" name="descripcion" id="" rows="4" placeholder="Ingrese una dexcripción para el documento"></textarea>
            --><input type="submit" value="Subir Formato" class="btn btn-add d-block mt-2" name="solicitudSS">
        </div>
        <div>

        </div>
    </form>
    </div>
</div>
<!-- ========================================================================================================== -->
<div class="container-fluid d-flex border rounded mb-4 flex-wrap ml-2 mr-2">
    <div class="col-md-6 d-flex align-items-center t-center">
        <Strong><h1>Solicitud de prestador de servicio social</h1></Strong>
    </div>
    <div class="col-md-6">
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <?php
          if (!empty($_POST) && isset($_POST['cartaAceptacion'])) {
            if ($errorVacio) {
              ?> <p></p> <h5 class="text-danger">X Debes seleccionar almenos un archivo para subir</h5> <?php
            }
          }
           ?>
          <Strong><h4 id="section1">Formato de solicitud de prestador de servicio social (.doc o .docx)</h4></Strong>
          <?php
          if (!empty($_POST) && isset($_POST['cartaAceptacion'])) {
            if ($errorDoc) {
              ?> <h5 class="text-danger">X Debes subir un formato de archivo válido (doc o docx)</h5> <?php
            }
            if ($exitoFormato) {
              ?> <h5 class="text-success">✓ Formato subido exitosamente</h5> <?php
            }
          }

           ?>
          <input type="file" class="form-control-file btn btn-add" id="formato" name="formato" onChange="ver(form.fileToUpload.value)">
          <Strong><h4 id="section1">Imagen ejemplo de llenado (jpg, jpeg o png)</h4></Strong>
          <?php
          if (!empty($_POST) && isset($_POST['cartaAceptacion'])) {
            if ($errorEj) {
              ?> <h5 class="text-danger">X Debes subir un formato de archivo válido (jpg, jpeg o png)</h5> <?php
            }
            if ($exitoEjemplo) {
              ?> <h5 class="text-success">✓ Ejemplo subido exitosamente</h5> <?php
            }
          }

           ?>
          <input type="file" class="form-control-file btn btn-add" id="ejemplo" name="ejemplo" onChange="ver(form.fileToUpload.value)">
          <!--   <textarea class="form-control border rounded mt-3" name="descripcion" id="" rows="4" placeholder="Ingrese una dexcripción para el documento"></textarea>
            --><input type="submit" value="Subir Formato" class="btn btn-add d-block mt-2" name="cartaAceptacion">
        </div>
        <div>

        </div>
    </form>
    </div>
</div>
<!-- ========================================================================================================== -->

<div class="container-fluid d-flex border rounded mb-4 flex-wrap ml-2 mr-2">
    <div class="col-md-6 d-flex align-items-center t-center">
        <Strong><h1>Carta compromiso</h1></Strong>
    </div>
    <div class="col-md-6">
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <?php
          if (!empty($_POST) && isset($_POST['reportes'])) {
            if ($errorVacio) {
              ?> <p></p> <h5 class="text-danger">X Debes seleccionar almenos un archivo para subir</h5> <?php
            }
          }
           ?>
          <Strong><h4 id="section1">Formato de carta compromiso (.doc o .docx)</h4></Strong>
          <?php
          if (!empty($_POST) && isset($_POST['reportes'])) {
            if ($errorDoc) {
              ?> <h5 class="text-danger">X Debes subir un formato de archivo válido (doc o docx)</h5> <?php
            }
            if ($exitoFormato) {
              ?> <h5 class="text-success">✓ Formato subido exitosamente</h5> <?php
            }
          }

           ?>
          <input type="file" class="form-control-file btn btn-add" id="formato" name="formato" onChange="ver(form.fileToUpload.value)">
          <Strong><h4 id="section1">Imagen ejemplo de llenado (jpg, jpeg o png)</h4></Strong>
          <?php
          if (!empty($_POST) && isset($_POST['reportes'])) {
            if ($errorEj) {
              ?> <h5 class="text-danger">X Debes subir un formato de archivo válido (jpg, jpeg o png)</h5> <?php
            }
            if ($exitoEjemplo) {
              ?> <h5 class="text-success">✓ Ejemplo subido exitosamente</h5> <?php
            }
          }

           ?>
          <input type="file" class="form-control-file btn btn-add" id="ejemplo" name="ejemplo" onChange="ver(form.fileToUpload.value)">
          <!--   <textarea class="form-control border rounded mt-3" name="descripcion" id="" rows="4" placeholder="Ingrese una dexcripción para el documento"></textarea>
            --><input type="submit" value="Subir Formato" class="btn btn-add d-block mt-2" name="reportes" >
        </div>
        <div>
        </div>
    </form>
    </div>
</div>
<!-- ========================================================================================================== -->


<div class="container-fluid d-flex border rounded mb-4 flex-wrap ml-2 mr-2">
    <div class="col-md-6 d-flex align-items-center t-center">
        <Strong><h1>Reportes bimestrales</h1></Strong>
    </div>
    <div class="col-md-6">
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <?php
          if (!empty($_POST) && isset($_POST['bimestrales'])) {
            if ($errorVacio) {
              ?> <p></p> <h5 class="text-danger">X Debes seleccionar almenos un archivo para subir</h5> <?php
            }
          }
           ?>
          <Strong><h4 id="section1">Formato de reportes bimestrales (.doc o .docx)</h4></Strong>
          <?php
          if (!empty($_POST) && isset($_POST['bimestrales'])) {
            if ($errorDoc) {
              ?> <h5 class="text-danger">X Debes subir un formato de archivo válido (doc o docx)</h5> <?php
            }
            if ($exitoFormato) {
              ?> <h5 class="text-success">✓ Formato subido exitosamente</h5> <?php
            }
          }

           ?>
          <input type="file" class="form-control-file btn btn-add" id="formato" name="formato" onChange="ver(form.fileToUpload.value)">
          <Strong><h4 id="section1">Imagen ejemplo de llenado (jpg, jpeg o png)</h4></Strong>
          <?php
          if (!empty($_POST) && isset($_POST['bimestrales'])) {
            if ($errorEj) {
              ?> <h5 class="text-danger">X Debes subir un formato de archivo válido (jpg, jpeg o png)</h5> <?php
            }
            if ($exitoEjemplo) {
              ?> <h5 class="text-success">✓ Ejemplo subido exitosamente</h5> <?php
            }
          }

           ?>
          <input type="file" class="form-control-file btn btn-add" id="ejemplo" name="ejemplo" onChange="ver(form.fileToUpload.value)">
          <!--   <textarea class="form-control border rounded mt-3" name="descripcion" id="" rows="4" placeholder="Ingrese una dexcripción para el documento"></textarea>
            -->  <input type="submit" value="Subir Formato" class="btn btn-add d-block mt-2" name="bimestrales" >
        </div>
        <div>
        </div>
    </form>
    </div>
</div>
<!-- ========================================================================================================== -->

<!-- ========================================================================================================== -->


<div class="container-fluid d-flex border rounded mb-4 flex-wrap ml-2 mr-2">
    <div class="col-md-6 d-flex align-items-center t-center">
        <Strong><h1>Informe final</h1></Strong>
    </div>
    <div class="col-md-6">
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <?php
          if (!empty($_POST) && isset($_POST['final'])) {
            if ($errorVacio) {
              ?> <p></p> <h5 class="text-danger">X Debes seleccionar almenos un archivo para subir</h5> <?php
            }
          }
           ?>
          <Strong><h4 id="section1">Formato informe final (.doc o .docx)</h4></Strong>
          <?php
          if (!empty($_POST) && isset($_POST['final'])) {
            if ($errorDoc) {
              ?> <h5 class="text-danger">X Debes subir un formato de archivo válido (doc o docx)</h5> <?php
            }
            if ($exitoFormato) {
              ?> <h5 class="text-success">✓ Formato subido exitosamente</h5> <?php
            }
          }

           ?>
          <input type="file" class="form-control-file btn btn-add" id="formato" name="formato" onChange="ver(form.fileToUpload.value)">
          <Strong><h4 id="section1">Imagen ejemplo de llenado (jpg, jpeg o png)</h4></Strong>
          <?php
          if (!empty($_POST) && isset($_POST['final'])) {
            if ($errorEj) {
              ?> <h5 class="text-danger">X Debes subir un formato de archivo válido (jpg, jpeg o png)</h5> <?php
            }
            if ($exitoEjemplo) {
              ?> <h5 class="text-success">✓ Ejemplo subido exitosamente</h5> <?php
            }
          }

           ?>
          <input type="file" class="form-control-file btn btn-add" id="ejemplo" name="ejemplo" onChange="ver(form.fileToUpload.value)">
          <!--   <textarea class="form-control border rounded mt-3" name="descripcion" id="" rows="4" placeholder="Ingrese una dexcripción para el documento"></textarea>
            --><input type="submit" value="Subir Formato" class="btn btn-add d-block mt-2" name="final" >
        </div>
        <div>
        </div>
    </form>
    </div>
</div>
<!-- ========================================================================================================== -->

<!-- ========================================================================================================== -->


<div class="container-fluid d-flex border rounded mb-4 flex-wrap ml-2 mr-2">
    <div class="col-md-6 d-flex align-items-center t-center">
        <Strong><h1>Carta de liberación</h1></Strong>
    </div>
    <div class="col-md-6">
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <?php
          if (!empty($_POST) && isset($_POST['liberacion'])) {
            if ($errorVacio) {
              ?> <p></p> <h5 class="text-danger">X Debes seleccionar almenos un archivo para subir</h5> <?php
            }
          }
           ?>
          <Strong><h4 id="section1">Formato de carta de liberación (.doc o .docx)</h4></Strong>
          <?php
          if (!empty($_POST) && isset($_POST['liberacion'])) {
            if ($errorDoc) {
              ?> <h5 class="text-danger">X Debes subir un formato de archivo válido (doc o docx)</h5> <?php
            }
            if ($exitoFormato) {
              ?> <h5 class="text-success">✓ Formato subido exitosamente</h5> <?php
            }
          }

           ?>
          <input type="file" class="form-control-file btn btn-add" id="formato" name="formato" onChange="ver(form.fileToUpload.value)">
          <Strong><h4 id="section1">Imagen ejemplo de llenado (jpg, jpeg o png)</h4></Strong>
          <?php
          if (!empty($_POST) && isset($_POST['liberacion'])) {
            if ($errorEj) {
              ?> <h5 class="text-danger">X Debes subir un formato de archivo válido (jpg, jpeg o png)</h5> <?php
            }
            if ($exitoEjemplo) {
              ?> <h5 class="text-success">✓ Ejemplo subido exitosamente</h5> <?php
            }
          }

           ?>
          <input type="file" class="form-control-file btn btn-add" id="ejemplo" name="ejemplo" onChange="ver(form.fileToUpload.value)">
          <!--   <textarea class="form-control border rounded mt-3" name="descripcion" id="" rows="4" placeholder="Ingrese una dexcripción para el documento"></textarea>
            -->  <input type="submit" value="Subir Formato" class="btn btn-add d-block mt-2" name="liberacion" >
        </div>
        <div>
        </div>
    </form>
    </div>
</div>
<!-- ========================================================================================================== -->




</div>
<?php require_once '../vistas/footer.php'; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>
  <script type="text/javascript" src="../../js/listaComentarios.js"></script>


</body>

</html>

<?php }else{
        $host  = $_SERVER['HTTP_HOST'];

        header("Location: http://$host/proyectoWeb/");
        exit;
    } ?>
