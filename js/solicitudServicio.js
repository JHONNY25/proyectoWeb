
function obtenerAlumnosServicio(){
    
     $.ajax({
       url:"../procesamiento/solicitudesServicio.php",  
       method:"POST", 
       success:function(data){  
            $('#dataTable #alumnoServicio').html(data);
       } 
     });
   }
   
   obtenerAlumnosServicio();