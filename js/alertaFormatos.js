$(function () {

  $('form').on('submit', function (e) {

    e.preventDefault();
    var formato = $("#formato").val();
    var ejemplo = $("#ejemplo").val();

    $.ajax({
      type: 'post',
      url: '../procesamiento/subirFormatos.php',
      data: "formato=" + formato + "&ejemplo=" + ejemplo,
      success: function () {
        alert(formato);
      }
    });

  });

});



function alerta(){

var formato = $("#formato").val();
var ejemplo = $("#ejemplo").val();

  Swal.fire({
  title: '¿Estas seguro?',
  text: "Se sobreescribiran los archivos ya existentes",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Aceptar',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.value) {
    $.ajax({
      type: "POST",
        url: "../php/procesamiento/subirFormatos.php",
        data: "formato=" + formato + "&ejemplo=" + ejemplo,
        success : function(text){
            if (text == "success"){
                alert("BIEN");
            }
        }
    });
  }
})
}
