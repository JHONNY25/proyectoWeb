

function getNotificaciones(){
    $.ajax({
        url: '../procesamiento/mostrarNotificacion.php',
        method:'POST',
        success:function(data){  
            $('#dataTable #notificacion').html(data);
       } 
    });
}

getNotificaciones();


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
            url: "../procesamiento/deleteNotificacion.php",
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
                      $("#notificacion").load("../procesamiento/mostrarNotificacion.php");
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

    $(document).on('click', '.view', function(){  
      var dato = $(this).attr("id");  
      if(dato != ''){  
           $.ajax({  
                url:"../procesamiento/verNotificacion.php",  
                method:"POST",  
                data:{dato:dato},  
                success:function(data){  
                     $('#notificacionDetalle').html(data);  
                     $('#modal').modal('show');  
                }  
           });  
      }            
 });  


 $(document).on('click', '#add', function(){  
    $('#id').val('');
    $('#titulo').val(''); 
    $('#mensaje').val(''); 
    $('#etiqueta').html('Nueva notificación');
    $('#guardar').val('Guardar');  
    $('#addNotificacion').modal('show'); 
});  

 $(document).on('dblclick', '.fila', function(){  
  var dato = $(this).attr("id");  

  if(dato != '') {  
       $.ajax({  
            url:"../procesamiento/jsonNotificacion.php",  
            method:"POST",  
            data:{dato:dato},
            dataType:"json",  
            success:function(data){  
                 $('#id').val(data.id_notificacion);
                 $('#titulo').val(data.titulo); 
                 $('#mensaje').val(data.mensaje); 
                 $('#etiqueta').html('Actualización');
                 $('#guardar').val('Actualizar');  
                 $('#addNotificacion').modal('show');  
            }  
       });  
  }            
});

$(document).ready(function(){
  $('#addNotificacion #guardar').click(function(){


    if($('#titulo').val() == ''){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡Ha dejado vacio el titulo de su notificación!'
        
      })
    } if(lengh($('#titulo').val()) == false){
        Swal.fire({
          type: 'error',
          title: 'Lo sentimos...',
          text: '¡No puede ingresar mas de 40 digitos!'
          
        })
      }else if($('#mensaje').val() == ''){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡Debe de llenar el campo mensaje para comunicar algo!'
      })
    }else{

      var datos = $('#formNotificacion').serialize();

      if($('#id').val() == ''){
        $.ajax({
            type:"POST",
            url: "../procesamiento/accionNotificacion.php",
            data: datos,
            success:function(r){
              if(r == 1){
                $('#addNotificacion').modal('hide'); 
                Swal.fire({
                  type: 'success',
                  title: 'Se ha guardado!',
                  title: 'Datos guardados con éxito',
                  showConfirmButton: false,
                  timer: 1600
                })
    
                setTimeout(function(){
                  $("#notificacion").load("../procesamiento/mostrarNotificacion");
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
      }else{
        $.ajax({
            type:"POST",
            url: "../procesamiento/accionNotificacion.php",
            data: datos,
            success:function(r){
              if(r == 1){
                $('#addNotificacion').modal('hide'); 
                Swal.fire({
                  type: 'success',
                  title: 'Modificado!',
                  title: 'Datos modificados con éxito',
                  showConfirmButton: false,
                  timer: 1600
                })
    
                setTimeout(function(){
                  $("#notificacion").load("../procesamiento/mostrarNotificacion");
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


    }
    
    return false;
  });
});
