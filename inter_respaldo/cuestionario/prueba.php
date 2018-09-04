<?
include "coneccion.php";


	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Encuesta</title>
<link rel="stylesheet" href="colorbox.css" />

<script src="colorbox/jquery.colorbox-min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
function validarNro(e) {
var key;
if(window.event) // IE
	{
	key = e.keyCode;
	}
else if(e.which) // Netscape/Firefox/Opera
	{
	key = e.which;
	}

if (key >=48 && key < 54)
    {
   
        return true;
		} 
    else 
        { return false; 
    }

}
</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});

function valida(){

	
if(document.form1.r3[0].value==1){
		
}

}
</script>
</head>

<body onLoad="MM_preloadImages('images/icono_borrar_r.png')">
<form id="form1" name="form1" method="post" action="cuestionario.php">
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
                <table width="792" border="0">
                  <tr>
                    <td bgcolor="#FFFFFF" align="right" class="totales"><? echo $competencias[$siguiente] ?>-7</td>
                  </tr>
                  <tr>
                    <td width="602" bgcolor="#CCCCCC" align="left"><br />
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                  </tr>
                  
                  <tr>
                    <td class="texto_contenido">&nbsp;</td>
                  </tr>
                </table>
               
              <table width="795" height="350" border="0" align="center" cellspacing="0">
                <tr>
                  <td valign="top"><table width="565" border="0" align="center" cellspacing="0">
                      <tr>
                        <td width="54%"  height="18" rowspan="2" bgcolor="#CCCCCC" class="info2">Respuestas</td>
                        <td width="26%" height="9" bgcolor="#CCCCCC" >&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="9" bgcolor="#CCCCCC" >&nbsp;</td>
                      </tr>
                   
                      
                    <tr bgcolor="#F1F2F4">
                        <td colspan="2" class="info">&nbsp;</td>
                      </tr>
                     
			
						<tr>
                          <td colspan="2" class="info">
						  <? $count=0; while(8>$count){?>
						  <select name="r3[<? echo $count?>]" id="r3" onchange="valida()" >
						  <option value="">-Selecciona-</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
						  <option value="6">6</option>
						  <option value="7">7</option>
						  <option value="8">8</option>
						  </select><br/>
						  <? $count++;
						  
						  }?>
						  
						  <!--<input type="text" name="r3[]" id="r3" size="5" required>--></td>
						</tr>
			
			
						<tr>
                          <td colspan="2" class="info">&nbsp;</td>
						  </tr>
			
			<tr>
                        <td colspan="2" class="info">&nbsp;</td>
					  </tr> 
		
			    
                        <td colspan="2"  class="style9">
                        	 
                             
                          </td>
                      </tr>
                  </table></td>
                  </tr>
              </table>
              <table width="745" border="0" align="center">
                <tr>
                  <td colspan="3" align="center">
                      <table width="100%" border="0" cellpadding="0">
                        <tr>
                          <td width="16%">&nbsp;</td>
                          <td width="71%">&nbsp;</td>
                          <td width="13%">&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="3" ><table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td height="5" background="images/franja_negra.jpg">&nbsp;</td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td colspan="3" class="texto_contenido2" >&nbsp;</td>
                        </tr>
                      </table>
                   </td>
                </tr>
              </table></td>
          </tr>
        </table></td>
      </tr>
      
    </table>
<script> 
window.onload=function(){ 
cambiar1(); 


} 
</script> 
</form>

</body>
</html>
