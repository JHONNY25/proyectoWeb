<h4><strong>Ver documento:</strong></h4>
<select class="custom-select " id="slct">
<option value="1">Solicitud de servicio social</option>
<option value="2">Solicitud de prestador de servicio social</option>
<option value="3">Carta compromiso</option> <!-- LISTO -->
<option value="7">Carta de presentación</option> <!-- LISTO -->
<option value="8">Carta de aceptación</option> <!-- LISTO -->
<option value="9">3 Reportes bimestrales</option>
<option value="10">Carta de terminación</option> <!-- LISTO -->
<option value="12">Carta de liberacion</option> <!-- LISTO -->
</select>
<hr>
<?php
if (isset($_POST['prestaServ'])) {

}
 ?>
<div id="cartaSolicitudServSoc">
  <?php require_once '../vistas/cartaSolicitudServSoc.php'; ?>
</div>
<div id="cartaSolicitudPrestServ">
  <?php require_once '../vistas/cartaSolicitudPrestServ.php'; ?>
</div>
<div id="cartaCompromiso">
  <?php require_once '../vistas/cartaCompromiso.php'; ?>
</div>
<div id="cartaPresentacion">
  <?php require_once '../vistas/cartaPresentacion.php'; ?>
</div>
<div id="cartaAceptacion">
  <?php require_once '../vistas/cartaAceptacion.php'; ?>
</div>
<div id="cartaReportes">
  <?php require_once '../vistas/cartaReportes.php'; ?>
</div>
<div id="cartaTerminacion">
  <?php require_once '../vistas/cartaTerminacion.php'; ?>
</div>
<div id="cartaLiberacion">
  <?php require_once '../vistas/subirCarta.php'; ?>
</div>
