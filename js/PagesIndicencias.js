function objetoAjax(){
 var xmlhttp=false;
  try{
   xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  }catch(e){
   try {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
   }catch(E){
    xmlhttp = false;
   }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
   xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}

function Pagina(nropagina,pers_cod){
    divContenido = document.getElementById('contenido');
     ajax=objetoAjax();
     ajax.open("GET", "Faltas.php?pag="+nropagina+"&pers_cod="+pers_cod);
     divContenido.innerHTML= '<h2>Cargando...</h2>';
     ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            divContenido.innerHTML = ajax.responseText
        }
     } 
 ajax.send(null)
}