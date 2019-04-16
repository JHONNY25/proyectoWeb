
$("#vacante").hide();

/*
function validarForm(idForm) {
	var exprTel = /^([0-9]+){9}$/;
	var exprText = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	//Validamos cualquier input con la clase 'require'
	if( $(idForm + " input.require").val() == "" )
	{
    Swal.fire({
      type: 'error',
      title: 'Lo sentimos...',
      text: '¡Verifiqué que haya llenado los campos!'
    })
		return false;
	}
  else if($.trim($("#desc").val()) == ''){
    Swal.fire({
      type: 'error',
      title: 'Lo sentimos...',
      text: '¡Verifiqué que haya llenado los campos!'
    })
    return false;
  }

	//Devuelve true si todo está correcto
	else {
		return true;
	}
}*/

$(document).ready(function(){
    $('#guardar').click(function(){

        var datos = $('#publicacion').serialize();

        $.ajax({
          type:"POST",
          url: "../procesamiento/postPublic.php",
          data: datos,
          success:function(r){
            if(r == 1){
              Swal.fire({
                title: '¡Éxito!',
                type: 'success',
                title: 'Publicación registrada correctamente',
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
                text: '¡Verifiqué que haya llenado los campos!'
              })
            }
          }
        });
      
   
      return false;
    });
  });

  $(document).ready(function(){
      $("#tipo").change(function(){

       if ($(this).val()==3) {
          $("#vacante").show();
        }else{
            $("#vacante").hide();
            }
         });
        });