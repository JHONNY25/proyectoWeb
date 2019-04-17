
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

                    setTimeout(function(){
                      $( "#dataTable" ).load( "residencias.php #dataTable" );
                   }, 2000);
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
                 if($('#vacante').val(data.vacantes)!=0){
                  $('#vacante').val(data.vacantes);
                  $("#vacante").hide();
                 }
                 $('#desc').val(data.descripcion); 
                 $('#id').val(data.id_publicacion_bancos); 
                 $('#modal2').modal('show');  
            }  
       });  
  }            
});

$(document).on('click', '#update', function(){ 
          vacantes = '';
        if($('#vacante').val(data.vacantes)!=''){
          vacantes = $('#vacante').val(data.vacantes);

        }
         var datos= {
           tipo: $('#tipo').val(data.clasificacion),
           carrera: $('#carrera').val(data.carrera),
           titulo: $('#titulo').val(data.titulo),
           vacante: vacantes,
           desc:  $('#desc').val(data.descripcion),
           id:  $('#id').val(data.id_publicacion_bancos)
         };       
                            
  if(dato != '') {  
       $.ajax({  
            url:"../procesamiento/updatePublic.php",  
            method:"POST",  
            data:{datos:datos},  
            success:function(data){  
 
            }  
       });  
  }            
});

$(document).ready(function(){
  $("#tipo").change(function(){

   if ($(this).val()==3) {
      $("#vacante").show();
    }else{
        $("#vacante").hide();
        }
     });
    });