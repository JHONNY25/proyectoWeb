
function obtenerDato(){
    $.ajax({
      url:"../procesamiento/mostrarTrabajo.php",  
      method:"POST",   
      success:function(data){  
           $('#dataTable #tabla3').html(data);
      } 
    });
  }
  
  obtenerDato();

  $("#vacante").hide();


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
            url: "../procesamiento/deletePublic.php",
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
                      $("#tabla3").load("../procesamiento/mostrarTrabajo.php");
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
                url:"../procesamiento/verPublicacion.php",  
                method:"POST",  
                data:{dato:dato},  
                success:function(data){  
                     $('#publicacionDetalle').html(data);  
                     $('#modal').modal('show');  
                }  
           });  
      }            
 });  


 $(document).on('dblclick', '.fila', function(){  
  var dato = $(this).attr("id");  
  var tipo = document.getElementById("tipoActual");
  var carrera = document.getElementById("carreraActual");
  
  if(dato != '') {  
       $.ajax({  
            url:"../procesamiento/jsonPublicacion.php",  
            method:"POST",  
            data:{dato:dato},
            dataType:"json",  
            success:function(data){  
                 $('#tipoActual').val(data.id_clasificacion_publicacion);
                 tipo.innerHTML = data.clasificacion;
                 $('#carreraActual').val(data.id_carrera);
                 carrera.innerHTML = data.carrera;  
                 $('#titulo').val(data.titulo); 
                 if($('#tipoActual').val(data.id_clasificacion_publicacion)!=3){
                  $('#vacante').val(data.vacantes);
                  $("#vacante").hide();
                 }else{
                  $('#vacante').val(data.vacantes);
                  $("#vacante").show();
                 }
                 $('#desc').val(data.descripcion); 
                 $('#id').val(data.id_publicacion_bancos); 
                 $('#modal2').modal('show');  
            }  
       });  
  }            
});

$(document).ready(function(){
  $('#publicacion #update').click(function(){


    if($('#tipo').val() ==0){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡Debe seleccionar un tipo de publicación!'
        
      })
    }else if($('#carrera').val() == 0){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡Debe seleccionar un enfoque a una carrera!'
      })
    }else if($('#titulo').val() == ''){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡Ha dejado vacio el campo del título!'
      })
    }else if(lenghTitulo($('#titulo').val()) == false){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡El titulo no debe de ser mayor a 100 caracteres!'
      })
    }else if($('#vacante').val() == ''){
        Swal.fire({
          type: 'error',
          title: 'Lo sentimos...',
          text: '¡Ha dejado vacio el campo de vacantes!'
        })
    }else if($('#vacante').val() == 0){
      $("#vacante").val(1);
    }else if(soloNumeros($('#vacante').val()) == false){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡Vacantes debe ser numerico!'
      })
    }else if(lenghVacantes($('#vacante').val()) == false){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡No puede ingresar mas de 99 vacantes!'
      })
    }else if($('#desc').val() == ''){
    Swal.fire({
      type: 'error',
      title: 'Lo sentimos...',
      text: '¡Ha dejado vacio el campo de descripción!'
    })
  }else{

      var datos = $('#publicacion').serialize();

      $.ajax({
        type:"POST",
        url: "../procesamiento/updatePublic.php",
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
              $("#tabla3").load("../procesamiento/mostrarTrabajo.php");
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

$(document).ready(function(){
  $("#tipo").change(function(){

   if ($(this).val()==3) {
    $("#vacante").val(0);
      $("#vacante").show();
    }else{
        $("#vacante").val(1);
        $("#vacante").hide();
        }
     });
    });