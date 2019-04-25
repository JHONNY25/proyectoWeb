<?php

  $tipo = $user->getTipo();

?>

<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion azul-bajo" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="">

  <div class="sidebar-brand-text mx-3">ITES LOS CABOS</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="../../index">
    <i class="fas fa-fw fa-home"></i>
    <span>Inicio</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

  <?php

//si es tipo administrador
    if($tipo == 0){
  ?>
      <!-- Heading -->
<div class="sidebar-heading">
  Alumnos
</div>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-fw fa-book"></i>
    <span>Tramite Servicio Social</span>
  </a>
  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Tareas Administrativas:</h6>
      <a class="collapse-item" href="../post/postFormatos">Subir formato</a>
      <a class="collapse-item" href="../tablas/solicitudAlumno">Solicitud de Alumnos</a>
      <a class="collapse-item" href="../tablas/alumnos">Alumnos</a>
      <a class="collapse-item" href="../tablas/alumnosServicio">Alumnos en servicio</a>
    </div>
  </div>
</li>


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Institución
</div>

<li class="nav-item">
  <a class="nav-link" href="../tablas/institucion">
    <i class="fas fa-fw fa-briefcase"></i>
    <span>Empresas</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="../tablas/solicitudEmpresa">
    <i class="fas fa-fw fa-briefcase"></i>
    <span>Solicitudes de Empresas</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Crea notificaciones
</div>

<li class="nav-item">
  <a class="nav-link" href="">
    <i class="fas fa-bell fa-fw"></i>
    <span>Notificaciones</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider">
<?php
    }//termina if de tipo admin
?>




<?php
//tipo empresa
if($tipo == 2){
?>

<!-- Heading -->
<div class="sidebar-heading">
  Aceptaciones
</div>

<li class="nav-item">
<a class="nav-link" href="../tablas/publicAceptadas">
    <i class="fas fa-fw fa-globe"></i>
    <span>Publicaciones aceptadas</span></a>
</li>

<li class="nav-item">
<a class="nav-link" href="../formularios/publicacion">
    <i class="fas fa-plus-circle"></i>
    <span>Nueva Publicación</span></a>
</li>


<!-- Heading -->
<div class="sidebar-heading">
  Publicaciones
</div>

<li class="nav-item">
<a class="nav-link" href="../tablas/residencias">
    <i class="fas fa-fw fa-globe"></i>
    <span>Residencias</span></a>

</li>

<li class="nav-item">

  <a class="nav-link" href="../tablas/servicioSocial">
    <i class="fas fa-fw fa-id-card"></i>
    <span>Servicio Social</span></a>

</li>

<li class="nav-item">
  <a class="nav-link" href="../tablas/bolsaTrabajo">
    <i class="fas fa-fw fa-briefcase"></i>
    <span>Bolsa de trabajo</span></a>

</li>
  <?php
  //tipo admin
  }else if($tipo == 0){
  ?>

  <!-- Heading -->
<div class="sidebar-heading">
  Publicaciones
</div>

<li class="nav-item">
    <a class="nav-link" href="../tablas/solicitudResidencia">
    <i class="fas fa-fw fa-globe"></i>
    <span>Residencias</span></a>

</li>

<li class="nav-item">

    <a class="nav-link" href="../tablas/solicitudServicio">
    <i class="fas fa-fw fa-id-card"></i>
    <span>Servicio Social</span></a>

</li>

<li class="nav-item">
    <a class="nav-link" href="../tablas/solicitudTrabajo">
    <i class="fas fa-fw fa-briefcase"></i>
    <span>Bolsa de trabajo</span></a>

</li>
  <?php
  //tipo alumno
}else if($tipo == 1){
  ?>

<div class="sidebar-heading">
Tramite Servicio Social
</div>


<li class="nav-item">
    <a class="nav-link" href="../post/tramite">
    <i class="fas fa-fw fa-book"></i>
    <span>Mi tramite</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
  Publicaciones
</div>

<li class="nav-item">
    <a class="nav-link" href="../procesamiento/postResidencia">
    <i class="fas fa-fw fa-globe"></i>
    <span>Residencias</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="../post/postServicio">
    <i class="fas fa-fw fa-id-card"></i>
    <span>Servicio Social</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="../post/postTrabajo">
    <i class="fas fa-fw fa-briefcase"></i>
    <span>Bolsa de trabajo</span></a>
</li>
    <?php
    }
    ?>


<!-- Divider -->
<hr class="sidebar-divider">

<?php
  if($tipo == 0){
?>
<!-- Heading -->
<div class="sidebar-heading">
  Usuarios
</div>

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="../tablas/personal">
    <i class="fas fa-fw fa-users"></i>
    <span>Personal</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider">
<?php
  }
?>

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
