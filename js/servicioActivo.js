
$('#detalleEmpresa').hide();


function obtenerServicios(){
 let dato = $('.tipoCarrera').val();
  $.ajax({
    url:"../procesamiento/servicioActivos.php",  
    method:"POST",
    data: {dato:dato},   
    success:function(data){  
         $('#servicios').html(data);
    } 
  });
}

obtenerServicios();

 $(document).on('click', '.signo', function(){  

  $('#modalTable').modal('show'); 
}); 


$(document).on('dblclick', '.fila', function(){  

  var dato = $(this).attr("id");  
  if(dato != ''){  
       $.ajax({  
            url:"../procesamiento/jsonPublicacion.php",  
            method:"POST",  
            data:{dato:dato}, 
            dataType:"json",  
            success:function(data){  
                 $('#empresa').html(data.empresa);  
                 $('#proyecto').html(data.titulo);
                 $('#desc').html(data.descripcion);
                 $('#publicacionFK').val(data.id_publicacion_bancos);

                 $('#modalTable').modal('hide'); 
                 $('#detalleEmpresa').show(); 
            }  
       });  
  } 
}); 


$(document).ready(function(){
  $('#addServicio').click(function(){ 

   if($('#publicacionFK').val() == ''){
      Swal.fire({
        type: 'warning',
        title: 'Lo sentimos...',
        text: '¡Debe asignar un servicio para el alumno!'
      })
   }else{
    Swal.fire({
      title: '¿Está seguro?',
      text: "¡No podras revertir los cambios!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Asignar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {
        var publicacion = $('#publicacionFK').val();
        var persona = $('.persona').val();
         $.ajax({  
           url:"../procesamiento/asignaServicio.php",  
           method:"POST",  
           data:{publicacion: publicacion,
                 persona: persona}, 
           success:function(r){  
              if(r == 1){
               Swal.fire({ 
                 title: '¡Asignado!',
                 text: 'El alumno ha sido asignado',
                 type: 'success',
                 showConfirmButton: false,
                 timer: 1700
               })

               $(location).attr('href','../tablas/alumnosServicio.php');
              }else{
               Swal.fire({
                 type: 'error',
                 title: 'Lo sentimos...',
                 text: '¡Hubo problemas con el servidor!'
               })
              }
           }  
       });  
        
s
      }
    })

   }
  });
});