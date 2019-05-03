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
            <textarea class="form-control border rounded mt-3" name="descripcion" id="" rows="4" placeholder="Ingrese una dexcripción para el documento"></textarea>
            <input type="submit" value="Subir Formato" class="btn btn-add d-block mt-2" name="solicitudSS">
        </div>
        <div>

        </div>
    </form>
    </div>
</div>

<div class="container-fluid d-flex border rounded mb-4 flex-wrap ml-2 mr-2">
    <div class="col-md-6 d-flex align-items-center t-center">
        <Strong><h1>Carta aceptación</h1></Strong>
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
          <Strong><h4 id="section1">Formato de carta de aceptacion (.doc o .docx)</h4></Strong>
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
            <textarea class="form-control border rounded mt-3" name="descripcion" id="" rows="4" placeholder="Ingrese una dexcripción para el documento"></textarea>
            <input type="submit" value="Subir Formato" class="btn btn-add d-block mt-2" name="cartaAceptacion">
        </div>
        <div>

        </div>
    </form>
    </div>
</div>

<div class="container-fluid d-flex border rounded mb-4 flex-wrap ml-2 mr-2">
    <div class="col-md-6 d-flex align-items-center t-center">
        <Strong><h1>Reportes bimestrales</h1></Strong>
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
          <Strong><h4 id="section1">Formato de carta de reportes (.doc o .docx)</h4></Strong>
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
            <textarea class="form-control border rounded mt-3" name="descripcion" id="" rows="4" placeholder="Ingrese una dexcripción para el documento"></textarea>
            <input type="submit" value="Subir Formato" class="btn btn-add d-block mt-2" name="reportes" >
        </div>
        <div>

        </div>
    </form>
    </div>
</div>

</div>
<?php require_once '../vistas/footer.php'; ?>

<?php require_once '../vistas/bloqueScriptView.php'; ?>

<?php }else{
        $host  = $_SERVER['HTTP_HOST'];

        header("Location: http://$host/proyectoWeb/");
        exit;
    } ?>
