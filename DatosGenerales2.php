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
            .novisible{
                display:none;
            }
        </style>
        <script>
            $(document).ready(function(){
                //validacion de campos
                $('.input-number').on('input', function () {
                    //var f = parseFloat(this.value);
                    //console.log(f);
                    
                   // if (f == "NaN") {
                        this.value = this.value.replace( /^[a-zA-Z]+$/,'');
                    //} 
                   
                    });


                $('#fisica').click(function(){
                    $('#fisica').val(1);
                    $('#moral').val(0);
                });
                $('#moral').click(function(){
                    $('#moral').val(1);
                    $('#fisica').val(0);
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

               

                
                $('#contenedor6').show();//info financiera
                $('#contenedor7').hide();//infraestructura
                $('#contenedor8').hide();//certificaciones
                $('#contenedor9').hide();//tecnologia
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

        </script>
    </head>
    <body>
        
        
         

         
        
       <!-- imagen piec -->
       <div class="row">
            <div class="col s7 m7 l2 x2 offset-l2 offset-xl2">
                <img src="images/piec.jpg" class="responsive-img">
            </div>
        </div>

        <!-- contenedor 6  Informacion financiera -->
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
                            <!-- Utilidad Neta -->
                            <div class="input-field col s6">
                                <input name="neta" id="neta" type="text" class="validate input-number" value="<?echo $res['utilneta'];?>" required>
                                <label for="neta">% Utilidad Neta 2017</label>
                            </div>

                            <!-- Apalancamiento Financiero -->
                            <div class="input-field col s6">
                                <input name="financiero" id="financiero" type="text" class="validate input-number" value="<?echo $res['apafinanciero'];?>" required>
                                <label for="financiero">% Apalancamiento Financiero (Pasivo Total/Capital Contable)</label>
                            </div>
                        </div>
                        
                       <div class="row">
                            <div class="col s12 m12 l12 xl12">
                                <p class="left">
                                    <b>
                                        Ventas anuales de los últimos 3 años
                                    </b>
                                </p>
                            </div>
                        
                            <div class="input-field col s12 m12 l4 xl4">
                            <label for="a1" style="font-size:10px;">2015</label>
                                    <textarea id="a1" class="materialize-textarea input-number" name="a1"><?echo $res['venta1'];?></textarea>
                                    
                            </div>
                            <div class="input-field col s12 m12 l4 xl4">
                                    <textarea id="a2" class="materialize-textarea input-number" name="a2"><?echo $res['venta2'];?></textarea>
                                    <label for="a2" style="font-size:10px;">2016</label>
                            </div>
                            <div class="input-field col s12 m12 l4 xl4">
                                    <textarea id="a3" class="materialize-textarea input-number" name="a3"><?echo $res['venta3'];?></textarea>
                                    <label for="a3" style="font-size:10px;">2017</label>
                            </div>
                       </div>
                        
                       <div class="row">
                            <div class="col s12 m12 l12 xl12">
                                <p class="left">
                                    <b>
                                        EBITDA últimos 3 años
                                    </b>
                                </p>
                            </div>
                            
                            <div class="input-field col s12 m12 l4 xl4">
                                    <textarea id="b1" class="materialize-textarea input-number" name="b1"><?echo $res['ebitda1'];?></textarea>
                                    <label for="b1" style="font-size:10px;">2015</label>
                            </div>
                            <div class="input-field col s12 m12 l4 xl4">
                                    <textarea id="b2" class="materialize-textarea input-number" name="b2"><?echo $res['ebitda2'];?></textarea>
                                    <label for="b2" style="font-size:10px;">2016</label>
                            </div>
                            <div class="input-field col s12 m12 l4 xl4">
                                    <textarea id="b3" class="materialize-textarea input-number" name="b3"><?echo $res['ebitda3'];?></textarea>
                                    <label for="b3" style="font-size:10px;">2017</label>
                            </div>
                       </div>

                        <div class="row novisible">
                            <div class="col s12 m12 l12 xl12">
                                <b>
                                    <p class="left">
                                        Efectivo Generado en los últimos 3 años (Efectivo generado por operación/ Intereses + Pago Deuda)
                                    </p>
                                </b>
                            </div>
                       
                            <div class="input-field col s12 m12 l4 xl4">
                                    <textarea id="c1" class="materialize-textarea input-number" name="c1"></textarea>
                                    <label for="c1" style="font-size:10px;">2015</label>
                            </div>
                            <div class="input-field col s12 m12 l4 xl4">
                                    <textarea id="c2" class="materialize-textarea input-number" name="c2"></textarea>
                                    <label for="c2" style="font-size:10px;">2016</label>
                            </div>
                            <div class="input-field col s12 m12 l4 xl4">
                                    <textarea id="c3" class="materialize-textarea input-number" name="c3"></textarea>
                                    <label for="c3" style="font-size:10px;">2017</label>
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

        <!-- contenedor 7 INFRAESTRUCTURA-->
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
                            <div class="col s12 m12 l12 xl12">
                                <p>Capacidad Ociosa (%)</p>
                                <div class="input-field col s12 m12 l6 xl6">
                                    <input name="capacidad" id="capacidad" type="text" class="validate input-number" value="<? echo $res['capacidad'];?>" required>
                                    <label for="capacidad" style="font-size:14px;">(Capacidad Disponible para destinar a nuevos mercados)</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12 xl12">
                                <p>¿Cuenta con planes para expandir su infraestructura?</p>
                                <div class="input-field col s12 m12 l2 xl2">
                                    <p>
                                        <label>
                                            <input class="with-gap" name="resp" type="radio" <? echo $res['respexpandir']=="Si"?"CHECKED":""?> value="Si" />
                                            <span>Si</span>
                                        </label>
                                    </p>
                                </div>
                                <div class="input-field col s12 m12 l2 xl2">
                                    <p>
                                        <label>
                                            <input class="with-gap" name="resp" type="radio" <? echo $res['respexpandir']=="No"?"CHECKED":""?>  value="No"/>
                                            <span>No</span>
                                        </label>
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        
                       <div class="row novisible" id="expa">
                            <div class="col s12 m12 l12 xl12">
                                <p >¿Esa expansión en que % aumentaría su capacidad disponible?</p>
                                
                                <div class="input-field col s12 m12 l6 xl6">
                                    <input name="expansion" id="expansion" type="text" class="validate input-number" value="<? echo $res['posibleexpansion'];?>" required>
                                    <label for="expansion">% Capacidad</label>
                                </div>
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

        <!-- contenedor 8 certificaciones-->
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
                            <div class="col s12 m12 l12 xl12">
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
                       </div>

                        <div class="row" id="cualcerti">
                            <div class="col s12 m12 l12 xl12">
                                <p>¿Con cuál certificación cuenta?</p>
                                <div class="col s12 m12 l6 xl6">
                                    <input name="certifica" id="certifica" type="text" class="validate" value="<? echo $res['certificados'];?>" required>
                                    <label for="certifica"></label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col s12 m12 l12 xl12">
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
                       </div>

                       <div class="row" id="cualpremio">
                        	<div class="col s12 m12 l12 xl12">
                                <p>¿Con cuál premio o reconocimiento cuenta?</p>
                                <div class="col s12 m12 l6 xl6">
                                    <input name="premio" id="premio" type="text" class="validate" value="<? echo $res['premios'];?>" required>
                                    <label for="premio">Premio o Reconocimiento</label>
                                </div>
                            </div>
                        </div>
                            

                        <div class="row" >
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
        
        <!-- contenedor 9 TECNOLOGIA-->
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
                            <div class="col s12 m12 l12 xl12">
                                <p>¿Cuenta con tecnología limpia en su empresa? (Fotovoltaica, Eólica, etc)</p>
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
                        </div>

                        <div class="row" id="cualestec">
                            <div class="col s12 m12 l12 xl12">
                                <div class="input-field col s12 m12 l8 xl8">
                                    <p>Menciona cuales:</p>
                                    <textarea id="cualesteclimpia" class="materialize-textarea" name="cualesteclimpia"><? echo $res['cualesteclimpia'];?></textarea>
                                    <label for="cualesteclimpia"></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12 xl12">
                                <b> <p>¿Cuenta con algún software especializado para las áreas de su empresa?</p></b>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12 xl12">
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

                                <div class="input-field col s12 m12 l6 xl6" id="finanzas">
                                        <textarea id="admsoft" class="materialize-textarea" name="admsoft"><? echo  $res['admsoft'];?></textarea>
                                        <label for="admsoft">Software Administración/Finanzas</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12 xl12">
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

                                <div class="input-field col s12 m12 l6 xl6" id="inventario">
                                        <textarea id="invsoft" class="materialize-textarea" name="invsoft"><? echo $res['invesoft'];?></textarea>
                                        <label for="invsoft">Software Inventarios</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12 xl12">
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

                                <div class="input-field col s12 m12 l6 xl6" id="compras">
                                        <textarea id="comprasoft" class="materialize-textarea" name="comprasoft"><? echo $res['comprassoft'];?></textarea>
                                        <label for="comprasoft">Software Compras</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12 xl12">
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
                    
                                <div class="input-field col s12 m12 l6 xl6" id="ventas">
                                        <textarea id="ventasoft" class="materialize-textarea" name="ventasoft"><? echo $res['ventassoft'];?></textarea>
                                        <label for="ventasoft">Software ventas</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12 xl12">
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

                                <div class="input-field col s12 m12 l6 xl6" id="produccion">
                                        <textarea id="prodsoft" class="materialize-textarea" name="prodsoft"><? echo $res['prodsoft'];?></textarea>
                                        <label for="prodsoft">Software Producción</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12 xl12">
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

                                <div class="input-field col s12 m12 l6 xl6" id="calidad">
                                        <textarea id="calidadsoft" class="materialize-textarea" name="calidadsoft"><? echo $res['calidadsoft'];?></textarea>
                                        <label for="calidadsoft">Software Calidad</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12 xl12">
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

                                <div class="input-field col s12 m12 l6 xl6" id="otro">
                                        <textarea id="otrosoft" class="materialize-textarea" name="otrosoft"><? echo $res['otrosoft'];?></textarea>
                                        <label for="otrosoft">Software Otros</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12 xl12">
                                <p>¿Cuenta con algún otro tipo de Tecnología de la Información y Comunicación en su empresa?</p>
                                <div class="input-field col s12 m12 l3 xl3">
                                    <p>
                                        <label>
                                            <input class="with-gap" name="resotrastics" type="radio" id="resotrastics" <? echo $res['resotrastics']=="Si"?"CHECKED":""?> value="Si" />
                                            <span>Si</span>
                                        </label>
                                    </p>
                                </div>

                                <div class="input-field col s12 m12 l3 xl3">
                                    <p>
                                        <label>
                                            <input class="with-gap" name="resotrastics" type="radio" id="resotrastics" <? echo $res['resotrastics']=="No"?"CHECKED":""?> value="No" />
                                            <span>No</span>
                                        </label>
                                    </p>
                                </div>
                                
                            </div>
                        </div>

                        <div class="row" id="otrastic1">
                            <div class="col s12 m12 l12 xl12">
                                <div class="input-field col s12 m12 l8 xl8">
                                    <p>Menciona cual:</p>
                                    <textarea id="otrastics" class="materialize-textarea" name="otrastics"><? echo $res['otrastics'];?></textarea>
                                    <label for="otrastics"></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12 xl12">
                                <p>¿Cuenta con otro tipo de tecnología su empresa? (Procesos automatizados, etc.)</p>
                                <div class="input-field col s12 m12 l3 xl3">
                                    <p>
                                        <label>
                                            <input class="with-gap" name="resautomata" id="resautomata" type="radio" <? echo $res['tienesoftcalidad']=="Si"?"CHECKED":""?> value="Si" />
                                            <span>Si</span>
                                        </label>
                                    </p>
                                </div>

                                <div class="input-field col s12 m12 l3 xl3">
                                    <p>
                                        <label>
                                            <input class="with-gap" name="resautomata" id="resautomata" type="radio" <? echo $res['tienesoftcalidad']=="No"?"CHECKED":""?> value="No" />
                                            <span>No</span>
                                        </label>
                                    </p>
                                </div>
                                
                            </div>
                        </div>

                        <div class="row" id="automata1">
                            <div class="col s12 m12 l12 xl12">
                                <div class="input-field col s12 m12 l8 xl8">
                                    <p>Menciona cual:</p>
                                    <textarea id="automata" class="materialize-textarea" name="automata"><? echo $res['automatisacion'];?></textarea>
                                    <label for="automata"></label>
                                </div>
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
                                <input id="ncolaboradores" name="ncolaboradores" type="text" value="<? echo $res['ncolaboradores'];?>" class="validate input-number">
                                <label for="ncolaboradores">Núm. Total de Colaboradores</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12 xl12">
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
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12 xl12">
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
                        </div>


                        <div class="row">
                            <div class="col s12 m12 l12 xl12">
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
                        </div>

                        <div class="row">
                        <div class="input-field col s4 m4 l3 xl3 offset-s1 offset-m1  offset-l1 offset-xl1">
                        <a name="at10" id="at10" class="btn  red darken-4" onclick="atras('10');">ATRÁS</a>
                            </div>
                            <div class="input-field col s4 m4 l3 xl3 offset-s2 offset-m2 offset-l1 offset-xl5">
                            <input type="submit"  value="FINALIZAR" name="10" id="10" class="btn  red darken-4" onClick="return guardacont10('<? echo $id;?>');">
                            </div>
                        </div>

                    </div>
                </div>
            </form>

        </div>
        <!-- fin contenedor 10 -->
        
        <!-- participantes -->
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
        <script type="text/javascript" src="js/guardar2.js"></script>
        <script type="text/javascript" src="js/radios.js"></script>
    </body>
</html>