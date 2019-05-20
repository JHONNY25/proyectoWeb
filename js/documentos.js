
function obtenerComentarios(){
  var dato = $('#valor').val();
  $.ajax({
    url:"../procesamiento/mostrarComentarios.php",  
    method:"POST",  
    data : {dato:dato}, 
    success:function(data){  
         $('#comentarios').html(data);
    } 
  });
}

obtenerComentarios();

$(document).ready(function(){
  $('#comentar').click(function(){

    if($('#mensaje').val() ==''){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡Debe llenar el campo de comentario para poder mandarlo!'
      })
    }else if(lenghComents($('#mensaje').val()) == false){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡No puede ingresar comentarios con muchos caracteres!'
      })
    }else{

      var datos = $('#formComents').serialize();

      $.ajax({
        type:"POST",
        url: "../procesamiento/agregarComentario.php",
        data: datos,
        success:function(r){
          if(r == 1){

            obtenerComentarios();
            $('#mensaje').val('');

          }else{
            Swal.fire({
              type: 'error',
              title: 'Lo sentimos...',
              text: '¡Error en el servidor!'
            })
          }
        }
      });

    }
    
    return false;
  });
});




function lenghComents(parametro){
    
  if(parametro.length > 500){
    return false;
  }else{
    return true;
  }
}

$(document).ready(function(){

  $("#cartaSolicitudServSoc").show();
  $("#cartaSolicitudPrestServ").hide();
  $("#cartaCompromiso").hide();
  $("#cartaPresentacion").hide();
  $("#cartaAceptacion").hide();
  $("#cartaReportes").hide();
  $("#cartaTerminacion").hide();
  $("#cartaLiberacion").hide();

  $("#slct").change(function(){

    if ($(this).val()=="1") {
      $("#cartaSolicitudServSoc").show();
      $("#cartaSolicitudPrestServ").hide();
      $("#cartaCompromiso").hide();
      $("#cartaPresentacion").hide();
      $("#cartaAceptacion").hide();
      $("#cartaReportes").hide();
      $("#cartaTerminacion").hide();
      $("#cartaLiberacion").hide();
    }
    if ($(this).val()=="2") {
      $("#cartaSolicitudServSoc").hide();
      $("#cartaSolicitudPrestServ").show();
      $("#cartaCompromiso").hide();
      $("#cartaPresentacion").hide();
      $("#cartaAceptacion").hide();
      $("#cartaReportes").hide();
      $("#cartaTerminacion").hide();
      $("#cartaLiberacion").hide();
    }
      if ($(this).val()=="3") {
        $("#cartaSolicitudServSoc").hide();
        $("#cartaSolicitudPrestServ").hide();
        $("#cartaCompromiso").show();
        $("#cartaPresentacion").hide();
        $("#cartaAceptacion").hide();
        $("#cartaReportes").hide();
        $("#cartaTerminacion").hide();
        $("#cartaLiberacion").hide();
      }
      else if ($(this).val()=="7") {
        $("#cartaSolicitudServSoc").hide();
        $("#cartaSolicitudPrestServ").hide();
        $("#cartaCompromiso").hide();
        $("#cartaPresentacion").show();
        $("#cartaAceptacion").hide();
        $("#cartaReportes").hide();
        $("#cartaTerminacion").hide();
        $("#cartaLiberacion").hide();
      }
      else if ($(this).val()=="8") {
        $("#cartaSolicitudServSoc").hide();
        $("#cartaSolicitudPrestServ").hide();
        $("#cartaCompromiso").hide();
        $("#cartaPresentacion").hide();
        $("#cartaAceptacion").show();
        $("#cartaReportes").hide();
        $("#cartaTerminacion").hide();
        $("#cartaLiberacion").hide();
      }
      else if ($(this).val()=="9") {
        $("#cartaSolicitudServSoc").hide();
        $("#cartaSolicitudPrestServ").hide();
        $("#cartaCompromiso").hide();
        $("#cartaPresentacion").hide();
        $("#cartaAceptacion").hide();
        $("#cartaReportes").show();
        $("#cartaTerminacion").hide();
        $("#cartaLiberacion").hide();
      }
      else if ($(this).val()=="10") {
        $("#cartaSolicitudServSoc").hide();
        $("#cartaSolicitudPrestServ").hide();
        $("#cartaCompromiso").hide();
        $("#cartaPresentacion").hide();
        $("#cartaAceptacion").hide();
        $("#cartaReportes").hide();
        $("#cartaTerminacion").show();
        $("#cartaLiberacion").hide();
      }
      else if ($(this).val()=="12") {
        $("#cartaSolicitudServSoc").hide();
        $("#cartaSolicitudPrestServ").hide();
        $("#cartaCompromiso").hide();
        $("#cartaPresentacion").hide();
        $("#cartaAceptacion").hide();
        $("#cartaReportes").hide();
        $("#cartaTerminacion").hide();
        $("#cartaLiberacion").show();
      }

    });
});
