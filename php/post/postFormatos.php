<?php require_once '../vistas/cabezera.php'; ?>

<?php require_once '../vistas/sidebar.php'; ?>
  s
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
    <form>
        <div class="form-group">
          <Strong><h4 id="section1">Formato de Solicitud de servicio social (.doc o .docx)</h4></Strong>
          <input type="file" class="form-control-file btn btn-add" id="servicioSocial">
          <Strong><h4 id="section1">Imagen ejemplo de llenado (jpg, jpeg o png)</h4></Strong>
          <input type="file" class="form-control-file btn btn-add" id="ejemploServicioSocial">
            <textarea class="form-control border rounded mt-3" name="descripcion" id="" rows="4" placeholder="Ingrese una dexcripción para el documento"></textarea>
            <input type="submit" value="Subir Formato" class="btn btn-add d-block mt-2">
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
    <form>
        <div class="form-group">
          <Strong><h4 id="section1">Formato de carta de aceptacion (.doc o .docx)</h4></Strong>
          <input type="file" class="form-control-file btn btn-add" id="cartaAceptacion">
          <Strong><h4 id="section1">Imagen ejemplo de llenado (jpg, jpeg o png)</h4></Strong>
          <input type="file" class="form-control-file btn btn-add" id="ejemploCarta">
            <textarea class="form-control border rounded mt-3" name="descripcion" id="" rows="4" placeholder="Ingrese una dexcripción para el documento"></textarea>
            <input type="submit" value="Subir Formato" class="btn btn-add d-block mt-2">
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
    <form>
        <div class="form-group">
          <Strong><h4 id="section1">Formato de carta de reportes (.doc o .docx)</h4></Strong>
          <input type="file" class="form-control-file btn btn-add" id="reportes">
          <Strong><h4 id="section1">Imagen ejemplo de llenado (jpg, jpeg o png)</h4></Strong>
          <input type="file" class="form-control-file btn btn-add" id="ejemploReportes">
            <textarea class="form-control border rounded mt-3" name="descripcion" id="" rows="4" placeholder="Ingrese una dexcripción para el documento"></textarea>
            <input type="submit" value="Subir Formato" class="btn btn-add d-block mt-2">
        </div>
        <div>

        </div>
    </form>
    </div>
</div>

</div>
<?php require_once '../vistas/footer.php'; ?>

<?php require_once '../vistas/bloqueScriptView.php'; ?>
