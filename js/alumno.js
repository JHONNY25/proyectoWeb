
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
            Swal.fire({
                title: 'Procesando',
                text: 'Espere un momento por favor',
                onOpen: () => {
                swal.showLoading();
              },
                showCancelButton: false,
                showConfirmButton: false,
                allowOutsideClick: false,
                allowEscapeKey: false,
              })
        }
      })
}


function eliminar(dato,mensaje,asunto,destino,nombre){
        var datos = {
          "id": dato,
          "mensaje":"<p><img style='display: block; margin-left: auto; margin-right: auto;' src='http://drive.google.com/uc?export=view&id=1Zw8krE9QgMdUtBNkjRHu-VfwoLxsFHgU' alt='' width='225' height='140' /></p> <table style='height: 152px; margin-left: auto; margin-right: auto;' width='410'> <tbody> <tr> <td style='width: 400px;'> <h3 style='text-align: center;'><strong>Haz sido rechazado en el portal de vinculaci&oacute;n debido a que no cumples con los requisitos.</strong></h3> <h3 style='text-align: center;'><strong>si crees que se trata de un error vuelve a intentar tu registro, si el problema persiste ponte en contacto con el encargado de vinculaci&oacute;n</strong></h3> </td> </tr> </tbody> </table> <p>&nbsp;</p> <p><strong>&nbsp;</strong></p>",
          "asunto":"ITES Los Cabos. No cumples con los requisitos para registrarte en el portal de vinculación",
          "mensajeNoHTML":"Haz sido rechazado en el portal de vinculación debido a que no cumples con los requisitos. si crees que se trata de un error vuelve a intentar tu registro, si el problema persiste ponte en contacto con el encargado de vinculación",
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
                      window.location.reload();
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
                Swal.fire({
                    title: 'Procesando',
                    text: 'Espere un momento por favor',
                    onOpen: () => {
                    swal.showLoading();
                  },
                    showCancelButton: false,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    allowEscapeKey: false,

                  })
            }
          })


    }


    function aceptarAlu(dato,mensaje,asunto,destino,nombre){
            var datos = {
                "id": dato,
                "mensaje":"<p><img style='display: block; margin-left: auto; margin-right: auto;' src='http://drive.google.com/uc?export=view&id=1Zw8krE9QgMdUtBNkjRHu-VfwoLxsFHgU' alt='' width='225' height='140' /></p> <table style='height: 152px; margin-left: auto; margin-right: auto;' width='410'> <tbody> <tr> <td style='width: 400px;'> <h3 style='text-align: center;'>&iexcl;Haz sido aceptado en el portal de vinculaci&oacute;n!.</h3> <h3 style='text-align: center;'>ya puedes iniciar sesi&oacute;n y comenzar con tus tramites</h3> </td> </tr> </tbody> </table> <p>&nbsp;</p> <p><strong>&nbsp;</strong></p>",
                "asunto":"ITES Los Cabos. Haz sido aceptado en el portal de vinculacion",
                "mensajeNoHTML":"¡Haz sido aceptado en el portal de vinculación!. ya puedes iniciar sesión y comenzar con tus tramites",
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
                          window.location.reload();
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
