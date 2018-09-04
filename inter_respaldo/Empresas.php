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
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <title>Empresas Registradas</title>
        <script type="text/javascript">
	        var int=self.setInterval("refresh()",30000);
            function refresh()
            {
                location.reload(true);
            }
        </script>
</head>
<body>
    <div class="container">
        <div class="col s12 m12 l12 xl12 z-depth-2">
            <table class="striped center">
                <thead>
                    <th>Corréo</th>
                    <th>Empresa</th>
                    <th><a href="exportar.php">Exportar Empresas</a></th>
                </thead>
                <tbody>
                <?
                    $query = "SELECT nombre,empresa FROM internacionalizacion";
                    $resultado = mysql_query($query) or die("no funciono query: $query".mysql_error());
                    while ($res = mysql_fetch_assoc($resultado)) 
                    {
                ?>
                    <tr>
                        <td><? echo $res['nombre']; ?></td>
                        <td><? echo $res['empresa']; ?></td>
                    </tr>
                <?
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/initialize.js"></script>
</body>
</html>