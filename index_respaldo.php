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
        <title>Encuesta</title>
        <script>
            $(document).ready(function(){
                $('#iniciar').click(function(){
                    var nombre = $('#nombre').val();
                    var empresa = $('#empresa').val();
                    var valida = 0;
                    if (empresa == '')
                    {
                        alert('Porfavor llene el campo empresa');
                        $('#empresa').focus();
                    }else
                    {
                        valida++;
                    }
                    if (nombre == '')
                    {
                        alert('Porfavor llene el campo nombre');
                        $('#nombre').focus();
                    }else
                    {
                        valida++;
                    }

                    if (valida == 2) 
                    {
                        var fd = new FormData(document.getElementById("forminiciar"));
                        fd.append('empresa',empresa);
                        fd.append('nombre',nombre);
                        $.ajax({
                                data:  fd,
                                url:   'GuardarDatosGenerales.php?var=1',
                                type:  'post',
                                cache: false,
                                contentType: false,
                                processData: false,
                                beforeSend: function () {
                                
                            },
                                success:  function (response) {
                                    location.href='DatosGenerales.php?id=2&f='+response;
                                }
                        }); 
                    }
                    
                });
            });
        </script>
    </head>
    <body>
        <!-- contenedor -->
        <div>
            <div class="row">
                <div class="col s12 m12 l8 xl8 offset-l2 offset-xl2">
                    <div class="card-panel white z-depth-0">
                        <span class="black-text center">
                            <h4 class="center"><b>Bienvenido</b></h4>
                             <h5 class="center"><b>PIEC 2018: Programa de Internacionalización de Empresas Chihuahuenses</b></h5>
                             <br>
                            <p class="center">¡Regístrate aquí!</p>
                        </span>
                    </div>
                </div>
            </div>

            <form method="post" name="forminiciar" id="forminiciar">
                <div class="row">
                    <div class="col s12 m12 l8 xl8 offset-l2 offset-xl2 z-depth-1">

                        <div class="row">
                            <!-- Empresa -->
                            <div class="input-field col s4 offset-s4">
                                <input name="empresa" id="empresa" type="text" class="validate" require>
                                <label for="empresa">Empresa</label>
                            </div> 
                        </div>
                        
                        <div class="row">
                          
                            <div class="input-field col s4 offset-s4">
                                <input name="nombre" id="nombre" type="text" class="validate" require>
                                <label for="nombre">Correo</label>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="input-field col s4 offset-s5">
                                <input type="button" value="INICIAR" name="iniciar" id="iniciar" class="btn  red darken-4 center" style="margin-left:10%;">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
            <footer class="page-footer white">
            <div class="container">
                <div class="row">
                <div class="col l4 s12 xl3">
                        <img src="images/canacintra.png" alt="" width="110" height="70" style="margin-left:3%;">
                    </div>
                    <div class="col l4 s12 xl3">
                        <img src="images/bw.png" alt="" width="130" height="63" >
                    </div>
                    <div class="col l4 s12 xl3">
                        <img src="images/imeanticipa.png" alt="" width="130" height="43" style="margin-top:3%;">
                    </div>
                    <div class="col l4 s12 xl3">
                        <img src="images/salle.png" alt="" width="200" height="63">
                    </div>
                    <div class="col l4 s12 xl4">
                        <img src="images/side.jpg" alt="" width="150" height="150" style="margin-left:0%">
                    </div>
                    <div class="col l4 s12 xl4">
                        <img src="images/logodesarrolloeconomico.jpeg" alt="" width="180" height="90" style="margin-top:6%;margin-left:-30%;">
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
        </div>
            
        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript" src="js/initialize.js"></script>
    </body>
</html>