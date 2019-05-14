var modoEdicion = false;
var id = 0;
var usuarioValido = false;
var contrasenaValido = false;
var repContrasenaValido = false;
var nombreValido = false;
var apellidoPaternoValido = false;
var apellidoMaternoValido = false;
var correoValido = false;
var telefonoValido = false;

function getDatosInput(){
    let nombre = $('#nombre').val();
    let apellidoP = $('#apellido_p').val();
    let apellidoM = $('#apellido_m').val();
    let correo = $('#correo').val();
    let telefono = $('#telefono').val();
    let usuario = $('#usuario').val();
    let contrasena = $('#contra').val();
    let repContrasena = $('#rep_contra').val();

    let objeto = {
        id: id,
        nombre: nombre,
        apellidoP: apellidoP,
        apellidoM: apellidoM,
        correo: correo,
        telefono: telefono,
        usuario: usuario,
        contrasena: contrasena
    }

    return objeto;
}

function setDatosInput(o){
    $('#usuario').val(o.usuario);
    $('#contra').val();
    $('#rep_contra').val();
    $('#nombre').val(o.nombre);
    $('#apellido_p').val(o.apellidoP);
    $('#apellido_m').val(o.apellidoM);
    $('#correo').val(o.correo);
    $('#telefono').val(o.telefono);
}

function limpiarForm(){
    $('#usuario').val('');
    $('#contra').val('');
    $('#rep_contra').val('');
    $('#nombre').val('');
    $('#apellido_p').val('');
    $('#apellido_m').val('');
    $('#correo').val('');
    $('#telefono').val('');
}

function camposValidos(){
    if(!usuarioValido){
        jQuery("#usuario").focus();
        return false;
    } else if (!contrasenaValido) {
        jQuery("#contra").focus();
        return false;
    } else if (!repContrasenaValido) {
        jQuery("#rep_contra").focus();
        return false;
    } else if (!nombreValido) {
        jQuery("#nombre").focus();
        return false;
    } else if (!apellidoPaternoValido) {
        jQuery("#apellido_p").focus();
        return false;
    } else if (!apellidoMaternoValido) {
        jQuery("#apellido_m").focus();
        return false;
    } else if (!correoValido) {
        jQuery("#correo").focus();
        return false;
    } else if (!telefonoValido) {
        jQuery("#telefono").focus();
        return false;
    }

    return true;
}

function habilitarEdicion(b){
    $('#usuario').prop('disabled', !b);
    $('#contra').prop('disabled', !b);
    $('#rep_contra').prop('disabled', !b);
    $('#nombre').prop('disabled', !b);
    $('#apellido_p').prop('disabled', !b);
    $('#apellido_m').prop('disabled', !b);
    $('#correo').prop('disabled', !b);
    $('#telefono').prop('disabled', !b);

    if (b) {
        jQuery("#editar").hide();
        jQuery("#cancelar").show();
        jQuery("#guardar").show();
    } else {
        jQuery("#editar").show();
        jQuery("#cancelar").hide();
        jQuery("#guardar").hide();
    }
    
}

function getListaPersonas(){
    $.ajax({
        url:"../procesamiento/personal.php?action=lista",  
        type:"GET",
        success: (data) => {
            var lista = JSON.parse(data);
            jQuery("#cuerpo-tabla").empty();
            var html2 = "";
            for (var i of lista) {
                
                html2 += `
                    <tr class = "fila" data-id = "${i.id}">
                        <td>${i.nombre}</td>
                        <td>${i.correo}</td>
                        <td>${i.telefono}</td>
                        <td class="d-flex justify-content-center">
                            <a href="" class="eliminar text-danger">
                                    <i class="fa fa-user-times"></i>
                            </a>
                        </td>
                    </tr>
                        `;
            }
            
            jQuery("#cuerpo-tabla").html(html2);
        }
    });
}

function registrar(o){
    $.ajax({
        url:"../procesamiento/personal.php?action=registrar",  
        type:"POST",
        dataType: "json",
        data:{
            nombre: o.nombre,
            apellido_p: o.apellidoP,
            apellido_m: o.apellidoM,
            correo: o.correo,
            telefono: o.telefono,
            usuario: o.usuario,
            contrasena: o.contrasena
        },
        success: (data) => {
            mensajeCorrecto();
        }
    });
}

