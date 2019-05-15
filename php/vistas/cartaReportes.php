<?php $documento = "9"; ?>

<?php
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
 ?>

<form  action="<?php $_SERVER['PHP_SELF'] ?>" class="user" method="post" enctype="multipart/form-data">
    <div class="form-group" >

      <?php
      if ($user->getTipo()==1) {
        if (isset($_POST['tresReportes']) && $errorFormato==0) {
          if ($errorEnlace==1) {
            ?><p class="text-danger" >❌ El máximo de caracteres para el enlace es de 49</p><?php
          }
          if ($errorEnlace==0) {
            ?><p class="text-success" >✔ El enlace ha sido actualziado correctamente correctamente</p><?php
          }
        }

        ?><Strong><h4 id="section1">Ingresa el enlace de los reportes: </h4></Strong><?php
      }
       ?>
       <div class="row">
        <?php
        if ($user->getTipo()==1) {
          ?>

          <div class="col-md-9">
            <input class="form-control " type="text" required class="c" name="reportes" id="reportes">
          </div>

          <div class="col-md-3">
          <button id="boton99" type="submit" name="tresReportes" class="btn btn-add mb-2">Guardar</button>
          </div>
          <?php
        }
         ?>

      </div>
    </div>
</form>

<div>
  <?php
  if (isset($_POST['tresReportes']) && $errorFormato==0) {

    if ($errorEnlace==0) {
      ?>
      <h3>Enlace: </h3>
      <h4><a href="<?php echo $newfilename; ?>" target="_blank"><?php echo $newfilename; ?></a></h4>
      <?php

    }else {
      ?>
      <h3>Enlace: </h3>
        <h4><a href="<?php echo $archivo; ?>" target="_blank"><?php echo $archivo; ?></a></h4>
      <?php
    }




  }else{
    if($num >0){
      ?>
      <h3>Enlace: </h3>
        <h4><a  href="<?php echo $archivo; ?> "target="_blank"><?php echo $archivo; ?></a></h4>
      <?php


    }else {

    }

  }
   ?>

</div>

<script type="text/javascript" src="../../js/alertCarta.js"></script>
