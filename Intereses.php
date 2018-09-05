<?php
    include "coneccion.php";
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
                            Canacintra, BlueWolf, Gobierno del Estado y Gobierno del Municipio de Chihuahua te invitan a participar este 11 de Octubre en la Misión Comercial Navarra 2018 se llevará a cabo en el Centro de Convenciones Chihuahua, en donde podrás encontrar empresas provenientes de Navarra España, en donde el objetivo principal es crear alianzas estratégicas con empresarios Chihuahuenses que estén interesados en participar y expandirse a nuevos mercados, o bien, interesados en la distribución de productos europeos en México.
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
                        <form method="post" name="form<?echo $count;?>" id="form<?echo $count;?>">
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
                                                            <input type="checkbox" name="interes[]" id="interes<?echo $CountIntereses?>"/>
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
                        </form>
                        
                </div>
                <!-- fin Empresa <?echo $count;?> -->
        <?php
            }
        ?>
        
        <!-- informacion de empresa interesada -->
        <div id="infoempresa" class="container">
            <form method="post" name="empresainteresada" id="empresainteresada">
                <div class="row">
                    <div class="col s12 m12 l12 xl12  z-depth-1">

                        <div class="row">
                            <div class="card-panel bw">
                                <span class="black-text center">
                                        <h5 class="white-text">Requerimientos de inscripción</h5>   
                                </span>
                            </div>
                        </div>  

                        <div class="row">
                            <!-- Nombre Empresa -->
                            <div class="col s12 m12 l6 xl6 borlef">
                                <div class="input-field col s12 m12 l12 xl12">
                                    <input placeholder="" name="nombre" id="nombre" type="text" class="validate" required>
                                    <label for="nombre">Nombre Empresa</label>
                                </div>
                            </div>

                            <!-- Nombre Comercial -->
                            <div class="col s12 m12 l6 xl6">
                                <div class="input-field col s12 m12 l12 xl12">
                                    <input placeholder="" name="comercial" id="comercial" type="text" class="validate" required>
                                    <label for="comercial">Nombre Comercial</label>
                                </div>
                            </div>

                            <!-- Localidad -->
                            <div class="col s12 m12 l6 xl6 borlef">
                                <div class="input-field col s12 m12 l12 xl12">
                                    <input placeholder="" name="localildad" id="localildad" type="text" class="validate" required>
                                    <label for="comercial">Localildad</label>
                                </div>
                            </div>

                             <!-- Persona participante -->
                             <div class="col s12 m12 l6 xl6">
                                <div class="input-field col s12 m12 l12 xl12">
                                    <input placeholder="" name="participante" id="participante" type="text" class="validate" required>
                                    <label for="comercial">Nombre De Persona participante</label>
                                </div>
                            </div>

                             <!-- Telefono -->
                             <div class="col s12 m12 l6 xl6 borlef">
                                <div class="input-field col s12 m12 l12 xl12">
                                    <input placeholder="" name="tel" id="tel" type="text" class="validate" required>
                                    <label for="comercial">Teléfono</label>
                                </div>
                            </div>

                             <!--  Correo -->
                             <div class="col s12 m12 l6 xl6">
                                <div class="input-field col s12 m12 l12 xl12">
                                    <input placeholder="" name="correo" id="correo" type="text" class="validate" required>
                                    <label for="comercial">Correo Electrónico</label>
                                </div>
                            </div>

                            <!-- clientes -->
                            <div class="col s12 m12 l6 xl6 borlef">
                                <div class="input-field col s12 m12 l12 xl12">
                                    <textarea placeholder="" id="clientes" name="clientes" class="materialize-textarea" data-length="1000" required></textarea>
                                    <label for="clientes">Principales Clientes</label>
                                </div>
                            </div>
                            
                            <!-- Descripción de la Empresa  -->
                            <div class="col s12 m12 l6 xl6">
                                <div class="input-field col s12 m12 l12 xl12">
                                    <textarea placeholder="" id="desc" name="desc" class="materialize-textarea" data-length="1000" required></textarea>
                                    <label for="desc">Descripción de la Empresa</label>
                                    <p>(Área de actividad, áreas de conocimiento, capacidades, experiencia previa internacional, descripción de productos/Servicios)</p>
                                </div>
                            </div>

                        </div>  

                        <div class="row">
                                <div class="input-field col s12 m12 l6 xl6 offset-xl5">
                                <input type="submit" value="Registrarse" name="registro" id="registro" class="btn  blue darken-2" onClick="return guarda('<? echo $id;?>');">
                                </div>
                        </div>

                    </div>                
                </div>
            </form> 
        </div>
        <!-- fin de informacion de empresa interesada -->

        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript" src="js/initialize.js"></script>
    </body>
</html>