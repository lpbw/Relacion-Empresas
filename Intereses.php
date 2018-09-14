<?php
    include "coneccion.php";

    // Guardar datos
    if ($_POST['registro']=="Registrarse")
    {
        $TipoEmpresa=$_POST['TipoEmpresa'];
        $Nombre=$_POST['NombreEmpresa'];
        $localidad=$_POST['localildad'];
        $persona=$_POST['persona'];
        $tel=$_POST['tel'];
        $correo=$_POST['correo'];
        $clientes=$_POST['clientes'];
        $descripcion=$_POST['desc'];

        $InsertEmpresa = "INSERT INTO chihuahua(tipo,nombre,localidad,persona,telefono,correo,clientes,descripcion)VALUES($TipoEmpresa,'$Nombre','$localidad','$persona','$tel','$correo','$clientes','$descripcion')";
        $ResultadoInsert = mysql_query($InsertEmpresa) or die("Query fallo: $InsertEmpresa" . mysql_error());
        $IdEmpresa = mysql_insert_id();

        $intereses = $_POST['interes'];
        //echo "<script>alert('$intereses');</script>";
        foreach ($intereses as $interes) {
            //echo "<script>alert('$interes');</script>";
            $InsertRelacion = "INSERT INTO espana_chihuahua(id_chih,id_interes)VALUES($IdEmpresa,$interes)";
            $ResultadoInsert = mysql_query($InsertRelacion) or die("Query fallo: $InsertRelacion" . mysql_error());
            $flag=true;
        }

        if ($flag==true)
        {
            $QueryCorreo = "SELECT correo FROM chihuahua WHERE id_chih=$IdEmpresa";
            $ResultadoCorreo = mysql_query() or die("Query fallo: $QueryCorreo".mysql_error());
            $ResCorreo = mysql_fetch_assoc($ResultadoCorreo);
            $Correo = $ResCorreo['correo'];

            $Body = "<b>¡Has concluido tu registro a Misión Comercial Navarra - Chihuahua 2018!</b> <br><br>";
            $Body .= "Te recordamos que el día 11 de Octubre te esperamos en la Expo Industrial que se llevará a cabo en el Centro de Convenciones y Exposiciones de Chihuahua, seguiremos en contacto contigo para hacerte llegar los horarios de las entrevistas para que puedas conocer a las empresas de tu interés. <br><br>";
            $Body .= "Cualquier duda no dudes en comunicarte con Lizbeth Martínez al (614) 191 11 36 o enviar correo a liz.martinez@bluewolf.com.mx";
            $Cabeceras = "From: <info@bluewolf.com.mx> \r\n";
            $Cabeceras .= "Bcc: liz.martinez@bluewolf.com.mx,luis.perez@bluewolf.com.mx \r\n";
            $Cabeceras .= "Content-type: text/html; charset=UTF-8 \r\n";
            mail($Correo,"Misión Comercial Navarra",$Body,$Cabeceras);
            echo "<script>alert('Registro realizado con exito!!');</script>";
        }
    }
