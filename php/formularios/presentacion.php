<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Vinculación</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  
  <link href="css/style.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
  <?php
if (isset($_SESSION['usuario'])) {

  $user->setUser($sesion->getSesion());
  $tipo = $user->getTipo();
}
?>

<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion azul-bajo" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

  <div class="sidebar-brand-text mx-3">ITES LOS CABOS</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="../../index.php">
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
      <a class="collapse-item" href="php/post/postFormatos.php">Subir formato</a>
      <a class="collapse-item" href="php/tablas/solicitudAlumno.php">Solicitud de Alumnos</a>
      <a class="collapse-item" href="php/tablas/alumnos.php">Alumnos</a>
      <a class="collapse-item" href="php/tablas/alumnosServicio.php">Alumnos en servicio</a>
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
  <a class="nav-link" href="php/tablas/institucion.php">
    <i class="fas fa-fw fa-briefcase"></i>
    <span>Empresas</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="php/tablas/solicitudEmpresa.php">
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
<a class="nav-link" href="php/tablas/publicAceptadas.php">
    <i class="fas fa-fw fa-globe"></i>
    <span>Publicaciones aceptadas</span></a>
</li>

<li class="nav-item">
<a class="nav-link" href="php/formularios/publicacion.php">
    <i class="fas fa-fw fa-globe"></i>
    <span>Nueva Publicación</span></a>
</li>

<!-- Heading -->
<div class="sidebar-heading">
  Publicaciones
</div>

<li class="nav-item">
<a class="nav-link" href="php/tablas/residencias.php">
    <i class="fas fa-fw fa-globe"></i>
    <span>Residencias</span></a>

</li>

<li class="nav-item">

  <a class="nav-link" href="php/tablas/servicioSocial.php">
    <i class="fas fa-fw fa-id-card"></i>
    <span>Servicio Social</span></a>

</li>

<li class="nav-item">
  <a class="nav-link" href="php/tablas/bolsaTrabajo.php">
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
    <a class="nav-link" href="php/tablas/solicitudResidencia.php">
    <i class="fas fa-fw fa-globe"></i>
    <span>Residencias</span></a>

</li>

<li class="nav-item">

    <a class="nav-link" href="php/tablas/solicitudServicio.php">
    <i class="fas fa-fw fa-id-card"></i>
    <span>Servicio Social</span></a>

</li>

<li class="nav-item">
    <a class="nav-link" href="php/tablas/solicitudTrabajo.php">
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
    <a class="nav-link" href="php/post/tramite.php">
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
    <a class="nav-link" href="php/procesamiento/postResidencia.php">
    <i class="fas fa-fw fa-globe"></i>
    <span>Residencias</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="php/post/postServicio.php">
    <i class="fas fa-fw fa-id-card"></i>
    <span>Servicio Social</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="php/post/postTrabajo.php">
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
  <a class="nav-link" href="php/tablas/personal.php">
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




    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
  <i class="fa fa-bars"></i>
</button>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

  <!-- Nav Item - Alerts -->
  <li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-bell fa-fw"></i>
      <!-- Counter - Alerts -->
      <span class="badge badge-danger badge-counter">3+</span>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
      <h6 class="dropdown-header">
        Alerts Center
      </h6>
      <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="mr-3">
          <div class="icon-circle bg-primary">
            <i class="fas fa-file-alt text-white"></i>
          </div>
        </div>
        <div>
          <div class="small text-gray-500">December 12, 2019</div>
          <span class="font-weight-bold">A new monthly report is ready to download!</span>
        </div>
      </a>
      <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="mr-3">
          <div class="icon-circle bg-success">
            <i class="fas fa-donate text-white"></i>
          </div>
        </div>
        <div>
          <div class="small text-gray-500">December 7, 2019</div>
          $290.29 has been deposited into your account!
        </div>
      </a>
      <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="mr-3">
          <div class="icon-circle bg-warning">
            <i class="fas fa-exclamation-triangle text-white"></i>
          </div>
        </div>
        <div>
          <div class="small text-gray-500">December 2, 2019</div>
          Spending Alert: We've noticed unusually high spending for your account.
        </div>
      </a>
      <a class="dropdown-item text-center small text-gray-500" href="">Ver todas las alertas</a>
    </div>
  </li>

  <div class="topbar-divider d-none d-sm-block"></div>

  <!-- Nav Item - User Information -->
  <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="mr-2 d-none d-lg-inline text-gray-600 small">
      <?php 
      echo $user->getNombre(); ?></span>
    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
      <a class="dropdown-item" href="php/vistas/perfil.php">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        Perfil
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="php/logout.php">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Salir
      </a>
    </div>
  </li>

</ul>

</nav>
  


<div class="container con-ites-img">
        <div class="row">
          <img src="img/ites.png" alt="">
        </div>
      </div>
      
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

      </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

