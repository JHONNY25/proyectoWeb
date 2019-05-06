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

<?php if($user->getTipo() == 1){ ?>
  <!-- Nav Item - Alerts -->
  <li class="nav-item dropdown no-arrow mx-1" id="listaNotificaciones">

  </li>
<?php } ?>
  <div class="topbar-divider d-none d-sm-block"></div>

  <!-- Nav Item - User Information -->
  <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="mr-2 d-none d-lg-inline text-gray-600 small" id="labelPerfil">
      <?php 

      if (isset($_SESSION['usuario'])) {
        //echo 'existe sesion';
   
        $user->setUser($sesion->getSesion());
         $usuario = $user->getNombre();

         echo $usuario;
      ?>
      </span>
      <?php  
        }else{
          echo 'no hay sesion';
        }
      ?>
      
    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
      <a class="dropdown-item" href="../vistas/perfil">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        Perfil
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="../logout" >
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Salir
      </a>
    </div>
  </li>

</ul>

</nav>

      <!--  MODAL DE DETALLES-->
      <div class="modal fade bd-example-modal-lg" id="ver-notificacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
          
              <div class="modal-content pl-5 pb-5 pr-5 pt-0">
              <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                         
                </div>  
                <div class="modal-body" id="detalles">  

                </div>

          </div>
        </div>
      </div>
      <!-- FIN DE MODAL DE DETALLES -->
  
