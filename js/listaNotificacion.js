
function getNotificacionesLimit(){
    $.ajax({
        url: '../procesamiento/listaNotificaciones.php',
        method:'POST',
        success:function(data){  
            $('#listaNotificaciones').html(data);
       } 
    });
}

getNotificacionesLimit();

$(document).on('click', '.view', function(){  
    var dato = $(this).attr("id");  
    if(dato != ''){  
         $.ajax({  
              url:"../procesamiento/verNotificacion.php",  
              method:"POST",  
              data:{dato:dato},  
              success:function(data){  
                   $('#detalles').html(data);  
                   $('#ver-notificacion').modal('show');  
              }  
         });  
    }            
});  

