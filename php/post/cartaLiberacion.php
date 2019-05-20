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
      <div class="card-body" id="comentarios">

      <!-- AQUI SE MUESTRAN LOS COMENTARIOS-->
      </div>
    </div>
    <!-- Exaple 1 -->
    <form class="form-inline mt-3" id="formComents">
        <div class="form-group mr-2 mb-2">
            <input type="text" class="form-control w-100" id="mensaje" placeholder="Añadir comentario" name="coments">
            <?php
              if(isset($_GET['al']) && !empty($_GET['al'])){
            ?>

                <input type="hidden" id="valor" value="<?php echo $_GET['al']; ?>" name="id"> 
            <?php
                  }
            ?>
        </div>
        <input type="submit" class="btn btn-add mb-2" id="comentar" value="Comentar" >
        </form>
    </div>
    
    <?php
      if(isset($_GET['al']) && !empty($_GET['al'])){
    ?>

        <input type="hidden" id="valor" value="<?php echo $_GET['al']; ?>"> 
    <?php
          }
    ?>


  </div>
  <!-- Grid column -->
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
  <script src="../../js/documentos.js"></script>
  <script type="text/javascript" src="../../js/listaComentarios.js"></script>
  <script type="text/javascript" src="../../js/listaNotificacion.js"></script>
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
 
</body>

</html>
<?php }else{
        $host  = $_SERVER['HTTP_HOST'];

        header("Location: http://$host/proyectoWeb/");
        exit;
    }

    ?>

