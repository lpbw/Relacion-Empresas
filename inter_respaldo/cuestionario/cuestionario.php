<?
include "coneccion.php";


$id_pregunta=$_POST['pregunta'];
if($_POST['siguiente']=="0"){
$nombre=$_POST['nombre'];
$puesto=$_POST['puesto'];
$empresa=$_POST['empresa'];
$query= "insert into resultados(empresa, nombre, puesto, fecha)values('$empresa', '$nombre', '$puesto', now())";	
$resultado = mysql_query($query) or die("Error en operacion1:$query " . mysql_error());
$id_pregunta=mysql_insert_id();
}


if($_POST['enviar']!="")
{			
	
	
	if($_POST['r1']){
		$r1=$_POST['r1'];
		$respuesta="$r1[0]|$r1[1]|$r1[2]|$r1[3]|$r1[4]|$r1[5]";
		$listGStr= "update resultados set r1='$respuesta' where id=$id_pregunta";	
		$resultado = mysql_query($listGStr)or die("La consulta fall&oacute;P1: $listGStr ". mysql_error() );
	}	
	
	if($_POST['r2_1'] || $_POST['r2_2'] || $_POST['r2_3'] || $_POST['r2_4'] || $_POST['r2_5'] || $_POST['r2_6'] || $_POST['r2_7'] || $_POST['r2_8'] || $_POST['r2_9'] || $_POST['r2_otro']){
	
		$r2_1=$_POST['r2_1'];
		$r2_2=$_POST['r2_2'];
		$r2_3=$_POST['r2_3'];
		$r2_4=$_POST['r2_4'];
		$r2_5=$_POST['r2_5'];
		$r2_6=$_POST['r2_6'];
		$r2_7=$_POST['r2_7'];
		$r2_8=$_POST['r2_8'];
		$r2_9=$_POST['r2_9'];
		
	
		
		//if($r2_1!=""){$r2_1="";}else{$r2_1="Precio";}
		//if($r2_2!=""){$r2_2="";}else{$r2_2="Calidad / Desempeño";}
		//if($r2_3!=""){$r2_3="";}else{$r2_3="Diseño / Ingeniería";}
		//if($r2_4!=""){$r2_4="";}else{$r2_4="Crédito";}
		//if($r2_5!=""){$r2_5="";}else{$r2_5="Consultoría";}
		//if($r2_6!=""){$r2_6="";}else{$r2_6="Prestigio";}
		//if($r2_7!=""){$r2_7="";}else{$r2_7="Innovación";}
		//if($r2_8!=""){$r2_8="";}else{$r2_8="Servicio Integral Personalizado";}
		//if($r2_9!=""){$r2_9="";}else{$r2_9="Capacidad de Respuesta (Tiempos de entrega, cambios, etc)";}
		
		$respuesta="$r2_1|$r2_2|$r2_3|$r2_4|$r2_5|$r2_6|$r2_7|$r2_8|$r2_9";

		$respuesta=str_replace("||||||||||", "|", $respuesta);
		$respuesta=str_replace("|||||||||", "|", $respuesta);
		$respuesta=str_replace("||||||||", "|", $respuesta);
		$respuesta=str_replace("|||||||", "|", $respuesta);
		$respuesta=str_replace("||||||", "|", $respuesta);
		$respuesta=str_replace("|||||", "|", $respuesta);
		$respuesta=str_replace("||||", "|", $respuesta);
		$respuesta=str_replace("|||", "|", $respuesta);
		$respuesta=str_replace("||", "|", $respuesta);

		$r2_otro=$_POST['r2_otro'];
		if($r2_otro!="")
		$r2_otro=str_replace(",", "|", $r2_otro);
		
		if($r2_otro!=""){ $rest="$respuesta|$r2_otro";}else{$rest="$respuesta";}
		$rest=trim($rest, '|');
		$listGStr= "update resultados set r2='$rest' where id=$id_pregunta";	
		$resultado = mysql_query($listGStr)or die("La consulta fall&oacute;P1: $listGStr ". mysql_error() );
		
		$consulta2="update resultados set r2=REPLACE(r2, '||', '|') where id=$id_pregunta";
		$resultado2 = mysql_query($consulta2)or die("La consulta fall&oacute;P1: $consulta2 ". mysql_error() );
		
		$consulta3="UPDATE resultados SET r2=SUBSTRING(r2,2) WHERE LEFT(r2,1)='|' and id=$id_pregunta";
		$resultado3 = mysql_query($consulta3)or die("La consulta fall&oacute;P1: $consulta3 ". mysql_error() );
	}
		if($_POST['r3']){
			$count=$_POST['count'];
			$r3=$_POST['r3'];
			$factores=$_POST['factores'];
			$count2=0;
			while($count2<$count){
				$respuesta.="$r3[$count2]|";
				if($r3[$count2]!=""){
				$rest.="$factores[$count2]|";
				}
			$count2++;
			}
			$respuesta=trim($respuesta, '|');
			$rest=trim($rest, '|');
			
			$respuesta=str_replace("|||", "|", $respuesta);
			$respuesta=str_replace("||", "|", $respuesta);
			
			$listGStr= "update resultados set r3='$respuesta', factores='$rest' where id=$id_pregunta";	
			$resultado = mysql_query($listGStr)or die("La consulta fall&oacute;P1: $listGStr ". mysql_error() );
			
			
		}	
		
		if($_POST['r4']){
		$r4=$_POST['r4'];
		
		$r4=$_POST['r4'];
		$r4=str_replace(",", "|", $r4);
		
		$listGStr= "update resultados set r4='$r4' where id=$id_pregunta";	
		$resultado = mysql_query($listGStr)or die("La consulta fall&oacute;P1: $listGStr ". mysql_error() );
	}		
			if($_POST['r5']){
				$count3=$_POST['count3'];
				$r5=$_POST['r5'];
				$count4=0;
				while($count4<$count3){
					$respuesta.="$r5[$count4]|";
					$count4++;
				}
				
				$respuesta=trim($respuesta, '|');
				$listGStr= "update resultados set r5='$respuesta' where id=$id_pregunta";	
				$resultado = mysql_query($listGStr)or die("La consulta fall&oacute;P1: $listGStr ". mysql_error() );
			}	
			
			if($_POST['r6']){
				$count6=$_POST['count6'];
				$r6=$_POST['r6'];
				$count7=0;
				while($count7<$count6){
					$respuesta.="$r6[$count7]|";
					$count7++;
				}
				
				$respuesta=trim($respuesta, '|');
				$listGStr= "update resultados set r6='$respuesta' where id=$id_pregunta";	
				$resultado = mysql_query($listGStr)or die("La consulta fall&oacute;P1: $listGStr ". mysql_error() );
			}
			
			if($_POST['r7']){
				$r7=$_POST['r7'];
				$listGStr= "update resultados set r7='$r7' where id=$id_pregunta";	
				$resultado = mysql_query($listGStr)or die("La consulta fall&oacute;P1: $listGStr ". mysql_error() );
			}
}
			

