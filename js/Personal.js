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
var contrasenaIguales = false;

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

$("#divcontra").hide();
$("#usuario").hide();

$("#check").on("click", function() {  
  if ($("#check").is(':checked')) {  
    $("#divcontra").show();
  } else {  
    $("#divcontra").hide();
  } 

});

function setDatosInput(o){
   // $('#usuario').val(o.usuario);

    $('#contra').val();
    $('#rep_contra').val();
    $('#nombre').val(o.nombre);
    $('#apellido_p').val(o.apellidoP);
    $('#apellido_m').val(o.apellidoM);
    $('#correo').val(o.correo);
    $('#telefono').val(o.telefono);
    $('#id').val(o.id);
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

function camposValidos2(){
    if (!contrasenaIguales) {
        jQuery("#contra").focus();
        console.log('contraseña diferente');
        return false;
    }else if (!nombreValido) {
        jQuery("#nombre").focus();
        console.log('nombre no valido');
        return false;
    } else if (!apellidoPaternoValido) {
        jQuery("#apellido_p").focus();
        console.log('ape p no valido');
        return false;
    } else if (!apellidoMaternoValido) {
        jQuery("#apellido_m").focus();
        console.log('ape m no valido');
        return false;
    } else if (!correoValido) {
        jQuery("#correo").focus();
        console.log('correo no valido');
        return false;
    } else if (!telefonoValido) {
        jQuery("#telefono").focus();
        console.log('tel no valido');
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
        url: '../procesamiento/mostrarPersonal.php',
        method:'POST',
        success:function(data){  
            $('#cuerpo-tabla').html(data);
       } 
    });
}

getListaPersonas();

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
        success: function(data){

        }
    });
    mensajeCorrecto();
    getListaPersonas();
    $('#nuevo-modal').modal('hide');
}
/*
function actualizar(o){

    //var datos = 
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
}*/

//update para empresa
function actualizar(){
  
        var datos = $('#publicacion').serialize();
  
        $.ajax({
          type:"POST",
          url: "../procesamiento/updatePersonal.php",
          data: datos,
          success:function(r){
            if(r == 1){
              $('#nuevo-modal').modal('hide'); 
              Swal.fire({
                type: 'success',
                title: 'Modificado!',
                title: 'Datos modificados con éxito',
                showConfirmButton: false,
                timer: 1600
              })
  
              setTimeout(function(){
                $("#cuerpo-tabla").load("../procesamiento/mostrarPersonal.php");
              },1500);

            }else{
              Swal.fire({
                type: 'error',
                title: 'no funciono actualizar',
                text: '¡Error en el servidor!'
              })
            }
          }
        });
      
      return false;
    }


function confirm(dato){
    Swal.fire({
        title: '¿Está seguro?',
        text: "¡No podras revertir los cambios!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {
            eliminar(dato);
        }
      })

}

function eliminar(dato){ 
        var datos = {
            "id": dato
        };
            
          $.ajax({
            type:"POST",
            url: "../procesamiento/eliminoAdmin.php",
            data: datos,
            success:function(r){
              if(r == 1){
                  Swal.fire({ 
                      title: '¡Eliminado!',
                      text: 'La publicación ha sido eliminada.',
                      type: 'success',
                      showConfirmButton: false,
                      timer: 2000
                    })
                    
                    //obtenerDato();
                    setTimeout(function(){
                      $("#cuerpo-tabla").load("../procesamiento/mostrarPersonal.php");
                    },1500);
                    
              }else{
                Swal.fire({
                  type: 'error',
                  title: 'Lo sentimos...',
                  text: '¡Hubo problemas al eliminar!'
                })
              }
            }
          });
      return false;
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

    if (modoEdicion) {
        if($('#nombre').val() == ''){
            jQuery("#nombre").addClass("is-invalid");
            jQuery('#msj-nombre').html('Campo requerido, ingresar datos.');
          }else if(lengh($('#nombre').val()) == false){

          }else if($('#apellido_p').val() == ''){
            jQuery('#apellido_p').addClass('is-invalid');
            jQuery('#msj-apellido-paterno').html('Campo requerido, ingresar datos.');
          }else if(lengh24($('#apellido_p').val()) == false){
            jQuery('#apellido_p').addClass('is-invalid');
            jQuery('#msj-apellido-paterno').html('Apellido paterno sobrepasa el número de parametros.');
          }else if($('#apellido_m').val() == ''){
            jQuery('#apellido_m').addClass('is-invalid');
            jQuery('#msj-apellido-materno').html('Campo requerido, ingresar datos.');
          }else if(lengh24($('#apellido_m').val()) == false){
            jQuery('#apellido_m').addClass('is-invalid');
            jQuery('#msj-apellido-materno').html('Apellido materno sobrepasa el número de parametros.');
          }else if($('#telefono').val() == ''){
            jQuery('#telefono').addClass('is-invalid');
            jQuery('#msj-telefono').html('Campo requerido, ingresar datos.');
          }else if(validarNumero($('#telefono').val()) == false){
            jQuery('#telefono').addClass('is-invalid');
            jQuery('#msj-telefono').html('Debe contar con 10 digitos.');
          }else if($('#correo').val() == ''){
            jQuery('#telefono').addClass('is-invalid');
            jQuery('#msj-correo').html('Campo requerido, ingresar datos.');
          }else if(validarCorreo($('#correo').val()) == false){
            jQuery('#telefono').addClass('is-invalid');
            jQuery('#msj-telefono').html('Correo invalido');
          }
          else if(lengh($('#correo').val()) == false){
            jQuery('#telefono').addClass('is-invalid');
            jQuery('#msj-telefono').html('Correo sobrepasa el número de parametros.');
          }else if($('#contra').val() != $('#rep_contra').val()){
            jQuery('#rep_contra').addClass('is-invalid');
            jQuery('#msj-rep-contrasena').html('Contraseña diferentes.');
        }else{
            actualizar();
        }
    }else if (camposValidos()){
        let o = getDatosInput();
        registrar(o);
        limpiarForm();
        $('#nombre').focus();
    }
});



$(document).on('click', '#nuevo', function(){
    $("#usuario").show();
    $("#divcontra").show();
    $('#divcheck').hide();
    
    $('#nuevo-modal').modal('show');  

    return false;
});

$(document).on('dblclick', '.fila', function() {
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

    $("#usuario").hide();
    $("#divcontra").hide();
    $('#divcheck').show();
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

function contrasenaIguales() {
    var id = "#contra";
    var id2 = "#rep_contra";
    var msj = "#msj-contrasena";
    var msj2 = "#msj-rep-contrasena";
    
    var v = jQuery(id2).val();
    var v2 = jQuery(id).val();
    
    if (v !== v2) {
        jQuery(id).addClass('is-invalid');
        jQuery(msj2).html('Contraseña diferentes.');
        contrasenaIguales = false;
    } else {
        jQuery(id).removeClass('is-invalid');
        jQuery(msj2).empty();
        contrasenaIguales = true;
    }
}


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





