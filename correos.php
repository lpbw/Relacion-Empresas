<?
    include "coneccion.php";
    $Body = "<b>¡Has concluido tu registro a Misión Comercial Navarra - Chihuahua 2018!</b> <br><br>";
            $Body .= "Te recordamos que el día 11 de Octubre te esperamos en la Expo Industrial que se llevará a cabo en el Centro de Convenciones y Exposiciones de Chihuahua, seguiremos en contacto contigo para hacerte llegar los horarios de las entrevistas para que puedas conocer a las empresas de tu interés. <br><br>";
            $Body .= "Cualquier duda no dudes en comunicarte con Lizbeth Martínez al (614) 191 11 36 ó enviar correo a liz.martinez@bluewolf.com.mx";
            $Cabeceras = "From: <info@bluewolf.com.mx> \r\n";
            $Cabeceras .= "Bcc: liz.martinez@bluewolf.com.mx,luis.perez@bluewolf.com.mx \r\n";
            $Cabeceras .= "Content-type: text/html; charset=UTF-8 \r\n";
            mail("carlosespinoe@gmail.com","Misión Comercial Navarra",$Body,$Cabeceras);
?>