function actualizar(o){
    $.ajax({
        url:"../procesamiento/personal.php?action=actualizar",  
        type:"POST",
        dataType: "json",
        data:{
            id: id,
            nombre: o.nombre,
            apellido_p: o.apellidoP,
            apellido_m: o.apellidoM,
            correo: o.correo,
            telefono: o.telefono,
            usuario: o.usuario,
            contrasena: o.contrasena
        },
        success: (data) => {}
        
    });
}

function eliminar(id){
    $.ajax({
        url:"../procesamiento/personal.php?action=deshabilitar",  
        type:"POST",
        dataType: "json",
        data:{
            id: id
        },
        success: (data) => {}
        
    });
}

function detalles(id){
    $.ajax({  
        url:"../procesamiento/personal.php?action=detalles",  
        type:"POST",
        data:{
            id:id
        },
        dataType: "json",
        success: (data) => {
            setDatosInput(data);
        }
   });
}

function existeCorreo(correo){
    $.ajax({
        url:"../procesamiento/personal.php?action=existe-correo",
        type:"POST",
        data:{
            correo:correo
        },
        dataType: "json",
        success: function (data) {
            //return data.existe;
            if (data.existe) {
                jQuery("#correo").addClass("is-invalid");
                jQuery("#msj-correo").html("Correo existente, intente otro.");
                correoValido = false;
            } else {
                jQuery("#correo").addClass("is-valid");
                jQuery("#msj-correo").empty();
                correoValido = true;
            }
        }
   });
}

function existeUsuario(usuario){
    $.ajax({
        url:"../procesamiento/personal.php?action=existe-usuario",
        type:"POST",
        data:{
            usuario:usuario
        },
        dataType: "json",
        success: (data) => {
            //return data.existe;
            if (data.existe) {
                jQuery("#usuario").addClass("is-invalid");
                jQuery('#msj-usuario').html('Usuario existente, intente otro.');
                usuarioValido = false;
            } else {
                jQuery("#usuario").addClass("is-valid");
                usuarioValido = true;
            }
        }
   });
}

function mensajeCorrecto(){
    Swal.fire({
        title: 'Correcto',
        text: "¡Guardado Correctamente!",
        type: 'success',
        showConfirmButton: false,
        timer: 1000
      });
}

/*Script para guardar un usuario usando jQuery*/
$('#guardar').click((e) => {
    e.preventDefault();
    
    if (camposValidos()){
        let o = getDatosInput();

        if (modoEdicion) {
            actualizar(o);
        } else {
            registrar(o);
            limpiarForm();
            $('#nombre').focus();
        }
    }
});

$('.eliminar').click(function (e) {
    e.preventDefault();
    var id2 = $(this).parent().parent().attr('data-id');
    eliminar(id2);
});

$('.fila').dblclick(function() {
    modoEdicion = true;
    id = $(this).attr('data-id');

    /*

    var html3 = `
    <button type="button" id="cancelar" name="cancelar" href="#" class="btn btn-inicio btn-user btn-block">
        Cancelar
    </button>
        `;
    jQuery("#guardar").after(html3);

    var html2 = `
        <button type="button" id="editar" name="editar" href="#" class="btn btn-inicio btn-user">
            Editar
        </button>
        `;
    jQuery("#grupo-botones").after(html2);

    */

    //habilitarEdicion(false);
    $('#nuevo-modal').modal('show');

    detalles(id);
});

$("#nuevo-modal").on("hidden.bs.modal", () => {
    modoEdicion = false;
    id = 0;
    limpiarForm();
    getListaPersonas();
});

/*validar campo usuario*/
jQuery('#usuario').blur(function(){
    var v = jQuery('#usuario').val();

    if (v === ''){
        jQuery('#usuario').removeClass('is-valid');
        jQuery("#usuario").addClass("is-invalid");
        jQuery('#msj-usuario').html('Campo requerido, ingresar datos.');
        usuarioValido = false;
    } else {
        jQuery("#usuario").removeClass("is-invalid");
        jQuery('#msj-usuario').html('');
        existeUsuario(v);
    }
});

function delay(callback, ms) {
    var timer = 0;
    return function() {
        var context = this, args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
            callback.apply(context, args);
        }, ms || 0);
    };
}

