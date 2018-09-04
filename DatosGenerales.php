<?
include "coneccion.php";
    $id = $_GET['f'];
    
    $buscar = "SELECT * FROM internacionalizacion WHERE id=$id";
    $resbuca = mysql_query($buscar) or die("La consulta buscar : $buscar" . mysql_error());
    if (mysql_num_rows($resbuca) >=1) {
        $res = mysql_fetch_assoc($resbuca);
        $inicioop = date_format(date_create($res['iniciooperacion']),'Y-m-d');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Encuesta</title>
        <style>
            .textarea{
                height:8%;
                border-left:none;
                border-right:none;
                border-top:none;
                resize: none;
            }
        </style>
        <script>
        
            $(document).ready(function(){
                
                $('#fisica').click(function(){
                    $('#fisica').val(1);
                    $('#moral').val(0);
                });
                $('#moral').click(function(){
                    $('#moral').val(1);
                    $('#fisica').val(0);
                });
                $('#resexp1').click(function(){
                    $('#p2').show();//lugexpo
                    $('#p3').hide();//respais
                    $('#p1').hide();//resnegativo
                    $('#p4').show();
                    $('#p5').show();
                });
                $('#resexp2').click(function(){
                    $('#p2').hide();
                    $('#p1').show();
                    $('#p3').show();
                    $('#p4').hide();
                    $('#p5').hide();
                });
                $('#agregar').click(function(){
                   // Find a <table> element with id="myTable":
                    var table = document.getElementById("myTable");
                    var tr = $('#myTable tbody tr').length;
                    
                    var tr2 = tr+1;
                   
                    // Create an empty <tr> element and add it to the 1st position of the table:
                    var row = table.insertRow(tr2);

                    // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);

                    // Add some text to the new cells:
                    cell1.innerHTML = "<textarea id="+'materia'+tr2+" name='materia[]' class='textarea' rows='1'></textarea>";
                    cell2.innerHTML = "<textarea id="+'proveedor'+tr2+" name='proveedor[]' class='textarea' rows='1'></textarea>";
                    cell3.innerHTML = "<textarea id="+'origen'+tr2+" name='origen[]' class='textarea' rows='1'></textarea>";
                    cell4.innerHTML = "<i class='material-icons borrar' style='cursor:pointer;'>cancel</i>";
                });
                $(document).on('click', '.borrar', function (event) {
                    event.preventDefault();
                    $(this).closest('tr').remove();
                });

                $("input[name='resinfo']:radio").click(function () {
                    var respuesta = $('input:radio[name=resinfo]:checked').val();
                    //alert(respuesta);
                    if (respuesta == "Otro") {
                        $('#resotro').show();
                    }else{
                        $('#resotro').hide();
                    }
                });

               

                $('#contenedor2').show();//generales
                $('#contenedor3').hide();//contacto
                $('#contenedor4').hide();//empresa
                $('#contenedor5').hide();//cambios empresa
                $('#contenedor6').hide();
                $('#contenedor7').hide();
                $('#contenedor8').hide();
                $('#contenedor9').hide();
                $('#contenedor10').hide();
                $('#contenedor11').hide();//experencia
                $('#contenedor12').hide();//experencia
                $('#contenedor13').hide();//informativo
                $('#p1').hide();
                $('#p3').hide();
                $('#resotro').hide();



                 //busca cual radiobutton esta seleccionado en contenedor 13
                 $("input[name=resinfo]").each(function (index) { 
                    if($(this).is(':checked')){
                        var respuesta = $('input:radio[name=resinfo]:checked').val();
                        if (respuesta == "Otro") {
                            $('#resotro').show();
                        }
                                    //alert(respuesta);
                    }
                });

            });
            function atras(num)
            {
                if (num==11) {
                    $('#contenedor'+num).hide();
                var n2 = parseInt(num)-6;
                $('#contenedor'+n2).show();
                }else{
                    $('#contenedor'+num).hide();
                var n2 = parseInt(num)-1;
                $('#contenedor'+n2).show();
                }
                  
            }
           var i=0; 
            	

        </script>
    </head>
    <body>
    <!-- <input type="text" name="nose" id="nose"> -->
        
        <div class="row">
            <div class="col s7 m7 l2 x2 offset-l2 offset-xl2">
                <img src="images/piec.jpg" class="responsive-img">
            </div>
        </div>
        <!-- contenedor2 -->
        <div id="contenedor2" class="container">
            
                <div class="row">
                    <div class="col s12 m12 l12 xl12 blue-grey darken-3 z-depth-1">
                        <div class="card-panel white z-depth-0 blue-grey darken-3">
                            <span class="black-text center">
                                <h5 class="white-text">DATOS GENERALES</h5>   
                            </span>
                        </div>
                    </div>
                </div>

                <form method="post" name="form2" id="form2">
                    <div class="row">
                        <div class="col s12 m12 l12 xl12  z-depth-1">

                            <div class="row">
                                <!-- Razón Social -->
                                <div class="input-field col s10 m10 l6 xl6 offset-s1 offset-m1">
                                    <input name="razonsocial" id="razonsocial" type="text" class="validate" value="<? echo $res['rsocial']?>" required>
                                    <label for="razonsocial">Razón Social</label>
                                </div> 

                                <!-- Nombre Comercial -->
                                <div class="input-field col s10 m10 l6 xl6 offset-s1 offset-m1">
                                    <input name="nombrecomercial" id="nombrecomercial" type="text" class="validate" required value="<? echo $res['ncomercial']?>">
                                    <label for="nombrecomercial">Nombre Comercial</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12 m12 l6 xl6 center">
                                    <!-- Régimen Fiscal -->
                                    <p>Régimen Fiscal</p>
                                    <div class="input-field col s6 m6 l2 xl2 offset-l2 offset-xl2">
                                        <p>
                                            <label>
                                                <input class="with-gap" name="regimenfiscal" id="fisica" type="radio"  <? echo $res['pfisica']==1?"CHECKED":"";?> value="1"/>
                                                <span>Persona Física</span>
                                            </label>
                                        </p>
                                    </div>

                                    <div class="input-field col s6 m6 l2 xl2 offset-l3 offset-xl3">
                                        <p>
                                            <label>
                                                <input class="with-gap" name="regimenfiscal" id="moral" type="radio" <? echo $res['pmoral']==1?"CHECKED":"";?>  value="0"/>
                                                <span>Persona Moral</span>
                                            </label>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Calle Y Número -->
                                <div class="input-field col s10 m10 l4 xl4 offset-s1 offset-m1">
                                    <input name="callenumero" id="callenumero" type="text" class="validate" value="<? echo $res['callenumero']?>" required>
                                    <label for="callenumero">Calle y Número</label>
                                </div>

                                <!-- Colonia -->
                                <div class="input-field col s10 m10 l4 xl4 offset-s1 offset-m1">
                                    <input name="colonia" id="colonia" type="text" class="validate" value="<? echo $res['colonia']?>" required>
                                    <label for="colonia">Colonia</label>
                                </div>

                                <!-- Código postal -->
                                <div class="input-field col s10 m10 l4 xl4 offset-s1 offset-m1">
                                    <input name="codigopostal" id="codigopostal" type="text" class="validate" value="<? echo $res['cp']?>" required>
                                    <label for="codigopostal">Código Postal</label>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Ciudad -->
                                <div class="input-field col s10 m10 l4 xl4 offset-s1 offset-m1">
                                    <input name="ciudad" id="ciudad" type="text" class="validate" value="<? echo $res['ciudad']?>" required>
                                    <label for="ciudad">Ciudad</label>
                                </div>

                                <!-- Estado -->
                                <div class="input-field col s10 m10 l4 xl4 offset-s1 offset-m1">
                                    <input name="estado" id="estado" type="text" class="validate" value="<? echo $res['estado']?>" required>
                                    <label for="estado">Estado</label>
                                </div>

                                <!-- RFC -->
                                <div class="input-field col s10 m10 l4 xl4 offset-s1 offset-m1">
                                    <input name="rfc" id="rfc" type="text" class="validate" value="<? echo $res['rfc']?>" required>
                                    <label for="rfc">RFC</label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="input-field col s12 m12 l4 xl4 offset-s7 offset-m7 offset-l10 offset-xl10">
                                <input type="submit" value="SIGUIENTE" name="1" id="1" class="btn  red darken-4" onClick="return guarda('<? echo $id;?>');">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            
        </div>
        <!-- fin contenedor2 -->
        
         <!-- contenedor3 -->
         <div id="contenedor3" class="container">
            
                <div class="row">
                    <div class="col s12 m12 l12 xl12 blue-grey darken-3 z-depth-1">
                        <div class="card-panel white z-depth-0 blue-grey darken-3">
                            <span class="black-text center">
                                <h5 class="white-text">CONTACTOS</h5>   
                            </span>
                        </div>
                    </div>
                </div>

                <form method="post" name="form3" id="form3">
                    <div class="row">
                        <div class="col s12 m12 l12 xl12 z-depth-1">
                            
                            <div class="row">
                                <h6 class="center">Contacto 1</h6>
                                <div class="divider"></div>
                            </div>

                            <div class="row">
                                <!-- Contacto 1 -->
                                <div class="input-field col s10 m10 l4 xl4 offset-s1 offset-m1">
                                    <input name="contacto1" id="contacto1" type="text" class="validate" value="<? echo $res['contacto1']?>" required>
                                    <label for="contacto1">Nombre*</label>
                                </div> 

                                <!-- telefono 1 -->
                                <div class="input-field col s10 m10 l4 xl4 offset-s1 offset-m1">
                                    <input name="tel1" id="tel1" type="text" class="validate" value="<? echo $res['tel1']?>" required>
                                    <label for="tel1">Teléfono*</label>
                                </div>
                            
                                <!-- correo 1 -->
                                <div class="input-field col s10 m10 l4 xl4 offset-s1 offset-m1">
                                    <input name="correo1" id="correo1" type="text" class="validate" value="<? echo $res['correo1']?>" required>
                                    <label for="correo1">Correo*</label>
                                </div>

                            </div>

                            <div class="row">
                                <h6 class="center">Contacto 2</h6>
                                <div class="divider"></div>
                            </div>

                            <div class="row">
                                <!-- Contacto 2 -->
                                <div class="input-field col s10 m10 l4 xl4 offset-s1 offset-m1">
                                    <input name="contacto2" id="contacto2" type="text" class="validate" value="<? echo $res['contacto2']?>">
                                    <label for="contacto2">Nombre</label>
                                </div> 

                                <!-- telefono 2 -->
                                <div class="input-field col s10 m10 l4 xl4 offset-s1 offset-m1">
                                    <input name="tel2" id="tel2" type="text" class="validate" value="<? echo $res['tel2']?>">
                                    <label for="tel2">Teléfono</label>
                                </div>
                            
                                <!-- correo 2 -->
                                <div class="input-field col s10 m10 l4 xl4 offset-s1 offset-m1">
                                    <input name="correo2" id="correo2" type="text" class="validate" value="<? echo $res['correo2']?>">
                                    <label for="correo2">Correo</label>
                                </div>

                            </div>
                            
                            <div class="row">
                                <div class="input-field col s4 m4 l3 xl3 offset-s1 offset-m1  offset-l1 offset-xl1">
                                    <a name="at3" id="at3" class="btn  red darken-4" onclick="atras('3');">ATRÁS</a>
                                </div>
                                <div class="input-field col s4 m4 l3 xl3 offset-s2 offset-m2 offset-l1 offset-xl5">
                                <input type="submit" value="SIGUIENTE" name="3" id="3" class="btn  red darken-4" onClick="return Gcontactos('<? echo $id;?>');">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            
        </div>
        <!-- fin contenedor3 -->

         <!-- contenedor4 -->
         <div id="contenedor4" class="container">
            <div class="row">
                <div class="col s12 m12 l12 xl12 blue-grey darken-3 z-depth-1">
                    <div class="card-panel white z-depth-0 blue-grey darken-3">
                        <span class="black-text center">
                            <h5 class="white-text">EMPRESA</h5>   
                        </span>
                    </div>
                </div>
            </div>

            <form method="post" name="form4" id="form4">
                <div class="row">
                    <div class="col s12 m12 l12 xl12 z-depth-1">
                        
                        <div class="row">
                            <h6 class="center">Seleccione la respuesta con la que más se identifique:</h6>
                            <div class="divider"></div>
                        </div>

                        <div class="row">
                        <div class="col s11 m11 l11 xl11">
                            <p>
                                <label>
                                    <input class="with-gap" name="group1" type="radio" <? echo $res['respuesta']=="La empresa tiene intenciones de explorar el potencial de
internacionalización de sus productos y/o servicios, aunque sus
procesos operativos y administrativos aún no están suficientemente
maduros y no están seguros de lograrlo en el corto o mediano plazo."?"CHECKED":"";?> value="La empresa tiene intenciones de explorar el potencial de
internacionalización de sus productos y/o servicios, aunque sus
procesos operativos y administrativos aún no están suficientemente
maduros y no están seguros de lograrlo en el corto o mediano plazo."  />
                                   
                                    <span style="text-align:justify;">
                                    La empresa tiene intenciones de explorar el potencial de
internacionalización de sus productos y/o servicios, aunque sus
procesos operativos y administrativos aún no están suficientemente
maduros y no están seguros de lograrlo en el corto o mediano plazo.
                                    </span>
                                </label>
                               
                            </p>
                            </div>
                        </div>
                        
                        <div class="row">
                        <div class="col s11 m11 l11 xl11">
                            <p>
                                <label>
                                    <input class="with-gap" name="group1" type="radio" <? echo $res['respuesta']=="La empresa cuenta con procesos operativos y administrativos
maduros, con intenciones de colocar sus productos y/o servicios en
mercados internacionales, con capacidad financiera y operativa
para poder realizarlo en el corto o mediano plazo."?"CHECKED":"";?>  value="La empresa cuenta con procesos operativos y administrativos
maduros, con intenciones de colocar sus productos y/o servicios en
mercados internacionales, con capacidad financiera y operativa
para poder realizarlo en el corto o mediano plazo."/>
                                    
                                    <span style="text-align:justify;">
                                    La empresa cuenta con procesos operativos y administrativos
maduros, con intenciones de colocar sus productos y/o servicios en
mercados internacionales, con capacidad financiera y operativa
para poder realizarlo en el corto o mediano plazo.
                                    </span>
                                </label>
                            </p>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col s11 m11 l11 xl11">
                            <p>
                                <label>
                                    <input class="with-gap" name="group1" type="radio" <? echo $res['respuesta']=="La empresa cuenta con productos y/o servicios que ya tienen presencia
en al menos 1 mercado internacional, con interés y capacidad de
profesionalizar el acceso a nuevos mercados estratégicos."?"CHECKED":"";?>  value="La empresa cuenta con productos y/o servicios que ya tienen presencia
en al menos 1 mercado internacional, con interés y capacidad de
profesionalizar el acceso a nuevos mercados estratégicos."/>
                                    <span style="text-align:justify;">
                                    La empresa cuenta con productos y/o servicios que ya tienen presencia
en al menos 1 mercado internacional, con interés y capacidad de
profesionalizar el acceso a nuevos mercados estratégicos.
                                    </span>
                                </label>
                            </p>
                        </div>
                        </div>
                        
                        <div class="row">
                            <div class="input-field col s4 m4 l3 xl3 offset-s1 offset-m1  offset-l1 offset-xl1">
                                <a name="at4" id="at4" class="btn  red darken-4" onclick="atras('4');">ATRÁS</a>
                            </div>
                            <div class="input-field col s4 m4 l3 xl3 offset-s2 offset-m2 offset-l1 offset-xl5">
                            <input type="submit" value="SIGUIENTE" name="4" id="4" class="btn  red darken-4" onClick="return Grespuestas('<? echo $id;?>');">
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <!-- fin contenedor4 -->
        
        <!-- contenedor5 -->
        <div id="contenedor5" class="container">
            <div class="row">
                <div class="col s12 m12 l12 xl12 blue-grey darken-3 z-depth-1">
                    <div class="card-panel white z-depth-0 blue-grey darken-3">
                        <span class="black-text center">
                            <h5 class="white-text">EMPRESA</h5>   
                        </span>
                    </div>
                </div>
            </div>

            <form method="post" name="form5" id="form5">
                <div class="row">
                    <div class="col s12 m12 l12 xl12 z-depth-1">

                        <div class="row">

                            <div class="input-field col s12 m12 l4 xl4">
                                <input type="text" class="datepicker" id="operacion" name="operacion" value="<? echo $inicioop;?>" required>
                                <label for="operacion">Inicio de Operación*</label>
                            </div>

                            <div class="input-field col s12 m12 l4 xl4">
                                <select name="sector" id="sector" required>
                                <option value="no" disabled selected>Seleccione una opción</option>
                                <option value="Industria" <? echo $res['sector']=="Industria"?"selected":"";?>>Industria</option>
                                <option value="Comercio" <? echo $res['sector']=="Comercio"?"selected":"";?>>Comercio</option>
                                <option value="Servicios" <? echo $res['sector']=="Servicios"?"selected":"";?>>Servicios</option>
                                </select>
                                <label>Sector en el que participa*</label>
                            </div>

                            <div class="input-field col s12 m12 l4 xl4">
                                <input name="giro" id="giro" type="text" class="validate" value="<? echo $res['giro'];?>" required>
                                <label for="giro">Giro*</label>
                            </div>

                        </div>
                        
                        <div class="row">
                            <div class="input-field col s12 m12 l12 xl12">
                                <textarea id="desc" class="materialize-textarea" name="desc"><? echo $res['descprod'];?></textarea>
                                <label for="desc">Describir productos y/o servicios con intención de internacionalizar</label>
                            </div>
                        </div>

                        <div class="row">
                           <p>En caso de caso de participar en el sector industrial: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a id="agregar" class="btn-small red darken-4">Agregar</a></p>
                           <!-- <div class="input-field col s12 m12 l4 xl4">
                                <textarea id="materia" class="materialize-textarea" name="materia"><? echo $res['dmatprima'];?></textarea>
                                <label for="materia">Principales materias primas para la elaboración sus productos</label>
                            </div>
                            <div class="input-field col s12 m12 l4 xl4">
                                <textarea id="proveedor" class="materialize-textarea" name="proveedor"><? echo $res['proveedor'];?></textarea>
                                <label for="proveedor">Proveedores</label>
                            </div>
                            <div class="input-field col s12 m12 l4 xl4">
                                <textarea id="origen" class="materialize-textarea" name="origen"><? echo $res['origen'];?></textarea>
                                <label for="origen">Lugar de origen</label>
                            </div> -->
                            <div class="col s12 m12 l12 xl12">
                            <table class="centered responsive-table" id="myTable">
                                <thead>
                                <tr>
                                    <th>Materias primas</th>
                                    <th>Proveedores</th>
                                    <th>Lugar de origen</th>
                                    <th><th>
                                </tr>
                                </thead>

                                <tbody>
                                   
                                <?
                                    $querysel = "SELECT * FROM industrial WHERE id_inter=$id ORDER BY id_industrial";
                                    $resultadoi = mysql_query($querysel) or die("La consulta : $querysel" . mysql_error());
                                    if(mysql_num_rows($resultadoi)>=1){
                                        while ($resint = mysql_fetch_assoc($resultadoi)) {
                                    
                                ?>
                                    <tr>
                                        <td><textarea id="materia<?echo $resint['id_industrial'];?>" class="textarea"  name="materia[]" rows="1"><? echo $resint['materiaprima'];?></textarea></td>
                                        <td><textarea id="proveedor<?echo $resint['id_industrial'];?>" class="textarea" name="proveedor[]" rows="1"><? echo $resint['proveedor'];?></textarea></td>
                                        <td><textarea id="origen<?echo $resint['id_industrial'];?>" class="textarea" name="origen[]" rows="1"><? echo $resint['origen'];?></textarea></td>
                                        <td><i class="material-icons borrar" style="cursor:pointer;" onclick="EliminarFila();">cancel</i></td>
                                    </tr>
                                <?
                                    }
                                }else {
                                    
                                
                                ?>  
                                    
                                    <!-- <tr>
                                        <td><textarea id="materia1" class="materialize-textarea" name="materia[]"></textarea></td>
                                        <td><textarea id="proveedor1" class="materialize-textarea" name="proveedor[]"></textarea></td>
                                        <td><textarea id="origen1" class="materialize-textarea" name="origen[]"></textarea></td>
                                        <td><i class="material-icons borrar" style="cursor:pointer;" onclick="EliminarFila();">cancel</i></td>
                                    </tr> -->
                                <?
                                }
                                ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="input-field col s12 m12 l6 xl6">
                                <p>Mencionar quienes son sus principales clientes:</p>
                                <textarea id="pclientes" class="materialize-textarea" name="pclientes"><? echo $res['principalcliente'];?></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <p>¿Cuenta con sucursales o unidades de negocio?</p>
                            <div class="input-field col s12 m12 l3 xl3">
                                <p>
                                    <label>
                                        <input class="with-gap" name="res" type="radio" id="resp" <? echo $res['ressucuni']=="Si"?"CHECKED":""?> value="Si" />
                                        <span>Si</span>
                                    </label>
                                </p>
                             </div>
                             <div class="input-field col s12 m12 l3 xl3">   
                                <p>
                                    <label>
                                        <input class="with-gap" name="res" type="radio" <? echo $res['ressucuni']=="No"?"CHECKED":""?> value="No" />
                                        <span>No</span>
                                    </label>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m12 l12 xl12">
                                <textarea id="suc" class="materialize-textarea" name="suc"><? echo $res['sucuni'];?></textarea>
                                <label for="suc">En caso de contar con sucursales o unidades de negocio mencione cuales son y en donde se ubican.</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s4 m4 l3 xl3 offset-s1 offset-m1  offset-l1 offset-xl1">
                                <a name="at5" id="at5" class="btn  red darken-4" onclick="atras('5');">ATRÁS</a>
                            </div>
                            <div class="input-field col s4 m4 l3 xl3 offset-s2 offset-m2 offset-l1 offset-xl5">
                                <input type="submit" value="SIGUIENTE" name="5" id="5" class="btn  red darken-4" onClick="return Goperacion('<? echo $id;?>');">
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <!-- fin contenedor5 -->

        <!-- contenedor 6 -->
        <div id="contenedor6" class="container">
            <div class="row">
                <div class="col s12 m12 l12 xl12 blue-grey darken-3 z-depth-1">
                    <div class="card-panel white z-depth-0 blue-grey darken-3">
                        <span class="black-text center">
                            <h5 class="white-text">INFORMACIÓN FINANCIERA</h5>   
                        </span>
                    </div>
                </div>
            </div>

            <form method="post" name="form6" id="form6">
                <div class="row">
                    <div class="col s12 m12 l12 xl12 z-depth-1">

                        <div class="row">
                            <!-- % Utilidad Bruta -->
                            <div class="input-field col s6">
                                <input name="bruta" id="bruta" type="text" class="validate" value="<?echo $res['utilbruta'];?>" required>
                                <label for="bruta">% Utilidad Bruta</label>
                            </div> 

                            <!-- Utilidad de Operación -->
                            <div class="input-field col s6">
                                <input name="uoperacion" id="uoperacion" type="text" class="validate" value="<?echo $res['utiloperacion'];?>" required>
                                <label for="uoperacion">% Utilidad de Operación</label>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Utilidad Neta -->
                            <div class="input-field col s6">
                                <input name="neta" id="neta" type="text" class="validate" value="<?echo $res['utilneta'];?>" required>
                                <label for="neta">% Utilidad Neta</label>
                            </div>

                            <!-- Apalancamiento Financiero -->
                            <div class="input-field col s6">
                                <input name="financiero" id="financiero" type="text" class="validate" value="<?echo $res['apafinanciero'];?>" required>
                                <label for="financiero">% Apalancamiento Financiero (Pasivo Total/Capital Contable)</label>
                            </div>
                        </div>
                        
                       <div class="row">
                        <p class="center">Ventas anuales de los ultimos 3 años</p>
                            <div class="input-field col s12 m12 l3 xl3">
                                    <textarea id="a1" class="materialize-textarea" name="a1"><?echo $res['venta1'];?></textarea>
                                    <label for="a1">2015</label>
                            </div>
                            <div class="input-field col s12 m12 l3 xl3">
                                    <textarea id="a2" class="materialize-textarea" name="a2"><?echo $res['venta2'];?></textarea>
                                    <label for="a2">2016</label>
                            </div>
                            <div class="input-field col s12 m12 l3 xl3">
                                    <textarea id="a3" class="materialize-textarea" name="a3"><?echo $res['venta3'];?></textarea>
                                    <label for="a3">2017</label>
                            </div>
                       </div>
                        
                       <div class="row">
                        <p class="center">EBITDA últimos 3 años</p>
                            <div class="input-field col s12 m12 l4 xl4">
                                    <textarea id="b1" class="materialize-textarea" name="b1"><?echo $res['ebitda1'];?></textarea>
                                    <label for="b1">2015</label>
                            </div>
                            <div class="input-field col s12 m12 l4 xl4">
                                    <textarea id="b2" class="materialize-textarea" name="b2"><?echo $res['ebitda2'];?></textarea>
                                    <label for="b2">2016</label>
                            </div>
                            <div class="input-field col s12 m12 l4 xl4">
                                    <textarea id="b3" class="materialize-textarea" name="b3"><?echo $res['ebitda3'];?></textarea>
                                    <label for="b3">2017</label>
                            </div>
                       </div>

                        <div class="row">
                        <p class="center">Efectivo Generado en los últimos 3 años (Efectivo generado por operación/ Intereses + Pago Deuda)</p>
                            <div class="input-field col s12 m12 l4 xl4">
                                    <textarea id="c1" class="materialize-textarea" name="c1"><?echo $res['efectivo1'];?></textarea>
                                    <label for="c1">2015</label>
                            </div>
                            <div class="input-field col s12 m12 l4 xl4">
                                    <textarea id="c2" class="materialize-textarea" name="c2"><?echo $res['efectivo2'];?></textarea>
                                    <label for="c2">2016</label>
                            </div>
                            <div class="input-field col s12 m12 l4 xl4">
                                    <textarea id="c3" class="materialize-textarea" name="c3"><?echo $res['efectivo3'];?></textarea>
                                    <label for="c3">2017</label>
                            </div>
                       </div>

                        <div class="row">
                            <div class="input-field col s4 m4 l3 xl3 offset-s1 offset-m1  offset-l1 offset-xl1">
                            <a name="at6" id="at6" class="btn  red darken-4" onclick="atras('6');">ATRÁS</a>
                            </div>
                            <div class="input-field col s4 m4 l3 xl3 offset-s2 offset-m2 offset-l1 offset-xl5">
                            <input type="submit" value="SIGUIENTE" name="6" id="6" class="btn  red darken-4" onClick="return guardacont6('<? echo $id;?>');">
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <!-- fin contenedor 6 -->

        <!-- contenedor 7 -->
        <div id="contenedor7" class="container">
            <div class="row">
                <div class="col s12 m12 l12 xl12 blue-grey darken-3 z-depth-1">
                    <div class="card-panel white z-depth-0 blue-grey darken-3">
                        <span class="black-text center">
                            <h5 class="white-text">Infraestructura</h5>   
                        </span>
                    </div>
                </div>
            </div>

            <form method="post" name="form7" id="form7">
                <div class="row">
                    <div class="col s12 m12 l12 xl12 z-depth-1">

                        <div class="row">
                            <!-- Superficie Terreno -->
                            <div class="input-field col s6">
                                <input name="superficie" id="superficie" type="text" class="validate" value="<? echo $res['superficie'];?>" required>
                                <label for="superficie">Superficie Terreno</label>
                            </div> 

                            <!-- Utilidad de Operación -->
                            <div class="input-field col s6">
                                <input name="construccion" id="construccion" type="text" class="validate" value="<? echo $res['construccion'];?>" required>
                                <label for="construccion">Metros cuadrados de construcción</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s6">
                                <input name="capacidad" id="capacidad" type="text" class="validate" value="<? echo $res['capacidad'];?>" required>
                                <label for="capacidad">% Capacidad Disponible (Manufactura o Servicios)</label>
                            </div>

                            <p>¿Cuenta con capacidad para expandir su infraestructura?</p>
                            <div class="input-field col s12 m12 l3 xl3">
                                <p>
                                    <label>
                                        <input class="with-gap" name="resp" type="radio" <? echo $res['respexpandir']=="Si"?"CHECKED":""?> value="Si" />
                                        <span>Si</span>
                                    </label>
                                </p>
                            </div>
                            <div class="input-field col s12 m12 l3 xl3">
                                <p>
                                    <label>
                                        <input class="with-gap" name="resp" type="radio" <? echo $res['respexpandir']=="No"?"CHECKED":""?>  value="No"/>
                                        <span>No</span>
                                    </label>
                                </p>
                            </div>
                        </div>
                        
                       <div class="row">
                            <p>¿Esa posible expansión en que % aumentaría su capacidad?</p>
                            <div class="input-field col s12 m12 l6 xl6">
                                <input name="expansion" id="expansion" type="text" class="validate" value="<? echo $res['posibleexpansion'];?>" required>
                                <label for="expansion">% Capacidad</label>
                            </div>
                       </div>

                        <div class="row">
                        <div class="input-field col s4 m4 l3 xl3 offset-s1 offset-m1  offset-l1 offset-xl1">
                        <a name="at7" id="at7" class="btn  red darken-4" onclick="atras('7');">ATRÁS</a>
                            </div>
                            <div class="input-field col s4 m4 l3 xl3 offset-s2 offset-m2 offset-l1 offset-xl5">
                            <input type="submit" value="SIGUIENTE" name="7" id="7" class="btn  red darken-4" onClick="return guardacont7('<? echo $id;?>');">
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <!-- fin contenedor 7 -->

        <!-- contenedor 8 -->
        <div id="contenedor8" class="container">
            <div class="row">
                <div class="col s12 m12 l12 xl12 blue-grey darken-3 z-depth-1">
                    <div class="card-panel white z-depth-0 blue-grey darken-3">
                        <span class="black-text center">
                            <h5 class="white-text">Certificaciones</h5>   
                        </span>
                    </div>
                </div>
            </div>

            <form method="post" name="form8" id="form8">
                <div class="row">
                    <div class="col s12 m12 l12 xl12 z-depth-1">

                        <div class="row">
                            <p>¿Cuenta con alguna certificación?</p>
                            <div class="input-field col s12 m12 l3 xl3">
                                <p>
                                    <label>
                                        <input class="with-gap" name="rescertif" type="radio" <? echo $res['rescertificado']=="Si"?"CHECKED":""?> value="Si" />
                                        <span>Si</span>
                                    </label>
                                </p>
                            </div>
                            <div class="input-field col s12 m12 l3 xl3">
                                <p>
                                    <label>
                                        <input class="with-gap" name="rescertif" type="radio" <? echo $res['rescertificado']=="No"?"CHECKED":""?>  value="No"/>
                                        <span>No</span>
                                    </label>
                                </p>
                            </div>
                       </div>

                        <div class="row">
                            <p>¿Con cuál certificación cuenta?</p>
                            <div class="col s12 m12 l6 xl6">
                                <input name="certifica" id="certifica" type="text" class="validate" value="<? echo $res['certificados'];?>" required>
                                <label for="certifica">Certificación</label>
                            </div>
                        </div>
                        
                        <div class="row">
                            <p>¿Cuenta con algún premio o reconocimiento?</p>
                            <div class="input-field col s12 m12 l3 xl3">
                                <p>
                                    <label>
                                        <input class="with-gap" name="respremio" type="radio" <? echo $res['respremios']=="Si"?"CHECKED":""?> value="Si" />
                                        <span>Si</span>
                                    </label>
                                </p>
                            </div>
                            <div class="input-field col s12 m12 l3 xl3">
                                <p>
                                    <label>
                                        <input class="with-gap" name="respremio" type="radio" <? echo $res['respremios']=="No"?"CHECKED":""?>  value="No"/>
                                        <span>No</span>
                                    </label>
                                </p>
                            </div>
                       </div>

                       <div class="row">
                            <p>¿Con cuál premio o reconocimiento cuenta?</p>
                            <div class="col s12 m12 l6 xl6">
                                <input name="premio" id="premio" type="text" class="validate" value="<? echo $res['premios'];?>" required>
                                <label for="premio">Premio o Reconocimiento</label>
                            </div>
                        </div>
                            

                        <div class="row">
                        <div class="input-field col s4 m4 l3 xl3 offset-s1 offset-m1  offset-l1 offset-xl1">
                        <a name="at8" id="at8" class="btn  red darken-4" onclick="atras('8');">ATRÁS</a>
                            </div>
                            <div class="input-field col s4 m4 l3 xl3 offset-s2 offset-m2 offset-l1 offset-xl5">
                            <input type="submit" value="SIGUIENTE" name="8" id="8" class="btn  red darken-4" onClick="return guardacont8('<? echo $id;?>');">
                            </div>
                        </div>

                    </div>
                </div>
            </form>

        </div>
        <!-- fin contenedor 8 -->
        
        <!-- contenedor 9 -->
        <div id="contenedor9" class="container">
            <div class="row">
                <div class="col s12 m12 l12 xl12 blue-grey darken-3 z-depth-1">
                    <div class="card-panel white z-depth-0 blue-grey darken-3">
                        <span class="black-text center">
                            <h5 class="white-text">TECNOLOGÍA</h5>   
                        </span>
                    </div>
                </div>
            </div>

            <form method="post" name="form9" id="form9">
                <div class="row">
                    <div class="col s12 m12 l12 xl12 z-depth-1">

                        <div class="row">
                        <p>¿Cuenta con tecnología limpia en su empresa?</p>
                            <div class="input-field col s12 m12 l3 xl3">
                                <p>
                                    <label>
                                        <input class="with-gap" name="teclimpia" type="radio" <? echo $res['teclimpia']=="Si"?"CHECKED":""?> value="Si" />
                                        <span>Si</span>
                                    </label>
                                </p>
                            </div>
                            <div class="input-field col s12 m12 l3 xl3">
                                <p>
                                    <label>
                                        <input class="with-gap" name="teclimpia" type="radio" <? echo $res['teclimpia']=="No"?"CHECKED":""?> value="No" />
                                        <span>No</span>
                                    </label>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m12 l8 xl8">
                                <p>Menciona cuales:</p>
                                <textarea id="cualesteclimpia" class="materialize-textarea" name="cualesteclimpia"><? echo $res['cualesteclimpia'];?></textarea>
                                <label for="cualesteclimpia"></label>
                            </div>
                        </div>

                        <div class="row">
                            <p>¿Cuenta con algún software especializado para las áreas de su empresa?</p>
                        </div>

                        <div class="row">
                            <p>Administración/Finanzas:</p>

                            <div class="input-field col s12 m12 l3 xl3">
                                <p>
                                    <label>
                                        <input class="with-gap" name="resadmsoft" type="radio" <? echo $res['tienesoftadmin']=="Si"?"CHECKED":""?> value="Si" />
                                        <span>Si</span>
                                    </label>
                                </p>
                            </div>

                            <div class="input-field col s12 m12 l3 xl3">
                                <p>
                                    <label>
                                        <input class="with-gap" name="resadmsoft" type="radio" <? echo $res['tienesoftadmin']=="No"?"CHECKED":""?> value="No" />
                                        <span>No</span>
                                    </label>
                                </p>
                            </div>
                
                            <div class="input-field col s12 m12 l6 xl6">
                                    <textarea id="admsoft" class="materialize-textarea" name="admsoft"><? echo  $res['admsoft'];?></textarea>
                                    <label for="admsoft">Software Administración/Finanzas</label>
                            </div>

                        </div>

                        <div class="row">
                            <p>Inventarios:</p>

                            <div class="input-field col s12 m12 l3 xl3">
                                <p>
                                    <label>
                                        <input class="with-gap" name="resinvsoft" type="radio" <? echo $res['tienesoftinve']=="Si"?"CHECKED":""?> value="Si" />
                                        <span>Si</span>
                                    </label>
                                </p>
                            </div>

                            <div class="input-field col s12 m12 l3 xl3">
                                <p>
                                    <label>
                                        <input class="with-gap" name="resinvsoft" type="radio" <? echo $res['tienesoftinve']=="No"?"CHECKED":""?> value="No" />
                                        <span>No</span>
                                    </label>
                                </p>
                            </div>
                
                            <div class="input-field col s12 m12 l6 xl6">
                                    <textarea id="invsoft" class="materialize-textarea" name="invsoft"><? echo $res['invesoft'];?></textarea>
                                    <label for="invsoft">Software Inventarios</label>
                            </div>

                        </div>

                        <div class="row">
                            <p>Compras:</p>

                            <div class="input-field col s12 m12 l3 xl3">
                                <p>
                                    <label>
                                        <input class="with-gap" name="rescomprasoft" type="radio" <? echo $res['tienesoftcompras']=="Si"?"CHECKED":""?> value="Si" />
                                        <span>Si</span>
                                    </label>
                                </p>
                            </div>

                            <div class="input-field col s12 m12 l3 xl3">
                                <p>
                                    <label>
                                        <input class="with-gap" name="rescomprasoft" type="radio" <? echo $res['tienesoftcompras']=="No"?"CHECKED":""?> value="No" />
                                        <span>No</span>
                                    </label>
                                </p>
                            </div>
                
                            <div class="input-field col s12 m12 l6 xl6">
                                    <textarea id="comprasoft" class="materialize-textarea" name="comprasoft"><? echo $res['comprassoft'];?></textarea>
                                    <label for="comprasoft">Software Compras</label>
                            </div>

                        </div>

                        <div class="row">
                            <p>Ventas:</p>

                            <div class="input-field col s12 m12 l3 xl3">
                                <p>
                                    <label>
                                        <input class="with-gap" name="resventasoft" type="radio" <? echo $res['tienesoftventas']=="Si"?"CHECKED":""?> value="Si" />
                                        <span>Si</span>
                                    </label>
                                </p>
                            </div>

                            <div class="input-field col s12 m12 l3 xl3">
                                <p>
                                    <label>
                                        <input class="with-gap" name="resventasoft" type="radio" <? echo $res['tienesoftventas']=="No"?"CHECKED":""?> value="No" />
                                        <span>No</span>
                                    </label>
                                </p>
                            </div>
                
                            <div class="input-field col s12 m12 l6 xl6">
                                    <textarea id="ventasoft" class="materialize-textarea" name="ventasoft"><? echo $res['ventassoft'];?></textarea>
                                    <label for="ventasoft">Software ventas</label>
                            </div>

                        </div>

                        <div class="row">
                            <p>Producción:</p>

                            <div class="input-field col s12 m12 l3 xl3">
                                <p>
                                    <label>
                                        <input class="with-gap" name="resprodsoft" type="radio" <? echo $res['tienesoftprod']=="Si"?"CHECKED":""?> value="Si" />
                                        <span>Si</span>
                                    </label>
                                </p>
                            </div>

                            <div class="input-field col s12 m12 l3 xl3">
                                <p>
                                    <label>
                                        <input class="with-gap" name="resprodsoft" type="radio" <? echo $res['tienesoftprod']=="No"?"CHECKED":""?> value="No" />
                                        <span>No</span>
                                    </label>
                                </p>
                            </div>
                
                            <div class="input-field col s12 m12 l6 xl6">
                                    <textarea id="prodsoft" class="materialize-textarea" name="prodsoft"><? echo $res['prodsoft'];?></textarea>
                                    <label for="prodsoft">Software Producción</label>
                            </div>

                        </div>

                        <div class="row">
                            <p>Calidad:</p>

                            <div class="input-field col s12 m12 l3 xl3">
                                <p>
                                    <label>
                                        <input class="with-gap" name="rescalidadsoft" type="radio" <? echo $res['tienesoftcalidad']=="Si"?"CHECKED":""?> value="Si" />
                                        <span>Si</span>
                                    </label>
                                </p>
                            </div>

                            <div class="input-field col s12 m12 l3 xl3">
                                <p>
                                    <label>
                                        <input class="with-gap" name="rescalidadsoft" type="radio" <? echo $res['tienesoftcalidad']=="No"?"CHECKED":""?> value="No" />
                                        <span>No</span>
                                    </label>
                                </p>
                            </div>
                
                            <div class="input-field col s12 m12 l6 xl6">
                                    <textarea id="calidadsoft" class="materialize-textarea" name="calidadsoft"><? echo $res['calidadsoft'];?></textarea>
                                    <label for="calidadsoft">Software Calidad</label>
                            </div>

                        </div>

                        <div class="row">
                            <p>Otro:</p>

                            <div class="input-field col s12 m12 l3 xl3">
                                <p>
                                    <label>
                                        <input class="with-gap" name="resotrosoft" type="radio" <? echo $res['tienesoftotro']=="Si"?"CHECKED":""?> value="Si" />
                                        <span>Si</span>
                                    </label>
                                </p>
                            </div>

                            <div class="input-field col s12 m12 l3 xl3">
                                <p>
                                    <label>
                                        <input class="with-gap" name="resotrosoft" type="radio" <? echo $res['tienesoftotro']=="No"?"CHECKED":""?> value="No" />
                                        <span>No</span>
                                    </label>
                                </p>
                            </div>
                
                            <div class="input-field col s12 m12 l6 xl6">
                                    <textarea id="otrosoft" class="materialize-textarea" name="otrosoft"><? echo $res['otrosoft'];?></textarea>
                                    <label for="otrosoft">Software Otros</label>
                            </div>

                        </div>

                        <div class="row">
                        <p>¿Cuenta con algún otro tipo de Tecnología de la Información y Comunicación en su empresa?</p>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m12 l8 xl8">
                                <p>Menciona cual:</p>
                                <textarea id="otrastics" class="materialize-textarea" name="otrastics"><? echo $res['otrastics'];?></textarea>
                                <label for="otrastics"></label>
                            </div>
                        </div>

                        <div class="row">
                        <p>¿Cuenta con otro tipo de tecnología su empresa?</p>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m12 l8 xl8">
                                <p>Menciona cual:</p>
                                <textarea id="automata" class="materialize-textarea" name="automata"><? echo $res['automatisacion'];?></textarea>
                                <label for="automata"></label>
                            </div>
                        </div>

                        <div class="row">
                        <div class="input-field col s4 m4 l3 xl3 offset-s1 offset-m1  offset-l1 offset-xl1">
                        <a name="at9" id="at9" class="btn  red darken-4" onclick="atras('9');">ATRÁS</a>
                            </div>
                            <div class="input-field col s4 m4 l3 xl3 offset-s2 offset-m2 offset-l1 offset-xl5">
                            <input type="submit"  value="SIGUIENTE" name="9" id="9" class="btn  red darken-4" onClick="return guardacont9('<? echo $id;?>');">
                            </div>
                        </div>

                    </div>
                </div>
            </form>

        </div>
        <!-- fin contenedor 9 -->

        <!-- contenedor 10 -->
        <div id="contenedor10" class="container">
            <div class="row">
                <div class="col s12 m12 l12 xl12 blue-grey darken-3 z-depth-1">
                    <div class="card-panel white z-depth-0 blue-grey darken-3">
                        <span class="black-text center">
                            <h5 class="white-text">COLABORADORES</h5>   
                        </span>
                    </div>
                </div>
            </div>

            <form method="post" name="form10" id="form10">
                <div class="row">
                    <div class="col s12 m12 l12 xl12 z-depth-1">

                        <div class="row">
                            <div class="input-field col s6">
                                <input id="ncolaboradores" name="ncolaboradores" type="text" value="<? echo $res['ncolaboradores'];?>" class="validate">
                                <label for="ncolaboradores">Núm. Total de Colaboradores</label>
                            </div>
                        </div>

                        <div class="row">
                            <p>Atraer colaboradores en su empresa es:</p>
                            <div class="input-field col s12 m12 l4 xl4">
                                <p>
                                    <label>
                                        <input class="with-gap" name="atraer" type="radio" <?echo $res['atraercolaboradores']=="Complicado/Difícil"?"CHECKED":"";?> value="Complicado/Difícil" />
                                        <span>Complicado/Difícil</span>
                                    </label>
                                </p>
                            </div>
                            <div class="input-field col s12 m12 l4 xl4">
                                <p>
                                    <label>
                                        <input class="with-gap" name="atraer" type="radio" <?echo $res['atraercolaboradores']=="Normal/Promedio"?"CHECKED":"";?> value="Normal/Promedio" />
                                        <span>Normal/Promedio</span>
                                    </label>
                                </p>
                            </div>
                            <div class="input-field col s12 m12 l4 xl4">
                                <p>
                                    <label>
                                        <input class="with-gap" name="atraer" type="radio" <?echo $res['atraercolaboradores']=="Muy Fácil"?"CHECKED":"";?> value="Muy Fácil" />
                                        <span>Muy Fácil</span>
                                    </label>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <p>Retener a los colaboradores en su empresa es:</p>
                            <div class="input-field col s12 m12 l4 xl4">
                                <p>
                                    <label>
                                        <input class="with-gap" name="retener" type="radio" <?echo $res['retenercolaboradores']=="Complicado/Difícil"?"CHECKED":"";?> value="Complicado/Difícil" />
                                        <span>Complicado/Difícil</span>
                                    </label>
                                </p>
                            </div>
                            <div class="input-field col s12 m12 l4 xl4">
                                <p>
                                    <label>
                                        <input class="with-gap" name="retener" type="radio" <?echo $res['retenercolaboradores']=="Normal/Promedio"?"CHECKED":"";?> value="Normal/Promedio" />
                                        <span>Normal/Promedio</span>
                                    </label>
                                </p>
                            </div>
                            <div class="input-field col s12 m12 l4 xl4">
                                <p>
                                    <label>
                                        <input class="with-gap" name="retener" type="radio" <?echo $res['retenercolaboradores']=="Muy Fácil"?"CHECKED":"";?> value="Muy Fácil" />
                                        <span>Muy Fácil</span>
                                    </label>
                                </p>
                            </div>
                        </div>


                        <div class="row">
                            <p>Administrar colaboradores en su empresa es:</p>
                            <div class="input-field col s12 m12 l4 xl4">
                                <p>
                                    <label>
                                        <input class="with-gap" name="adminc" type="radio" <?echo $res['admincolaboradores']=="Complicado/Difícil"?"CHECKED":"";?> value="Complicado/Difícil" />
                                        <span>Complicado/Difícil</span>
                                    </label>
                                </p>
                            </div>
                            <div class="input-field col s12 m12 l4 xl4">
                                <p>
                                    <label>
                                        <input class="with-gap" name="adminc" type="radio" <?echo $res['admincolaboradores']=="Normal/Promedio"?"CHECKED":"";?> value="Normal/Promedio" />
                                        <span>Normal/Promedio</span>
                                    </label>
                                </p>
                            </div>
                            <div class="input-field col s12 m12 l4 xl4">
                                <p>
                                    <label>
                                        <input class="with-gap" name="adminc" type="radio" <?echo $res['admincolaboradores']=="Muy Fácil"?"CHECKED":"";?> value="Muy Fácil" />
                                        <span>Muy Fácil</span>
                                    </label>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                        <div class="input-field col s4 m4 l3 xl3 offset-s1 offset-m1  offset-l1 offset-xl1">
                        <a name="at10" id="at10" class="btn  red darken-4" onclick="atras('10');">ATRÁS</a>
                            </div>
                            <div class="input-field col s4 m4 l3 xl3 offset-s2 offset-m2 offset-l1 offset-xl5">
                            <input type="submit"  value="SIGUIENTE" name="10" id="10" class="btn  red darken-4" onClick="return guardacont10('<? echo $id;?>');">
                            </div>
                        </div>

                    </div>
                </div>
            </form>

        </div>
        <!-- fin contenedor 10 -->
        

        <!-- contenedor 11 -->
        <div id="contenedor11" class="container">
            <div class="row">
                <div class="col s12 m12 l12 xl12 blue-grey darken-3 z-depth-1">
                    <div class="card-panel white z-depth-0 blue-grey darken-3">
                        <span class="black-text center">
                            <h5 class="white-text">EXPERIENCIA</h5>   
                        </span>
                    </div>
                </div>
            </div>

            <form method="post" name="form11" id="form11">
                <div class="row">
                    <div class="col s12 m12 l12 xl12 z-depth-1">

                         <div class="row">
                            <p>¿Ha tenido experiencia exportando?</p>
                            <div class="input-field col s12 m12 l3 xl3">
                                <p>
                                    <label>
                                        <input class="with-gap" name="resexp" id="resexp1" type="radio" <? echo $res['expexportando']=="Si"?"CHECKED":"";?> value="Si" />
                                        <span>Si</span>
                                    </label>
                                </p>
                            </div>
                            <div class="input-field col s12 m12 l3 xl3">
                                <p>
                                    <label>
                                        <input class="with-gap" name="resexp" id="resexp2" type="radio" <? echo $res['expexportando']=="No"?"CHECKED":"";?> value="No" />
                                        <span>No</span>
                                    </label>
                                </p>
                            </div>
                        </div>   

                        <div class="row">
                            
                            <div class="input-field col s12 m12 l7 xl7" id="p1">
                            <p>¿Por qué razón no lo ha hecho ?</p>
                                    <textarea id="resnegativo" class="materialize-textarea" name="resnegativo"><? echo $res['noexporta'];?></textarea>
                                    <label for="resnegativo"></label>
                            </div>
                            
                            <div class="input-field col s12 m12 l7 xl7" id="p2">
                            <p>¿A qué lugar ha exportado su producto y/o servicio?</p>
                                    <textarea id="lugexpo" class="materialize-textarea" name="lugexpo"><? echo $res['lugarexporta'];?></textarea>
                                    <label for="lugexpo"></label>
                            </div>
                        </div>

                        <div class="row">
                            
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m12 l7 xl7" id="p3">
                            <p>En caso de que pudiera elegir un país para exportar su producto/servicio, ¿Cuál eligiría y por qué?</p>
                                    <textarea id="respais" class="materialize-textarea" name="respais"><? echo $res['paisexporta'];?></textarea>
                                    <label for="respais"></label>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="input-field col s12 m12 l7 xl7" id="p4">
                            <p>¿Actualmente sigue exportando? en caso de ser negativo ¿Por qué no?</p>
                                    <textarea id="sigue" class="materialize-textarea" name="sigue"><? echo $res['sigueexporta'];?></textarea>
                                    <label for="sigue"></label>
                            </div>

                        </div>

                        <div class="row">
                            
                            <div class="input-field col s12 m12 l7 xl7" id="p5">
                                <p>¿Cuál ha sido su mayor reto al exportar?</p>
                                    <textarea id="mreto" class="materialize-textarea" name="mreto"><? echo $res['mayoreto'];?></textarea>
                                    <label for="mreto"></label>
                            </div>
                            </div>

                        <div class="row">
                        <div class="input-field col s4 m4 l3 xl3 offset-s1 offset-m1  offset-l1 offset-xl1">
                        <a name="at11" id="at11" class="btn  red darken-4" onclick="atras('11');">ATRÁS</a>
                            </div>
                            <div class="input-field col s4 m4 l3 xl3 offset-s2 offset-m2 offset-l1 offset-xl5">
                            <input type="submit"  value="SIGUIENTE" name="11" id="11" class="btn  red darken-4" onClick="return guardacont11('<? echo $id;?>');">
                            </div>
                        </div>

                    </div>
                </div>
            </form>

        </div>
        <!-- fin contenedor 11 -->  

        <!-- contenedor 12 -->
        <div id="contenedor12" class="container">
            <div class="row">
                <div class="col s12 m12 l12 xl12  blue-grey darken-3 z-depth-1">
                    <div class="card-panel white z-depth-0 blue-grey darken-3">
                        <span class="black-text center">
                            <h5 class="white-text">EXPERIENCIA</h5>   
                        </span>
                    </div>
                </div>
            </div>

            <form method="post" name="form12" id="form12">
                <div class="row">
                    <div class="col s12 m12 l12 xl12 z-depth-1">


                        <div class="row">
                            <div class="input-field col s12 m12 l7 xl7" id="p6">
                            <p>De su capacidad actual, ¿Qué % podría destinar a exportación?</p>
                                    <textarea id="porcenexpo" class="materialize-textarea" name="porcenexpo"><? echo $res['porcentajeexporta'];?></textarea>
                                    <label for="porcenexpo"></label>
                            </div>

                             

                        </div>

                        <!-- <div class="row">
                            <div class="input-field col s12 m12 l5 xl5" id="p7">
                                    <p>¿Por qué razón le gustaría exportar?</p>
                                    <textarea id="gustaexpo" class="materialize-textarea" name="gustaexpo"><? echo $res['razongustaexpo'];?></textarea>
                                    <label for="gustaexpo"></label>
                            </div>
                        </div> -->

                        <div class="row">
                            
                            <div class="input-field col s12 m12 l6 xl6" id="p8">
                            <p>¿Cuál es su mayor motivación para internacionalizar su empresa?</p>
                                    <textarea id="motiva" class="materialize-textarea" name="motiva"><? echo $res['motivacion'];?></textarea>
                                    <label for="motiva"></label>
                            </div>
                        </div>

                        <div class="row">
                        <div class="input-field col s4 m4 l3 xl3 offset-s1 offset-m1  offset-l1 offset-xl1">
                        <a name="at12" id="at12" class="btn  red darken-4" onclick="atras('12');">ATRÁS</a>
                            </div>
                            <div class="input-field col s4 m4 l3 xl3 offset-s2 offset-m2 offset-l1 offset-xl5">
                            <input type="submit"  value="SIGUIENTE" name="12" id="12" class="btn  red darken-4" onClick="return guardacont12('<? echo $id;?>');">
                            </div>
                        </div>

                    </div>
                </div>
            </form>

        </div>
        <!-- fin contenedor 12 -->

        <!-- contenedor 13 -->
        <div id="contenedor13" class="container">
            <div class="row">
                <div class="col s12 m12 l12 xl12  blue-grey darken-3 z-depth-1">
                    <div class="card-panel white z-depth-0 blue-grey darken-3">
                        <span class="black-text center">
                            <h5 class="white-text"></h5>   
                        </span>
                    </div>
                </div>
            </div>

            <form method="post" name="form13" id="form13">
                <div class="row">
                    <div class="col s12 m12 l12 xl12 z-depth-1">


                        <div class="row">
                            <div class="input-field col s12 m12 l7 xl7" id="p6">
                            <p>¿Cómo te enteraste del PIEC 2018?</p>
                            <div class="input-field col s12 m12 l2 xl2">
                                <p>
                                    <label>
                                        <input class="with-gap" name="resinfo" id="resinfo1" type="radio" <? echo $res['enteraste']=="Noticias"?"CHECKED":"";?> value="Noticias" />
                                        <span>Noticias</span>
                                    </label>
                                </p>
                            </div>
                            <div class="input-field col s12 m12 l12 xl12">
                                <p>
                                    <label>
                                        <input class="with-gap" name="resinfo" id="resinfo2" type="radio" <? echo $res['enteraste']=="Radio"?"CHECKED":"";?> value="Radio" />
                                        <span>Radio</span>
                                    </label>
                                </p>
                            </div>
                            <div class="input-field col s12 m12 l12 xl12">
                                <p>
                                    <label>
                                        <input class="with-gap" name="resinfo" id="resinfo3" type="radio" <? echo $res['enteraste']=="Facebook"?"CHECKED":"";?> value="Facebook" />
                                        <span>Facebook</span>
                                    </label>
                                </p>
                            </div>
                            <div class="input-field col s12 m12 l12 xl12">
                                <p>
                                    <label>
                                        <input class="with-gap" name="resinfo" id="resinfo4" type="radio" <? echo $res['enteraste']=="Linkedin"?"CHECKED":"";?> value="Linkedin" />
                                        <span>Linkedin</span>
                                    </label>
                                </p>
                            </div>
                            <div class="input-field col s12 m12 l12 xl12">
                                <p>
                                    <label>
                                        <input class="with-gap" name="resinfo" id="resinfo5" type="radio" <? echo $res['enteraste']=="Corréo electronico"?"CHECKED":"";?> value="Corréo electronico" />
                                        <span>Correo electrónico</span>
                                    </label>
                                </p>
                            </div>
                            <div class="input-field col s12 m12 l12 xl12">
                                <p>
                                    <label>
                                        <input class="with-gap" name="resinfo" id="resinfo6" type="radio" <? echo $res['enteraste']=="Otro"?"CHECKED":"";?> value="Otro" />
                                        <span>Otro</span>
                                    </label>
                                </p>
                            </div>
                            </div>
                            <div class="col s12 m12 l6 xl6" id="resotro">
                            <label for="otrores">Especifica:</label>
                                <input type="text" name="otrores" id="otrores" class="input-field" value="<? echo $res['otrores'];?>">
                                
                            </div>
                            

                        </div>

                        <div class="row">
                            <div class="input-field col s12 m4 l3 xl3 offset-m1  offset-l1 offset-xl1">
                                <a name="at13" id="at13" class="btn  red darken-4" onclick="atras('13');">ATRÁS</a>
                            </div>
                            <div class="input-field col s12 m4 l3 xl3 offset-m2 offset-l1 offset-xl5">
                                <input type="submit"  value="GUARDAR Y FINALIZAR" name="13" id="13" class="btn  red darken-4" onClick="return guardacont13('<? echo $id;?>');">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m4 l3 xl3 offset-m3 offset-l8 offset-xl8">
                                <input type="submit"  value="GUARDAR Y LLENAR FICHA TÉCNICA" name="14" id="14" class="btn  red darken-4" onClick="return guardacont14('<? echo $id;?>');">
                            </div>
                        </div>

                    </div>
                </div>
            </form>

        </div>
        <!-- fin contenedor 13 -->
        
        <footer class="page-footer white">
                <div class="container">
                    <div class="row">
                        <div class="col s12 m12 l12 xl12">
                            <div class="col s6 m3 l2 xl2">
                                <img src="images/imeanticipa.png" class="responsive-img">
                            </div>
                            <div class="col s6 m2 l2 xl2">
                                <img src="images/bw.png" class="responsive-img">
                            </div>
                            
                            <div class="col s8 m3 l3 xl3">
                                <img src="images/salle.png" class="responsive-img">
                            </div>
                            <div class="col s8 m4 l3 xl3">
                                <img src="images/logodesarrolloeconomico.png" class="responsive-img">
                            </div>
                            <div class="col s4 m2 l1 xl1">
                                <img src="images/canacintrap.png" class="responsive-img">
                            </div>
                            <div class="col s8 m2 l1 xl1">
                                <img src="images/valor.jpeg" class="responsive-img">
                            </div>
                        </div>
                    </div>

                     <div class="row">
                        <div class="col s12 m12 l12 xl12">
                            
                        </div>
                    </div>
                </div>
                <div class="footer-copyright white">
                    <div class="container black-text">
                    <p class="center"> </p>
                        <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                    </div>
                </div>
            </footer>
        
        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript" src="js/initialize.js"></script>
        <script type="text/javascript" src="js/guardar.js"></script>
    </body>
</html>