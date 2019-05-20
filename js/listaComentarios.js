

function getComentariosAdmin(){
    $.ajax({
        url: '../procesamiento/listaComentarios.php',
        method:'POST',
        success:function(data){  
            $('#listaComentarios').html(data);
       } 
    });
}


function getComentariosAlumno(){
  $.ajax({
      url: '../procesamiento/listaComentariosAlumno.php',
      method:'POST',
      success:function(data){  
          $('#listaComentarios2').html(data);
     } 
  });
}

function getDocumentos(){
    var dato = $('#valor').val();
    $.ajax({
        url: '../procesamiento/listDocumentos.php',
        method:'POST',
        data: {dato:dato },
        success:function(data){  
            $('#aceptaciones').html(data);
       } 
    });
}

getDocumentos();

getComentariosAdmin();

getComentariosAlumno();

$(document).on('click', '#messagesDropdown', function(){  
  $('#conteo').hide();
}); 


$(document).on('click', '.check-documento',  function() {  
    var usuario = $('#valor').val();
    var documento = $(this).attr("id");

    Swal.fire({
      title: '¿Está seguro?',
      text: "¡Al aceptar este documento quedara guardado como entregado y no podras revertir los cambios!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Aceptar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {
          aceptar(usuario,documento);
        
      }
    })
  
  });


  function aceptar(usuario,documento){ 
        
      $.ajax({
        type:"POST",
        url: "../procesamiento/aceptarDocumento.php",
        data: {usuario:usuario,
                documento:documento},
        success:function(r){
          if(r == 1){
              Swal.fire({ 
                  title: 'Aceptado!',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 1500
                })

                getDocumentos();

          }else{
            Swal.fire({
              type: 'error',
              title: 'Lo sentimos...',
              text: '¡Hubo problemas con el servidor!'
            })
          }
        }
      });
  return false;
}



$(document).on('click', '.check-documento2',  function() {  
  var usuario = $('#valor').val();
  var documento = $(this).attr("id");

  Swal.fire({
    title: '¿Está seguro?',
    text: "¡Al aceptar este documento quedara guardado como entregado y no podras revertir los cambios!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Aceptar',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.value) {
        aceptar2(usuario,documento);
      
    }
  })

});


function aceptar2(usuario,documento){ 
      
    $.ajax({
      type:"POST",
      url: "../procesamiento/aceptarDoc.php",
      data: {usuario:usuario,
              documento:documento},
      success:function(r){
        if(r == 1){
            Swal.fire({ 
                title: 'Aceptado!',
                type: 'success',
                showConfirmButton: false,
                timer: 1500
              })

              getDocumentos();

        }else{
          Swal.fire({
            type: 'error',
            title: 'Lo sentimos...',
            text: '¡Hubo problemas con el servidor!'
          })
        }
      }
    });
return false;
}


$(document).on('click', '.viewComents', function(){  
  
  location.href = '../post/cartaLiberacion.php?al=' + $(this).attr('id');
}); 