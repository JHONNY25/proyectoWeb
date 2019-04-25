

$("#pass1").hide();
$("#pass2").hide();
$(".contra").hide();

$("#passadmin").hide();
$("#passadmin2").hide();


$("#passalumno").hide();
$("#passalumno2").hide();
$(".contra2").hide();

//valida para empresa
$("#check").on("click", function() {  
  if ($("#check").is(':checked')) {  
    $("#pass1").show();
    $("#pass2").show();
    $(".contra").show();
  } else {  
    $("#pass1").hide();
    $("#pass2").hide();  
    $(".contra").hide();
  } 

});

//valida para alumno
$("#check1").on("click", function() {  
  if ($("#check1").is(':checked')) {  
    $("#passalumno").show();
    $("#passalumno2").show();
    $(".contra").show();
  } else {  
    $("#passalumno").hide();
    $("#passalumno2").hide();  
    $(".contra").hide();
  } 

});

//valida para admin
$("#check2").on("click", function() {  
  if ($("#check2").is(':checked')) {  
    $("#passadmin").show();
    $("#passadmin2").show();
    $(".contra2").show();
  } else {  
    $("#passadmin").hide();
    $("#passadmin2").hide();  
    $(".contra2").hide();
  } 

});


//muestra datos para empresa
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

//update para empresa
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


//muestra datos para admin
$(document).ready(function(){
  $('#edit3').click(function(){

     $.ajax({  
          url:"../procesamiento/detalleUsuario.php",  
          method:"POST",  
          dataType:"json",  
          success:function(data){  
               $('#nombre3').val(data.nombre);
               $('#apeP').val(data.apellido_paterno);
               $('#apeM').val(data.apellido_materno);
               $('#telefono3').val(data.telefono);
               $('#correo3').val(data.correo);
               $('#clave3').val(data.id_usuario);
               $('#modal3').modal('show');  
          }  
     });  
    
});
});

//update para admin
$(document).ready(function(){
  $('#perfilEdit3 #editar3').click(function(){


    if($('#nombre3').val() == ''){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡Ha dejado vacio el campo de nombre!'
      })
    }else if(lengh($('#nombre3').val()) == false){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡El nombre no debe de ser mayor a 40 caracteres!'
      })
    }else if($('#apeP').val() == ''){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡Ha dejado vacio el apellido paterno!'
      })
    }else if(lengh24($('#apeP').val()) == false){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡El apellido paterno no debe de ser mayor a 24 caracteres!'
      })
    }else if($('#apeM').val() == ''){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡Ha dejado vacio el apellido materno!'
      })
    }else if(lengh24($('#apeM').val()) == false){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡El apellido materno no debe de ser mayor a 24 caracteres!'
      })
    }else if($('#telefono3').val() == ''){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡Ha dejado vacio el campo de telefono!'
      })
    }else if(validarNumero($('#telefono3').val()) == false){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡El telefono no es numerico o no cumple con 10 digitos!'
      })
    }else if($('#correo3').val() == ''){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡Ha dejado vacio el campo de correo!'
      })
    }else if(validarCorreo($('#correo3').val()) == false){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡Correo invalido!'
      })
    }
    else if(lengh($('#correo3').val()) == false){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡El correo no debe de ser mayor a 40 caracteres!'
      })
    }else if($('#passadmin2').val() != $('#passadmin').val()){
        Swal.fire({
          type: 'error',
          title: 'Lo sentimos...',
          text: '¡Las contraseñas deben de coincidir, verifiqué de nuevo!'
        })
  }else{

      var datos = $('#perfilEdit3').serialize();

      $.ajax({
        type:"POST",
        url: "../procesamiento/updatePerfil.php",
        data: datos,
        success:function(r){
          if(r == 1){
            $('#modal3').modal('hide'); 
            Swal.fire({
              type: 'success',
              title: 'Modificado!',
              title: 'Datos modificados con éxito',
              showConfirmButton: false,
              timer: 1600
            })

            setTimeout(function(){
              $("#detallePerfil").load("perfil #detallePerfil");
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


//muestra datos para alumno
$(document).ready(function(){
  $('#edit2').click(function(){

     $.ajax({  
          url:"../procesamiento/detalleUsuario.php",  
          method:"POST",  
          dataType:"json",  
          success:function(data){  
               $('#telefono2').val(data.telefono);
               $('#correo2').val(data.correo);
               $('#clave2').val(data.id_usuario);
               $('#modal2').modal('show');  
          }  
     });  
    
});
});


//update para alumno
$(document).ready(function(){
  $('#perfilEdit2 #editar2').click(function(){

    if($('#telefono2').val() == ''){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡Ha dejado vacio el campo de telefono!'
      })
    }else if(validarNumero($('#telefono2').val()) == false){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡El telefono no es numerico o no cumple con 10 digitos!'
      })
    }else if($('#correo2').val() == ''){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡Ha dejado vacio el campo de correo!'
      })
    }else if(validarCorreo($('#correo2').val()) == false){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡Correo invalido!'
      })
    }
    else if(lengh($('#correo2').val()) == false){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡El correo no debe de ser mayor a 40 caracteres!'
      })
    }else if($('#passalumno').val() != $('#passalumno').val()){
        Swal.fire({
          type: 'error',
          title: 'Lo sentimos...',
          text: '¡Las contraseñas deben de coincidir, verifiqué de nuevo!'
        })
  }else{

      var datos = $('#perfilEdit2').serialize();

      $.ajax({
        type:"POST",
        url: "../procesamiento/updatePerfil.php",
        data: datos,
        success:function(r){
          if(r == 1){
            $('#modal2').modal('hide'); 
            Swal.fire({
              type: 'success',
              title: 'Modificado!',
              title: 'Datos modificados con éxito',
              showConfirmButton: false,
              timer: 1600
            })

            setTimeout(function(){
              $("#detallePerfil").load("perfil #detallePerfil");
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