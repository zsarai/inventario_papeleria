<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Marca</title>
	<link rel="stylesheet" type="text/css" href="./css/forms.css">
	<script type="text/javascript " src="js/jquery.js"></script>
	<meta http-equiv="Content-Type" content="text/hmtl; charset=utf-8" />

	<link rel="stylesheet" type="text/css" href="./css/generales.css" />
	<link rel="stylesheet" type="text/css" href="./css/demo.css"/>
  <link rel="stylesheet" type="text/css" href="css/modal.css">
	<link rel="stylesheet" type="text/css" href="./css/menu.css" />

	<link rel="stylesheet" type="text/css" href="./css/box-sizing.css" />
	<link rel="stylesheet" type="text/css" href="./css/forms.css">
	<link rel="stylesheet" type="text/css" href="./css/tables.css" />

	<link rel="stylesheet" href="./css/nav_login.css" />
	<link rel="stylesheet" href="./css/alertify.default.css" />
	<script type="text/javascript" language="javascript" src="./js/alertify.js"></script>

	<link rel="stylesheet" type="text/css" href="./css/nav_login.css" />
	<link rel="stylesheet" type="text/css" href="./css/lightbox2.css" />
  <link rel="stylesheet" type="text/css" href="css/font.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">
	<script src="js/jquery-1.12.4.min.js" type="text/javascript"></script>
	<script src="js/modal.js" type="text/javascript"></script>
</head>
<body>
  <center> <div id="logo" style="position: absolute; left: 10px; top:8px;"> </div> </center>
                        <script>
            $(function(){
               $('#login').click(function(){
               $(this).next('#login-content').slideToggle();
               $(this).toggleClass('active');        
               });
            });
        </script>


        <nav class="acceder" style="position: fixed; z-index: 1000; right: 10px;">
           <ul>
              <li style="list-style:none">
                
                  <a id="login" href="#">                  
                    <div align="center"> <img src="papeleria_images/usuario.png" style="width: 40px;" > 
                        <span style="float: left; padding-left: 15px; padding-top: 9px;"> Sarai </span> 
                    </div>
                  </a>

                 <div id="login-content" style="width: 600px; background: #ccc">                    
                    <div class="row clearfix">
                                              
                        
                    
                                       </div>                     
              </li>
           </ul>
        </nav>
              </div>
              <nav id="menu">
  <label for="tm" id="toggle-menu">MENU<span class="drop-icon"> </span></label> 
  
    <input type="checkbox" id="tm">
  <ul class="main-menu clearfix">  
  <li style="background: red; color: #fff;"><a href="out.php"> CERRAR SESION </a></li>
     
    <li><a href="#"> Libreria        <span class="drop-icon"></span>
        <label title="Toggle Drop-down" class="drop-icon" for="pl_1"> </label>            
      
        </a>
                
                  
          <input type="checkbox" id="pl_1">
          <ul class="sub-menu">  
                 
              <li>
                <a href="#">Ayuda                    <span class="drop-icon"></span>
                    <label title="Toggle Drop-down" class="drop-icon" for="md_4">  </label>
                </a>
                                              <input type="checkbox" id="md_4">
                        <ul class="sub-menu">
                                                              <li>
                                        <a href="?pag=cti_user">
                                          Perfil                                        </a>
                                      </li>                                                                
                                                            </ul>
                                      </li>
                        </ul>
              </li>    
     
    <li><a href="#"> Almacen Inventarios        <span class="drop-icon"></span>
        <label title="Toggle Drop-down" class="drop-icon" for="pl_11"></label>            
      
        </a>
                
                  
          <input type="checkbox" id="pl_11">
          <ul class="sub-menu">  
                 
              <li>
                <a href="#">Catalogos                    <span class="drop-icon"></span>
                    <label title="Toggle Drop-down" class="drop-icon" for="md_34">  </label>
                </a>
                                              <input type="checkbox" id="md_34">
                        <ul class="sub-menu">
                                                              <li>
                                        <a href="#pag=pape_marc" onclick="cargarMarcas();">
                                          Marca                                        </a>
                                      </li>                                                                
                                                                          <li>
                                        <a href="#pag=pape_mod" onclick="cargarModelos();" >
                                          Modelo                                        </a>
                                      </li>                                                                
                                                                          <li>
                                        <a href="#pag=pape_unimed" onclick="cargarUnidades();">
                                          Unidad de medida                                        </a>
                                      </li>                                                                
                                                                          <li>
                                        <a href="#pag=pape_rec" onclick="cargarRecursos();">
                                          Recursos                                        </a>
                                      </li>                                                         
                                       <li>
                                        <a href="#pag=pape_clasif" onclick="cargarClasificaciones();">
                                          Clasificacion                                        </a>
                                      </li>  
                                       <li>
                                        <a href="#pag=pape_tipo" onclick="cargarTipos();">
                                          Tipo de producto                                        </a>
                                      </li> 
                                      <li>
                                        <a href="?pag=pape_prod">
                                           Producto                                       </a>
                                      </li> 
                                      <li>
                                        <a href="?pag=pape_rep">
                                           Reportes                                     </a>
                                      </li>                                                                                                                                    
                                                            </ul>
                                                            </li>
                        </ul>
              </li>    
    </ul>
</nav><script>
  $('#btn_Buscar').unbind('click'); 
</script>

<form action="" method="post" class="buscar" id="formBuscar">
  <div class="row clearfix">
        
    <input type="search" placeholder="Buscar informacion" name="bus_multiple">    
    <button type="submit" id="btn_Buscar">BUSCAR</button>
    
  </div>
</form> 
            
<form method="post" action="" id="formBusqueda" class="form-style-5" >
<div id="contenedor_buscador">
    <input type="text" name="busca" id="busqueda" onkeyup="buscarMarca(this.value);" placeholder="Buscar ... ">

</div>
</form>
<div id="contenedor_formulario">
  <?php include"forms/frm_new_marca.php"; ?>
</div>


<div id="contenedor"> </div>

<br>
<?php include"forms/frm_actualizar_marca.php"; ?>
<?php include"forms/frm_actualizar_modelo.php"; ?>
<?php include"forms/frm_actualizar_tipo.php"; ?>
<?php include"forms/frm_actualizar_recurso.php"; ?>
<?php include"forms/frm_actualizar_unimed.php"; ?>
<?php include"forms/frm_actualizar_clasificacion.php"; ?>
<script type="text/javascript " src="js/indeex.js"></script>
<script type="text/javascript " src="js/js_marcas.js"></script>
<script type="text/javascript " src="js/js_modelos.js"></script>
<script type="text/javascript " src="js/js_tipos.js"></script>
<script type="text/javascript " src="js/js_recurso.js"></script>
<script type="text/javascript " src="js/js_unimed.js"></script>
<script type="text/javascript " src="js/js_clasificacion.js"></script>
<?php include"forms/modal_mensaje.php"; ?>
</body>
</html>