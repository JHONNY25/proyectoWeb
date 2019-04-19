

function confirm(dato,mensaje,asunto,destino,nombre){
    Swal.fire({
        title: 'Rechazará a este alumno',
        text: "¡No podras revertir los cambios, se le informará al alumno acerca de esta acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {
            eliminar(dato,mensaje,asunto,destino,nombre);
        }
      })
}


function eliminar(dato,mensaje,asunto,destino,nombre){
        var datos = {
          "id": dato,
          "mensaje":mensaje,
          "asunto":asunto,
          "destino":destino,
          "nombre":nombre
        };

          $.ajax({
            type:"POST",
            url: "../procesamiento/rechazaAlumno.php",
            data: datos,
            success:function(r){
              if(r == 1){
                  Swal.fire({
                      title: '¡Eliminado!',
                      text: 'El alumno ha sido rechazado.',
                      type: 'success',
                      showConfirmButton: false,
                      timer: 2000
                    })

                    setTimeout(function(){
                      $( "#dataTable" ).load( "solicitudAlumno.php #dataTable" );
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



    function confirmaAceptar(dato,mensaje,asunto,destino,nombre){
        Swal.fire({
            title: 'Aceptará a este usuario',
            text: "¡No podras revertir los cambios, se le notificará al alumno que ha sido aceptado",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.value) {
                aceptarAlu(dato,mensaje,asunto,destino,nombre);
            }
          })


    }


    function aceptarAlu(dato,mensaje,asunto,destino,nombre){
            var datos = {
                "id": dato,
                "mensaje":mensaje,
                "asunto":asunto,
                "destino":destino,
                "nombre":nombre

            };

              $.ajax({
                type:"POST",
                url: "../procesamiento/aceptarAlumno.php",
                data: datos,
                success:function(r){
                  if(r == 1){
                      Swal.fire({
                          title: 'Aceptado!',
                          text: 'El alumno ha sido aceptado, se le notificará esta acción.',
                          type: 'success',
                          showConfirmButton: false,
                          timer: 2000
                        })

                        setTimeout(function(){
                          $( "#dataTable" ).load( "solicitudAlumno.php #dataTable" );
                       }, 2000);
                  }else{
                    Swal.fire({
                      type: 'error',
                      title: 'Lo sentimos...',
                      text: '¡Hubo problemas al aceptar!'
                    })
                  }
                }
              });
          return false;
        }

   function mostrarDatos(){

   }
