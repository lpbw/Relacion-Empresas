<?
    include "coneccion.php";    
    header('Pragma: public');
    header('Expires: 0');
    //header('Content-type: application/x-msdownload');
    header('Content-Disposition: attachment;filename=EmpresasInternacionalizacion.xls');
    header('Pragma: no-cache');
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
                    <th>Correo</th>
                    <th>Empresa</th>
                    <th>Razon social</th>
                    <th>Nombre comercial</th>
                    <th>Tipo persona</th>
                    <th>Calle y numero</th>
                    <th>Colonia</th>
                    <th>codigo postal</th>
                    <th>Ciudad</th>
                    <th>Estado</th>
                    <th>RFC</th>
                    <th>Contacto 1</th>
                    <th>Telefono 1</th>
                    <th>correo 1</th>
                    <th>Contacto 2</th>
                    <th>Telefono 2</th>
                    <th>Correo 2</th>
                    <th>Respuesta</th>
                    <th>Inicio de operaciones</th>
                    <th>Sector</th>
                    <th>Giro</th>
                    <th>Descripcion producto</th>
                    <th>Materia prima</th>
                    <th>Proveedor</th>
                    <th>Origen</th>
                    <th>Cliente Principal</th>
                    <th>sucursales o unidades de negocio</th>
                    <th>Cuales</th>
                    <th>Utilidad bruta</th>
                    <th>Utilidad de Operación</th>
                    <th>Utilidad Neta</th>
                    <th>Apalancamiento Financiero</th>
                    <th>Ventas anuales 2015</th>
                    <th>Ventas anuales 2016</th>
                    <th>Ventas anuales 2017</th>
                    <th>EBITDA 2015</th>
                    <th>EBITDA 2016</th>
                    <th>EBITDA 2017</th>
                    <th>Efectivo Generado 2015</th>
                    <th>Efectivo Generado 2016</th>
                    <th>Efectivo Generado 2017</th>
                    <th>Superficie Terreno</th>
                    <th>Metros cuadrados de construcción</th>
                    <th>Capacidad Disponible</th>
                    <th>¿Cuenta con capacidad para expandir su infraestructura?</th>
                    <th>¿Esa posible expansión en que % aumentaría su capacidad?</th>
                    <th>¿Cuenta con alguna certificación?</th>
                    <th>¿Con cuál certificación cuenta?</th>
                    <th>¿Cuenta con algún premio o reconocimiento?</th>
                    <th>¿Con cuál premio o reconocimiento cuenta?</th>
                    <th>¿Cuenta con tecnología limpia en su empresa?</th>
                    <th>Menciona cuales</th>
                    <th>Administración/Finanzas</th>
                    <th>Software Administración/Finanzas</th>
                    <th>Inventarios</th>
                    <th>Software Inventarios</th>
                    <th>Compras</th>
                    <th>Software Compras</th>
                    <th>Ventas</th>
                    <th>Software ventas</th>
                    <th>Producción</th>
                    <th>Software Producción</th>
                    <th>Calidad</th>
                    <th>Software Calidad</th>
                    <th>Otro</th>
                    <th>Software Otros</th>
                    <th>¿Cuenta con algún otro tipo de Tecnología de la Información y Comunicación en su empresa?</th>
                    <th>Núm. Total de Colaboradores</th>
                    <th>Atraer colaboradores en su empresa es</th>
                    <th>Retener a los colaboradores en su empresa es</th>
                    <th>Administrar colaboradores en su empresa es</th>
                    <th>¿Ha tenido experiencia exportando?</th>
                    <th>¿Por qué razón no lo ha hecho ?</th>
                    <th>¿A qué lugar ha exportado su producto y/o servicio?</th>
                    <th>país para exportar</th>
                    <th>¿Actualmente sigue exportando?</th>
                    <th>¿Cuál ha sido su mayor reto al exportar?</th>
                    <th>¿De su capacidad actual, que % podría destinar a exportación?</th>
                    <th>¿Cuál es su mayor motivación para internacionalizar su empresa?</th>
                    <th>¿Cómo te enteraste del PIEC 2018?</th>
                    <th>Otros</th>
                </thead>
                <tbody>
                <?
                    $query = "SELECT * FROM internacionalizacion";
                    $resultado = mysql_query($query) or die("no funciono query: $query".mysql_error());
                    while ($res = mysql_fetch_assoc($resultado)) 
                    {
                        if ($res['pfisica'] == 1 && $res['pmoral'] == 0) {
                            $tipopersona = "Persona fisica";
                        }elseif ($res['pmoral'] == 1 && $res['pfisica'] == 0) {
                            $tipopersona = "Persona moral";
                        }elseif ($res['pmoral'] == 0 && $res['pfisica'] == 0) {
                            $tipopersona = "Sin respuesta";
                        }
                ?>
                    <tr>
                        <td><? echo $res['nombre']; ?></td>
                        <td><? echo $res['empresa']; ?></td>
                        <td><? echo $res['rsocial']; ?></td>
                        <td><? echo $res['ncomercial']; ?></td>
                        <td><? echo $tipopersona; ?></td>
                        <td><? echo $res['callenumero']; ?></td>
                        <td><? echo $res['colonia']; ?></td>
                        <td><? echo $res['cp']; ?></td>
                        <td><? echo $res['ciudad']; ?></td>
                        <td><? echo $res['estado']; ?></td>
                        <td><? echo $res['rfc']; ?></td>
                        <td><? echo $res['contacto1']; ?></td>
                        <td><? echo $res['tel1']; ?></td>
                        <td><? echo $res['correo1']; ?></td>
                        <td><? echo $res['contacto2']; ?></td>
                        <td><? echo $res['tel2']; ?></td>
                        <td><? echo $res['correo2']; ?></td>
                        <td><? echo $res['respuesta']; ?></td>
                        <td><? echo $res['iniciooperacion']; ?></td>
                        <td><? echo $res['sector']; ?></td>
                        <td><? echo $res['giro']; ?></td>
                        <td><? echo $res['descprod']; ?></td>
                        <td><? echo $res['matprima']; ?></td>
                        <td><? echo $res['proveedor']; ?></td>
                        <td><? echo $res['origen']; ?></td>
                        <td><? echo $res['principalcliente']; ?></td>
                        <td><? echo $res['ressucuni']; ?></td>
                        <td><? echo $res['sucuni']; ?></td>
                        <td><? echo $res['utilbruta']; ?></td>
                        <td><? echo $res['utiloperacion']; ?></td>
                        <td><? echo $res['utilneta']; ?></td>
                        <td><? echo $res['apafinanciero']; ?></td>
                        <td><? echo $res['venta1']; ?></td>
                        <td><? echo $res['venta2']; ?></td>
                        <td><? echo $res['venta3']; ?></td>
                        <td><? echo $res['ebitda1']; ?></td>
                        <td><? echo $res['ebitda2']; ?></td>
                        <td><? echo $res['ebitda3']; ?></td>
                        <td><? echo $res['efectivo1']; ?></td>
                        <td><? echo $res['efectivo2']; ?></td>
                        <td><? echo $res['efectivo3']; ?></td>
                        <td><? echo $res['superficie']; ?></td>
                        <td><? echo $res['contruccion']; ?></td>
                        <td><? echo $res['capacidad']; ?></td>
                        <td><? echo $res['resexpandir']; ?></td>
                        <td><? echo $res['posiblexpansion']; ?></td>
                        <td><? echo $res['rescertificado']; ?></td>
                        <td><? echo $res['certificados']; ?></td>
                        <td><? echo $res['respremios']; ?></td>
                        <td><? echo $res['premios']; ?></td>
                        <td><? echo $res['teclimpia']; ?></td>
                        <td><? echo $res['cualesteclimpia']; ?></td>
                        <td><? echo $res['tienesoftadmin']; ?></td>
                        <td><? echo $res['admsoft']; ?></td>
                        <td><? echo $res['tienesifinve']; ?></td>
                        <td><? echo $res['invesoft']; ?></td>
                        <td><? echo $res['tienesoftcompras']; ?></td>
                        <td><? echo $res['comprassoft']; ?></td>
                        <td><? echo $res['tienesoftventas']; ?></td>
                        <td><? echo $res['ventassoft']; ?></td>
                        <td><? echo $res['tienesoftprod']; ?></td>
                        <td><? echo $res['prodsoft']; ?></td>
                        <td><? echo $res['tienesoftcalidad']; ?></td>
                        <td><? echo $res['calidadsoft']; ?></td>
                        <td><? echo $res['tienesoftotro']; ?></td>
                        <td><? echo $res['otrosoft']; ?></td>
                        <td><? echo $res['otrastics']; ?></td>
                        <!-- <td><? echo $res['automatisacion']; ?></td> -->
                        <td><? echo $res['ncolaboradores']; ?></td>
                        <td><? echo $res['atraercolaboradores']; ?></td>
                        <td><? echo $res['retenercolaboradores']; ?></td>
                        <td><? echo $res['admincolaboradores']; ?></td>
                        <td><? echo $res['expexportando']; ?></td>
                        <td><? echo $res['noexporta']; ?></td>
                        <td><? echo $res['lugarexporta']; ?></td>
                        <td><? echo $res['paisexporta']; ?></td>
                        <td><? echo $res['sigueexporta']; ?></td>
                        <td><? echo $res['mayorreto']; ?></td>
                        <td><? echo $res['porcentajeexporta']; ?></td>
                        <!-- <td><? echo $res['razongustaexpo']; ?></td> -->
                        <td><? echo $res['motivacion']; ?></td>
                        <td><? echo $res['enteraste']; ?></td>
                        <td><? echo $res['otrores']; ?></td>
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