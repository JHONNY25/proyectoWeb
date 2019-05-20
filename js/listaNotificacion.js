
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
                   $('#notificacionDetalle').html(data);  
                   $('#modal').modal('show');  
              }  
         });  
    }            
});  

$(document).on('click', '#alertsDropdown', function(){  
     $('#conteo2').hide();
   }); 
