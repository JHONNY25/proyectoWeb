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
