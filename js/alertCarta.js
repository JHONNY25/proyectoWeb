function enviar(){
        var datos = {

          "mensaje":"<p><img style='display: block; margin-left: auto; margin-right: auto;' src='http://drive.google.com/uc?export=view&id=1Zw8krE9QgMdUtBNkjRHu-VfwoLxsFHgU' alt='' width='225' height='140' /></p> <table style='height: 152px; margin-left: auto; margin-right: auto;' width='410'> <tbody> <tr> <td style='width: 400px;'> <h3 style='text-align: center;'><strong>Tu registro a sido rechazado del portal de vinculación de ITES Los Cabos.</strong></h3> <h3 style='text-align:     center;'><strong>si crees que se trata de un error verifica los datos y vuelve a intentar el registro, si el problema persiste ponte en contacto con el encargado de vinculaci&oacute;n</strong></h3> </td> </tr> </tbody> </table> <p>&nbsp;</p> <p><strong>&nbsp;</strong></p>",
          "asunto":"ITES Los Cabos. No cumples con los requisitos para registrarte en el portal de vinculación",
          "mensajeNoHTML":"Tu registro a sido rechazado del portal de vinculación de ITES Los Cabos. si crees que se trata de un error verifica los datos y vuelve a intentar el registro, si el problema persiste ponte en contacto con el encargado de vinculación"

        };

          $.ajax({
            type:"POST",
            url: "../procesamiento/procesarCarta.php",
            data: datos,
            success:function(r){
              if(r == 1){
                  Swal.fire({
                      title: '¡éxito!',
                      text: 'La carta de liberación se ha actualizado correctamente',
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
                  text: '¡Hubo problemas al actualizar la carta de lineración!'
                })
              }
            }
          });
      return false;
    }