?>
<!DOCTYPE html>
<html>
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
        <title>Intereses-Empresas</title>
        <style>
            .bw{
                background-color:#14234b;
            }
            .loader {
				position: fixed;
				left: 0px;
				top: 0px;
				width: 100%;
				height: 100%;
				z-index: 9999;
				background: url('images/loader.gif') 50% 50% no-repeat rgb(249,249,249);
				opacity: .8;
            }
            .borlef{
                border-right: 5px solid #14234b;
            }
            
        </style>
        <script>
            $(document).ready(function(){
                $(".loader").fadeOut("slow");
                $("#NombreEmpresa1").hide();
                        $("#localildad1").hide();
                        $("#participante1").hide();
                        $("#tel1").hide();
                        $("#correo1").hide();
                        $("#desc1").hide();
                        $("#clientes1").hide();

                $("#TipoEmpresa").change(function()
                {
                    var tipo = $('select[name="TipoEmpresa"] option:selected').text();
                    if(tipo != "Seleccione una Opción")
                    {
                        if (tipo != "Empresa")
                        {
                            $("#NombreEmpresa1").show();
                            $("#localildad1").show();
                            $("#participante1").show();
                            $("#tel1").show();
                            $("#correo1").show();
                            $("#desc1").hide();
                            $("#clientes1").hide();
                            $("#parrafo").hide();
                            $("#desc").removeAttr('required');
                            $("#clientes").removeAttr('required');
                            if (tipo == "Asociación" || tipo == "Centro de Investigación" || tipo == "Dependencia")
                            {
                                $("#descripcion").text("Descripción de Actividad"); 
                                $("#desc1").show();
                                $("#desc").attr('required','true');
                            }
                             
                        }
                        else
                        {
                            
                            $("#NombreEmpresa1").show();
                            $("#localildad1").show();
                            $("#participante1").show();
                            $("#tel1").show();
                            $("#correo1").show();
                            $("#descripcion").text("Descripción de la Empresa");
                            $("#desc1").show();
                            $("#clientes1").show();
                            $("#desc").attr('required','true');
                            $("#clientes").attr('required','true');
                            $("#parrafo").show();
                        }
                        
                        console.log(tipo);
                        $("#NEmpresa").text("Nombre de "+tipo);
                    }
                    else
                    {
                        $("#NombreEmpresa1").hide();
                        $("#localildad1").hide();
                        $("#participante1").hide();
                        $("#tel1").hide();
                        $("#correo1").hide();
                        $("#desc1").hide();
                        $("#clientes1").hide();
                    }
                });
            });
        </script>
    </head>
    <body>
        <div class="loader"></div>

        <!-- informacion general -->
        <div id="introduccion" class="container">
            <div class="row">
                <div class="col s12 m12 l12 xl12  z-depth-1">

                    <div class="row">
                        <div class="card-panel bw">
                            <span class="black-text center">
                                <h5 class="white-text">Información General</h5>   
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12 m12 l12 xl12">
                            <p>
                            Canacintra, BlueWolf, Gobierno del Estado y Gobierno del Municipio de Chihuahua te invitan a participar este 11 de Octubre en la Misión Comercial Navarra 2018 se llevará a cabo en el Centro de Convenciones Chihuahua, en donde podrás encontrar empresas provenientes de Navarra España, el objetivo principal es crear alianzas estratégicas con empresarios Chihuahuenses que estén interesados en participar y expandirse a nuevos mercados, o bien, interesados en la distribución de productos europeos en México.
                            </p>
                            <p>
                            A continuación podrás encontrar el listado de las empresas visitantes y sus áreas de interés, páginas web y experiencia de estas mismas en mercados internacionales, si estas interesado en participar y tener encuentros de negocios puedes realizar tu registro aquí mismo o comunicarte al (614) 191 11 36 con Lizbeth Martínez.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- informacion general -->

        <!-- introduccion -->
        <div id="introduccion" class="container">
            <div class="row">
                <div class="col s12 m12 l12 xl12  z-depth-1">

                    <div class="row">
                        <div class="card-panel bw">
                            <span class="black-text center">
                                <h5 class="white-text">Instrucciones</h5>   
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12 m12 l12 xl12">
                            <p>Descripción:</p>
                            <p>Aquí podrás encontrar información general de las empresas visitantes como el nombre, experiencia internacional y producto o servicio que ofrece.</p>
                            <p>Intereses:</p>
                            <p>Aquí podrás encontrar los diversos intereses que a la empresa visitante le interesa encontrar en Chihuahua.</p>
                            <p>Inscripción: </p>
                            <p>Para poder realizar tu registro es necesario que selecciones los intereses que con tu experiencia puedes ofrecer.</p>
                            <p>Además es necesario proporciones los datos que se solicitan y dar click en “Resgistrarse”.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- introduccion-->


        <?
            $count=0;
            $Consulta_espana = "SELECT * FROM espana ORDER BY orden";
            $ResultadoConsulta = mysql_query($Consulta_espana) or die("La consulta a espana : $Consulta_espana" . mysql_error());
            while ($ResConsulta = mysql_fetch_assoc($ResultadoConsulta))
            {
                $count++;
                $IdEspana = $ResConsulta['id_espana'];
        ?>
                <!-- Empresa <?echo $count;?> -->
                <div id="empresa<?echo $count;?>" class="container">

                        <!-- Nombre empresa <?echo $count;?>-->
                        <form method="post" name="formulario" id="formulario" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col s12 m12 l12 xl12  z-depth-1">

                                    <div class="row">
                                        <div class="card-panel bw">
                                            <span class="black-text center">
                                                <h5 class="white-text"><?echo $ResConsulta['nombre'];?></h5>
                                                <input type="hidden" name="idempresa" id="idempresa" value="<?echo $IdEspana;?>"> 
                                            </span>
                                        </div>
                                    </div>  

                                    <!-- Descripción -->
                                    <div class="row">
                                        <div class="col s12 m12 l6 xl6 borlef">
                                            <span class="black-text left-align">
                                                <h5>Descripción</h5>   
                                            </span>
                                        
                                            <span class="left-align">
                                                <?echo nl2br($ResConsulta['descripcion']);?>
                                            </span>
                                            <br><br>
                                            
                                            Web:<a href="http://<?echo $ResConsulta['contacto'];?>" target="_blank"><?echo nl2br($ResConsulta['contacto']);?></a>
                                                
                                           
                                        </div>
                                        
                                        <div class="col s12 m12 l6 xl5 offset-xl1">
                                            <span class="black-text left-align">
                                                <h5>Intereses</h5>   
                                            </span>

                                            <?php
                                                $CountIntereses=0;
                                                $ConsultaIntereses = "SELECT * FROM espana_intereses WHERE id_espana=$IdEspana";
                                                $ResultadoIntereses = mysql_query($ConsultaIntereses) or die("La consulta a interereses : $ConsultaIntereses" . mysql_error());
                                                while ($ResIntereses = mysql_fetch_assoc($ResultadoIntereses))
                                                {
                                                    $CountIntereses++;
                                            ?>
                                            
                                                    <p class="left-align">
                                                        <label>
                                                            <input type="checkbox" name="interes[]" id="interes" value="<?echo $ResIntereses['id_interes']?>"/>
                                                            <span>
                                                                <? echo $ResIntereses['interes'];?>
                                                            </span>
                                                        </label>
                                                    </p>
                                               
                                            <?
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <!--fin  Descripción -->
                                </div>
                            </div>
                        
                        
                </div>
                <!-- fin Empresa <?echo $count;?> -->
        <?php
            }
        ?>
        
        <!-- informacion de empresa interesada -->
        <div id="infoempresa" class="container">
            
                <div class="row">
                    <div class="col s12 m12 l12 xl12  z-depth-1">

                        <div class="row">
                            <div class="card-panel bw">
                                <span class="black-text center">
                                        <h5 class="white-text">Inscripción</h5>   
                                </span>
                            </div>
                        </div>  

                        <div class="row">
                            <!-- Tipo Empresa -->
                            <div class="col s12 m12 l6 xl6 ">
                                <div class="input-field col s12 m12 l12 xl12">
                                    <select name="TipoEmpresa" id="TipoEmpresa" class="browser-default">
                                        <option value="0">Seleccione una Opción</option>
                                        <option value="1">Empresa</option>
                                        <option value="2">Asociación</option>
                                        <option value="3">Centro de Investigación</option>
                                        <option value="4">Universidad</option>
                                        <option value="5">Dependencia</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Nombre empresa -->
                            <div class="col s12 m12 l6 xl6" id="NombreEmpresa1">
                                <div class="input-field col s12 m12 l12 xl12">
                                    <input placeholder="" name="NombreEmpresa" id="NombreEmpresa" type="text" class="validate" required>
                                    <label for="NombreEmpresa" id="NEmpresa"></label>
                                </div>
                            </div>

                            <!-- Localidad -->
                            <div class="col s12 m12 l6 xl6" id="localildad1">
                                <div class="input-field col s12 m12 l12 xl12">
                                    <input placeholder="" name="localildad" id="localildad" type="text" class="validate" required>
                                    <label for="localidad">Localildad</label>
                                </div>
                            </div>

                             <!-- Persona participante -->
                             <div class="col s12 m12 l6 xl6" id="participante1">
                                <div class="input-field col s12 m12 l12 xl12">
                                    <input placeholder="" name="participante" id="participante" type="text" class="validate" required>
                                    <label for="comercial">Nombre de Persona Participante</label>
                                </div>
                            </div>

                             <!-- Telefono -->
                             <div class="col s12 m12 l6 xl6" id="tel1">
                                <div class="input-field col s12 m12 l12 xl12">
                                    <input placeholder="" name="tel" id="tel" type="text" class="validate" required>
                                    <label for="tel">Teléfono</label>
                                </div>
                            </div>

                             <!--  Correo -->
                             <div class="col s12 m12 l6 xl6" id="correo1">
                                <div class="input-field col s12 m12 l12 xl12">
                                    <input placeholder="" name="correo" id="correo" type="text" class="validate" required>
                                    <label for="correo">Correo Electrónico</label>
                                </div>
                            </div>

                            <!-- clientes -->
                            <div class="col s12 m12 l6 xl6" id="clientes1">
                                <div class="input-field col s12 m12 l12 xl12">
                                    <textarea placeholder="" id="clientes" name="clientes" class="materialize-textarea" data-length="1000" required></textarea>
                                    <label for="clientes">Principales Clientes</label>
                                </div>
                            </div>
                            
                            <!-- Descripción de la Empresa  -->
                            <div class="col s12 m12 l6 xl6" id="desc1">
                                <div class="input-field col s12 m12 l12 xl12">
                                    <textarea placeholder="" id="desc" name="desc" class="materialize-textarea" data-length="1000" required></textarea>
                                    <label for="desc" id="descripcion">Descripción de la Empresa</label>
                                    <p style="font-size:10px;" id="parrafo">(Área de actividad, áreas de conocimiento, capacidades, experiencia previa internacional, descripción de productos/Servicios)</p>
                                </div>
                            </div>

                        </div>  

                        <div class="row">
                                <div class="input-field col s12 m12 l6 xl6 offset-xl5">
                                    <input type="submit" value="Registrarse" name="registro" id="registro" class="btn  blue darken-2">
                                </div>
                        </div>

                    </div>                
                </div>
            </form> 
        </div>
        <!-- fin de informacion de empresa interesada -->
        <footer class="page-footer white">
                <div class="container">
                    <div class="row">
                        <div class="col s12 m12 l12 xl12">
                            <div class="col s6 m3 l2 xl2">
                                <img src="images/imeanticipa.png" class="responsive-img">
                            </div>
                            <div class="col s6 m2 l2 xl2 offset-xl1">
                                <img src="images/bw.png" class="responsive-img">
                            </div>
                            
                            <!-- <div class="col s8 m3 l3 xl3">
                                <img src="images/salle.png" class="responsive-img">
                            </div> -->
                            <div class="col s4 m2 l3 xl1 offset-xl1">
                                <img src="images/canacintrap.png" class="responsive-img">
                            </div>
                            <div class="col s8 m2 l1 xl1 offset-xl1">
                                <img src="images/valor.jpeg" class="responsive-img">
                            </div>
                            <div class="col s8 m4 l2 xl2 offset-xl1">
                                <img src="images/logodesarrolloeconomico2.jpg" class="responsive-img">
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
                        <div class="col s12 m12 l12 xl12 offset-l4 offset-xl4">
                        <a class="black-text text-lighten-4" style="margin-left:50%;" href="http://www.bluewolf.com.mx/Internacionalizacion/privacidad.pdf" target="_blank" >Privacidad</a>
                        </div>
                        
                    </div>
                </div>
            </footer>
        </div>
        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript" src="js/initialize.js"></script>
    </body>
</html>