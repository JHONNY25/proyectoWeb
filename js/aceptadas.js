

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
                        $("#dataTable").load("publicAceptadas.php #dataTable").fadeIn("slow");
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
  
