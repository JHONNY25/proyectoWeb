
function validarNumero(parametro){
    var cantidad = /^\d{10}$/;
    if(!/^([0-9])*$/.test(parametro) || !cantidad.test(parametro)){
      return false;
    }else{
      return true;
    }
  }

  function soloNumeros(parametro){
    if(!/^([0-9])*$/.test(parametro)){
      return false;
    }else{
      return true;
    }
  }
  
  function validarUsuario(parametro){
    
    if(parametro.length > 20){
      return false;
    }else{
      return true;
    }
  }

  function lengh24(parametro){
    
    if(parametro.length > 24){
      return false;
    }else{
      return true;
    }
  }

  function lengh(parametro){
    
    if(parametro.length > 40){
      return false;
    }else{
      return true;
    }
  }

  function lenghTitulo(parametro){
    
    if(parametro.length > 100){
      return false;
    }else{
      return true;
    }
  }

  function lenghVacantes(parametro){
    
    if(parametro.length > 2){
      return false;
    }else{
      return true;
    }
  }


  function validarCorreo(parametro){
    var valido =   /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

    if(!valido.test(parametro)){
      return false;
    }else{
      return true;
    }
  }