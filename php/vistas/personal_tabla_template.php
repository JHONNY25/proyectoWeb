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
    <a href='' data-toggle='modal' data-target='#nuevo-modal' class="mb-3 btn btn-icon-split btn-add">
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
                        <?php foreach($lista as $i): ?>

                        <tr class = "fila" data-id = "<?php echo $i->id; ?>">
                            <td><?php echo $i->nombre; ?></td>
                            <td><?php echo $i->correo; ?></td>
                            <td><?php echo $i->telefono; ?></td>
                            <td class="d-flex justify-content-center">
                                <a href="" class="eliminar text-danger">
                                    <i class="fa fa-user-times"></i>
                                </a>
                            </td>
                        </tr>

                        <?php endforeach; ?>

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
<script src="../../js/sweetalert2.all.min.js"></script>
<script src="../../js/Personal.js"></script>
<?php require_once VIEW_BLOQUE_SCRIPT;




