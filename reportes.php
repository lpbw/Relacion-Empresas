<?
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
        <title>Reportes-Misíon</title>
        <style>
            .bw{
                background-color:#14234b;
            }
        </style>
    </head>
    <body class="bw">
        <div class="container">
            <div class="col s11 m11 l10 xl10">
                <ul class=" collapsible white">
                    <a href="exportarintereses.php">
                        <i class="material-icons right">vertical_align_bottom</i>
                    </a>
                    <?
                        $QueryChihuahua = "SELECT * FROM chihuahua";
                        $ResultadoChihuahua = mysql_query($QueryChihuahua) or die("Falla en query: $QueryChihuahua".mysql_error());
                        while ($ResCh = mysql_fetch_assoc($ResultadoChihuahua))
                        {
                            $IdChihuahua=$ResCh['id_chih'];
                    ?>
                            <li>
                                <div class="collapsible-header"><i class="material-icons">business</i><?echo $ResCh['nombre'];?></div>
                                <?
                                    $QueryIntereses = "SELECT ei.interes AS Interes,e.nombre AS Empresa FROM espana_chihuahua ech JOIN espana_intereses ei ON ech.id_interes=ei.id_interes JOIN espana e ON ei.id_espana=e.id_espana WHERE ech.id_chih=$IdChihuahua";
                                    $ResultadoIntereses = mysql_query($QueryIntereses) or die("Falla en query: $QueryIntereses".mysql_error());
                                    while($ResInt = mysql_fetch_assoc($ResultadoIntereses))
                                    {
                                ?>
                                    <div class="collapsible-body"><span>Empresa: <?echo $ResInt['Empresa'];?></span><br><span>Interes: <?echo $ResInt['Interes'];?></span></div>
                                <?
                                    }
                                ?>
                            </li>
                    <?
                        }
                    ?>
                </ul>
            </div>
        </div>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/initialize.js"></script>
    </body>
</html>