function contrasena () {
    var id = '#contra';
    var msj = '#msj-contrasena';
    var v = jQuery(id).val();
    
    if (v === '') {
        jQuery(id).addClass('is-invalid');
        jQuery(msj).html('Campo requerido, ingresar datos.');
        contrasenaValido = false;
    } else {
        jQuery(id).removeClass('is-invalid');
        jQuery(msj).empty();
        contrasenaValido = true;
    }
}

jQuery("#contra").on('input', delay(contrasena, 500));

function repContra () {
    var id = "#contra";
    var id2 = "#rep_contra";
    var msj = "#msj-contrasena";
    var msj2 = "#msj-rep-contrasena";
    
    var v = jQuery(id2).val();
    var v2 = jQuery(id).val();
    
    if (v === '') {
        jQuery(id2).addClass('is-invalid');
        jQuery(msj2).html('Campo requerido, ingresar datos.');
        repContrasenaValido = false;
    } else if (v !== v2) {
        jQuery(id2).addClass('is-invalid');
        jQuery(msj2).html('Contraseñas diferentes.');
        repContrasenaValido = false;
    } else {
        jQuery(id2).removeClass('is-invalid');
        jQuery(msj2).empty();
        repContrasenaValido = true;
    }
}

jQuery("#rep_contra").on("input", delay(repContra, 500));

function validarNombre (){
    var v = jQuery('#nombre').val();
    if (v === ''){
        jQuery("#nombre").addClass("is-invalid");
        jQuery('#msj-nombre').html('Campo requerido, ingresar datos.');
        nombreValido = false;
    } else {
        jQuery("#nombre").removeClass("is-invalid");
        jQuery('#msj-nombre').empty();
        nombreValido = true;
    }
}

/*validar campo nombre*/
jQuery('#nombre').on("input", delay(validarNombre, 500));

function validarApellidoP () {
    var v = jQuery('#apellido_p').val();
    if (v === ''){
        jQuery('#apellido_p').addClass('is-invalid');
        jQuery('#msj-apellido-paterno').html('Campo requerido, ingresar datos.');
        apellidoPaternoValido = false;
    } else {
        jQuery('#apellido_p').removeClass('is-invalid');
        jQuery('#msj-apellido-paterno').html('');
        apellidoPaternoValido = true;
    }
}

/*validar campo nombre*/
jQuery("#apellido_p").on("input", delay(validarApellidoP, 500));

function validarApellidoM () {
    var id = "#apellido_m";
    var msj = "#msj-apellido-materno";
    var v = jQuery(id).val();

    if (v === ''){
        jQuery(id).addClass('is-invalid');
        jQuery(msj).html('Campo requerido, ingresar datos.');
        apellidoMaternoValido = false;
    } else {
        jQuery(id).removeClass('is-invalid');
        jQuery(msj).empty();
        apellidoMaternoValido = true;
    }
}

/*validar campo nombre*/
jQuery("#apellido_m").on("input", delay(validarApellidoM, 500));

/*validar campo usuario*/
function validarCorreo (){
    var id = "#correo";
    var idMsj = "#msj-correo";
    var v = jQuery(id).val();

    if (v === ''){
        jQuery(id).removeClass('is-valid');
        jQuery(id).addClass("is-invalid");
        jQuery(idMsj).html('Campo requerido, ingresar datos.');
        correoValido = false;
    } else {
        jQuery(id).removeClass("is-invalid");
        jQuery(idMsj).empty();
        existeCorreo(v);
    }
}

jQuery("#correo").on("input", delay(validarCorreo, 500));

function validarTelefono () {
    var id = "#telefono";
    var msj = "#msj-telefono";
    var v = jQuery(id).val();
    
    if (v === ''){
        jQuery(id).addClass('is-invalid');
        jQuery(msj).html('Campo requerido, ingresar datos.');
        telefonoValido = false;
    } else if (v.length !== 10) {
        jQuery(id).addClass('is-invalid');
        jQuery(msj).html('Número de telefono a 10 digitos.');
        telefonoValido = false;
    } else {
        jQuery(id).removeClass('is-invalid');
        jQuery(msj).empty();
        telefonoValido = true;
    }
}

/*validar campo nombre*/
jQuery("#telefono").on("input", delay(validarTelefono, 500));





