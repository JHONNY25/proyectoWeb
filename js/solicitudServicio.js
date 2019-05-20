
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


   $(document).on('dblclick', '.fila', function(){  
    var dato = $(this).attr("id"); 

    console.log(dato);
    location.href="../post/tramite.php?al="+dato;
    });



    $(document).on('click', '.notificacion', function(){  
      var dato = $(this).attr("id"); 
  

      });
    