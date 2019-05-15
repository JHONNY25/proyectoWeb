<div class="modal-header">
    <h1><?php echo $variable; ?></h1>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body" id="actualizar">
    <form action="" class="user" id="publicacion" method="POST">
        <h5>Datos usuario</h5>
        <div class="d-block form-group">
            <label for="" >Usuario</label>
            <input id="usuario" name="usuario" type="text" maxlength="16" placeholder="" class="form-control" aria-describedby="emailHelp" require>
            <small id="msj-usuario" class="text-danger"></small>
        </div>
        <div class="d-block form-group">
            <label for="" >Contraseña</label>
            <input id="contra" name="contra" type="password" maxlength="16" placeholder="" class="form-control" aria-describedby="emailHelp" require>
            <small id="msj-contrasena" class="text-danger"></small>
        </div>
        <div class="d-block form-group">
            <label for="" >Repetir contraseña</label>
            <input id="rep_contra" name="rep_contra" type="password" maxlength="16" placeholder="" class="form-control" aria-describedby="emailHelp" require>
            <small id="msj-rep-contrasena" class="text-danger"></small>
        </div>
        <hr>
        <h5>Datos generales</h5>
        <div class="d-block form-group">
            <label for="" >Nombre</label>
            <input id="nombre" name="nombre" type="text" maxlength="24" placeholder="" class="form-control " aria-describedby="emailHelp" require>
            <small id="msj-nombre" class="text-danger"></small>
        </div>
        <div class="d-block form-group">
            <label for="" >Apellido paterno</label>
            <input id="apellido_p" name="apellido_p" type="text" maxlength="20" placeholder="" class="form-control" aria-describedby="emailHelp" require>
            <small id="msj-apellido-paterno" class="text-danger"></small>
        </div>
        <div class="d-block form-group">
            <label for="" >Apellido materno</label>
            <input id="apellido_m" name="apellido_m" type="text" maxlength="20" placeholder="" class="form-control" aria-describedby="emailHelp" require>
            <small id="msj-apellido-materno" class="text-danger"></small>
        </div>
        <div class="d-block form-group">
            <label for="" >Correo</label>
            <input id="correo" name="correo" type="text" maxlength="100" placeholder="" class="form-control" aria-describedby="emailHelp" require>
            <small id="msj-correo" class="text-danger"></small>
        </div>
        <div class="d-block form-group">
            <label for="" >Telefono</label>
            <input id="telefono" name="telefono" type="tel" maxlength="10" placeholder="" class="form-control" aria-describedby="emailHelp" require>
            <small id="msj-telefono" class="text-danger"></small>
        </div>
        <div id="grupo-botones">
            <button id="guardar" name="guardar" href="#" class="btn btn-inicio btn-user btn-block">
                Guardar
            </button>
        </div>
        
    </form>
</div>