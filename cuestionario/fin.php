<?

include "coneccion.php";

$siguiente=$_POST['siguiente'];
$inicial=$siguiente;

$id_pregunta=$_POST['pregunta'];

$r7=$_POST['r7'];
if($_POST['enviar']!="")
{
	
				
					$listGStr= "update resultados set r7='$r7' where id=$id_pregunta";	
					$resultado = mysql_query($listGStr) or die("Error en operacion1:$listGStr " . mysql_error());
	
}


	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Encuesta</title>
<link rel="stylesheet" href="colorbox.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="colorbox/jquery.colorbox-min.js"></script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url();
}
-->
</style>
<link href="images/textos.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

</script>

</head>

<body onload="MM_preloadImages('images/icono_borrar_r.png')">
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="images/spacer.gif" width="10" height="20" /></td>
      </tr>
      <tr>
        <td align="center">
          <table width="850" border="0" cellspacing="7" cellpadding="0">
            <tr>
              <td align="center" class="login" height="30">Encuesta</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table>
         </td>
      </tr>
      <tr>
        <td><img src="images/spacer.gif" width="10" height="20" /></td>
      </tr>
      <tr>
        <td><img src="images/spacer.gif" width="10" height="10" /></td>
      </tr>
      <tr>
        <td><table width="844" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="250" valign="top" bgcolor="#eeeeee" align="center">
                <table width="773" border="0">
                  <tr>
                    <td width="712" class="texto_contenido">&nbsp;</td>
                  </tr>
                  <tr>
                    <td class="info2" align="center">
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <p>Gracias por tu tiempo</p>
					  
					  <p><a href="index.php" class="regresar">Salir</a></p>
                   </td>
                  </tr>
                </table>
               
              </td>
          </tr>
        </table></td>
      </tr>
     
</table>     
    </table>

</form>

</body>
</html>
