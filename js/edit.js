

$("#pass1").hide();
$("#pass2").hide();
$(".contra").hide();



$(".check").on("click", function() {  
  if ($(".check").is(':checked')) {  
    $("#pass1").show();
    $("#pass2").show();
    $(".contra").show();
  } else {  
    $("#pass1").hide();
    $("#pass2").hide();  
    $(".contra").hide();
  } 

});

 $(document).ready(function(){
    $('#edit').click(function(){
 
       $.ajax({  
            url:"../procesamiento/detalleUsuario.php",  
            method:"POST",  
            dataType:"json",  
            success:function(data){  
                 $('#usuario').val(data.usuario);
                 $('#nombre').val(data.nombre);
                 $('#telefono').val(data.telefono);
                 $('#correo').val(data.correo);
                 $('#municipio').val(data.municipio);
                 $('#colonia').val(data.colonia);
                 $('#calle').val(data.calle);
                 $('#clave').val(data.id_usuario);
                 $('#modal').modal('show');  
            }  
       });  
      
 });
});

$(document).ready(function(){
  $('#perfilEdit #editar').click(function(){


    if($('#nombre').val() == ''){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡Ha dejado vacio el campo de nombre!'
      })
    }else if(lengh($('#nombre').val()) == false){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡El nombre no debe de ser mayor a 40 caracteres!'
      })
    }else if($('#telefono').val() == ''){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡Ha dejado vacio el campo de telefono!'
      })
    }else if(validarNumero($('#telefono').val()) == false){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡El telefono no es numerico o no cumple con 10 digitos!'
      })
    }else if($('#correo').val() == ''){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡Ha dejado vacio el campo de correo!'
      })
    }else if(validarCorreo($('#correo').val()) == false){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡Correo invalido!'
      })
    }
    else if(lengh($('#correo').val()) == false){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡El correo no debe de ser mayor a 40 caracteres!'
      })
    }else if($('#municipio').val() == ''){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡Ha dejado vacio el campo de municipio!'
      })
  }else if(lengh($('#municipio').val()) == false){
    Swal.fire({
      type: 'error',
      title: 'Lo sentimos...',
      text: '¡Municipio no debe de ser mayor a 40 caracteres!'
    })
  }else if($('#colonia').val() == ''){
    Swal.fire({
      type: 'error',
      title: 'Lo sentimos...',
      text: '¡Ha dejado vacio el campo de colonia!'
    })
}else if(lengh($('#colonia').val()) == false){
  Swal.fire({
    type: 'error',
    title: 'Lo sentimos...',
    text: '¡La colonia no debe de ser mayor a 40 caracteres!'
  })
}else if($('#calle').val() == ''){
  Swal.fire({
    type: 'error',
    title: 'Lo sentimos...',
    text: '¡Ha dejado vacio el campo de calle!'
  })
}else if(lengh($('#calle').val()) == false){
  Swal.fire({
    type: 'error',
    title: 'Lo sentimos...',
    text: '¡Calle no debe de ser mayor a 40 caracteres!'
  })
}else if($('#pass2').val() != $('#pass1').val()){
  Swal.fire({
    type: 'error',
    title: 'Lo sentimos...',
    text: '¡Las contraseñas deben de coincidir, verifiqué de nuevo!'
  })
}else{

      var datos = $('#perfilEdit').serialize();

      $.ajax({
        type:"POST",
        url: "../procesamiento/updatePerfil.php",
        data: datos,
        success:function(r){
          if(r == 1){
            $('#modal').modal('hide'); 
            Swal.fire({
              type: 'success',
              title: 'Modificado!',
              title: 'Datos modificados con éxito',
              showConfirmButton: false,
              timer: 1600
            })

            setTimeout(function(){
              $("#detallePerfil").load("perfil #detallePerfil").fadeIn("slow");
            },1500);
          }else{
            Swal.fire({
              type: 'error',
              title: 'Lo sentimos...',
              text: '¡Error en el servidor!'
            })
          }
        }
      });

    }
    
    return false;
  });
});
