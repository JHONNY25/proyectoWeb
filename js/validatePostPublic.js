
$("#vacante").hide();


$(document).ready(function(){
    $('#guardar').click(function(){
      if($('#tipo').val() ==0){
        Swal.fire({
          type: 'error',
          title: 'Lo sentimos...',
          text: '¡Debe seleccionar un tipo de publicación!'
          
        })
      }else if($('#carrera').val() == 0){
        Swal.fire({
          type: 'error',
          title: 'Lo sentimos...',
          text: '¡Debe seleccionar un enfoque a una carrera!'
        })
      }else if($('#titulo').val() == ''){
        Swal.fire({
          type: 'error',
          title: 'Lo sentimos...',
          text: '¡Ha dejado vacio el campo del título!'
        })
      }else if(lenghTitulo($('#titulo').val()) == false){
        Swal.fire({
          type: 'error',
          title: 'Lo sentimos...',
          text: '¡El titulo no debe de ser mayor a 100 caracteres!'
        })
      }else if($('#vacante').val() == ''){
          Swal.fire({
            type: 'error',
            title: 'Lo sentimos...',
            text: '¡Ha dejado vacio el campo de vacantes'
          })
      }else if($('#vacante').val() == 0){
        $("#vacante").val(1);
      }else if(soloNumeros($('#vacante').val()) == false){
        Swal.fire({
          type: 'error',
          title: 'Lo sentimos...',
          text: '¡Vacantes debe ser numerico!'
        })
      }else if(lenghVacantes($('#vacante').val()) == false){
        Swal.fire({
          type: 'error',
          title: 'Lo sentimos...',
          text: '¡No puede ingresar mas de 99 vacantes'
        })
      }else if($('#desc').val() == ''){
      Swal.fire({
        type: 'error',
        title: 'Lo sentimos...',
        text: '¡Ha dejado vacio el campo de descripción!'
      })
    }else{
        var datos = $('#publicacion').serialize();

        $.ajax({
          type:"POST",
          url: "../procesamiento/postPublic.php",
          data: datos,
          success:function(r){
            if(r == 1){
              Swal.fire({
                type: 'success',
                title: '¡Guardado!',
                text: 'Publicación registrada con éxito',
                showConfirmButton: false,
                timer: 1600
              })
              $('#titulo').val('');
              $('#titulo').focus();
              $('#desc').val('');
              $('#desc').focus();
              $('#vacante').val('');
              $('#vacante').focus();
              $('#tipo').val('');
              $('#tipo').focus();
              $('#carrera').val('');
              $('#carrera').focus();
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

  $(document).ready(function(){
      $("#tipo").change(function(){

       if ($(this).val()==3) {
          $("#vacante").val(0);
          $("#vacante").show();
        }else{
            $("#vacante").val(1);
            $("#vacante").hide();
            }
         });
        });

