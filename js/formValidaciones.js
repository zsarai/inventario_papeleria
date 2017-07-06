
function altaPersona() {
  
    persEdoTip_cod = document.getElementById("persEdoTip_cod").value;
    persInco_fecha = document.getElementById("persInco_fecha").value;
    persInco_folio = document.getElementById("persInco_folio").value;

    pers_apellPaterno = document.getElementById("pers_apellPaterno").value;
    pers_apellMaterno = document.getElementById("pers_apellMaterno").value;
    pers_nombres = document.getElementById("pers_nombres").value;
    pers_fechaNacimiento = document.getElementById("pers_fechaNacimiento").value;

    idePas_numero = document.getElementById("idePas_numero").value;
    idePas_vigencia = document.getElementById("idePas_vigencia").value;

    ideLiCon_permanente = document.getElementsByName("ideLiCon_permanente");
    ideLiCon_vigencia = document.getElementById("ideLiCon_vigencia").value;
    edo_codLic = document.getElementById("edo_codLic").value;
  
    if( persEdoTip_cod == null || persEdoTip_cod == "" ) {
       alert('no ha seleccionado un tipo de movimiento');
      return false;
    }else if(persInco_fecha == null || persInco_fecha == "" ) {
       alert('no ha ingresado una fecha de movimiento');
      return false;
    }

    if((persEdoTip_cod == 9 && persInco_folio == "")||(persEdoTip_cod == 8 && persInco_folio == "")||(persEdoTip_cod == 7 && persInco_folio == "")) {
       alert('falta ingresar el folio aspirante');
       return false;
    }


    if( pers_apellPaterno == null || pers_apellPaterno == "" ) {
       alert('falta el apellido paterno');
      return false;
    }else if(pers_apellMaterno == null || pers_apellMaterno == "" ) {
       alert('falta el apellido materno');
      return false;
    }
    else if(pers_nombres == null || pers_nombres == "" ) {
       alert('falta el nombre');
      return false;
    }
    else if(pers_fechaNacimiento == null || pers_fechaNacimiento == "" ) {
       alert('no ha ingresado la fecha de nacimiento');
      return false;
    }


    if((idePas_numero > 0) && (idePas_vigencia == null || idePas_vigencia == "")){
      alert('no ha ingresado la vigencia del pasaporte');
      return false;
    }


    if(ideLiCon_permanente[0].checked && (edo_codLic == null || edo_codLic == "")){
      alert('no ha ingresado el estado que emite la licencia para conducir');
      return false;
    }

    if(ideLiCon_permanente[1].checked && (ideLiCon_vigencia == null || ideLiCon_vigencia == "") && (edo_codLic == null || edo_codLic == "") ){
      alert('no ha ingresado la vigencia y/o el estado de la licencia para conducir');
      return false;
    }
  
  return true;
}