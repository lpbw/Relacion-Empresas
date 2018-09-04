<?php
    include "coneccion.php";
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
        <title>Document</title>
        <style>
            html, body, .block {
                height: 100%;
            }
            nav ul li a:hover, nav ul li a.active {
                background-color: rgba(0,0,0,.1);
            }
            footer {
                padding-left: 0;
            }
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
    </style>
    </head>
    <body>
        <?
            $count=0;
            $Consulta_espana = "SELECT * FROM espana";
            $ResultadoConsulta = mysql_query($Consulta_espana) or die("La consulta a espana : $Consulta_espana" . mysql_error());
            while ($ResConsulta = mysql_fetch_assoc($ResultadoConsulta))
            {
                $count++;
                $IdEspana = $ResConsulta['id_espana'];
        ?>
            <div id="interes<?echo $count?>" class="block blue">
                <nav class="pushpin-demo-nav" data-target="blue">
                    <div class="nav-wrapper bw">
                        <div class="container">
                            <a href="#" class="brand-logo center">Blue</a>
                        </div>
                    </div>
                </nav>
            </div>
        <?
            }
        ?>

        <div id="red" class="block red lighten-1">
            <nav class="pushpin-demo-nav" data-target="red">
                <div class="nav-wrapper bw">
                <div class="container">
                    <a href="#" class="brand-logo">Red</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="#!">Red Link 1</a></li>
                    <li><a href="#!">Red Link 2</a></li>
                    <li><a href="#!">Red Link 3</a></li>
                    </ul>
                </div>
                </div>
            </nav>
        </div>
    </body>
</html>