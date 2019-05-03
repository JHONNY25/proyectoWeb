
function confirm(dato,mensaje,asunto,destino,nombre){
    Swal.fire({
        title: '¡Rechazará esta publicación!',
        text: "No podras revertir los cambios, se le informará a la empresa acerca de esta acción",
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
          "mensaje":"<p><img style='display: block; margin-left: auto; margin-right: auto;' src='http://drive.google.com/uc?export=view&id=1Zw8krE9QgMdUtBNkjRHu-VfwoLxsFHgU' alt='' width='225' height='140' /></p> <table style='height: 152px; margin-left: auto; margin-right: auto;' width='410'> <tbody> <tr> <td style='width: 400px;'> <h3 style='text-align: center;'><strong>Tu registro a sido rechazado del portal de vinculación de ITES Los Cabos.</strong></h3> <h3 style='text-align: center;'><strong>si crees que se trata de un error verifica los datos y vuelve a intentar el registro, si el problema persiste ponte en contacto con el encargado de vinculaci&oacute;n</strong></h3> </td> </tr> </tbody> </table> <p>&nbsp;</p> <p><strong>&nbsp;</strong></p>",
          "asunto":"ITES Los Cabos. No cumples con los requisitos para registrarte en el portal de vinculación",
          "mensajeNoHTML":"Tu registro a sido rechazado del portal de vinculación de ITES Los Cabos. si crees que se trata de un error verifica los datos y vuelve a intentar el registro, si el problema persiste ponte en contacto con el encargado de vinculación",
          "destino":destino,
          "nombre":nombre
        };

          $.ajax({
            type:"POST",
            url: "../procesamiento/rechazarEmpresa.php",
            data: datos,
            success:function(r){
              if(r == 1){
                  Swal.fire({
                      title: '¡Eliminado!',
                      text: 'la publicación ha sido rechazada.',
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
            title: 'Aceptará a esta empresa',
            text: "No podras revertir los cambios, se le notificará a la empresa que ha sido aprovada",
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
                "mensaje":"<p><img style='display: block; margin-left: auto; margin-right: auto;' src='http://drive.google.com/uc?export=view&id=1Zw8krE9QgMdUtBNkjRHu-VfwoLxsFHgU' alt='' width='225' height='140' /></p> <table style='height: 152px; margin-left: auto; margin-right: auto;' width='410'> <tbody> <tr> <td style='width: 400px;'> <h3 style='text-align: center;'>¡Tu empresa ha sido aceptada en el portal de vinculación de ITES Los Cabos!.</h3> <h3 style='text-align: center;'>Ya puedes iniciar sesión y crear publicaciones </h3> </td> </tr> </tbody> </table> <p>&nbsp;</p> <p><strong>&nbsp;</strong></p>",
                "asunto":"ITES Los Cabos. Tu publicación ha sido aceptada en el portal de vinculacion",
                "mensajeNoHTML":"¡Tu empresa ha sido aceptada en el portal de vinculación de ITES Los Cabos!. Ya puedes iniciar sesión y crear publicaciones",
                "destino":destino,
                "nombre":nombre

            };

              $.ajax({
                type:"POST",
                url: "../procesamiento/aceptarEmpresa.php",
                data: datos,
                success:function(r){
                  if(r == 1){
                      Swal.fire({
                          title: 'Aceptada',
                          text: 'La empresa a sido aceptada, se le notificará la acción',
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
