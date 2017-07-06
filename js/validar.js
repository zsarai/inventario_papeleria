function validaForm(){
    if($("#nombre").val() == ""){
        alert("vacio (NOMBRE)");
        $("#nombre").focus();
        return false;
    } 
    
    if ($("#paterno").val() == ""){
        alert("vacio (APELLIDO PATERNO)");
        $("#paterno").focus();
        return false;
    }

    if ($("#nacimiento").val() == ""){
        alert("vacio (FECHA DE NACIMIENTO)");
        $("#nacimiento").focus();
        return false;
    }

    if ($("#fecing").val() == ""){
        alert("vacio (FECHA DE INGRESO)");
        $("#fecing").focus();
        return false;
    }

    if ($("#area").val() == ""){
        alert("vacio (AREA)");
        $("#area").focus();
        return false;
    }

    if ($("#funcion").val() == ""){
        alert("vacio (FUNCION)");
        $("#funcion").focus();
        return false;
    }

    if ($("#calle").val() == ""){
        alert("vacio (CALLE)");
        $("#calle").focus();
        return false;
    }

    if ($("#combo1").val() == "" || $("#combo2").val() == "" || $("#combo3").val() == "" || $("#codpos").val() == "" ){ 
        alert("Le falto seleccionar de ( ESTADO, MUNICIPIO, COLONIA, CP)");
        $("#").focus();
        return false;
    }

    if ($("#curp").val() == ""){
        alert("vacio (CURP)");
        $("#curp").focus();
        return false;
    }

    if ($("#matricula").val() == ""){
        alert("vacio (MATRICULA C.M.)");
        $("#matricula").focus();
        return false;
    }

    return true;
}