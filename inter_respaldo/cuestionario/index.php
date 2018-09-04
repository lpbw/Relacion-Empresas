<?

include "coneccion.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Encuesta</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
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
<form id="form1" name="form1" method="post" action="cuestionario.php">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
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
        <td><table width="844" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="250" valign="middle" bgcolor="#eeeeee"><table width="792" border="0" align="center" cellspacing="0">
               
                <tr>
                  <td valign="top" align="center" class="info">&nbsp;</td>
                </tr>
                <tr>
                  <td valign="top" align="center" class="info2">Empresa: <input type="text" name="empresa" id="empresa" required class="campo"></td>
                </tr>
                <tr>
                  <td valign="top" align="center" class="info2">Nombre: <input type="text" name="nombre" id="nombre" required class="campo"></td>
                </tr>
				<tr>
                  <td valign="top" align="center" class="info2">Puesto: <input type="text" name="puesto" id="puesto" required class="campo"></td>
                </tr>
                <tr>
                  <td valign="top" align="center" class="info">&nbsp;</td>
                </tr>
                <tr>
                  <td valign="top" align="center" class="info"><input name="iniciar" type="submit" class="btn" id="iniciar" value="Iniciar" /> <input type="hidden" name="siguiente" value="0"></td>
                  </tr>
                <tr>
                  <td valign="bottom" height="40" align="right">&nbsp;</td>
                  </tr>
              </table></td>
          </tr>
        </table></td>
      </tr>
    
    </table>

</form>
</body>
</html>
