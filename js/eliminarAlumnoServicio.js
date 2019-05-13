function confirm(dato,destino,nombre){
    Swal.fire({
        title: 'Eliminará de servicio social a este alumno',
        text: "¡se le informará al alumno acerca de esta acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {
            eliminar(dato,destino,nombre);
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


function eliminar(dato,destino,nombre){
        var datos = {
          "id": dato,
          "mensaje":"<p><img style='display: block; margin-left: auto; margin-right: auto;' src='http://drive.google.com/uc?export=view&id=1Zw8krE9QgMdUtBNkjRHu-VfwoLxsFHgU' alt='' width='225' height='140' /></p> <table style='height: 152px; margin-left: auto; margin-right: auto;' width='410'> <tbody> <tr> <td style='width: 400px;'> <h3 style='text-align: center;'><strong>Tu servicio social ha sido eliminado del sistema.</strong></h3> <h3 style='text-align: center;'><strong>si crees que se trata de un error ponte en contacto con el encargado de vinculaci&oacute;n</strong></h3> </td> </tr> </tbody> </table> <p>&nbsp;</p> <p><strong>&nbsp;</strong></p>",
          "asunto":"ITES Los Cabos. Tu servicio social ha sido eliminado del sistema.",
          "mensajeNoHTML":"Tu servicio social ha sido eliminado del sistema. si crees que se trata de un error ponte en contacto con el encargado de vinculación",
          "destino":destino,
          "nombre":nombre
        };

          $.ajax({
            type:"POST",
            url: "../procesamiento/eliminarAlumnoServicio.php",
            data: datos,
            success:function(r){
              if(r == 1){
                  Swal.fire({
                      title: '¡Eliminado!',
                      text: 'El servicio social del alumno ha sido eliminado.',
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
