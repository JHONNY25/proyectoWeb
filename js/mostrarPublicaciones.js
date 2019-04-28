
function obtenerDato(dato){
    $.ajax({
      url:"../procesamiento/mostrarSolicitudPublicacion.php",
      method:"POST",
      data: {dato :dato},
      success:function(data){
           $('#tablaPublicacion').html(data);
      }
    });


  }
