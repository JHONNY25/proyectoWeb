<?php
require_once VIEW_CABEZERA;
require_once VIEW_SIDEBAR;
require_once VIEW_PERFIL; 
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Usuarios</li>
        <li class="breadcrumb-item active">Personal</li>
    </ol>
    <!--Link para abrir un modal nuevo registro-->
    <a id="nuevo" href='' class="mb-3 btn btn-icon-split btn-add">
        <span class="icon text-white-50">
            <i class="fas fa-plus-circle"></i>
        </span>
        <span class="text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nuevo Usuario</font></font></span>
    </a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Personal</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover rounded" id="dataTable" width="100%" cellspacing="0">
                    <thead class="azul-bajo text-white rounded">
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id = "cuerpo-tabla">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- modal -->
<div class="modal fade bd-example-modal-lg" id="nuevo-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content pl-3 pb-3 pr-3 pt-0">
        <?php 
        //require_once DIR_VIEWS . 'personal_detalles.php';
        $controller = new PersonalController();
        $controller->crearNuevo();
        ?>

        </div>
    </div>
</div>

<?php require_once VIEW_FOOTER; ?>

<script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../js/demo/datatables-demo.js"></script>
  <script src="../../js/sweetalert2.all.min.js"></script>
  <script src="../../js/Personal.js"></script>
  <script src="../../js/listaComentarios.js"></script>
  <script src="../../js/validate.js"></script>
 
</body>

</html>




