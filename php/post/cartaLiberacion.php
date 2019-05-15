<?php require_once '../vistas/cabezera.php'; ?>
<?php if($user->getTipo() == 0 || $user->getTipo() == 1){?>
<?php require_once '../vistas/sidebar.php'; ?>

<?php require_once '../vistas/labelPerfil.php'; ?>
<?php require_once '../procesamiento/carta.php'; ?>
<?php require_once '../procesamiento/procesarCarta.php'; ?>
<div class="container-fluid d-flex flex-wrap">
    <div class="col-md-6">



<?php require_once '../procesamiento/selectDoc.php'; ?>



    </div>
  <!-- Grid column -->
  <div class="col-md-6 mb-4">
   <h4 id="section1"><strong>Comentarios</strong></h4>
    <!-- Exaple 1 -->
    <div>
    <div class="card example-1 scrollbar-ripe-malinka">
      <div class="card-body">
        <div class="border rounded mt-3">
            <h5 class="ml-2">Juanito perez</h5>
            <p class="ml-2">Mi nombre esta mal</p>
        </div>
        <div class="border rounded mt-3">
            <h5 class="ml-2">Francis jimenez</h5>
            <p class="ml-2">ok, la voy a cambiar</p>
        </div>
        <div class="border rounded mt-3">
            <h5 class="ml-2">Juanito perez</h5>
            <p class="ml-2">Perfecto, ahora si</p>
        </div>
        <div class="border rounded mt-3">
            <h5 class="ml-2">Francis jimenez</h5>
            <p class="ml-2">Imprimela y me la traes</p>
        </div>
      </div>
    </div>
    <!-- Exaple 1 -->
    <form class="form-inline mt-3">
        <div class="form-group mr-2 mb-2">
            <input type="password" class="form-control w-100" id="inputPassword2" placeholder="Añadir comentario">
        </div>
        <button type="submit" class="btn btn-add mb-2">Comentar</button>
        </form>
    </div>


  </div>
  <!-- Grid column -->
  </div>




<?php require_once '../vistas/footer.php'; ?>

<?php require_once '../vistas/bloqueScriptView.php'; ?>

<?php }else{
        $host  = $_SERVER['HTTP_HOST'];

        header("Location: http://$host/proyectoWeb/");
        exit;
    }

    ?>
<script src="../../js/documentos.js"></script>
<?php

//==============================================================================2
if (isset($_POST['prestaServ'])) {
  ?>
  <script type="text/javascript">
  document.getElementById("slct").selectedIndex = "1";
  $(document).ready(function(){
      if ($("#slct option:selected").val()=="2") {
        $("#cartaSolicitudServSoc").hide();
        $("#cartaSolicitudPrestServ").show();
        $("#cartaCompromiso").hide();
        $("#cartaPresentacion").hide();
        $("#cartaAceptacion").hide();
        $("#tresReportes").hide();
        $("#cartaTerminacion").hide();
        $("#cartaLiberacion").hide();
      }
    });
  </script>
  <?php
}

//==============================================================================3
if (isset($_POST['compromiso'])) {
  ?>
  <script type="text/javascript">
  document.getElementById("slct").selectedIndex = "2";
  $(document).ready(function(){
      if ($("#slct option:selected").val()=="3") {
        $("#cartaSolicitudServSoc").hide();
        $("#cartaSolicitudPrestServ").hide();
        $("#cartaCompromiso").show();
        $("#cartaPresentacion").hide();
        $("#cartaAceptacion").hide();
        $("#cartaReportes").hide();
        $("#cartaTerminacion").hide();
        $("#cartaLiberacion").hide();
      }
    });
  </script>
  <?php
}

if (isset($_POST['presentacion'])) {
  ?>
  <script type="text/javascript">
  document.getElementById("slct").selectedIndex = "3";
  $(document).ready(function(){
      if ($("#slct option:selected").val()=="7") {
        $("#cartaSolicitudServSoc").hide();
        $("#cartaSolicitudPrestServ").hide();
        $("#cartaCompromiso").hide();
        $("#cartaPresentacion").show();
        $("#cartaAceptacion").hide();
        $("#tresReportes").hide();
        $("#cartaTerminacion").hide();
        $("#cartaLiberacion").hide();
      }
    });
  </script>
  <?php
}

if (isset($_POST['aceptacion'])) {
  ?>
  <script type="text/javascript">
  document.getElementById("slct").selectedIndex = "4";
  $(document).ready(function(){
      if ($("#slct option:selected").val()=="8") {
        $("#cartaSolicitudServSoc").hide();
        $("#cartaSolicitudPrestServ").hide();
        $("#cartaCompromiso").hide();
        $("#cartaPresentacion").hide();
        $("#cartaAceptacion").show();
        $("#tresReportes").hide();
        $("#cartaTerminacion").hide();
        $("#cartaLiberacion").hide();
      }
    });
  </script>
  <?php
}

if (isset($_POST['reportes'])) {
  ?>
  <script type="text/javascript">
  document.getElementById("slct").selectedIndex = "5";
  $(document).ready(function(){
      if ($("#slct option:selected").val()=="9") {
        $("#cartaSolicitudServSoc").hide();
        $("#cartaSolicitudPrestServ").hide();
        $("#cartaCompromiso").hide();
        $("#cartaPresentacion").hide();
        $("#cartaAceptacion").hide();
        $("#cartaReportes").show();
        $("#cartaTerminacion").hide();
        $("#cartaLiberacion").hide();
      }
    });
  </script>
  <?php
}

if (isset($_POST['terminacion'])) {
  ?>
  <script type="text/javascript">
  document.getElementById("slct").selectedIndex = "6";
  $(document).ready(function(){
      if ($("#slct option:selected").val()=="10") {
        $("#cartaSolicitudServSoc").hide();
        $("#cartaSolicitudPrestServ").hide();
        $("#cartaCompromiso").hide();
        $("#cartaPresentacion").hide();
        $("#cartaAceptacion").hide();
        $("#tresReportes").hide();
        $("#cartaTerminacion").show();
        $("#cartaLiberacion").hide();
      }
    });
  </script>
  <?php
}

if (isset($_POST['liberacion'])) {
  ?>
  <script type="text/javascript">
  document.getElementById("slct").selectedIndex = "7";
  $(document).ready(function(){
      if ($("#slct option:selected").val()=="12") {
        $("#cartaSolicitudServSoc").hide();
        $("#cartaSolicitudPrestServ").hide();
        $("#cartaCompromiso").hide();
        $("#cartaPresentacion").hide();
        $("#cartaAceptacion").hide();
        $("#tresReportes").hide();
        $("#cartaTerminacion").hide();
        $("#cartaLiberacion").show();
      }
    });
  </script>
  <?php
}

?>
