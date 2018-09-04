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
        <!-- <div class="row">
            <div class="col s7 m7 l2 x2 offset-l2 offset-xl2">
                <img src="images/piec.jpg" class="responsive-img">
            </div>
        </div> -->
        <?
            $count=0;
            $Consulta_espana = "SELECT * FROM espana ORDER BY id_espana";
            $ResultadoConsulta = mysql_query($Consulta_espana) or die("La consulta a espana : $Consulta_espana" . mysql_error());
            while ($ResConsulta = mysql_fetch_assoc($ResultadoConsulta))
            {
                $count++;
                $IdEspana = $ResConsulta['id_espana'];
        ?>
                <!-- Empresa <?echo $count;?> -->
                <div id="empresa<?echo $count;?>" class="">

                        <!-- Nombre empresa <?echo $count;?>-->
                        <form method="post" name="form<?echo $count;?>" id="form<?echo $count;?>">
                            <div class="row">
                                <div class="col s12 m12 l12 xl12  z-depth-1">

                                    <div class="row">
                                        <div class="card-panel bw">
                                            <span class="black-text center">
                                                <h5 class="white-text"><?echo $ResConsulta['nombre'];?></h5>   
                                            </span>
                                        </div>
                                    </div>  

                                    <!-- productos -->
                                    <div class="row">
                                        <div class="col s12 m12 l6 xl6 borlef">
                                            <span class="black-text left-align">
                                                <h5>Descripción</h5>   
                                            </span>
                                        
                                            <span class="left-align">
                                                <?echo nl2br($ResConsulta['descripcion']);?>
                                            </span>
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
                                    <!--fin  productos -->
                                </div>
                            </div>
                        </form>
                        
                </div>
                <!-- fin Empresa <?echo $count;?> -->
        <?php
            }
        ?>
        
        <!-- informacion de empresa interesada -->
        <div id="infoempresa" class="">
            <form method="post" name="empresainteresada" id="empresainteresada">
                <div class="row">
                    <div class="col s12 m12 l12 xl12  z-depth-1">

                        <div class="row">
                            <div class="card-panel bw">
                                <span class="black-text center">
                                        <h5 class="white-text">Informacion necesaria</h5>   
                                </span>
                            </div>
                        </div>  

                        <div class="row">
                            <div class="col s12 m12 l6 xl6 borlef">
                                <!-- Nombre Empresa -->
                                <div class="input-field col s12 m12 l12 xl12">
                                    <input name="nombre" id="nombre" type="text" class="validate" required>
                                    <label for="nombre">Nombre Empresa</label>
                                </div>
                            </div>

                            <div class="col s12 m12 l6 xl6">
                                <!-- Nombre Comercial -->
                                <div class="input-field col s12 m12 l12 xl12">
                                    <input name="comercial" id="comercial" type="text" class="validate" required>
                                    <label for="comercial">Nombre Comercial</label>
                                </div>
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