//saltos de preguntas
$siguiente=$_POST['siguiente'];

$inicial=$siguiente;
$n_sql="i";
$contador_comp=0;
$contador_evaluados=0;

		$consulta = "select * from preguntas order by id";
		$co=0;
		$resultado = mysql_query($consulta) or die("La consulta fall&oacute;P13:$consulta ". mysql_error() );//. mysql_error()	
		while(@mysql_num_rows($resultado)>$co)
		{
			$res=mysql_fetch_row($resultado);
			$total=mysql_num_rows($resultado);
			$competencias[$co]= $res[0];
			$competencias_nombre[$co]= $res[1];
			$co++;	
		}	
		
		for($o=$inicial ;$o<$contador_comp; $o++){
			if($inicial!=$siguiente)
				$siguiente=$siguiente+1;
		
	$consulta  = "select * from preguntas where id=$competencias[$siguiente])";
	$resultado = mysql_query($consulta) or die("La consulta fall&oacute;P1:$consulta ". mysql_error() );//. mysql_error()	
	if(@mysql_num_rows($resultado)>=1)
	{
		$res=mysql_fetch_row($resultado);
		$contador_evaluados++;
		$o=$contador_comp;
		
	}
	}
	
	
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
              <td align="center" class="login" height="30">Encuesta <? echo $nombreU;?></td>
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
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="info2"><? echo"$competencias_nombre[$siguiente]"; ?></span></td>
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
                      <?	  		
		
			
			$query = "select * from respuestas where id_pregunta=$competencias[$siguiente]";
			$resultado = mysql_query($query) or die("La consulta fall&oacute;P12:$query ". mysql_error() );//. mysql_error()
			$c=0;	
			while(@mysql_num_rows($resultado)>$c)
			{
				$res=mysql_fetch_row($resultado);
			
				?>
                      
                    <tr bgcolor="#F1F2F4">
                        <td colspan="2" class="info"><? echo"$res[2]";?></td>
                      </tr>
                      <?
				
				 
			$c++;	
			}
			
			?>
			<? if($siguiente==2){
			$consulta2="SELECT r2 FROM resultados where id=$id_pregunta";
			$resultado2 = mysql_query($consulta2) or die("$consulta2 ". mysql_error());
			$res2=mysql_fetch_assoc($resultado2);
			$variable=$res2['r2'];
			
			$tags =explode('|', $variable);
			
			$count=0;
			foreach($tags as $key) {
			?>
						<tr>
                          <td colspan="2" class="info"><select name="r3[]" id="r3" >
						  <option value="">-Selecciona-</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
						  <option value="6">6</option>
						  <option value="7">7</option>
						  <option value="8">8</option>
						  </select>
						  
						  <!--<input type="text" name="r3[]" id="r3" size="5" required>--> <? echo $key?> <input type="hidden" name="factores[]" value="<? echo $key?>"></td>
						  </tr>
			<? 
			$count++;
			
			}
			?><input type="hidden" name="count" value="<? echo $count?>"><?
			}?>
                 
				 <? if($siguiente==4){
			$consulta2="SELECT r4 FROM resultados where id=$id_pregunta";
			$resultado2 = mysql_query($consulta2) or die("$consulta2 ". mysql_error());
			$res2=mysql_fetch_assoc($resultado2);
			$variable=$res2['r4'];
			
			$tags =explode('|', $variable);
			
			$count3=0;
			foreach($tags as $key) {
			?>
						<tr>
                          <td colspan="2" class="info"><input type="checkbox" name="r5[]" id="r5" value="<? echo $key?>"> <? echo $key?></td>
						  </tr>
			<? 
			$count3++;
			
			}
			?><input type="hidden" name="count3" value="<? echo $count3?>"><?
			}?>
			  
			<? if($siguiente==5){?>
			<tr>
                          <td colspan="2" class="info">
			
							
			<?
			$consulta5="SELECT factores FROM resultados where id=$id_pregunta";
			$resultado5 = mysql_query($consulta5) or die("$consulta5 ". mysql_error());
			$res5=mysql_fetch_assoc($resultado5);
			$variable=$res5['factores'];
			$tags =explode('|', $variable);
			
			$consulta6="SELECT r4 FROM resultados where id=$id_pregunta";// se cambio a que se muetren todos , no solo los actuales
			$resultado6 = mysql_query($consulta6) or die("$consulta6 ". mysql_error());
			$res6=mysql_fetch_assoc($resultado6);
			$variable2=$res6['r4'];
			$tags2 =explode('|', $variable2);
			?>
			<table width="100%" border="1" cellspacing="0" cellpadding="0">
  							<tr>
    							<td width="25%" class="info"><b>Factores/<br/>Proveedores<b/></td>
								<? foreach($tags2 as $key) {?>
    							<td align="center"><? echo $key?></td>
								<? }?>
  							</tr>
			<?
			$count5=0;
			$count6=0;
			foreach($tags as $key2) {
			?>
						
						
						
  							<tr>
							<td><? echo $key2?></td>
							<? foreach($tags2 as $key) {?>
    							<td align="center"><input type="text" name="r6[]" size="5" maxlength="1" onkeypress="return validarNro(event);" required/></td>
								<? $count6++;}?>
  							</tr>
						

						
			<? 
			$count5++;
			
			}
			?><input type="hidden" name="count5" value="<? echo $count5?>">
			<input type="hidden" name="count6" value="<? echo $count6?>">
			</table>
             </td>
						  </tr> 
			<? }?>
			    
                        <td colspan="2"  class="style9">
                        	 
                              <input name="siguiente" type="hidden" id="siguiente" value="" />
							  <input name="pregunta" type="hidden" id="pregunta" value="<? echo $id_pregunta?>" />
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
                          <td width="13%"><span class="style5">
							<? if($siguiente!=$co-1){?>
                            <input name="enviar" type="submit" class="btn_c" id="enviar" value="Siguiente &gt;&gt;" onClick="document.form1.siguiente.value='<? echo $siguiente+1;?>'; return validaP();"/>
							<? }?>
                            <? if($siguiente==$co-1){?>
                            <input name="enviar" type="submit" class="btn_c" id="enviar" value="Siguiente &gt;" onClick="document.form1.action='fin.php';"/>
                            <? }?>
                          </span></td>
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

</form>
<script>
	  function validaP(){
	  	<? echo"$v_script";?>
	  	{

			
			return true;
	  	}
	  	else
	  	{
			alert("Debe evaluar a todos")
			return false;
	  	}
	  }
	  function validaC(){
	  	<? echo"$v_script";?>
	  	{

			
			
		form1.action="cuestionario2.php";
			return true;
	  	}
	  	else
	  	{
			alert("Debe evaluar a todos")
			return false;
	  	}
	  }
	  </script>
</body>
</html>
