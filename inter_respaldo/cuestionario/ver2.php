<?php

include "coneccion.php";

//header("Content-type: application/vnd.ms-excel");
//header("Content-Disposition: attachment; filename=reporte.xls");

$id=$_GET['id'];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Exportar</title>

</head>

<body>

  <table width="100%" border="1" cellspacing="2" cellpadding="2">
    <tr>
      <td bgcolor="#CCCCCC">Empresa</td>
      <td bgcolor="#CCCCCC">Nombre</td>
	  <td bgcolor="#CCCCCC">Puesto</td>
      <td bgcolor="#CCCCCC">Fecha</td>
      <td bgcolor="#CCCCCC">R1</td>
      <td bgcolor="#CCCCCC">R2</td>
      <!--<td bgcolor="#CCCCCC">R3</td>-->
	  <td bgcolor="#CCCCCC">R4</td>
	  <td bgcolor="#CCCCCC">R5</td>
      <td bgcolor="#CCCCCC">R6</td>
      <td bgcolor="#CCCCCC">R7</td>
    </tr>
	<?
			$query = "select * from resultados order by id";
			$resultado = mysql_query($query) or die("La consulta fall&oacute;P12:$query ". mysql_error() );//. mysql_error()	
			while($res=mysql_fetch_assoc($resultado))
			{
			
			$r2=explode('|',$res['factores']);
			$r3=explode('|',$res['r3']);
	?>
    <tr>
      <td><? echo $res['empresa'];?></td>
      <td><? echo $res['nombre'];?></td>
	  <td><? echo $res['puesto'];?></td>
      <td><? echo $res['fecha'];?></td>
      <td><? echo $res['r1'];?></td>
      <td><? echo $res['r2'];?></td>
      <!--<td><? //$count=0; foreach($r2 as $r2r){ echo "$r2r $r3[$count] <br/>"; $count++;}?></td>-->
	  <td><? echo $res['r4'];?></td>
	  <td><? echo $res['r5'];?></td>
      <td><?
			$consulta5="SELECT factores FROM resultados where id={$res['id']}";
			$resultado5 = mysql_query($consulta5) or die("$consulta5 ". mysql_error());
			$res5=mysql_fetch_assoc($resultado5);
			$variable=$res5['factores'];
			$tags =explode('|', $variable);
			
			$consulta6="SELECT r4 FROM resultados where id={$res['id']}";
			$resultado6 = mysql_query($consulta6) or die("$consulta6 ". mysql_error());
			$res6=mysql_fetch_assoc($resultado6);
			$variable2=$res6['r4'];
			$tags2 =explode('|', $variable2);
			
			$consulta7="SELECT r6 FROM resultados where id={$res['id']}";
			$resultado7 = mysql_query($consulta7) or die("$consulta7 ". mysql_error());
			$res7=mysql_fetch_assoc($resultado7);
			$variable3=$res7['r6'];
			$tags3 =explode('|', $variable3);
			
			
			$consulta8="SELECT r3 FROM resultados where id={$res['id']}";
			$resultado8 = mysql_query($consulta8) or die("$consulta8 ". mysql_error());
			$res8=mysql_fetch_assoc($resultado8);
			$variable8=$res8['r3'];
			$tags8 =explode('|', $variable8);
			?>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
  							<tr>
    							<td width="25%" class="info"><b>Factores/<br/>Proveedores<b/></td>
								<td>Priorizacion</td>
								<? foreach($tags2 as $key) {?>
    							<td><? echo $key?></td>
								<? }?>
  							</tr>
			<?
			$count6=0;
			$count5=0;
			foreach($tags as $key2) {
			?>
						
						
						
  							<tr>
							<td><? echo $key2?></td>
							<td><? echo $tags8[$count5]?></td>
							<? foreach($tags2 as $key) {?>
    							<td><? echo $tags3[$count6]?></td>
								<? $count6++;}?>
  							</tr>
						

						
			<? 
			$count5++;
			
			}
			?>
			</table></td>
      <td><? echo $res['r7'];?></td>      
    </tr>
	
         
         
  
	<?	}?>	
</table>
 
</body>
</html>
