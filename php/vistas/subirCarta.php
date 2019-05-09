<?php require_once '../procesamiento/procesarCarta.php'; ?>

<form  action="<?php $_SERVER['PHP_SELF'] ?>" class="user" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <?php
      if ($user->getTipo()==0) {
        ?><Strong><h4 id="section1">Subir carta de liberación</h4></Strong><?php
      }
       ?>

      <?php
      if (isset($_POST['carta'])) {
        if ($errorFormato == 0 && $uploadOk == 1) {
          ?>
          <p class="text-success">✔ Carta de liberacion actualizada correctamente</p>
          <?php
        }
        if ($errorFormato == 1) {
          ?>
          <pclass="text-danger" >❌ Formato no válido, solo se admiten archivos PNG, JPG, JPEG y PDF</p>
          <?php
        }
      }
       ?>
       <div class="row">
        <?php
        if ($user->getTipo()==0) {
          ?>

          <div class="col-md-9">
            <input class="form-control-file btn btn-add" type="file" required class="custom-file" name="cartaLib" id="cartaLib">
          </div>

          <div class="col-md-3">
          <button id="boton" type="submit" name="carta" class="btn btn-add mb-2">Guardar</button>
          </div>
          <?php
        }
         ?>

      </div>
    </div>
</form>

<div>
  <?php
  if (isset($_POST['carta']) && $errorFormato==0) {
    if (end($temp) == "PDF" || end($temp)=="pdf") {
      ?>
      <embed width="100%" height="500" src="../../upload/cartaLiberacion/<?php echo $newfilename; ?>" alt="carta liberación" class="mw-100">
      <?php
    }else {
      ?>
      <img width="100%" height="100%" src="../../upload/cartaLiberacion/<?php echo $newfilename; ?>" alt="carta liberación" class="mw-100">
      <?php
    }

  }else{
    ?>
    <embed src="../../img/carta.jpg" alt="carta liberación" class="mw-100">
    <?php
  }
   ?>

</div>

<script type="text/javascript" src="../../js/alertCarta.js"></script>
