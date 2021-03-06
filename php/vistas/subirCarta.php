<?php $documento = "12"; ?>

<form  action="<?php $_SERVER['PHP_SELF'] ?>" class="user" method="post" enctype="multipart/form-data">
    <div class="form-group" >

      <?php
      if ($user->getTipo()==0) {
        ?><Strong><h4 id="section1">Subir carta de liberación</h4></Strong><?php
      }
      if ($user->getTipo()==1) {
        ?><Strong><h4 id="section1">El administrador deberá subir este archivo</h4></Strong><?php
      }
       ?>

      <?php
      if (isset($_POST['liberacion'])) {
        if ($errorFormato == 0 && $uploadOk == 1) {
          ?>
          <p class="text-success">✔ Carta de liberacion actualizada correctamente</p>
          <?php
        }
        if ($errorFormato == 1) {
          ?>
          <pclass="text-danger" >❌ Formato no válido, solo se admiten archivos PDF</p>
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
          <button id="boton5" type="submit" name="liberacion" class="btn btn-add mb-2">Guardar</button>
          </div>
          <?php
        }
         ?>

      </div>
    </div>
</form>

<div>
  <?php
  if (isset($_POST['liberacion']) && $errorFormato==0) {
    if (end($temp) == "PDF" || end($temp)=="pdf") {
      ?>
      <embed width="100%" height="500" src="../../upload/documentos/cartaLiberacion/<?php echo $newfilename; ?>" alt="carta liberación" class="mw-100">
      <?php
    }else {
      ?>
      <img width="100%" height="100%" src="../../upload/documentos/cartaLiberacion/<?php echo $newfilename; ?>" alt="carta liberación" class="mw-100">
      <?php
    }

  }else{
    $con = new Conexion();
    $conect = $con->getConexion();

    $stm = $conect->prepare("call obt_carta_lib(?,?)");

    $stm->bind_param("ss",$nControl,$documento);
    $stm->execute();
    $stm->store_result();
    $num = $stm->num_rows;
    $stm->bind_result($archivo);
      while ($stm->fetch()) {
      }
    $stm->close();
    if($num >0){
      ?>
      <embed width="100%" height="500" src="../../upload/documentos/cartaLiberacion/<?php echo $archivo; ?>" alt="carta liberación" class="mw-100">
      <?php
    }else {
      ?><embed width="100%" height="100%" src="../../img/empty.png" alt="carta liberación" class="mw-100"><?php
    }

  }
   ?>

</div>

<script type="text/javascript" src="../../js/alertCarta.js"></script>
