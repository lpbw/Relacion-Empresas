<?
    include "coneccion.php";
    $query = "SELECT contacto1,empresa,nombre FROM internacionalizacion";
    $respuesta = mysql_query($query) or die('error: $query'.mysql_error());
    $count=0;
    while ($res = mysql_fetch_assoc($respuesta)) 
    {
        $count++;
        $correo1 = $res['nombre'];
            $empresa1 = $res['empresa'];
            $contacto = $res['contacto1'];
            //convierte a minusculas y capitalize primera en mayuscula.
            $nombrecontacto = ucwords(strtolower($contacto));
            //correo
            $body = "<b>¡Hola $nombrecontacto! </b> <br><br>";
            $body .= "Nos acercamos cada vez más a la etapa final de la selección de empresas participantes, agradecemos nuevamente tu interés de participar y formar parte de este proyecto, te recordamos que el proceso de selección esta conformado por 2 etapas, por lo que te invitamos a concluir con tu registro. <br><br>";
            $body .= "Puedes ingresar en la siguiente liga: www.bluewolf.com.mx/Internacionalizacion/ en donde podrás dar un click en Paso 2 “Completar Ficha Técnica” <br><br>";
            $body .= "Si tienes una duda o comentario no dudes en comunicarte con Lucy Barrera al 439 07 70. <br><br>";
            $body .="<br><img src=\"http://www.bluewolf.com.mx/Internacionalizacion/images/piec.jpg\" width=\"400\" height=\"200\">";
            $cabeceras = "From: <info@bluewolf.com.mx> \r\n";
            $cabeceras .= "Bcc: liz.martinez@bluewolf.com.mx,luis.perez@bluewolf.com.mx \r\n";
            $cabeceras .= "Content-type: text/html; charset=UTF-8 \r\n";
            mail($correo1,"Internacionalizacion",$body,$cabeceras);
    }
    echo "$count correos enviados";
?>