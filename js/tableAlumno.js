
function obtenerDato(){
    $.ajax({
      url:"../procesamiento/mostrarAlumno.php",  
      method:"POST",   
      success:function(data){  
           $('#dataTable #alumnos').html(data);
      } 
    });
  }
  
  obtenerDato();


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
            url: "../procesamiento/deleteAlumno.php",
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
                      $("#alumnos").load("../procesamiento/mostrarAlumno.php");
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
                url:"../procesamiento/verAlumno.php",  
                method:"POST",  
                data:{dato:dato},  
                success:function(data){  
                     $('#detalleAlumno').html(data);  
                     $('#modalUsuario').modal('show');  
                }  
           });  
      }            
 });  

 
