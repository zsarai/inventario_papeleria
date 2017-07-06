                    var contador = 1;
                    function phones(div_phone){    
                        var campo_phone = document.createElement('div');
                        campo_phone.innerHTML = '<div class="row clearfix"><div class="col-1-4">'+
                                                '<legend>Número</legend>'+
                                                '<input type="number" name="persTel_numero[]" placeholder="(044 55)__________" max="999999999999999" />'+
                                                '</div>'+
                                                '<div class="col-1-4">'+
                                                '<legend>Tipo de Telefono</legend>'+
                                                '<select name="persTel_tipo[]" id="selector1" >'+
                                                '<option value="">Tipo de linea</option>'+
                                                '<option value="M">Movil</option>'+
                                                '<option value="R">Nextel</option>'+
                                                '<option value="C">Casa</option>'+
                                                '<option value="O">Trabajo</option>'+
                                                '</select>'+
                                                '</div>'+
                                                '<div class="col-1-4">'+
                                                '<legend>Extension</legend>'+
                                                '<input type="text" name="persTel_idExt[]" onkeyup="this.value = this.value.toLowerCase();" maxlength="40" />'+
                                                '</div>'+
                                                '<div class="col-1-4">'+
                                                '<legend>* id Radio</legend>'+
                                                '<input type="text" name="persTel_nextel[]" onkeyup="this.value = this.value.toLowerCase();" maxlength="30" />'+
                                                '</div></div>';
                        document.getElementById(div_phone).appendChild(campo_phone); 
                        contador++;
                    }  

                    var contador2 = 1;
                    function correos(div_mails){    
                        var campo_email = document.createElement('div');
                        campo_email.innerHTML = '<div class="col-1-4">'+
                                                '<input type="text"  name="persMai_nombre[]" placeholder="@correo" onkeyup="this.value = this.value.toLowerCase();" maxlength="30" />'+                                
                                                '</div>';
                        document.getElementById(div_mails).appendChild(campo_email);               
                        contador2++; 
                    }

                    var contador4 = 1;
                    function empleos(div_empleos){    
                        var campo_empleos = document.createElement('div');
                        campo_empleos.innerHTML = '<div class="row clearfix">'+
                                                  '<div class="col-1-4">'+
                                                '<legend>Empresa</legend>'+
                                                  '<input type="text" name="persEmp_empresa[]" onkeyup="this.value = this.value.toUpperCase();" maxlength="100">'+
                                                '</div>'+
                                                '<div class="col-1-4">'+
                                                  '<legend>Nombre Jefe</legend>'+
                                                    '<input type="text" name="persEmp_jefeNombre[]" onkeyup="this.value = this.value.toUpperCase();" maxlength="80">'+
                                                '</div>'+
                                                '<div class="col-1-8">'+
                                                  '<legend>Puesto del Jefe</legend>'+
                                                    '<input type="text" name="persEmp_jefePuesto[]" onkeyup="this.value = this.value.toUpperCase();" maxlength="40">'+
                                                '</div>'+    
                                                  '<div class="col-1-8">'+
                                                  '<legend>Telefono</legend>'+
                                                    '<input type="number" name="persEmp_telefono[]" max="999999999999999">'+
                                                '</div>'+
                                              '</div>'+
                                              '<div class="row clearfix">'+
                                                '<div class="col-1-4">'+
                                                  '<legend>Puesto</legend>'+
                                                    '<input type="text" name="persEmp_puesto[]" onkeyup="this.value = this.value.toUpperCase();" maxlength="50">'+
                                                '</div>'+
                                                  '<div class="col-1-8">'+
                                                  '<legend>Sueldo Inicial</legend>'+
                                                  '<input type="number" name="persEmp_sueldoIn[]" step="any">'+
                                                '</div>'+
                                                '<div class="col-1-8">'+
                                                  '<legend>Sueldo Final</legend>'+
                                                  '<input type="number" name="persEmp_sueldoOut[]" step="any">'+
                                                '</div>'+                                                
                                              '</div>'+
                                              '<div class="row clearfix">'+
                                                '<div class="col-1-2">'+
                                                  '<legend>Domicilio</legend>'+
                                                    '<textarea name="persEmp_domicilio[]" onkeyup="this.value = this.value.toUpperCase();"></textarea>'+
                                                '</div>'+
                                                '<div class="col-1-2">'+
                                                  '<legend>Motivo Baja</legend>'+
                                                  '<textarea name="persEmp_motivoBaja[]" onkeyup="this.value = this.value.toUpperCase();"></textarea>'+
                                                '</div>'+
                                              '</div>';
                        document.getElementById(div_empleos).appendChild(campo_empleos);               
                        contador4++; 
                    }

                    var contador5 = 1;
                    function referencias(div_referencias){    
                        var campo_referencia = document.createElement('div');
                        campo_referencia.innerHTML = '<div class="row clearfix">'+
                                                      '<div class="col-1-4">'+
                                                        '<legend>Nombre</legend>'+
                                                        '<input type="text" name="persRef_nombre[]" onkeyup="this.value = this.value.toUpperCase();">'+
                                                      '</div>'+
                                                      '<div class="col-1-8">'+
                                                        '<legend>Telefono</legend>'+
                                                        '<input type="text" name="persRef_telefono[]" onkeyup="this.value = this.value.toUpperCase();">'+
                                                      '</div>'+
                                                      '<div class="col-1-8">'+
                                                        '<legend>Ocupacion</legend>'+
                                                        '<input type="text" name="persRef_ocupacion[]" onkeyup="this.value = this.value.toUpperCase();">'+
                                                      '</div>'+
                                                      '<div class="col-1-8">'+
                                                        '<legend>Tiempo De Conocerse</legend>'+
                                                        '<input type="number" name="persRef_timeConocerse[]" max="99">'+
                                                      '</div>'+
                                                      '<div class="col-1-4">'+
                                                        '<legend>Domicilio</legend>'+
                                                          '<textarea name="persRef_domicilio[]" onkeyup="this.value = this.value.toUpperCase();"></textarea>'+
                                                      '</div>'+
                                                    '</div>';
                        document.getElementById(div_referencias).appendChild(campo_referencia);               
                        contador5++; 
                    }
                    
                    
                     

                     