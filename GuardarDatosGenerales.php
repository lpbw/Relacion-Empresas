<?
    include "coneccion.php";
    $var = $_GET['var'];
    /*
    var=1: index.php
    var=2: datosgenerales
    */
    switch ($var) {
        // inicio
        case '1':
        $empresa = $_POST['empresa'];
        $nombre = $_POST['nombre'];

        $buscar = "SELECT id FROM internacionalizacion WHERE nombre='$nombre' AND empresa='$empresa'";
        $resbuca = mysql_query($buscar) or die("La consulta en var=1 : $buscar" . mysql_error());
        if ($res = mysql_fetch_assoc($resbuca)) {
            $id = $res['id'];
        }
        else{
            $query = "INSERT INTO internacionalizacion(";
            $query .= "nombre,";
            $query .= "empresa,";
            $query .= "rsocial,";
            $query .= "ncomercial,";
            $query .= "pfisica,";
            $query .= "pmoral,";
            $query .= "callenumero,";
            $query .= "colonia,";
            $query .= "cp,";
            $query .= "ciudad,";
            $query .="estado,";
            $query .= "rfc)";
            $query .= "VALUES('$nombre','$empresa','','',0,0,'','','','','','')";
            $resultado = mysql_query($query) or die("La consulta en var=1 : $query" . mysql_error());
            $id = mysql_insert_id();
            
            // for ($i=1; $i <=3 ; $i++) { 
            // $queryin = "INSERT INTO industrial(id_inter,materiaprima,proveedor,origen)VALUES($id,'','','')";
            // $resultadoin = mysql_query($queryin) or die("La consulta en var=1 : $queryin" . mysql_error());
            // }
        }
        echo $id;
            break;
        // datos generales
        case '2':
        $rsocial = $_POST['razonsocial'];
        $ncomercial = $_POST['nombrecomercial'];
        $pfisica = $_POST['pfisica'];
        $pmoral = $_POST['pmoral'];
        $callenumero = $_POST['callenumero'];
        $colonia = $_POST['colonia'];
        $cp = $_POST['codigopostal'];
        $ciudad = $_POST['ciudad'];
        $estado = $_POST['estado'];
        $rfc = $_POST['rfc'];
        $id = $_POST['id'];

        $query = "UPDATE internacionalizacion SET ";
        $query .= "rsocial='$rsocial', ";
        $query .= "ncomercial='$ncomercial', ";
        $query .= "pfisica='$pfisica', ";
        $query .= "pmoral='$pmoral', ";
        $query .= "callenumero='$callenumero', ";
        $query .= "colonia='$colonia', ";
        $query .= "cp='$cp', ";
        $query .= "ciudad='$ciudad', ";
        $query .= "estado='$estado', ";
        $query .= "rfc='$rfc' ";
        $query .= "WHERE id=$id";
        $resultado = mysql_query($query) or die("La consulta en var=2 : $query" . mysql_error());
        echo 'true';
            break;

        // contactos
        case '3':
        $contacto1 = $_POST['contacto1'];
        $tel1 = $_POST['tel1'];
        $correo1 = $_POST['correo1'];
        $contacto2 = $_POST['contacto2'];
        $tel2 = $_POST['tel2'];
        $correo2 = $_POST['correo2'];
        $id = $_POST['id'];

        $query = "UPDATE internacionalizacion SET ";
        $query .= "contacto1='$contacto1', ";
        $query .= "tel1='$tel1', ";
        $query .= "correo1='$correo1', ";
        $query .= "contacto2='$contacto2', ";
        $query .= "tel2='$tel2', ";
        $query .= "correo2='$correo2' ";
        $query .= "WHERE id=$id";
        $resultado = mysql_query($query) or die("La consulta en var=3 : $query" . mysql_error());
        echo 'true';
            break;

        // respuesta
        case '4':
        $respuesta = $_POST['respuesta'];
        $id = $_POST['id'];

        $query = "UPDATE internacionalizacion SET ";
        $query .= "respuesta='$respuesta' ";
        $query .= "WHERE id=$id";
        $resultado = mysql_query($query) or die("La consulta en var=4 : $query" . mysql_error());
        echo 'true';
            break;

         // operacion
        case '5':
        $operacion = $_POST['operacion'];
        $sector = $_POST['sector'];
        $giro = $_POST['giro'];
        $desc = $_POST['desc'];
        $pclientes = $_POST['pclientes'];
        $materia = $_POST['materia'];
        $proveedor = $_POST['proveedor'];
        $origen = $_POST['origen'];
        $sucuni = $_POST['suc'];
        $respuesta = $_POST['respuesta'];
        $id = $_POST['id'];

            $querydelete = "DELETE FROM industrial WHERE id_inter=$id";
            $resultado = mysql_query($querydelete) or die("La consulta borrar en var=5 : $querydelete" . mysql_error());
            $count=0;

         foreach ($materia as $m) {
            $p = $proveedor[$count];
            $o = $origen[$count];
            $queryin = "INSERT INTO industrial(id_inter,materiaprima,proveedor,origen)VALUES($id,'$m','$p','$o')";
            $resultado = mysql_query($queryin) or die("La consulta insert en var=5 : $queryin" . mysql_error());
            $count++;
         }
        
        

        $query = "UPDATE internacionalizacion SET ";
        $query .= "iniciooperacion='$operacion', ";
        $query .= "sector='$sector', ";
        $query .= "giro='$giro', ";
        $query .= "descprod='$desc', ";
        $query .= "principalcliente='$pclientes', ";
        $query .= "ressucuni='$respuesta', ";
        $query .= "sucuni='$sucuni' ";
        $query .= "WHERE id=$id";
        $resultado = mysql_query($query) or die("La consulta en var=5 : $query" . mysql_error());
        echo $p;
            break;  

            // informacion financiera
        case '6':
        $operacion = "";
        $bruta = "";
        $neta = $_POST['neta'];
        $financiero = $_POST['financiero'];
        $a1 = $_POST['a1'];
        $a2 = $_POST['a2'];
        $a3 = $_POST['a3'];
        $a4 = '';
        $b1 = $_POST['b1'];
        $b2 = $_POST['b2'];
        $b3 = $_POST['b3'];
        $c1 = $_POST['c1'];
        $c2 = $_POST['c2'];
        $c3 = $_POST['c3'];
        $id = $_POST['id'];

        $query = "UPDATE internacionalizacion SET ";
        $query .= "utilbruta='$bruta', ";
        $query .= "utiloperacion='$operacion', ";
        $query .= "utilneta='$neta', ";
        $query .= "apafinanciero='$financiero', ";
        $query .= "venta1='$a1', ";
        $query .= "venta2='$a2', ";
        $query .= "venta3='$a3', ";
        $query .= "venta4='$a4', ";
        $query .= "ebitda1='$b1', ";
        $query .= "ebitda2='$b2', ";
        $query .= "ebitda3='$b3', ";
        $query .= "efectivo1='$c1', ";
        $query .= "efectivo2='$c2', ";
        $query .= "efectivo3='$c3' ";
        $query .= "WHERE id=$id";
        $resultado = mysql_query($query) or die("La consulta en var=6 : $query" . mysql_error());
        echo 'true';
            break;

             // operacion
        case '7':
        $superficie = "";
        $construccion = "";
        $capacidad = $_POST['capacidad'];
        $expansion = $_POST['expansion'];
        $respuesta = $_POST['respuesta'];
        $id = $_POST['id'];

        $query = "UPDATE internacionalizacion SET ";
        $query .= "superficie='$superficie', ";
        $query .= "construccion='$construccion', ";
        $query .= "capacidad='$capacidad', ";
        $query .= "respexpandir='$respuesta', ";
        $query .= "posibleexpansion='$expansion' ";
        $query .= "WHERE id=$id";
        $resultado = mysql_query($query) or die("La consulta en var=7 : $query" . mysql_error());
        echo "true";
            break;
            
             // operacion
        case '8':
        $certifica = $_POST['certifica'];
        $premio = $_POST['premio'];
        $respuesta = $_POST['respuesta'];
        $respuesta2 = $_POST['respuesta2'];
        $id = $_POST['id'];

        $query = "UPDATE internacionalizacion SET ";
        $query .= "rescertificado='$respuesta', ";
        $query .= "certificados='$certifica', ";
        $query .= "respremios='$respuesta2', ";
        $query .= "premios='$premio' ";
        $query .= "WHERE id=$id";
        $resultado = mysql_query($query) or die("La consulta en var=8 : $query" . mysql_error());
        echo $resultado;
            break;

             // tecnologia
        case '9':
        $teclimpia = $_POST['teclimpia'];
        $cualesteclimpia = $_POST['cualesteclimpia'];
        $admin = $_POST['admin'];
        $admsoft = $_POST['admsoft'];
        $inv = $_POST['inv'];
        $invsoft = $_POST['invsoft'];
        $comp = $_POST['comp'];
        $comprasoft = $_POST['comprasoft'];
        $ventas = $_POST['ventas'];
        $ventasoft = $_POST['ventasoft'];
        $prod = $_POST['prod'];
        $prodsoft = $_POST['prodsoft'];
        $calidad = $_POST['calidad'];
        $calidadsoft = $_POST['calidadsoft'];
        $otro = $_POST['otro'];
        $restics = $_POST['restics'];
        $resauto = $_POST['resauto'];
        $otrosoft = $_POST['otrosoft'];
        $otrastics = $_POST['otrastics'];
        $automata = $_POST['automata'];
        $id = $_POST['id'];

        $query = "UPDATE internacionalizacion SET ";
        $query .= "teclimpia='$teclimpia', ";
        $query .= "cualesteclimpia='$cualesteclimpia', ";
        $query .= "tienesoftadmin='$admin', ";
        $query .= "admsoft='$admsoft', ";
        $query .= "tienesoftinve='$inv', ";
        $query .= "invesoft='$invsoft', ";
        $query .= "tienesoftcompras='$comp', ";
        $query .= "comprassoft='$comprasoft', ";
        $query .= "tienesoftventas='$ventas', ";
        $query .= "ventassoft='$ventasoft', ";
        $query .= "tienesoftprod='$prod', ";
        $query .= "prodsoft='$prodsoft', ";
        $query .= "tienesoftcalidad='$calidad', ";
        $query .= "calidadsoft='$calidadsoft', ";
        $query .= "tienesoftotro='$otro', ";
        $query .= "otrosoft='$otrosoft', ";
        $query .= "otrastics='$otrastics', ";
        $query .= "resotrastics='$restics', ";
        $query .= "resautomata='$resauto', ";
        $query .= "automatisacion='$automata' ";
        $query .= "WHERE id=$id";
        $resultado = mysql_query($query) or die("La consulta en var=9 : $query" . mysql_error());
        echo $resultado;
            break;
        
           // colaboradores
        case '10':
            $ncolaboradores = $_POST['ncolaboradores'];
            $respuesta = $_POST['respuesta'];
            $respuesta2 = $_POST['respuesta2'];
            $respuesta3 = $_POST['respuesta3'];
            $id = $_POST['id'];
    
            $query = "UPDATE internacionalizacion SET ";
            $query .= "ncolaboradores='$ncolaboradores', ";
            $query .= "atraercolaboradores='$respuesta', ";
            $query .= "retenercolaboradores='$respuesta2', ";
            $query .= "admincolaboradores='$respuesta3', ";
            $query .= "etapa=1 ";
            $query .= "WHERE id=$id";
            $resultado = mysql_query($query) or die("La consulta en var=10 : $query" . mysql_error());

            $query1 = "SELECT empresa,nombre,contacto1 FROM internacionalizacion WHERE id=$id";
            $resultado1 = mysql_query($query1) or die("La consulta en var=13 : $query1" . mysql_error());
            $res1 = mysql_fetch_assoc($resultado1);
            $correo1 = $res1['nombre'];
            $empresa1 = $res1['empresa'];
            $contacto = $res1['contacto1'];
            //convierte a minusculas y capitalize primera en mayuscula.
            $nombrecontacto = ucwords(strtolower($contacto));
            //correo
            $body = "<b>¡Felicidades, $nombrecontacto! </b> <br><br>";
            $body .= "Has concluido exitosamente tu registro, agradecemos nuevamente tu interés de participar en este proyecto, confiamos en que tu empresa será una de las seleccionadas. <br><br>";
            $body .= "A continuación la información que te fue solicitada será evaluada por el comité encargado de la selección y evaluación, ellos mismos se encargarán de elegir a cada una de las empresas participantes. <br><br>";
            $body .= "Nosotros nos comunicaremos vía correo electrónico para hacerte saber el resultado de la evaluación. <br><br>";
            $body .="<br><img src=\"http://www.bluewolf.com.mx/Internacionalizacion/images/piec.jpg\" width=\"400\" height=\"200\">";
            $cabeceras = "From: <info@bluewolf.com.mx> \r\n";
            $cabeceras .= "Bcc: liz.martinez@bluewolf.com.mx,luis.perez@bluewolf.com.mx \r\n";
            $cabeceras .= "Content-type: text/html; charset=UTF-8 \r\n";
            mail($correo1,"Internacionalizacion",$body,$cabeceras);

            echo $resultado;
        break;

        // experiencia
        case '11':
           $respuesta = $_POST['respuesta'];
           $resnegativo = $_POST['resnegativo'];
           $lugexpo = $_POST['lugexpo'];
           $respais = $_POST['respais'];
           $sigue = $_POST['sigue'];
           $mreto = $_POST['mreto'];
           $id = $_POST['id'];
   
           $query = "UPDATE internacionalizacion SET ";
           $query .= "expexportando='$respuesta', ";
           $query .= "noexporta='$resnegativo', ";
           $query .= "lugarexporta='$lugexpo', ";
           $query .= "paisexporta='$respais', ";
           $query .= "sigueexporta='$sigue', ";
           $query .= "mayoreto='$mreto' ";
           $query .= "WHERE id=$id";
           $resultado = mysql_query($query) or die("La consulta en var=11 : $query" . mysql_error());
           echo $resultado;
        break;

        // experiencia 2
        case '12':
           $porcenexpo = $_POST['porcenexpo'];
           $gustaexpo = $_POST['gustaexpo'];
           $motiva = $_POST['motiva'];
           $id = $_POST['id'];
   
           $query = "UPDATE internacionalizacion SET ";
           $query .= "porcentajeexporta='$porcenexpo', ";
           $query .= "razongustaexpo='$gustaexpo', ";
           $query .= "motivacion='$motiva' ";
           $query .= "WHERE id=$id";
           $resultado = mysql_query($query) or die("La consulta en var=12 : $query" . mysql_error());
            
          
        break;

        // experiencia 2
        case '13':

            //guardar y llenar ficha tecnica
            if ($_GET['f'] != "")
            {
                $enteraste = $_POST['resinfo'];
                $otra = $_POST['resinfo2'];
                $id = $_POST['id'];
           
                $query = "UPDATE internacionalizacion SET ";
                $query .= "enteraste='$enteraste', ";
                $query .= "otrores='$otra' ";
                $query .= "WHERE id=$id";
                $resultado = mysql_query($query) or die("La consulta en var=13 : $query" . mysql_error());
                echo $id;
            }
            else//guardar y finalizar
            {
                $enteraste = $_POST['resinfo'];
                $otra = $_POST['resinfo2'];
                $id = $_POST['id'];
       
                $query = "UPDATE internacionalizacion SET ";
                $query .= "enteraste='$enteraste', ";
                $query .= "otrores='$otra' ";
                $query .= "WHERE id=$id";
                $resultado = mysql_query($query) or die("La consulta en var=13 : $query" . mysql_error());
                    
                $query1 = "SELECT empresa,nombre,contacto1 FROM internacionalizacion WHERE id=$id";
                $resultado1 = mysql_query($query1) or die("La consulta en var=13 : $query1" . mysql_error());
                $res1 = mysql_fetch_assoc($resultado1);
                $correo1 = $res1['nombre'];
                $empresa1 = $res1['empresa'];
                $contacto = $res1['contacto1'];
                //convierte a minusculas y capitalize primera en mayuscula.
                $nombrecontacto = ucwords(strtolower($contacto));
                //$nombrecontacto = nameize($contacto);
        
                //correo
                $body = "<b>¡Bienvenido (a) $nombrecontacto! </b> <br><br>";
                $body .= "Gracias por postularte en el Programa de Internacionalización (PIEC) 2018. Será un gusto para nosotros que formes parte de este nuevo proyecto que brinda a las empresas chihuahuenses el soporte técnico, metodológico y de acompañamiento para el logro de la internacionalización de cada una de las empresas participantes. <br><br>";
                $body .= "Es un gusto para nosotros informarte que haz finalizado <b>Uno</b> de los <b>Dos Pasos</b> necesarios para concluir exitosamente tu proceso de inscripción. Te invitamos a concluir tu registro ingresando en la siguiente liga: www.bluewolf.com.mx/Internacionalizacion/ en donde podrás dar un click en <b>Paso 2  “Completar Ficha Técnica</b>”. <br><br>";
                $body .= "Si tienes una duda o comentario no dudes en comunicarte con Lucy Barrera al  439 07 70 <br><br>";
                $body .="<br><img src=\"http://www.bluewolf.com.mx/Internacionalizacion/images/piec.jpg\" width=\"400\" height=\"200\">";
                $cabeceras = "From: <info@bluewolf.com.mx> \r\n";
                $cabeceras .= "Bcc: liz.martinez@bluewolf.com.mx,luis.perez@bluewolf.com.mx \r\n";
                $cabeceras .= "Content-type: text/html; charset=UTF-8 \r\n";
                mail($correo1,"Internacionalizacion",$body,$cabeceras);
                echo $id;     
            }
            
        break;

        // ficha
        case '14':
           $nombre  = $_POST['nombre'];
           $empresa = "";
  
           $buscar = "SELECT id FROM internacionalizacion WHERE nombre='$nombre'";
           $resbuca = mysql_query($buscar) or die("archivo: GuardarDatosGenerales, case 14, consulta: $buscar" . mysql_error());
           if ($res = mysql_fetch_assoc($resbuca)) {
               $id = $res['id'];
           }
           else{
               $id = 0;
           }
           echo $id;
        break;
              
        default:
            # code...
            break;
    }

?>